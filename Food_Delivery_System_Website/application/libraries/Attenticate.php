<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 class attenticate {
 	/**
	 * Constructor
	 */

 	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('session');
		$this->ci->load->helper('security');
		$this->ci->load->helper('date');
		$this->ci->load->helper('file');

	}


	function check_login($user_email, $password){

		$password = do_hash($password, 'md5'); // MD5 Hashing

 		$loginDetails = $this->ci->custom_model->sp_admin_login($user_email, $password);
 		
 		if ($loginDetails[0][0]['result'] == "success"){
			 	$admin = $loginDetails[1][0];
			 	$adminID = $admin["_ID"];
				$adminName = $admin['_NAME'];
				$adminRole = $admin['_ROLEID'];
				$adminRoleCode = $admin['_ROLECODE'];
				$adminRoleDesc = $admin['_ROLE'];

				$session_data = array(
															'adminID' => $adminID,
															'adminName' => $adminName,
															'adminRole' => $adminRole,
															'adminRoleCode' => $adminRoleCode,
															'adminRoleDesc' => $adminRoleDesc,
															'adminEmail' => $user_email
															);
				$this->ci->session->set_userdata($session_data);

				$moduleAccess = array();

				foreach ($loginDetails[2] as $value) {
					if($value['_PARENTNAME'] == '')
					{
						$moduleAccess[][0] = $value;
					}
					else 
					{
						$moduleAccess[$value['_PARENTNAME']][$value['_ORDER']] = $value;
					}
				}

				$fieldAccess = array();
				foreach ($loginDetails[3] as $value) {
					$fieldAccess[$value['_MN']][$value['_FM']] = array('_R' => $value['_R'], '_W' => $value['_W']);
				}

				write_file(config_item('access_json_path')."json_".$adminRoleCode.".json",
							json_encode(array('fieldAccess'=>$fieldAccess, 'moduleAccess' => $moduleAccess))
								);

				return TRUE;

		}
		else{
			$this->ci->form_validation->set_message('check_login', $loginDetails[0][0]['result']);
			return FALSE;
		}
	}

	public function check_password_pattern($str)
	{

		$this->ci->form_validation->set_message('check_password_pattern', '%s must satisfy rules. <a href="#" onclick="password_pattern();">Click here to know</a>');

		return (preg_match('/^(?=^.{5,28}$)(?=.*[0-9]+)(?=.*[a-z]+)(?=.*[A-Z]+)(?i)(?:([a-zA-Z0-9#$])\1{1,})*^.*$/', $str)) ? TRUE : FALSE;
	}


 }
 // END Application Configuration Validation Class

/* End of file inno_config_validation.php */




