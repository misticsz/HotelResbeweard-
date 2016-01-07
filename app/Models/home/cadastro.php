<script>
	function lostFocus(){
	document.getElementById("name").value="";
	document.getElementById("name").style.border="1px solid black";}
	function lostFocusL(){
	document.getElementById("login").value="";
	document.getElementById("login").style.border="1px solid black";}
	function lostFocusP(){
	document.getElementById("password").value="";
	document.getElementById("password").style.border="1px solid black";}
	function lostFocusE(){
	document.getElementById("email").value="";
	document.getElementById("email").style.border="1px solid black";}
	function lostFocusEn(){
	document.getElementById("endereco").value="";
	document.getElementById("endereco").style.border="1px solid black";}
	function lostFocusC(){
	document.getElementById("cidade").value="";
	document.getElementById("cidade").style.border="1px solid black";}
	function lostFocusP(){
	document.getElementById("pais").value="";
	document.getElementById("pais").style.border="1px solid black";}
	function lostFocusT(){
	document.getElementById("telefone").value="";
	document.getElementById("telefone").style.border="1px solid black";}
	function lostFocusD(){
	document.getElementById("documento").value="";
	document.getElementById("documento").style.border="1px solid black";}
	
	function isNumber (o) {
			return !isNaN (o-0) && o !== null && o.replace(/^\s\s*/, '') !== "" && o !== false;
	}
	
	function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
	} 
	
	function hasWhiteSpace(s) {
		return s.indexOf(' ') >= 0;
	}	
	

	
	function signUpConfirm(){ 
			var cont=0;
			var login = $('#login').val();
			var password = $('#password').val();
			var name = $('#name').val();
			var email = $('#email').val();
			var endereco = $('#endereco').val();
			var pais = $('#pais').val();
			var cidade = $('#cidade').val();
			var telefone = $('#telefone').val();
			var documento = $('#documento').val();

			
			if(name=="" || name=="   Name" || name.length<5){
				document.getElementById("name").style.border="1px solid red";
				document.getElementById("name").value="Invalid name."
                cont=0;
			}
			else
				cont+=1;
			if(login=="" || login=="   Login" || login.length<5 || hasWhiteSpace(login) ){
				document.getElementById("login").style.border="1px solid red";
				document.getElementById("login").value="Invalid login."
                cont=0;
			}
			else
				cont+=1;
			if(password=="" || password=="   Password"){
				document.getElementById("password").style.border="1px solid red";
				document.getElementById("password").value="Invalid password ( Between 7 and 15 )"
                cont=0;
			}
			else
				cont+=1;
			if(email=="" || email=="   E-mail" || !validateEmail(email) ){
				document.getElementById("email").style.border="1px solid red";
				document.getElementById("email").value="Invalid e-mail."
                cont=0;
			}
			else
				cont+=1;
			if(email=="" || email=="   Endereco" && endereco.length>5){
				document.getElementById("endereco").style.border="1px solid red";
				document.getElementById("endereco").value="Endereço invalido."
                cont=0;
			}
			else
				cont+=1;
			if(email=="" || email=="   Pais" && pais.length>3){
				document.getElementById("pais").style.border="1px solid red";
				document.getElementById("pais").value="Pais Invalido"
                cont=0;
			}
			else
				cont+=1;
			if(email=="" || email=="   Telefone" && isNumber(telefone) && telefone.length>10){
				document.getElementById("telefone").style.border="1px solid red";
				document.getElementById("telefone").value="Telefone Invalido"
                cont=0;
			}
			else
				cont+=1;
			if(email=="" || email=="   Documento" && isNumber(documento) && documento.length>10){
				document.getElementById("documento").style.border="1px solid red";
				document.getElementById("documento").value="Invalid e-mail."
                cont=0;
			}
			else
				cont+=1;
            if(cidade=="" || cidade=="   Cidade" && cidade.length>6){
                document.getElementById("cidade").style.border="1px solid red";
                document.getElementById("cidade").value="Cidade invalida."
                cont=0;
            }
            else
                cont+=1;
			
			if(cont==9){
			$.post('/home/signUpConfirm',{postcidade:cidade,postlogin:login,postpass:password,postname:name,postemail:email,postendereco:endereco,postpais:pais,posttelefone:telefone,postdocumento:documento},
			function(data){
				$('#cadastroBox').html(data);
                alert("Cadastro feito com sucesso!");
                window.location.reload();

			});}
	}

</script>


<div id="cadastroArea" style="margin-left:28%; margin-top:20px;padding-bottom: 20px;">
	<label style="margin-left:-25px; color:white;font-family:Century Gothic;font-size:15px"> Preencha todos os campos ! </label><br><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> Nome </label><br>
	<input style="padding-left:10px;margin-top:5px" class="cadastroInput" onFocus="lostFocus()" id="name" value=""><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> Login </label><br>
	<input style="padding-left:10px; margin-top:5px" class="cadastroInput" onFocus="lostFocusL()" id="login" value=""><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> Password </label><br>
	<input type="password" style="padding-left:10px; margin-top:5px" class="cadastroInput" onFocus="lostFocusP()" id="password" value=""><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> E-mail </label><br>
    <input style="padding-left:10px; margin-top:5px" class="cadastroInput" onFocus="lostFocusE()" id="email" value=""><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> Endereço </label><br>
	<input style="margin-left:-35px; width:225px; padding-left:10px; margin-top:5px" class="cadastroInput" onFocus="lostFocusEn()" id="endereco" value=""><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> Cidade </label><br>
	<input style="padding-left:10px; margin-top:5px" class="cadastroInput" onFocus="lostFocusC()" id="cidade" value=""><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> Pais </label><br>
	<input style="padding-left:10px; margin-top:5px" class="cadastroInput" onFocus="lostFocusP()" id="pais" value=""><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> Telefone </label><br>
	<input style="padding-left:10px; margin-top:5px" class="cadastroInput" onFocus="lostFocusT()" id="telefone" value=""><br><br>
    <label style="color:white;font-family:Century Gothic;font-size:15px"> Documento </label><br>
	<input style="padding-left:10px; margin-top:5px" class="cadastroInput" onFocus="lostFocusD()" id="documento" value=""><br><br>
	<button onClick="signUpConfirm()" style="margin-left:120px; margin-top:30px;font-size:15px" class="headerButton">Enviar</button>
    <button class="headerButton" onclick="document.getElementById('inicio').style.display='none';document.getElementById('reserva').style.marginTop='100px'">Fechar</button>
<div>