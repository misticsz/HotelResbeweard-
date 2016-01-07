<?php

	class Home extends Controller{

		public function index()
		{
			include_once APP_URL."header.php";
			include_once VIEW_URL."home.php";
			include_once APP_URL."fotter.php";
		}
		public function loadGrid()
		{
			include_once MOD_URL."/home/news.php";
			
		}
		public function signUp()
		{
			include_once MOD_URL."/home/cadastro.php";
		}
		public function signUpConfirm()
		{
			include_once DAO_URL."confirmCadastro.php";
		}
		public function verifyLogin()
		{
			include_once DAO_URL."verifyLogin.php";
		}
		public function logOut()
		{
			include_once DAO_URL."logout.php";
		}
        public function perfil()
        {
            include_once MOD_URL."/home/perfil.php";
        }
        public function quickReserva()
        {
            include_once MOD_URL."/home/quickReserva.php";
        }
    }

	
?>