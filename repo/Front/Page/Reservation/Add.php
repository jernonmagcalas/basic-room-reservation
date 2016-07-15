<?php //-->


namespace Front\Page\Reservation;

/*
 *
 * @vendor   Custom
 * @package  Rosanna's Reservation
 * @author   April Sacil <aprilvsacil@gmail.com>
 * @standard PSR-2
 */
class Add extends \Page 
{	
	protected $title = "Add Reservation";
	protected $class = "create-room";
	protected $template = "/reservation/add.phtml";
	public function getVariables()
	{	
		if(!isset($_SESSION['me'])) {
			control()->redirect('/login');
		}

		if(!empty($_POST)) {
			$errors = $this->validate($_POST);

			if(empty($errors)) {
				$this->process($_POST);
			}
		}

		return array();
	}

	public function validate($data)
	{	
		$errors = array();

		// checkin date should be from today onwards
		if($data['room_checkin'] < date('Y-m-d')) {
			$errors['room_checkin'] = 'Check-in date invalid.';
		}

		//checkout date should be ahead of checkin date
		if($data['room_checkin'] > $data['room_checkout']) {
			$errors['room_checkout'] = 'Check-out date invalid.';
		}

		//pull room details
		$room = control()->database()
			->search('room')
			->filterByRoomId($data['room_id'])
			->setColumns('room_max')
			->getRow();

		// check if room is overpopulated
		if($data['room_pax'] > $room['room_max']) {
			$errors['room_pax'] = 'Room is over populated.';
		}

		//TODO:
		// check if room is not yet reserved in those days

		return $errors;
	}

	public function process($data)
	{	
		// compute days
		$days = strtotime($data['room_checkout']) - strtotime($data['room_checkin']);
		$days = floor($days/(60*60*24));

		//pull room details
		$room = control()->database()
			->search('room')
			->filterByRoomId($data['room_id'])
			->getRow();

		$pax = 0;
		if($room['room_min'] < $data['room_pax']) {
			$pax = $data['room_pax'] - $room['room_min'];
			$pax = $room['room_additional'] * $pax;
		}

		$price =  $room['room_price_high'];
		if(substr($data['room_checkin'], 5) >= 6 && substr($data['room_checkin'], 5) <= 10) {
			$price =  $room['room_price_low'];
		}

		$total = ($price + $pax) * $days;

		// $total
		$reservation = array(
			'reservation_name' => $data['guest'],
			'reservation_start' => $data['room_checkin'],
			'reservation_end' => $data['room_checkout'],
			'reservation_pax' => $data['room_pax'],
			'reservation_discount' => $data['discount'],
			'reservation_type' => $data['reservation_type'],
			'reservation_subtotal' => $total,
			'reservation_total' => $total - $data['discount'],
			'reservation_created' => date('Y-m-d H:i:s'),
			'reservation_updated' => date('Y-m-d H:i:s')
		);

		// add the reservation
		$reservation = control()->database()
			->insertRow('reservation', $reservation)
			->getLastInsertedId();

		$admin = array(
			'reservation' => $reservation,
			'admin' => $_SESSION['me']['admin_id']
		);

		// log who reserved
		$admin = control()->database()
			->insertRow('reservation_admin', $admin);

		// log what room is reserved
		$room = array(
			'reservation' => $reservation,
			'room' => $data['room_id']
		);

		// log who reserved
		$room = control()->database()
			->insertRow('reservation_room', $room);

		return;
	}

	protected function calculate($data)
	{

	}
}