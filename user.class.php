<?php
	/** $Id: user.class.php,v 1.2 2005/06/15 19:37:15 vadim Exp $
	* Example User class
	* start: Tue Feb 08 21:26:52 EET 2005 @851 /Internet Time/
	* @author Voituk Vadim <voituk###asg.kiev.ua>
	*/
	
	class User {
		
		/** Unicum user id */
		var $user_id;
		
		var $first_name;
		var $second_name;
		var $email;
		
		/**
		* Constructor
		*/
		function User($first_name, $second_name, $email) {
			$this->first_name = $first_name;
			$this->second_name = $second_name;
			$this->email = $email;
			
			$this->user_id = md5(uniqid(""));
		}
		
		/**
		* This method will be used by FastTemplate to access object properties
		* @param $field - Object property name
		* NOTE: this is example only, you can write your own function like this
		*/
		function get($field) {
			$arr = get_object_vars($this);
			return $arr[$field];
		}
		
		/**
		* This method will be used by FastTemplate to access object `id` property
		* NOTE: this is example only, you can write your own function like this
		*/
		function getId() {
			return $this->user_id;
		}
		
	}//End of class
?>
