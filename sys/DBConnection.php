<?php    
    class DBConnection{	     
        private function OpenConnection() {
			$server = "localhost";
			$user= "root";
			$password="";
			$db="hoteldb";

			$connection = mysql_connect($server,$user,$password);
			mysql_select_db($db);

			mysql_query("SET NAMES 'utf8'");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');

	   
			return $connection;
	    }
		 
		static function select($query) {
			//echo $query;
			$connection = self::OpenConnection();
			
			$collection = mysql_query($query);
			
			$data = array();
			
			while ($row = mysql_fetch_array($collection)) {
				$data[] = $row;
			}
			
			self::CloseConnection($connection);
			
			return $data;
		}
		
		static function insert($query) {
			//echo $query;
			$connection = self::OpenConnection();
			
			mysql_query($query);
			
			$Code = mysql_insert_id();
			
			self::CloseConnection($connection);
			
			return $Code;
		}
		
		static function execQuery($query) {
			//echo $query;
			$connection = self::OpenConnection();
			
			mysql_query($query);
			
			self::CloseConnection($connection);
		}
		 
		private function CloseConnection($connection) {
			 mysql_close($connection);
	    }
	}
?>