<?php

abstract class ServerException extends Exception {
	public abstract function getStatus();
	public abstract function getHeader();
}
