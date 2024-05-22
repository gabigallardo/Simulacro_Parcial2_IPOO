<?php
include_once 'Venta.php';
class Empresa
{
    private $denominacionEmpresa;
    private $direccionEmpresa;
    private $arrayObjClientes;
    private $arrayObjMotos;
    private $arrayObjVentas;

    // Método constructor
    public function __construct($denominacionEmpresa, $direccionEmpresa, $arrayObjClientes, $arrayObjMotos, $arrayObjVentas)
    {
        $this->denominacionEmpresa = $denominacionEmpresa;
        $this->direccionEmpresa = $direccionEmpresa;
        $this->arrayObjClientes = $arrayObjClientes;
        $this->arrayObjMotos = $arrayObjMotos;
        $this->arrayObjVentas = $arrayObjVentas;
    }

    // Métodos de acceso (getters)
    public function getDenominacionEmpresa()
    {
        return $this->denominacionEmpresa;
    }

    public function getDireccionEmpresa()
    {
        return $this->direccionEmpresa;
    }

    public function getArrayObjClientes()
    {
        return $this->arrayObjClientes;
    }

    public function getArrayObjMotos()
    {
        return $this->arrayObjMotos;
    }

    public function getArrayObjVentas()
    {
        return $this->arrayObjVentas;
    }

    // Método toString
    public function __toString()
    {
        $infoMotos = "";
        $arrayObjMotos = $this->getArrayObjMotos();
        foreach ($arrayObjMotos as $moto) {
            $infoMoto = $moto->__toString();
            $infoMotos .= $infoMoto;
        }
        $infoVentas = "";
        $arrayObjVentas = $this->getArrayObjVentas();
        foreach ($arrayObjVentas as $venta) {
            $infoVenta = $venta->__toString();
            $infoVentas .= $infoVenta;
        }
        $infoClientes = "";
        $arrayObjClientes = $this->getArrayObjClientes();
        foreach ($arrayObjClientes as $cliente) {
            $infoCliente = $cliente->__toString();
            $infoClientes .= $infoCliente;
        }
        return "Denominación: {$this->getDenominacionEmpresa()}.\nDirección: {$this->getDireccionEmpresa()}.\nClientes: {$infoClientes}.\nMotos: {$infoMotos}.\nVentas: {$infoVentas}.\n";
    }
    public function retornarMoto($codigoMoto)
    {
        $i = 0;
        $cantidadMotos = count($this->arrayObjMotos);
        $bandera = true;
        $retorno = null;
        while ($i < $cantidadMotos && $bandera) {
            $moto = $this->getArrayObjMotos()[$i];
            if ($moto->getCodigoMoto() === $codigoMoto) {
                $retorno = $moto;
                $bandera = false;
            }
            $i++;
        }
        // Si no se encuentra ninguna moto con el código dado, retornar null
        return $retorno;
    }
    //     6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    // parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    // se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    // Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    // para registrar una venta en un momento determinado.
    // El método 
    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $importeFinal = -1;
        $motosVendidas = [];
        //Verificamos que el cliente no este dado de baja
        if (!$objCliente->getDadoDeBaja()) {
            // Recorremos la colección de códigos de moto
            foreach ($colCodigosMoto as $codigoMoto) {
                // Buscamos la moto correspondiente al código
                $moto = $this->retornarMoto($codigoMoto);
                // Verificamos si la moto fue encontrada y está disponible para la venta
                if ($moto && $moto->getActiva()) {
                    // Agregamos la moto a la colección de motos vendidas
                    $motosVendidas[] = $moto;
                    // Incrementamos el importe final de la venta
                    $importeFinal += $moto->darPrecioVenta();
                }
            }
            if ($importeFinal > 0) {
                $numVenta = count($this->getArrayObjVentas()) + 1;
                $fechaVenta = date('d/m/Y');
                $nuevaVenta = new Venta($numVenta, $fechaVenta, $objCliente, $motosVendidas, $importeFinal);
                $this->arrayObjVentas[] = $nuevaVenta;
            }
        } else {
            $importeFinal = -2;
        }
        return $importeFinal;
    }
    //     7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    // número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente
    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $ventasCliente = [];

        // Recorre la colección de ventas
        foreach ($this->getArrayObjVentas() as $venta) {
            // Obtiene el cliente asociado a la venta
            $clienteVenta = $venta->getObjCliente();

            // Verifica si el tipo y número de documento coinciden con los del cliente de la venta
            if ($clienteVenta->getTipoDocumentoCliente() == $tipo && $clienteVenta->getNumeroDocumentoCliente() == $numDoc) {
                // Agrega la venta a la colección de ventas del cliente
                $ventasCliente[] = $venta;
            }
        }

        return $ventasCliente;
    }
    // implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por
    //  la empresa y retorna el importe total de ventas Nacionales realizadas por la empresa.
    public function informarSumaVentasNacionales()
    {
        $totalVenta = 0;
        foreach ($this->getArrayObjVentas() as $venta) {
            $totalVenta += $venta->retornarTotalVentaNacional();
        }
        return $totalVenta;
    }
    public function informarVentasImportadas()
    {
        $colVentasImportadas = [];
        foreach ($this->getArrayObjVentas() as $venta) {
            if (!empty($venta->retornarMotosImportadas())) {
                $colVentasImportadas[] = $venta;
            }
        }
        return $colVentasImportadas;
    }
}
