<?php //-->

namespace Front\Page;

/*
 *
 * @vendor   Custom
 * @package  Rosanna's Reservation
 * @author   April Sacil <aprilvsacil@gmail.com>
 * @standard PSR-2
 */
class Rooms extends \Page 
{	
	protected $title = "Home";
	protected $class = "home";
	protected $template = "/room/search.phtml";

	public function getVariables()
	{	
		$rooms = $this->process();
		if(!isset($_SESSION['me'])) {
			control()->redirect('/login');
		}
		
		return array(
			'rooms' => $rooms
		);
	}

	protected function process()
	{	
		$filters = $_GET;
		$rooms = control()->database()
			->search('room');

		//filter by room id
		if(isset($filters['room_id']) 
			/*&& is_int($filters['room_id'])*/) {
			$rooms->filterByRoomId($filters['room_id']);
		}

		// if filtered by room type
		if(isset($filters['room_type'])) {
			if(!is_array($filters['room_type'])) {
				$filters['room_type'] = array($filters['room_type']);
			}

			$rooms->addFilter('room_type IN ("' . implode('","', $filters['room_type']) . '")');
		}

		$rooms = $rooms->getRows();

		// fix proper room type
		foreach ($rooms as $key => $room) {
			switch ($room['room_type']) {
				case 'beach-double':
					$rooms[$key]['room_type'] = 'Beach Front Double Room';
					break;

				case 'beach-family':
					$rooms[$key]['room_type'] = 'Beach Front Family Room';
					break;

				case 'nonbeach-double':
					$rooms[$key]['room_type'] = 'Beach Front Double Room';
					break;

				case 'nonbeach-family':
					$rooms[$key]['room_type'] = 'Beach Front Family Room';
					break;
				
				default:
					unset($rooms[$key]);
					break;
			}
		}

		// if its requested as json format
		if(isset($filters['restype']) && $filters['restype'] == 'json') {
			die(json_encode($rooms));
		}

		return $rooms;
	}
}