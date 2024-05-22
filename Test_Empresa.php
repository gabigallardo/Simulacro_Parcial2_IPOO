<?php
include_once 'Cliente.php';
include_once 'Empresa.php';
include_once 'Moto.php';
include_once 'Venta.php';
include_once 'MotoNacional.php';
include_once 'MotoImportada.php';
$objCliente1 = new Cliente("Gabriel", "Gallardo", false, "DNI", 44120992);
$objCliente2 = new Cliente("Agustin", "Gallardo", false, "LCI", 42911832);
$objMoto1 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto2 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto3 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, 15);
$objMoto4 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);
$coleccionMotos = [$objMoto1, $objMoto2, $objMoto3, $objMoto4];
$coleccionClientes = [$objCliente1, $objCliente2];
$empresa = new Empresa("Alta Gama", "Av Argentina 123", $coleccionClientes, $coleccionMotos, []);
// Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
$resultadoVenta1 = $empresa->registrarVenta([11, 12, 13, 14], $objCliente2);
if ($resultadoVenta1 === -1) {
    echo "Ninguna moto estaba disponible para la venta o no existe\n";
} elseif ($resultadoVenta1 > 0) {
    echo "El importe final con las motos que estaban disponibles es de: " . $resultadoVenta1 . " Pesos\n";
} else {
    echo "El cliente estaba dado de baja y no pudo comprar\n";
}
// Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido
$resultadoVenta2 = $empresa->registrarVenta([13, 14], $objCliente2);
if ($resultadoVenta2 === -1) {
    echo "Ninguna moto estaba disponible para la venta o no existe\n";
} elseif ($resultadoVenta2 > 0) {
    echo "El importe final con las motos que estaban disponibles es de: " . $resultadoVenta2 . " Pesos\n";
} else {
    echo "El cliente estaba dado de baja y no pudo comprar\n";
}
// Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
$resultadoVenta3 = $empresa->registrarVenta([14, 2], $objCliente2);
if ($resultadoVenta3 === -1) {
    echo "Ninguna moto estaba disponible para la venta o no existe\n";
} elseif ($resultadoVenta3 > 0) {
    echo "El importe final con las motos que estaban disponibles es de: " . $resultadoVenta3 . " Pesos\n";
} else {
    echo "El cliente estaba dado de baja y no pudo comprar\n";
}
// Invocar al método  informarVentasImportadas().  Visualizar el resultado obtenido.
$colVentasImportadas = $empresa->informarVentasImportadas();
echo "Las ventas con alguna moto importada son: ";
foreach ($colVentasImportadas as $venta) {
    echo $venta;
}
$ventasNacionales = $empresa->informarSumaVentasNacionales();
echo "La cantidad total de ventas de motos Nacionales son: " . $ventasNacionales . "Pesos\n";
echo $empresa;
