<?php

/**
 * Note: To properly extend this class, extend the constructor, store the error
 * code in $internal_code and pass the desired HTTP code to the parent constructor.
 * @example
 *     public function __construct($message = "", $code = 0, $previous = NULL){
 *         $this->internal_code = $code;
 *         parent::__construct($message, 404, $previous);
 *     }
 */
abstract class AbstractServerException extends Exception {
	protected $internal_code = 0;
	
	public function getInternalCode(){
		return $this->internal_code;
	}
}
