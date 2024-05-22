<?php
class Cliente
{
    private $nombreCliente;
    private $apellidoCliente;
    private $dadoDeBaja;
    private $tipoDocumentoCliente;
    private $numeroDocumentoCliente;

    // Método constructor
    public function __construct($nombreCliente, $apellidoCliente, $dadoDeBaja, $tipoDocumentoCliente, $numeroDocumentoCliente)
    {
        $this->nombreCliente = $nombreCliente;
        $this->apellidoCliente = $apellidoCliente;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDocumentoCliente = $tipoDocumentoCliente;
        $this->numeroDocumentoCliente = $numeroDocumentoCliente;
    }

    // Métodos de acceso (getters)
    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    public function getApellidoCliente()
    {
        return $this->apellidoCliente;
    }

    public function getDadoDeBaja()
    {
        return $this->dadoDeBaja;
    }

    public function getTipoDocumentoCliente()
    {
        return $this->tipoDocumentoCliente;
    }

    public function getNumeroDocumentoCliente()
    {
        return $this->numeroDocumentoCliente;
    }

    // Métodos de modificación (setters)
    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    public function setApellidoCliente($apellidoCliente)
    {
        $this->apellidoCliente = $apellidoCliente;
    }

    public function setDadoDeBaja($dadoDeBaja)
    {
        $this->dadoDeBaja = $dadoDeBaja;
    }

    public function setTipoDocumentoCliente($tipoDocumentoCliente)
    {
        $this->tipoDocumentoCliente = $tipoDocumentoCliente;
    }

    public function setNumeroDocumentoCliente($numeroDocumentoCliente)
    {
        $this->numeroDocumentoCliente = $numeroDocumentoCliente;
    }

    // Método toString
    public function __toString()
    {
        $estado = $this->getDadoDeBaja() ? "Dado de baja" : "Activo";
        return "Nombre: {$this->getNombreCliente()}, Apellido: {$this->getApellidoCliente()}.\nEstado: {$estado}.\nTipo de documento: {$this->getTipoDocumentoCliente()}, Número de documento: {$this->getNumeroDocumentoCliente()}.\n";
    }
}
