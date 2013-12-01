<?php

class AccessForbiddenException extends AbstractServerException {
	public function __construct($message = "", $code = 0, $previous = NULL){
		$this->internal_code = $code;
		parent::__construct($message, 403, $previous);
	}
}