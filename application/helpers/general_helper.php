<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Email Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/email_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Validate email address
 *
 * @access	public
 * @return	bool
 */
 
 
if ( ! function_exists('setActive'))
{
	function setActive($menuItem="")
	{
		if($menuItem=="")return "";
		$CI =& get_instance();
		 $selectedMenu=$CI->session->userdata('selectedMenu');
		 
		if($selectedMenu==$menuItem){
			return "active";
			
		}else{
			return "";
		}
	}
}
 

if ( ! function_exists('flash_message'))
{
	function flash_message()
	{
		$CI =& get_instance();
		$message=$CI->session->userdata('error_message');
		$CI->session->set_userdata('error_message','');
		//$format_error='<div class="alert-message success"><a class="close" href="#">×</a>';
		$format_error=$message;

		return $format_error;
	}
}
if ( ! function_exists('set_flash_message'))
{
	function set_flash_message($message,$message_type='success')
	{
		$CI =& get_instance();
		$message=$CI->session->set_userdata('error_message',"<div class='alert alert-$message_type'><a href='#' data-dismiss='alert' class='close'>×</a><strong>$message</div>");
	}
}


if ( ! function_exists('current_datetime'))
{
	function current_datetime($time=false)
	{
		if($time==true){
			return date("Y-m-d H:i:s");
		}else{
			return date("Y-m-d");
		}
		
	}
}

if ( ! function_exists('dateFormat'))
{
	function dateFormat($date){
		return date('M d, Y', strtotime($date));
	}
}

/* Method : requireFieldDisplayError
*  Parameter : fieldName
*  Task : Show in a error message according the field name
*/
if ( ! function_exists('requireFieldDisplayError'))
{
	function requireFieldDisplayError($fieldName){
		return form_error($fieldName, " <span> <div class='span3'><div class='alert alert-error'><a href='#' data-dismiss='alert' class='close'>×</a><strong>","</div></div></span>");
	}
}


/* Method : encodeId
*  Parameter : ciperText
*  Task : encoding the given ciper text
*/
if ( ! function_exists('encodeId'))
{
	function encodeId($ciperText){
		$CI =& get_instance();
 		$encryptedCode=$CI->encrypt->encode($ciperText);
		$encryptedCode=str_replace("/", ":", $encryptedCode);
		return ($encryptedCode);
		
	}
}


/* Method : decodeId
*  Parameter : ciperText
*  Task : decoding the given encodedText
*/
if ( ! function_exists('decodeId'))
{
	function decodeId($encodedText){
		$CI =& get_instance();
		$encodedText=str_replace(":", "/", $encodedText);
		$decodedCode=$CI->encrypt->decode($encodedText);

		return ($decodedCode);

	}
}
 
//Post back search parameters Check isset or all
if ( ! function_exists('IsAdmin'))
{
	function IsAdmin(){
		$CI =& get_instance();
		$is_admin=$CI->session->userdata('is_admin');
		if($is_admin==1){
			return true;
		}else{
			return false;
		}

		
	}
}
//Post back search parameters Check isset or all
if ( ! function_exists('ImagePath'))
{
	function ImagePath($ImageType=null){
		if($ImageType==null){
			return base_url().IMAGES_PATH;
		}else if($ImageType=='slider'){
			return base_url().SLIDER_IMAGES_PATH;
		}
	}
}
//Generate Image Helper

// return the whirlpoolroadshow.com Email Configuration Variables

if ( ! function_exists('email_configuration'))
{
	function email_configuration(){	
		$config = array('protocol' => 'mail',						
						'mailtype' => 'html',
						'charset' => 'ISO-8859-15',
						'wordwrap' => TRUE);
	return $config;
	}
}

/*
	* Method Name : getImageResizePath
	* Parameter : src, width and height
	* Task : Loading View for get image resize path according to image source, width and height
	*/
	if ( ! function_exists('getImageResizePath')){
		function getImageResizePath($src=null,$width=null,$height=null,$align='c'){
			if($src==null) return false;	
			$CI =& get_instance();				
			//$path = base_url().'private/timThumb/resizeImage.php?src='.$src.'&w='.$width.'&h='.$height.'&q=100&a='.$align;
			$path = base_url().'timthumb/resizeimage.php?src='.$src.'&w='.$width.'&h='.$height.'&q=100&a='.$align;
			return $path;
		}
	}