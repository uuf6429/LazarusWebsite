<?php

	/**
	 * Error Exception with Variable Context.
	 */
	class ContextErrorException extends ErrorException{
		private $context = array();

		/**
		 * Constructs a new exception instance.
		 * @param string $message Contains the error message.
		 * @param integer $code Contains the type of error caused.
		 * @param integer $severity Contains the level of the error raised.
		 * @param string $filename (Optional) Contains the filename that the error was raised in.
		 * @param integer $lineno (Optional) Contains the line number the error was raised at.
		 * @param array $context (Optional) Contains an array of every variable that existed in the scope the error was triggered in.
		 */
		public function __construct($message, $code, $severity, $filename = 'unknown', $lineno = 0, $context = array()){
			parent::__construct($message, $code, $severity, $filename, $lineno);
			$this->context = $context;
		}

		/**
		 * @return array Array of variables that existed when the exception occurred
		 */
		public function getContext(){
			return $this->context;
		}
	}