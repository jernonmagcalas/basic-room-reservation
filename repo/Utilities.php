<?php //-->

class Utilities extends \Page 
{
	/* Constants
	-------------------------------*/
	/* Protected Properties
	-------------------------------*/
	/* Public Methods
	-------------------------------*/
	public function notify ($user, $message) {
		$settings = array(
			'notification_user' => $user,
			'notification_detail' => $message,
			'notification_created' => date('Y-m-d H:i:s')
		);

		return control()->database()->insertRow('notification', $settings);
	}

	/* Protected Methods
	-------------------------------*/
}
