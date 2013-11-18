<?php

/**
 * Error Exception with Variable Context.
 */
class ContextErrorException extends ErrorException
{
    private $context = array();

    public function __construct($message, $code, $severity, $filename = 'unknown', $lineno = 0, $context = array())
    {
        parent::__construct($message, $code, $severity, $filename, $lineno);
        $this->context = $context;
    }

    /**
     * @return array Array of variables that existed when the exception occurred
     */
    public function getContext()
    {
        return $this->context;
    }
}