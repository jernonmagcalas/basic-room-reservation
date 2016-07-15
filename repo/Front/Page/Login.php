<?php //-->

namespace Front\Page;

/*
 *
 * @vendor   Custom
 * @package  Rosanna's Reservation
 * @author   April Sacil <aprilvsacil@gmail.com>
 * @standard PSR-2
 */
class Login extends \Page 
{	
	protected $title = "Login";
	protected $class = "login";
	protected $template = "/login.phtml";

	public function getVariables()
	{	
		// if there is a session, redirect
		if (isset($_SESSION['me'])) {
			control()->redirect('/');
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

		// pull user
		$user = control()->database()
			->search('admin')
			->filterByAdminUser($data['username'])
			->getRow();

		// save session
		$_SESSION['me'] = $user;
		// redirect to dashboard
		control()->redirect('/');
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

		if (!isset($data['username'])) {
			$errors['username'] = 'Username is required.';	
		}

		if (!isset($data['password'])) {
			$errors['password'] = 'Password is required.';	
		}

		// pull user
		$user = control()->database()
			->search('admin')
			->filterByAdminUser($data['username'])
			->getRow();

		// if no user
		if (!$user) {
			// return error, no user
			$errors['username'] = 'either username and password is incorrect.';
			$errors['password'] = 'either username and password is incorrect.';
		}

		// if password didn't match
		if (md5($data['password']) !== $user['admin_password']) {
			// return error, no user
			$errors['username'] = 'either username and password is incorrect.';
			$errors['password'] = 'either username and password is incorrect.';
		} 

		return $errors;
	}
}