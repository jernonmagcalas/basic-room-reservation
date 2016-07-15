<?php //-->

namespace Front\Page;

/*
 *
 * @vendor   Custom
 * @package  Rosanna's Reservation
 * @author   April Sacil <aprilvsacil@gmail.com>
 * @standard PSR-2
 */
class Index extends \Page 
{	
	protected $title = "Home";
	protected $class = "home";
	protected $template = "/index.phtml";

	public function getVariables()
	{	
		if(!isset($_SESSION['me'])) {
			control()->redirect('/login');
		}
		
		return array();
	}
}