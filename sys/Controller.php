<?php
	class Controller {	
	
		public function _startup() {
		}
	
		static function RedirectPage ($URL = "") {				
			$params = explode('?', $URL);
			$params = explode('/', $params[0]);
			$count = count($params);
			$parameters = array();
			
			if (isset($params[1]) && $params[1] != "") {
				$URL = $params[1];
			} else {
				$URL = 'home';
			}
			
			$function = ((isset($params[2]) && $params[2] != "")?$params[2]:"index");
			
			for ($i=3;$i<$count;$i++) {
				$parameters[] = $params[$i];
			}
							
			if (file_exists(CTR_URL.$URL.'.php')) {
				include_once(CTR_URL.$URL.'.php');
				$pageClass = $URL;
				$page = new $pageClass();
				
				if (method_exists($page,$function)) {
					$page->_startup();
					$page->$function($parameters);
				} else { 
					echo "Page not found";
				}
			} else {
				echo CTR_URL.$URL.'.php';
				echo "Page not found";
			}
		}
	}
?>