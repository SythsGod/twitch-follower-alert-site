<?php
	class Retriever{
		private $url_part_1 = 'https://api.twitch.tv/kraken/channels/';
		private $url_part_2 = '/follows/?limit=';
		private $user_token = 'tnoe3gkocznc7iz1p16jwj358qsl9y';

		private function GetFollowers($url){
			if(function_exists('curl_init')){
				$ch = curl_init();
				$options = array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_CONNECTTIMEOUT => 5,
					CURLOPT_CUSTOMREQUEST => 'GET',
					CURLOPT_HEADER => 0,
					CURLOPT_SSL_VERIFYPEER => 0,
					CURLOPT_SSL_VERIFYHOST => 0,
					CURLOPT_HTTPHEADER => array('Accept: application/vnd.twitchtv.v5+json', 'Client-Id: ' . $this->user_token) //'Accept: application/vnd.twitchtv.v3+json',
					);

				curl_setopt_array($ch, $options);
				$json = curl_exec($ch);
				curl_close($ch);
			} else {
				$json = file_get_contents($url);
			}

			//echo $json;
			$parsed = json_decode($json, true);

			return $parsed;
		}

		// private function GetFollowers($url){
		// 	if(function_exists('curl_init')){
		// 		$ch = curl_init();

		// 		echo $url;

		// 		curl_setopt($ch, CURLOPT_URL, $url);
		// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


		// 		$headers = array();
		// 		$headers[] = "Accept: application/vnd.twitchtv.v5+json";
		// 		$headers[] = "Client-Id: " . $this->$user_token;
		// 		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// 		$json = curl_exec($ch);
		// 		curl_close($ch);
		// 	}

		// 	$parsed = json_decode($json, true);

		// 	return $json;
		// }

		public function GetAllFollowers($user_ref){
			$i = 0;
			$parsed = array();

			$url = $this->url_part_1 . $user_ref . $this->url_part_2 . '0';

			$parsed[0] = $this->GetFollowers($url);
			$next = $parsed[0]['_links']['next'];

			do {
				$i++;
				$parsed[$i] = $this->GetFollowers($next);
				$next = $parsed[$i]['_links']['next'];
			} while (count($parsed[$i]['follows']) > 20);

			return $parsed;
		}

		public function GetFollowersWithLimit($user_ref, $limit_ref){
			$url = $this->url_part_1 . $user_ref . $this->url_part_2 . $limit_ref;

			$parsed = $this->GetFollowers($url);

			return $parsed;
		}
	}
?>