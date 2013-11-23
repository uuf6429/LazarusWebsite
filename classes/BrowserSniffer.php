<?php

	/**
	 * I'm not a fan of browser sniffing, especially in this way.
	 * But there's no easy/clean solution, so here goes...
	 */
	class BrowserSniffer {
		public function get_useragent(){
			return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
		}

		public function is_64bit(){
			static $tokens = array(
				'WOW64', 'Win64', 'x86_64', 'x86-64', 'x64;', 'amd64',
				'x64_64', 'ia64', 'sparc64', 'ppc64', 'IRIX64'
			);
			foreach($tokens as $token)
				if(stripos($this->get_useragent(), $token) !== false)
					return true;
			return false;
		}

		public function get_ostype(){
			static $tokens = array(
				'darwin' => 'Mac OS X',
				'win' => 'Windows',
				'ppc mac' => 'Mac OS X PowerPC',
				'mac' => 'Mac OS X',
				'x11' => 'Unix',
				'linux' => 'Linux',
			);
			foreach($tokens as $token => $type)
				if(stripos($this->get_useragent(), $token) !== false)
					return $type;
			return false;
		}

		public function has_alternative(){
			return stripos($this->get_useragent(), 'Debian') !== false;
		}

		public function get_fullstring(){
			$os = $this->get_ostype();
			$bits = $this->is_64bit() ? ' 64 Bits' : ' 32 Bits';
			if($os == 'Mac OS X PowerPC')$bits = '';
			return $os ? ($os.$bits) : 'Unknown OS';
		}

		public function get_linkpath(){
			// TODO
		}
	}
