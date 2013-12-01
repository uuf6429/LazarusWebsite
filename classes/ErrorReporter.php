<?php

	class ErrorReporter {
		
		/**
		 * Enables or disables debugging.
		 * @var boolean
		 */
		public $enabled = true;
		
		/**
		 * Email address where error reports are sent to. If empty, defaults to $_SERVER['SERVER_ADMIN'].
		 * @var string
		 */
		public $emailto = 'admin@localhost';
		
		/**
		 * Array of error signatures to ignore.
		 * @var array
		 */
		public $ignore = array();

		protected $config = null;
		
		/**
		 * Construct a new instance, optionally with a Config object.
		 * @param Config $cfg (Optional) Object to read settings from.
		 */
		public function __construct(Config $cfg = null){
			$this->config = $cfg;
		}
		
		/**
		 * Send email to admins for this particular exception.
		 * @param Exception $e The error exception.
		 */
		public function report(Exception $e){
			if($this->config){
				$this->enabled = $this->config->get('error_reporter.enabled', true);
				$this->emailto = $this->config->get('error_reporter.emailto', 'admin@localhost');
				$this->ignore = $this->config->get('error_reporter.ignored', array());
			}
			if($this->is_ignored($e))return;
			$to = $this->emailto ? $this->emailto : $_SERVER['SERVER_ADMIN'];
			$from = '"Postmortem Debug Report" <noreply@'.$_SERVER['SERVER_NAME'].'>';
			$subject = 'Server Error ('.$_SERVER['SERVER_NAME'].')';
			$headers = array(
				'From: '.$from,
				'MIME-Version: 1.0',
				'Content-Type: text/html; charset=UTF-8',
			);
			ob_start();
			?><html>
				<body>
					<div>
						<h2 style="color: #A00; font-size: 16px; margin: 12px 0; padding: 8px 0; border-bottom: 1px dotted #900;">Error Debug Report</h2>
						<table><?php
							foreach(array(
								'Signature' => $this->dump($this->make_signature($e)),
								'Type' => $this->dump(get_class($e).', code '.$e->getCode()),
								'Message' => $this->dump($e->getMessage()),
								'Request' => $this->dump($_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI']),
								'POST Data' => $_POST ? $this->dump($_POST) : '<i>n/a</i>',
								'Location' => $this->dump($e->getFile().':'.$e->getLine()),
								'User Host' => $this->dump($_SERVER['REMOTE_ADDR'].' / '.(isset($_SERVER['REMOTE_HOST']) ? $_SERVER['REMOTE_HOST'] : 'n/a')),
								'User Agent' => $this->dump($_SERVER['HTTP_USER_AGENT']),
								'Context' => ($e instanceof ContextException) ? $this->dump($e->getContext()) : '<i>n/a</i>',
								'Backtrace' => $this->dump($e->getTraceAsString()),
							) as $name=>$value){
								?><tr>
									<td valign="top"><b><?php echo str_replace(' ', '&nbsp;', $name); ?>:</b></td>
									<td><?php echo str_replace('<pre>', '<pre style="margin: 0; font: 12px Consolas;">', $value); ?></td>
								</tr><?php
							}
						?></table>
					</div>
				</body>
			</html><?php
			$message = ob_get_clean();
			mail($to, $subject, $message, implode("\r\n", $headers));
		}
		
		protected function is_ignored(Exception $e){
			return in_array($this->make_signature($e), $this->ignore);
		}
		
		protected function make_signature(Exception $e){
			return md5('['.$e->getCode().']'.$e->getMessage().'@'.$e->getFile().':'.$e->getLine());
		}
		
		protected function escape($text){
			return htmlspecialchars($text, ENT_QUOTES);
		}
		
		protected function dump($value){
			switch(gettype($value)){
				case 'string':
					return '<pre>'.$this->escape($value).'</pre>';
				case 'boolean':
					return '<pre style="color: #4353cd;">'.($value ? 'true' : 'false').'</pre>';
				case 'array':
				case 'object':
					return '<pre>'.$this->escape(print_r($value, true)).'</pre>';
				case 'NULL':
					return '<pre><b>null</b></pre>';
				default:
					return '<pre>'.$this->escape(var_export($value, true)).'</pre>';
			}
		}
	}