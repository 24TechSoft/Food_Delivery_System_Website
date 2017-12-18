<?php


 class send_email {

  private $CI;


  public function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->library('email');
    $config['mailtype'] = 'html';
    $this->CI->email->initialize($config);
  }

  public function sendBulkEmail($sendEmail)
  {
      
      $subject=$sendEmail['subject'];
      $from=$sendEmail['from'];
      $emailContent=$sendEmail['emailContent'];
      $data['emailContent']=$emailContent;
      $emailName=$sendEmail['emailName'];
      $emailAll=$sendEmail['emails'];
      $length=count($emailAll);
      
      // save newsletter
      $newsLetterID=$this->saveNewsLetter($subject,$emailContent,$emailName,$from);
      
      foreach ($emailAll as $emails) {
      
      
      $to=$emails['email'];
      $userName=$emails['name'];
      $data['userName']=$userName;
      $data['email']=$to;
      $date=date('Y-m-d H:i:s');
      $data['newsLetterID']=$newsLetterID;
      $id=$this->saveSendEmailStatus($to,$date,$newsLetterID);
      $data['id']=$id;
      $this->CI->email->set_newline("\r\n");
      $email_body = $this->CI->load->view('emailTemplateBulk',$data,true);
      $this->CI->email->from($from, 'Satyam');
      $list = array($to);
      $this->CI->email->to($list);
      $this->CI->email->subject($subject);
      $this->CI->email->message($email_body);
      
      $mail=$this->CI->email->send();
      
      $date=date('Y-m-d H:i:s');
      //track
     $id=$this->updateEmailBulk($id,$mail);

      
      }
      return $mail;

  }

    public function updateEmailBulk($id,$mail)
  {

    $this->CI->load->model('custom_model');
    $updateStatus=$this->CI->custom_model->updateMailBulk($id,$mail);
    return $updateStatus;

  }
  public function saveSendEmailStatus($to,$date,$newsLetterID)
  {

    $this->CI->load->model('custom_model');
    $id=$this->CI->custom_model->saveClientEmailStatus($to,$date,$newsLetterID);
    return $id;

  }

  public function saveNewsLetter($subject,$emailContent,$emailName,$from)
  {
     $this->CI->load->model('custom_model');
     $id=$this->CI->custom_model->saveNewsLetterTable($subject,$emailContent,$emailName,$from);
     return $id;
  }

  public function sendNewAdminEmail($sendAdminMail)
  {
      $sendAdminMail=(object)$sendAdminMail;
      $adminName=$sendAdminMail->adminName;
      $adminEmail=$sendAdminMail->adminEmail;
      $adminPassword=$sendAdminMail->adminPassword;
      $adminRole=$sendAdminMail->adminRole;
      $userID=$sendAdminMail->userID;
      $to=$adminEmail;
      $subject = "Satyam New Admin User Register";
      $templateFile = 'templates/satyam_add_admin_user.php';


      $site_url = site_url();
      $base_url = base_url();


      $html_keys = array('{{ SITE URL }}','{{ BASE URL }}','{{ NAME }}','{{ EMAIL ADDRESS }}','{{ USER ID }}','{{ PASSWORD }}','{{ ROLE }}');
      $html_values = array($site_url,$base_url,$adminName,$adminEmail,$userID,$adminPassword,$adminRole);

      $finalData = composeBody($templateFile,$html_keys,$html_values);
      $this->CI->email->set_newline("\r\n");
      //$email_body = $this->CI->load->view('emailWelcomePage',$data,true);
      $email_body=$finalData;
      $this->CI->email->from('techie675@gmail.com', 'Satyam');
      $list = array($to);
      $this->CI->email->to($list);
      $this->CI->email->subject($subject);
      $this->CI->email->message($email_body);

      return $this->CI->email->send();
  }

  public function sendAdminResetPasswordEmail($sendAdminMail)
  {
      $sendAdminMail=(object)$sendAdminMail;
      $adminName=$sendAdminMail->adminName;
      $adminEmail=$sendAdminMail->adminEmail;
      $adminPassword=$sendAdminMail->adminPassword;
      $adminRole=$sendAdminMail->adminRole;
      $to=$adminEmail;
      $subject = "Satyam Reset Password";
      $templateFile = 'templates/satyam_reset_admin_password.php';

      $site_url = site_url();
      $base_url = base_url();


      $html_keys = array('{{ SITE URL }}','{{ BASE URL }}','{{ NAME }}','{{ EMAIL ADDRESS }}','{{ PASSWORD }}','{{ ROLE }}');
      $html_values = array($site_url,$base_url,$adminName,$adminEmail,$adminPassword,$adminRole);

      $finalData = composeBody($templateFile,$html_keys,$html_values);
      $this->CI->email->set_newline("\r\n");
      //$email_body = $this->CI->load->view('emailWelcomePage',$data,true);
      $email_body=$finalData;
      $this->CI->email->from('techie675@gmail.com', 'Satyam');
      $list = array($to);
      $this->CI->email->to($list);
      $this->CI->email->subject($subject);
      $this->CI->email->message($email_body);

      return $this->CI->email->send();
  }

