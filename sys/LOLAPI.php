<?php

	

	class LOLAPI{
		
		
		function getSummonerInfo($nick){
			
			$key = "fd9f3698-3b77-4730-a0be-0e9a15f6b22e";
			
			$fullText = file_get_contents('https://prod.api.pvp.net/api/lol/na/v1.3/summoner/by-name/'.$nick.'?api_key='.$key);
			$data = array();
			
			preg_match('#"id"(.*)#',$fullText,$var);
			
			
			$var[0] = str_replace("\"", "", $var[0]);
			$var[0] = str_replace("{", "", $var[0]);
			$var[0] = str_replace("}", "", $var[0]);
				
			$atribs = explode(',', $var[0]);
				
			foreach ($atribs as $atrib) {
				$field = explode(':', $atrib);
				$data[$field[0]] = $field[1];
			}
			
			return $data;	
		}
		
		function getLastGameTime($id){
		
			$key = "fd9f3698-3b77-4730-a0be-0e9a15f6b22e";
			
			$var = file_get_contents('https://prod.api.pvp.net/api/lol/na/v1.3/game/by-summoner/'.$id.'/recent?api_key='.$key);
			$data = array();
			
			
			$var = str_replace("\"", "", $var);
			$var = str_replace("{", "", $var);
			$var = str_replace("}", "", $var);
			
				
			$atribs = explode(',', $var);
				
			foreach ($atribs as $atrib) {
				$field = explode(':', $atrib);
				
				if($field[0]=="createDate"){
					$data[$field[0]] = $field[1];
					break;
				}
			}
			
			return $data;	
		
		
		}
		
		function getLastGameResult($id){
		
			$key = "fd9f3698-3b77-4730-a0be-0e9a15f6b22e";
			
			$var = file_get_contents('https://prod.api.pvp.net/api/lol/na/v1.3/game/by-summoner/'.$id.'/recent?api_key='.$key);
			$data = array();
			
			
			$var = str_replace("\"", "", $var);
			$var = str_replace("{", "", $var);
			$var = str_replace("}", "", $var);
			
				
			$atribs = explode(',', $var);
				
			foreach ($atribs as $atrib) {
				$field = explode(':', $atrib);
				
				if($field[0]=="win"){
					$data[$field[0]] = $field[1];
					break;
				}
			}
			
			return $data;	
		
		
		}
		
		function isInGame($nick){

		$opts = array(
		  'http'=>array(
			'method'=>"GET",
			'header'=>"X-Mashape-Authorization: o0PaVEhTEoUcdvUDt3ze9C9JL5h9UHlI"
		  )
		);

		$context = stream_context_create($opts);

		// Open the file using the HTTP headers set above
		
		$var = file_get_contents('https://teemojson.p.mashape.com/player/na/'.$nick.'/ingame', false, $context);

			$data = array();
			$var = str_replace("\"", "", $var);
			$var = str_replace("{", "", $var);
			$var = str_replace("}", "", $var);
			
				
			$atribs = explode(',', $var);
			
			
			$field = explode(":",$atribs[1]);
			
			return $field[1];
			

		
		}
		

	
	}