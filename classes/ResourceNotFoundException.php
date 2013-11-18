<?php

class ResourceNotFoundException extends ServerException {
	public function getStatus(){
		return 404;
	}
	public function getHeader(){
		return 'HTTP/1.0 404 Not Found';
	}
}