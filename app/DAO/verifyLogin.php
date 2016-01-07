
<?php
			$login = $_POST['postlogin'];
			$pass = $_POST['postpass'];
            $tuts = 0;
			
			
			echo "<script>alert('HI')</script>";
			
			$data = DBConnection::select("SELECT * FROM hospede");
			
			foreach ($data as $row){	
				if ($row['HosLog']==$login && $row['HosPas']==$pass){
					session_start();
					$_SESSION['username'] = $row['HosLog'];
					$_SESSION['password'] = $row['HosPas'];
					$_SESSION['adm'] = $row['HosAdm'];
                    $_SESSION['wrongLogin'] = false;
                    $tuts = 1;

				}

			}

            if(!$tuts)
            {
                session_start();
                $_SESSION['wrongLogin'] = true;
            }



?>