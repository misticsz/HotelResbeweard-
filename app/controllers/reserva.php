<?php
/**
 * Created by PhpStorm.
 * User: GabrielAguiar
 * Date: 22/05/14
 * Time: 14:41
 */ class Reserva extends Controller{

    public function index()
    {
        include_once APP_URL."header.php";
        include_once VIEW_URL."reserva.php";
        include_once APP_URL."fotter.php";
    }

    public function verifyReserva()
    {
        include_once DAO_URL."verifyReserva.php";
    }

    }