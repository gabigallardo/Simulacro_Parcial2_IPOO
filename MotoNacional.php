<?php
class MotoNacional extends Moto
{
    private $descuentoNacional;
    public function __construct($codigoMoto, $costoMoto, $añoFabricacion, $descripcionMoto, $porcentajeIncrementoAnual, $activa, $descuentoNacional)
    {
        parent::__construct($codigoMoto, $costoMoto, $añoFabricacion, $descripcionMoto, $porcentajeIncrementoAnual, $activa);
        $this->descuentoNacional = $descuentoNacional;
    }
    public function getDescuentoNacional()
    {
        return $this->descuentoNacional;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Descuento Nacional: " . $this->getDescuentoNacional() . " %\n";
        return $cadena;
    }
    public function darPrecioVenta()
    {
        $venta = parent::darPrecioVenta();
        if ($venta > -1) {
            $venta -= ($venta * ($this->getDescuentoNacional() / 100));
        }
        return $venta;
    }
}
