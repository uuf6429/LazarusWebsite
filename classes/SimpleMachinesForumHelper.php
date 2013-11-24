<?php

	class SimpleMachinesForumHelper {
		protected $config;
		protected $an_items = array();
		protected $rp_items = array();
		
		/**
		 * Construct new instance with config.
		 * @param Config $config System configuration provider.
		 * @param boolean $preload Whether to preload SMF data or not.
		 */
		public function __construct(Config $config, $preload = false){
			$this->config = $config;
			if($preload)$this->load();
		}
		
		/**
		 * Load SMF data using info from config.
		 */
		public function load(){
			$ssi = $this->config->get('smf.ssi_path');
			$rpc = $this->config->get('smf.show_recent_posts', 5);
			$anc = $this->config->get('smf.show_announcements', 5);
			$bid = $this->config->get('smf.board_announcements', 0);
			
			if(file_exists($ssi) && @include($ssi)){
				// load stuff from ssi
				foreach(ssi_recentPosts($rpc, null, null, 'return') as $item)
					$this->rp_items[] = new SimpleMachinesForumItem($item);
				foreach(ssi_recentTopics($anc, null, $bid, 'return', true) as $item)
					$this->an_items[] = new SimpleMachinesForumItem($item);
			}else{
				// something broke, show defaults
				for($i=0; $i<$rpc; $i++)
					$this->rp_items[] = $this->generate_sample();
				for($i=0; $i<$anc; $i++)
					$this->an_items[] = $this->generate_sample();
			}
		}
		
		/**
		 * Returns a list of announcements.
		 * @return SimpleMachinesForumItem[]
		 */
		public function get_announcements(){
			return $this->an_items;
		}
		
		/**
		 * Returns a list of recent posts.
		 * @return SimpleMachinesForumItem[]
		 */
		public function get_recent_posts(){
			return $this->rp_items;
		}
			
		/**
		 * Generate some randomized data.
		 * @return SimpleMachinesForumItem
		 */
		protected function generate_sample(){
			static $id = 0; $id++;
			$timestamp = mt_rand(strtotime('30 Jan 1945'), time());
			return new SimpleMachinesForumItem(
					array(
						'board' => array(
							'id' => 0,
							'name' => '',
							'href' => '',
							'link' => '',
						),
						'href' => '',
						'link' => '',
						'new' => (boolean)mt_rand(0, 1),
						'newtime' => 0,
						'poster' => array(
							'id' => 0,
							'name' => 'Guest',
							'href' => 'Guest',
							'link' => 'Guest',
						),
						'short_subject' => rtrim($this->generate_lipsum(4, 'words', false, $id), '.').'...',
						'subject' => $this->generate_lipsum(6, 'words', false, $id),
						'time' => date('F d, Y, h:i:s A', $timestamp),
						'timestamp' => $timestamp,
						'topic' => 0,
						'preview' => rtrim($this->generate_lipsum(20, 'words', false, $id), '.').'...',
					)
				);
		}
		
		/**
		 * Generate and cache some Lipsum.
		 * @param integer $amount Number of $what to generate.
		 * @param string $what What to generate, a value from: paras, words, bytes or lists
		 * @param boolean $start Whether to start with "Lorem ipsum.." or not.
		 * @param string $seed The randomization seed.
		 * @return string Generated lipsum.
		 */
		protected function generate_lipsum($amount = 1, $what = 'paras', $start = false, $seed = '') {
			$amount = (int)$amount;
			$start = $start ? '1' : '0';
			$what = urlencode($what);
			$seed = urlencode($seed);
			$url = "http://www.lipsum.com/feed/xml?amount=$amount&what=$what&start=$start&seed=$seed";
			$fname = DEF_ABSPATH.DS.'cache'.DS.'lipsum_'.md5($url).'.xml';
			if (!file_exists($fname)) file_put_contents($fname, file_get_contents($url));
			return @simplexml_load_file($fname)->lipsum;
		}
	}
