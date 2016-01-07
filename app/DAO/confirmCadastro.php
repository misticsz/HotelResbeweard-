<script>

	function loadHome(){
	
		location.href="/"
	
	}
	function signUp2(){
			$.post('/home/signUp',{},
			function(data){
				$('#cadastroBox').html(data);
					document.getElementById("email").value="Email already used";
					document.getElementById("email").style.border="1px solid red";}
					document.getElementById("login").value="Login already used";
					document.getElementById("login").style.border="1px solid red";}
				
			});
	}

</script>

<?php

	$login = $_POST['postlogin'];
	$name = $_POST['postname'];
	$password = $_POST['postpass'];
	$email = $_POST['postemail'];
	$endereco = $_POST['postendereco'];
	$cidade = $_POST['postcidade'];
	$telefone = $_POST['posttelefone'];
	$documento = $_POST['postdocumento'];
	$pais = $_POST['postpais'];
	
	$loginStats=false;
	$emailStats=false;
	
	$data = DBConnection::select("Select * from hospede");
	
	foreach($data as $row){
	
		if($row['HonLog']==$login){
			$loginStats=true;
		}
		if($row['HonEma']==$email){
			$loginStats=true;
		}
		
	}

	
	if($loginStats){

        echo "<script>signUp2()</script>";
    }
	else{
		
		DBConnection::insert('Insert INTO hospede (HosNom,HosLog,HosPas,HosEma,HosEnd,HosCid,HosTel,HosDoc,HosPai) values("'.$name.'","'.$login.'","'.$password.'","'.$email.'","'.$endereco.'","'.$cidade.'","'.$telefone.'","'.$documento.'","'.$pais.'")');
		}
	
	
	


?>