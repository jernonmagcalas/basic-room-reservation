<?php //-->


namespace Front\Page\Room;

/*
 *
 * @vendor   Custom
 * @package  Rosanna's Reservation
 * @author   April Sacil <aprilvsacil@gmail.com>
 * @standard PSR-2
 */	
class Create extends \Page 
{	
	protected $title = "Create Room";
	protected $class = "create-room";
	protected $template = "/room/create.phtml";

	public function getVariables()
	{	
		if(!isset($_SESSION['me'])) {
			control()->redirect('/login');
		}

		// if there we're post sent, process
		if (!empty($_POST)) {
			// validate
			$errors = $this->validate($_POST);

			// if no errors
			if (empty($errors)) {
				// process now
				return $this->process();
			}
		}

		return array(
			'data' => $_POST,
			'errors' => isset($errors) ? $errors : array()
		);
	}

	/**
     * The real process
     *
     * @return void | array
     */
	protected function process()
	{
		$data = $_POST;

		// add created and updated
		$data['room_created'] = date('Y-m-d H:i:s');
		$data['room_updated'] = date('Y-m-d H:i:s');

		// insert
		control()->database()->insertRow('room', $data);
		// redirect
		control()->redirect('/rooms');
	}

	/**
     * Validates Data sent to post
     *
     * @param *array
     * @return array
     */
	protected function validate($data)
	{	
		$errors = array();
		if (empty($data)) {
			$errors['invalid'] = 'No data submitted.';
			return $errors; 
		}

		if (!isset($data['room_name']) || empty($data['room_name'])) {
			$errors['room_name'] = 'Room name/identity is required.';	
		}

		if (!isset($data['room_type']) || empty($data['room_type'])) {
			$errors['room_type'] = 'Room type is required.';	
		}

		if (!isset($data['room_price_low']) || empty($data['room_price_low'])) {
			$errors['room_price_low'] = 'Room price for off season is required.';	
		}

		if (!isset($data['room_price_high']) || empty($data['room_price_high'])) {
			$errors['room_price_high'] = 'Room price for peak season is required.';	
		}

		if (!isset($data['room_min']) || empty($data['room_min'])) {
			$errors['room_min'] = 'Charged Pax is required.';	
		}

		if (!isset($data['room_max']) || empty($data['room_max'])) {
			$errors['room_max'] = 'Max Pax is required.';	
		}

		if (!isset($data['room_additional']) || empty($data['room_additional'])) {
			$errors['room_additional'] = 'Price per additional pax is required.';	
		}

		return $errors;
	}
}