<?php

class InternalServerErrorException extends ServerException {
	public function getStatus(){
		return 500;
	}
	public function getHeader(){
		return 'HTTP/1.1 500 Internal Server Error';
	}
}
