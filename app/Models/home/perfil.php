

<?php
/**
 * Created by PhpStorm.
 * User: GabrielAguiar
 * Date: 20/05/14
 * Time: 06:43
 */
    session_start();

    $info = new Hospede();

    $info->getDataFromDBWithHosLog($_SESSION['username']);

    echo "<br><label style='margin-top:10px; margin-left:5%; color: white;font-family:Century Gothic;font-size:15px'>Nome : ".$info->nome."<br><br>
    &nbsp&nbsp&nbsp&nbspE-mail : ".$info->email;







?>
<button style="background: none; border: none; font-family:Century Gothic;font-size:15px;margin: 0;outline: none;outline-offset: 0;color:white;
	cursor:pointer;
	margin-top:22px;margin-left:3%;" >Minhas Reservas</button><br>
<button style="background: none; border: none; font-family:Century Gothic;font-size:15px;margin: 0;outline: none;outline-offset: 0;color:white;
	cursor:pointer;margin-top:22px;margin-left:3%;" >Editar Perfil</button>
<button style="background: none; border: none; font-family:Century Gothic;font-size:15px;margin: 0;outline: none;outline-offset: 0;color:white;
	cursor:pointer;margin-top:40px;margin-left:255px;" onClick="document.getElementById('perfilArea').style.display='none'">Fechar</button>