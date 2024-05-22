<?php
class Venta
{
    private $numeroVenta;
    private $fechaVenta;
    private $objCliente;
    private $arrayObjMoto;
    private $precioFinalVenta;

    // Método constructor
    public function __construct($numeroVenta, $fechaVenta, Cliente $objCliente, $arrayObjMoto, $precioFinalVenta)
    {
        $this->numeroVenta = $numeroVenta;
        $this->fechaVenta = $fechaVenta;
        $this->objCliente = $objCliente;
        $this->arrayObjMoto = $arrayObjMoto;
        $this->precioFinalVenta = $precioFinalVenta;
    }

    // Métodos de acceso (getters)
    public function getNumeroVenta()
    {
        return $this->numeroVenta;
    }

    public function getFechaVenta()
    {
        return $this->fechaVenta;
    }

    public function getObjCliente()
    {
        return $this->objCliente;
    }

    public function getArrayObjMoto()
    {
        return $this->arrayObjMoto;
    }

    public function getPrecioFinalVenta()
    {
        return $this->precioFinalVenta;
    }

    // Métodos de modificación (setters)
    public function setNumeroVenta($numeroVenta)
    {
        $this->numeroVenta = $numeroVenta;
    }

    public function setFechaVenta($fechaVenta)
    {
        $this->fechaVenta = $fechaVenta;
    }

    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    public function setArrayObjMoto($arrayObjMoto)
    {
        $this->arrayObjMoto = $arrayObjMoto;
    }

    public function setPrecioFinalVenta($precioFinalVenta)
    {
        $this->precioFinalVenta = $precioFinalVenta;
    }

    // Método toString
    public function __toString()
    {
        $motos = "";
        $arrayObjMoto = $this->getArrayObjMoto();
        foreach ($arrayObjMoto as $moto) {
            $infoMoto = $moto->__toString();
            $motos .= $infoMoto;
        }
        return "Número de venta: {$this->getNumeroVenta()}.\nFecha de venta: {$this->getFechaVenta()}.\nCliente: {$this->getObjCliente()}.\nMotos: {$motos}.\nPrecio final: {$this->getPrecioFinalVenta()}.\n";
    }
    //     5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    // incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    // vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    // Utilizar el método que calcula el precio de venta de la moto donde crea necesario
    public function incorporarMoto(Moto $objMoto)
    {
        $arrayObjMoto = $this->getArrayObjMoto();
        $retorno = -1;
        $nuevoPrecioVenta = 0;
        if ($objMoto->getActiva()) {
            $arrayObjMoto[] = $objMoto;
            foreach ($arrayObjMoto as $moto) {
                $nuevoPrecioVenta = $this->getPrecioFinalVenta() + $objMoto->darPrecioVenta();
                $this->setPrecioFinalVenta($nuevoPrecioVenta);
                $retorno = 1;
            }
        }
        return $retorno;
    }
    // Implementar el método retornarTotalVentaNacional() que retorna  
    // la sumatoria del precio venta de cada una de las motos Nacionales vinculadas a la venta.
    public function retornarTotalVentaNacional()
    {
        $totalVenta = -1;
        $coleccionMotosNacionales = [];
        foreach ($this->getArrayObjMoto() as $moto) {
            if ($moto instanceof MotoNacional) {
                $coleccionMotosNacionales[] = $moto;
            }
        }
        if (!empty($coleccionMotosNacionales)) {
            foreach ($coleccionMotosNacionales as $moto) {
                $totalVenta += $moto->darPrecioVenta();
            }
        }
        return $totalVenta;
    }
    public function retornarMotosImportadas()
    {
        $coleccionMotosImportadas = [];
        foreach ($this->getArrayObjMoto() as $moto) {
            if ($moto instanceof MotoImportada) {
                $coleccionMotosImportadas[] = $moto;
            }
        }
        return $coleccionMotosImportadas;
    }
}
