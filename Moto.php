<?php
class Moto
{
    private $codigoMoto;
    private $costoMoto;
    private $añoFabricacion;
    private $descripcionMoto;
    private $porcentajeIncrementoAnual;
    private $activa;

    // Método constructor
    public function __construct($codigoMoto, $costoMoto, $añoFabricacion, $descripcionMoto, $porcentajeIncrementoAnual, $activa)
    {
        $this->codigoMoto = $codigoMoto;
        $this->costoMoto = $costoMoto;
        $this->añoFabricacion = $añoFabricacion;
        $this->descripcionMoto = $descripcionMoto;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    // Métodos de acceso (getters)
    public function getCodigoMoto()
    {
        return $this->codigoMoto;
    }

    public function getCostoMoto()
    {
        return $this->costoMoto;
    }

    public function getAñoFabricacion()
    {
        return $this->añoFabricacion;
    }

    public function getDescripcionMoto()
    {
        return $this->descripcionMoto;
    }

    public function getPorcentajeIncrementoAnual()
    {
        return $this->porcentajeIncrementoAnual;
    }

    public function getActiva()
    {
        return $this->activa;
    }

    // Métodos de modificacion (setters)
    public function setCodigoMoto($codigoMoto)
    {
        $this->codigoMoto = $codigoMoto;
    }

    public function setCostoMoto($costoMoto)
    {
        $this->costoMoto = $costoMoto;
    }

    public function setAñoFabricacion($añoFabricacion)
    {
        $this->añoFabricacion = $añoFabricacion;
    }

    public function setDescripcionMoto($descripcionMoto)
    {
        $this->descripcionMoto = $descripcionMoto;
    }

    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual)
    {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }

    public function setActiva($activa)
    {
        $this->activa = $activa;
    }

    // Método toString
    public function __toString()
    {
        $estado = $this->getActiva() ? "Disponible" : "No disponible";
        return "Codigo: {$this->getCodigoMoto()}.\nCosto: {$this->getCostoMoto()}.\nAño de fabricación: {$this->getAñoFabricacion()}.\nDescripción: {$this->getDescripcionMoto()}.\nPorcentaje de incremento anual: {$this->getPorcentajeIncrementoAnual()}%.\nEstado: {$estado}.\n";
    }
    // 5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
    // Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
    // la venta, el método realiza el siguiente cálculo:
    // $_venta = $_compra + $_compra * (anio * por_inc_anual)
    // donde $_compra: es el costo de la moto.
    // anio: cantidad de años transcurridos desde que se fabricó la moto.
    // por_inc_anual: porcentaje de incremento anual de la moto.
    public function darPrecioVenta()
    {
        $venta = -1;
        if ($this->getActiva()) {
            $compra = $this->getCostoMoto();
            $anio = 2024 - $this->getAñoFabricacion();
            $por_inc_anual = $this->getPorcentajeIncrementoAnual();
            $venta = $compra + $compra * ($anio * $por_inc_anual);
        }
        return $venta;
    }
}
