<html>
	<title>Sistema do Hotel</title>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<script type="text/javascript" src="<?php echo JS_URL; ?>jquery.js "></script>
	 	<script type="text/javascript" src="<?php echo JS_URL; ?>jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
	    <script type="text/javascript" src="<?php echo JS_URL; ?>jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js"></script>
	    <script type="text/javascript" src="<?php echo JS_URL; ?>jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
	</head>
	<script>
		function signUp(){

			$.post('/home/signUp',{},
			function(data){
				$('#inicio').html(data);
                document.getElementById("inicio").style.display="block";

			});
		}
		function formLogin(){
			var elem = document.getElementById("loginArea");
			var elem2 = document.getElementById("logedArea");
			elem.style.display="none";
			elem2.style.display="inline";

		}
		function verifyLogin(){ 
			var login = $('#loginInput').val();
			var pass = $('#passInput').val();

			$.post('/home/verifyLogin',{postlogin:login,postpass:pass},
			function(data){
                 window.location.reload();

			});iana
		}
		function logOut(){
			
			$.post('/home/logOut',{},
			function(data){
				$('#inicio').html(data);
			});
		}
		function admPage(){
			document.getElementById("admButton").style.display="inline";
		}
        function quickReserva()
        {
            document.getElementById("reserva").style.display="block";
            $.post('/home/quickReserva',{},
                function(data){
                    $('#reserva').html(data);

                });
        }
        function goToPerfil(){
            document.getElementById("perfilArea").style.display="inline";
            $.post('/home/perfil',{},
                function(data){
                    $('#perfilArea').html(data);

                });
        }
        function close(){

            document.getElementById("perfilArea").style.display="none";
        }
        function wrongLogin()
        {
            document.getElementById("loginInput").style.border="1px solid red"
            document.getElementById("loginInput").value=" Wrong Login"
            document.getElementById("passInput").style.border="1px solid red"

            document.getElementById("passInput").value=" Wrong Pass"
        }

		

	</script>

	<body style="height:90%; background-image:url('app/Images/back.jpg');background-position:center;background-color:#cccccc;">

		<div id="cadastroBox" style="display:none; opacity:1;" class="cadastroBox">
		</div>
		<div id="mainFrame">
		<div id="headerArea">

			<div id="loginArea" style="display:inline">
				<label id="loginL" class="loginText" style="margin-left:10px;">Login: </label>
				<input onfocus="document.getElementById('loginInput').style.border='1px solid black',document.getElementById('loginInput').value=''" id="loginInput" style="margin-top:10px" class="loginInput">
				<label id="passwordL" class="loginText" style="margin-left:10px;">Password:</label>
				<input onfocus="document.getElementById('passInput').style.border='1px solid black',document.getElementById('passInput').value=''" type="password" id="passInput" class="loginInput">
				<button style="margin-left:10px;" class="headerButton" onClick="verifyLogin()" class="loginButton">Entrar</button>
				<button style="font-size:12px; color:yellow; margin-left:10px;" class="headerButton" onClick="signUp()" class="loginButton">Cadastre!</button>
			</div>
			<div id="logedArea" style="margin-top:10px; display:none; float:right;color: white;font-family:Century Gothic;font-size:15px;padding-top:5px;margin-right:30px;">
				<label id="loginL" style="color: white;	text-shadow: 0 0 1px #000;font-family: Verdana" style="margin-left:10px;">Welcome <?php session_start(); echo $_SESSION['username']; ?> </label>
				<a href="./home/logout" style="margin-left:10px;" class="headerButton"  class="loginButton">Logout</a>
                <a onClick="goToPerfil()" style="margin-left:10px;" class="headerButton"  class="loginButton">Perfil</a>
			</div>
			<div id="headerMenu">
				<button  onClick="window.location.href='/'" class="headerButton"style="">Home</button>
				<button class="headerButton" onclick="quickReserva()" style="">Reserva</button>
				<button id="admButton" class="headerButton" style="display:none;">Administrar</button>
				<label id="wrongLogin" class="loginText" style="display:none; color:red; margin-top:12px; margin-left:600px;">Wrong Login </label>
			</div>

			</div>

		</div>
        <div id="inicio" style="position:absolute;display:none; overflow:auto;border:1px solid white;opacity:0.85;margin-left:5%;margin-top:20px;background-color:black;width:400px; height:90%;"></div>
        <div style="opacity:0.85;border:1px solid white; background-color:black; opacity=0.65; z-index:1; margin-left:72%;margin-top:-8px; width:330px; height:250px; display:none; position: absolute;" id="perfilArea">
        </div>

        <div id="reserva" style="float:right; margin-left:47%; z-index:1;position:absolute;margin-top:80px;display:none; overflow:auto;border:1px solid white;opacity:0.85;background-color:black;width:500px; height:300px;"></div>
	<?php
        if(isset($_SESSION['wrongLogin']))
        {
            if($_SESSION['wrongLogin']==true)
             echo "<script>wrongLogin()</script>";
        }
		if(isset($_SESSION['username']))
		{
			echo "<script>formLogin()</script>";
			if($_SESSION['adm'])
				echo "<script>admPage()</script>";
		}
	?>
		
		

