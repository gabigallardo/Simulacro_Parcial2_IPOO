<?php
class MotoImportada extends Moto
{
    private $paisOrigen;
    private $impuestosImportacion;
    public function __construct($codigoMoto, $costoMoto, $añoFabricacion, $descripcionMoto, $porcentajeIncrementoAnual, $activa, $paisOrigen, $impuestosImportacion)
    {
        parent::__construct($codigoMoto, $costoMoto, $añoFabricacion, $descripcionMoto, $porcentajeIncrementoAnual, $activa);
        $this->paisOrigen = $paisOrigen;
        $this->impuestosImportacion = $impuestosImportacion;
    }
    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }
    public function getImpuestosImportacion()
    {
        return $this->impuestosImportacion;
    }
    public function setPaisOrigen($nuevoPais)
    {
        $this->paisOrigen = $nuevoPais;
    }
    public function setImpuestosImportacion($impuestos)
    {
        $this->impuestosImportacion = $impuestos;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Pais de origen: " . $this->getPaisOrigen() . "\n";
        $cadena .= "Impuestos de importacion: " . $this->getImpuestosImportacion() .  "\n";
        return $cadena;
    }
    public function darPrecioVenta()
    {
        $venta = parent::darPrecioVenta();
        if ($venta > -1) {
            $venta += $this->getImpuestosImportacion();
        }
        return $venta;
    }
}
