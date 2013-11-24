<?php

	/**
	 * @see http://support.simplemachines.org/function_db/index.php?action=view_function;id=514
	 * @see http://support.simplemachines.org/function_db/index.php?action=view_function;id=514
	 */
	class SimpleMachinesForumItem {
		/**
		 * Board ID
		 * @var integer
		 */
		public $board_id;
		
		/**
		 * Board Name
		 * @var string
		 */
		public $board_name;
		
		/**
		 * Board URL
		 * @var string
		 */
		public $board_href;
		
		/**
		 * Board HTML Link
		 * @var string
		 */
		public $board_link;
		
		/**
		 * URL to the item
		 * @var string
		 */
		public $href;
		
		/**
		 * HTML link to the item
		 * @var string
		 */
		public $link;
		
		/**
		 * Whether or not this is a new item
		 * @var boolean 
		 */
		public $new;
		
		/**
		 * Not used
		 * @var integer 
		 */
		public $newtime;
		
		/**
		 * User ID or 0 if they were a guest
		 * @var integer
		 */
		public $poster_id;
		
		/**
		 * Display name or the name the guest entered
		 * @var string
		 */
		public $poster_name;
		
		/**
		 * URL to the poster's profile, if applicable
		 * @var string
		 */
		public $poster_href;
		
		/**
		 * HTML link to the profile, or just the name if they're a guest
		 * @var string
		 */
		public $poster_link;
		
		/**
		 * The first 22 characters of the subject with "..." appended, or the entire subject if it's less than 26 characters long
		 * @var string
		 */
		public $short_subject;
		
		/**
		 * The subject of this item
		 * @var string
		 */
		public $subject;
		
		/**
		 * The formatted time/date string indicating when the item was made
		 * @var string
		 */
		public $time;
		
		/**
		 * The raw timestamp indicating when the item was made
		 * @var integer
		 */
		public $timestamp;
		
		/**
		 * The topic ID
		 * @var integer
		 */
		public $topic;
		
		/**
		 * Post preview text (not exactly documented in ssi.php).
		 * @var string
		 */
		public $preview;
		
		/**
		 * Construct a new instance.
		 * @param array $data (Optional) Property data.
		 */
		public function __construct($data = null){
			if($data)$this->load($data);
		}
		
		/**
		 * Load object properties from an array.
		 * @param array $data Property name/value pairs.
		 * @param string $parent Parent property part name.
		 */
		public function load($data, $parent = ''){
			foreach($data as $name=>$value){
				if(is_array($value)){
					$this->load($value, $parent.$name.'_');
				}else{
					$prop = strtolower($parent.$name);
					$this->$prop = $value;
				}
			}
		}
	}
