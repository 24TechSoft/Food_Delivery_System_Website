<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 class admin_config_validation{
 	public function __construct()
	{

		$this->CI =& get_instance();
		$this->CI->load->helper('file');
		$this->json = null;

	}

	// --------------------------------------------------------------------
	public function _get_logged_in_user_id()
	{

		$logged = $this->CI->session->userdata('adminID');

		return $logged;
	}

	public function loadJson() {

		$this->json = json_decode(read_file(config_item('access_json_path')."json_".$this->get_admin_role_code().".json"),true);
	}

	public function getJsonData($keyName)
	{
		if($this->json == null)
			$this->loadJson();
		return $this->json[$keyName];
	}

	public function _is_logged_in(){
		$logged = $this->CI->session->userdata('adminID');
		return ($logged) ? TRUE : FALSE;
	}
	// --------------------------------------------------------------------
	public function _logout(){
		$logged = $this->CI->session->sess_destroy();
	}
	// --------------------------------------------------------------------


	// get User Main Menu
	public function get_main_menu()
	{
		return $moduleAccess = $this->getJsonData('moduleAccess');//taking moduleAccess from session
		print_r($moduleAccess);exit();
	}

	public function getFieldAccess($controller, $fieldName)
	{
		$CI =& get_instance();
		$this->CI->load->library('session');

		$fieldAccess = $this->getJsonData('fieldAccess');//taking fieldAccess from json
		if(array_key_exists($controller, $fieldAccess) && array_key_exists($fieldName, $fieldAccess[$controller])) {
			$permission = $fieldAccess[$controller][$fieldName];
			return ($permission['_W'] == 1) ? "_W" : ( ($permission['_R'] == 1) ? '_R': '_N');
		}
		else
		{
			return '_N';
		}
	}

	public function getAccessPermissionByController($controller) {
		$moduleAccessArr = $this->getJsonData('moduleAccess');//taking moduleAccess from session
		foreach ($moduleAccessArr as $moduleAccessChildArr) {
			foreach ($moduleAccessChildArr as $module) {

				if( $module['_NAME'] == $controller)
				{
					return ($module['_W'] == 1) ? "_W" : ( ($module['_R'] == 1) ? '_R': '_N');
				}
			}
		}
		return '_N';
	}

	//------------------Added by ME------------------------------------------------------

	//Getting the ADMIN USER Details

	public function get_admin_user_name()
	{

		$adminName = $this->CI->session->userdata('adminName');

		return $adminName;
	}

	public function get_admin_role_code()
	{

		return $this->CI->session->userdata('adminRoleCode');
	}

	public function adminRedirect()
	{
		$adminRole = $this->get_admin_role_code();

		switch ($adminRole) {
			case 'S_ADM':
				redirect('manage_party');
				break;
			case 'ADM':
				//redirect('manage_users');
			    redirect('manage_party');
			
				break;
			case 'SM':
				redirect('manage_party');
				break;
			case 'COM':
			case 'CS':
				redirect('manage_party');
				break;
			default:
				redirect('manage_party');
				break;
		}

	}


	public function getAdminRole()
	{

		return $this->CI->session->userdata('adminRoleDesc');
	}

	public function getAdminEmail()
	{
		return $this->CI->session->userdata('adminEmail');
	}




 }
 // END Application Configuration Validation Class

/* End of file st_config_validation.php */
/* Location: ./application/libraries/st_config_validation.php */