public function sendAdminForgotPasswordEmail($sendAdminMail)
  {
      $sendAdminMail=(object)$sendAdminMail;
      $adminName=$sendAdminMail->adminName;
      $adminEmail=$sendAdminMail->adminEmail;
      $passwordResetCode=$sendAdminMail->passwordResetCode;
      $adminRole=$sendAdminMail->adminRole;
      $to=$adminEmail;
      $subject = "Satyam Forgot Password";
      $templateFile = 'templates/satyam_forgot_admin_password.php';

      $site_url = site_url();
      $base_url = base_url();


      $html_keys = array('{{ SITE URL }}','{{ BASE URL }}','{{ NAME }}','{{ EMAIL ADDRESS }}','{{ PASSWORDRESETCODE }}','{{ ROLE }}');
      $html_values = array($site_url,$base_url,$adminName,$adminEmail,$passwordResetCode,$adminRole);

      $finalData = composeBody($templateFile,$html_keys,$html_values);
      $this->CI->email->set_newline("\r\n");
      //$email_body = $this->CI->load->view('emailWelcomePage',$data,true);
      $email_body=$finalData;
      $this->CI->email->from('techie675@gmail.com', 'Satyam');
      $list = array($to);
      $this->CI->email->to($list);
      $this->CI->email->subject($subject);
      $this->CI->email->message($email_body);

      return $this->CI->email->send();
  }

  public function sendAdminEditEmail($sendAdminMail)
  {
      $sendAdminMail=(object)$sendAdminMail;
      $adminName=$sendAdminMail->adminName;
      $adminEmail=$sendAdminMail->adminEmail;
      //$adminPassword=$sendAdminMail->adminPassword;
      $adminRole=$sendAdminMail->adminRole;
      $to=$adminEmail;
      $subject = "Satyam You Profile is edited";
      $templateFile = 'templates/satyam_edit_admin_details.php';

      $site_url = site_url();
      $base_url = base_url();


      $html_keys = array('{{ SITE URL }}','{{ BASE URL }}','{{ NAME }}','{{ EMAIL ADDRESS }}','{{ ROLE }}');
      $html_values = array($site_url,$base_url,$adminName,$adminEmail,$adminRole);

      $finalData = composeBody($templateFile,$html_keys,$html_values);
      $this->CI->email->set_newline("\r\n");
      //$email_body = $this->CI->load->view('emailWelcomePage',$data,true);
      $email_body=$finalData;
      $this->CI->email->from('techie675@gmail.com', 'Satyam');
      $list = array($to);
      $this->CI->email->to($list);
      $this->CI->email->subject($subject);
      $this->CI->email->message($email_body);

      return $this->CI->email->send();
  }

  public function sendAdminChangePasswordEmail($sendAdminMail)
  {
      $sendAdminMail=(object)$sendAdminMail;
      $adminName=$sendAdminMail->adminName;
      $adminEmail=$sendAdminMail->adminEmail;
      $adminPassword=$sendAdminMail->adminPassword;
      $adminRole=$sendAdminMail->adminRole;
      $to=$adminEmail;
      $subject = "Satyam Your Password has been changed";
      $templateFile = 'templates/satyam_changed_admin_password.php';

      $site_url = site_url();
      $base_url = base_url();


      $html_keys = array('{{ SITE URL }}','{{ BASE URL }}','{{ NAME }}','{{ EMAIL ADDRESS }}','{{ PASSWORD }}','{{ ROLE }}');
      $html_values = array($site_url,$base_url,$adminName,$adminEmail,$adminPassword,$adminRole);

      $finalData = composeBody($templateFile,$html_keys,$html_values);
      $this->CI->email->set_newline("\r\n");
      //$email_body = $this->CI->load->view('emailWelcomePage',$data,true);
      $email_body=$finalData;
      $this->CI->email->from('techie675@gmail.com', 'Satyam');
      $list = array($to);
      $this->CI->email->to($list);
      $this->CI->email->subject($subject);
      $this->CI->email->message($email_body);

      return $this->CI->email->send();
  }




  public function sendNewPasswordEmail($sendAdminMail)
  {
      $sendAdminEmail=(object)$sendAdminEmail;
      $subject="Reset your password";
      $data['email']=$to=$sendAdminEmail->email;
      $data['userName']=$sendAdminEmail->userName;
      $data['passwordResetCode']=$sendAdminEmail->passwordResetCode;


      $this->CI->email->set_newline("\r\n");
      $email_body = $this->CI->load->view('emailPasswordReset',$data,true);
      $this->CI->email->from('techie675@gmail.com', 'Satyam');
      $list = array($to);
      $this->CI->email->to($list);
      $this->CI->email->subject($subject);
      $this->CI->email->message($email_body);

      return $this->CI->email->send();


  }
  public function sendUserResetPasswordEmail($sendMail)
  {
      $sendMail=(object)$sendMail;
      $subject="Reset your password";
      $data['email']=$to=$sendMail->userEmail;
      $data['userName']=$sendMail->userName;
      $data['password']=$sendMail->userPassword;
     

      $this->CI->email->set_newline("\r\n");
      $email_body = $this->CI->load->view('emailPasswordReset',$data,true);
      $this->CI->email->from('techie675@gmail.com', 'Satyam');
      $list = array($to);
      $this->CI->email->to($list);
      $this->CI->email->subject($subject);
      $this->CI->email->message($email_body);

      return $this->CI->email->send();

      
  }

}

?>
