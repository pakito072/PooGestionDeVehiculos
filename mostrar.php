<?php
require ("index.php");

$coche = (new Coche("Tesla", "Model5", 4, "azul"));
$moto = new Moto("Yamaha", "MT-07", 15000, "verde");
$camion = new Camion("Mercedes", "Actros", 50.5, "rojo");

$concesionario = new Concesionario();
$concesionario->mostrarVehiculo($coche);
$concesionario->mostrarVehiculo($moto);
$concesionario->mostrarVehiculo($camion);
