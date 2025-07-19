<?php

namespace exception;

use Exception;

class ValidarDatosException extends Exception {

    private array $errores;

    /**
     * @param array $errores
     */
    public function __construct(array $errores)
    {
        $this->errores = $errores;
    }

    public function getErrores(): array
    {
        return $this->errores;
    }

    public function setErrores(array $errores): void
    {
        $this->errores = $errores;
    }

}
