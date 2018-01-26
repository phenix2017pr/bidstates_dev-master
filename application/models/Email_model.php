<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*	
 *	@author 	: Yashvir Singh Prince
 *	date		: 20 april, 2016
 *	Bidstates. An online directory of subcontractors.
 *	https://www.bidstates.com
 *	support@bidstates.com
 */

class Email_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	function account_opening_email($account_type = '' , $email = '',$name='', $activation_code='')
	{
		 $system_name	=	"Bidstate";
		
	     $email_msg=$this->activate_account_template($name,$email,$activation_code);
	     $email_sub		=	"Please activate your registration at ".base_url();
	
		 $email_to		=	$email;
		
		$this->do_email($email_msg , $email_sub , $email_to);
	}
	
	function password_reset_email($password_reset_auth_key = '' , $account_type = '' , $email = '', $name = '')
	{
		$query			=	$this->db->get_where($account_type , array('email' => $email));
		if($query->num_rows() > 0)
		{
			
			
			
			$email_msg=$this->reset_password_template($name,$password_reset_auth_key);
				
			$email_sub	=	"Resetting your password at ".base_url();
			$email_to	=	$email;
			$this->do_email($email_msg , $email_sub , $email_to);
			
			
			
			return true;
		}
		else
		{	
			return false;
		}
	}
	
	function password_reset_success_email($email = '', $name = '')
	{
			
			$email_msg=$this->reset_password_success_template($name);
				
			$email_sub	=	"Your Bidstates account passowrd changed";
			$email_to	=	$email;
			$this->do_email($email_msg , $email_sub , $email_to);
			
			return true;
		
	}
	
	/***custom email sender****/
	function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
	{
		
		$this->load->library('email');
			//send mail example
			/* $config = array();
			$config['useragent']	= "CodeIgniter";
			$config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
			$config['protocol']		= "smtp";
			$config['smtp_host']	= "localhost";
			$config['smtp_port']	= "25";
			$config['mailtype']		= 'html';
			$config['charset']		= 'utf-8';
			$config['newline']		= "\r\n";
			$config['wordwrap']		= TRUE;*/
		
	/* working code
		
			$config = array();	   
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'bidst@gmail.com';
			$config['smtp_pass'] = '1abc1abc';
			$config['mailtype'] =  'html';
			$config['charset'] = 'utf-8';
			$config['newline'] = "\r\n";

	*/	
		
		
		  //Mandrill/mail chimp  example
			/*	$this->email->initialize(array(
					  'protocol' => 'smtp',
					  'smtp_host' => 'smtp.mandrillapp.com',
					  'smtp_user' => 'mandrill username',
					  'smtp_pass' => 'API KEY',
					  'smtp_port' => 587,
					  'mailtype' => 'html',
					  'crlf' => "rn",
					  'newline' => "rn"
				   ));*/
		  //send grid example 
		      $this->email->initialize(array(
				   'protocol' => 'smtp',
				   'smtp_host' => 'smtp.sendgrid.net',
				   'smtp_user' => 'bidstates',
				   'smtp_pass' => '@Bidstates100',
				   'smtp_port' => 25,
				   'mailtype' => 'html',
				   'crlf' => "rn",
				   'newline' => "rn"
			));
		
		//$this->email->initialize($config);

		$system_name	=	"Bidstates";
		//if($from == NULL)
			$from		=	"support@bidstates.com";
		
		
		$this->email->from($from, $system_name);
		$this->email->to($to);
		$this->email->subject($sub);
		
		
		$this->email->message($msg);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();
	}
	/***creating mail template for reset password****/
	function reset_password_template_veryold($name=NULL, $password_reset_auth_key=NULL)
	{
	$reset_link=base_url()."login/reset_password/".$password_reset_auth_key;
		$email_html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;" >
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bidstates. Please activate your account.</title>
</head>
<body bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">
<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;">
  <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;" ></td>
    <td class="container" bgcolor="#FFFFFF" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;"><!-- content -->
      
      <div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
        <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
          <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <td align="center" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><h1 style="font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Hello '.$name.',</h1>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 20px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">We received a request to reset the password for your account.
If you requested a reset for your password, click the link below.</p>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><a href="'.$reset_link.'" class="btn-primary" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 25px; background: #348eda; margin: 0 10px 0 0; padding: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Reset my Password</a></p>
              <h2 style="font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 28px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Reset Password</h2>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Alternatively, you can also copy and paste the following link into your browser.</p>
              <br>
              <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
                <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
                  <td class="padding" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 10px 0;">
                  <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0; text-align:center;"><a href="#" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #348eda; margin: 0; padding: 0;">'.$reset_link.'</a></p>
             
                  </td>
                </tr>
               </table>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Thank you for using Bidstates.</p>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #348eda; margin: 0; padding: 0;">If you did not make this request, you can safely ignore this email. A password reset request can be made by anyone, and it does not indicate that your account is in any danger of being accessed by someone else.</p>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #348eda; margin: 0; padding: 0;">This process is designed to ensure the privacy and security of your account information. If you have further questions, please contact support@bidstates.com. Thank you for using bidstates.</p> 
              <p></p></td>
          </tr>
        </table>
      </div>
      
      <!-- /content --></td>
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
  </tr>
</table>
<!-- /body --><!-- footer -->
<table class="footer-wrap" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;">
  <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
    <td class="container" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;"><!-- content -->
      
      <div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
        <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
          <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <td align="center" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">Emails from Bidstates will always contain your full name and email address. <a href="#" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #999; margin: 0; padding: 0;">
                <unsubscribe style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">Find out why</unsubscribe>
                </a>.
              
              <address>
              <b>Bidstates</b><br>
              support@bidstates.com <br>
              </address>
              </p></td>
          </tr>
        </table>
      </div>
      
      <!-- /content --></td>
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
  </tr>
</table>
<!-- /footer -->
</body>
</html>
';	

return $email_html;
	
	}
	
	function reset_password_template($name=NULL, $password_reset_auth_key=NULL)
	{
	$reset_link=base_url()."login/reset_password/".$password_reset_auth_key;
	ob_start(); ?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
    <meta name="viewport" content="width=device-width" />
    <style type="text/css">
@media only screen and (min-width: 620px) {
  * [lang=x-wrapper] h1 {
    font-size: 26px !important;
    line-height: 34px !important;
  }
  * [lang=x-wrapper] h2 {
    font-size: 20px !important;
    line-height: 28px !important;
  }
  * div [lang=x-size-8] {
    font-size: 8px !important;
    line-height: 14px !important;
  }
  * div [lang=x-size-9] {
    font-size: 9px !important;
    line-height: 16px !important;
  }
  * div [lang=x-size-10] {
    font-size: 10px !important;
    line-height: 18px !important;
  }
  * div [lang=x-size-11] {
    font-size: 11px !important;
    line-height: 19px !important;
  }
  * div [lang=x-size-12] {
    font-size: 12px !important;
    line-height: 19px !important;
  }
  * div [lang=x-size-13] {
    font-size: 13px !important;
    line-height: 21px !important;
  }
  * div [lang=x-size-14] {
    font-size: 14px !important;
    line-height: 21px !important;
  }
  * div [lang=x-size-15] {
    font-size: 15px !important;
    line-height: 23px !important;
  }
  * div [lang=x-size-16] {
    font-size: 16px !important;
    line-height: 24px !important;
  }
  * div [lang=x-size-17] {
    font-size: 17px !important;
    line-height: 26px !important;
  }
  * div [lang=x-size-18] {
    font-size: 18px !important;
    line-height: 26px !important;
  }
  * div [lang=x-size-18] {
    font-size: 18px !important;
    line-height: 26px !important;
  }
  * div [lang=x-size-20] {
    font-size: 20px !important;
    line-height: 28px !important;
  }
  * div [lang=x-size-22] {
    font-size: 22px !important;
    line-height: 31px !important;
  }
  * div [lang=x-size-24] {
    font-size: 24px !important;
    line-height: 32px !important;
  }
  * div [lang=x-size-26] {
    font-size: 26px !important;
    line-height: 34px !important;
  }
  * div [lang=x-size-28] {
    font-size: 28px !important;
    line-height: 36px !important;
  }
  * div [lang=x-size-30] {
    font-size: 30px !important;
    line-height: 38px !important;
  }
  * div [lang=x-size-32] {
    font-size: 32px !important;
    line-height: 40px !important;
  }
  * div [lang=x-size-34] {
    font-size: 34px !important;
    line-height: 43px !important;
  }
  * div [lang=x-size-36] {
    font-size: 36px !important;
    line-height: 43px !important;
  }
  * div [lang=x-size-40] {
    font-size: 40px !important;
    line-height: 47px !important;
  }
  * div [lang=x-size-44] {
    font-size: 44px !important;
    line-height: 50px !important;
  }
  * div [lang=x-size-48] {
    font-size: 48px !important;
    line-height: 54px !important;
  }
  * div [lang=x-size-56] {
    font-size: 56px !important;
    line-height: 60px !important;
  }
  * div [lang=x-size-64] {
    font-size: 64px !important;
    line-height: 63px !important;
  }
}
</style>
    <style type="text/css">
body {
  margin: 0;
  padding: 0;
}
table {
  border-collapse: collapse;
  table-layout: fixed;
}
* {
  line-height: inherit;
}
[x-apple-data-detectors],
[href^="tel"],
[href^="sms"] {
  color: inherit !important;
  text-decoration: none !important;
}
.wrapper .footer__share-button a:hover,
.wrapper .footer__share-button a:focus {
  color: #ffffff !important;
}
.btn a:hover,
.btn a:focus,
.footer__share-button a:hover,
.footer__share-button a:focus,
.email-footer__links a:hover,
.email-footer__links a:focus {
  opacity: 0.8;
}
.ie .btn {
  width: 100%;
}
.ie .column,
[owa] .column,
.ie .gutter,
[owa] .gutter {
  display: table-cell;
  float: none !important;
  vertical-align: top;
}
.ie .preheader,
[owa] .preheader,
.ie .email-footer,
[owa] .email-footer {
  width: 560px !important;
}
.ie .snippet,
[owa] .snippet,
.ie .webversion,
[owa] .webversion {
  width: 280px !important;
}
.ie .header,
[owa] .header,
.ie .layout,
[owa] .layout,
.ie .one-col .column,
[owa] .one-col .column {
  width: 600px !important;
}
.ie .fixed-width.has-border,
[owa] .fixed-width.has-border,
.ie .has-gutter.has-border,
[owa] .has-gutter.has-border {
  width: 602px !important;
}
.ie .two-col .column,
[owa] .two-col .column {
  width: 300px !important;
}
.ie .three-col .column,
[owa] .three-col .column,
.ie .narrow,
[owa] .narrow {
  width: 200px !important;
}
.ie .wide,
[owa] .wide {
  width: 400px !important;
}
.ie .two-col.has-gutter .column,
[owa] .two-col.x_has-gutter .column {
  width: 290px !important;
}
.ie .three-col.has-gutter .column,
[owa] .three-col.x_has-gutter .column,
.ie .has-gutter .narrow,
[owa] .has-gutter .narrow {
  width: 188px !important;
}
.ie .has-gutter .wide,
[owa] .has-gutter .wide {
  width: 394px !important;
}
.ie .two-col.has-gutter.has-border .column,
[owa] .two-col.x_has-gutter.x_has-border .column {
  width: 292px !important;
}
.ie .three-col.has-gutter.has-border .column,
[owa] .three-col.x_has-gutter.x_has-border .column,
.ie .has-gutter.has-border .narrow,
[owa] .has-gutter.x_has-border .narrow {
  width: 190px !important;
}
.ie .has-gutter.has-border .wide,
[owa] .has-gutter.x_has-border .wide {
  width: 396px !important;
}
.ie .fixed-width .layout__inner {
  border-left: 0 none white !important;
  border-right: 0 none white !important;
}
.ie .layout__edges {
  display: none;
}
.mso .layout__edges {
  font-size: 0;
}
.layout-fixed-width,
.mso .layout-full-width {
  background-color: #ffffff;
}
@media only screen and (min-width: 620px) {
  .column,
  .gutter {
    display: table-cell;
    Float: none !important;
    vertical-align: top;
  }
  .preheader,
  .email-footer {
    width: 560px !important;
  }
  .snippet,
  .webversion {
    width: 280px !important;
  }
  .header,
  .layout,
  .one-col .column {
    width: 600px !important;
  }
  .fixed-width.has-border,
  .fixed-width.ecxhas-border,
  .has-gutter.has-border,
  .has-gutter.ecxhas-border {
    width: 602px !important;
  }
  .two-col .column {
    width: 300px !important;
  }
  .three-col .column,
  .column.narrow {
    width: 200px !important;
  }
  .column.wide {
    width: 400px !important;
  }
  .two-col.has-gutter .column,
  .two-col.ecxhas-gutter .column {
    width: 290px !important;
  }
  .three-col.has-gutter .column,
  .three-col.ecxhas-gutter .column,
  .has-gutter .narrow {
    width: 188px !important;
  }
  .has-gutter .wide {
    width: 394px !important;
  }
  .two-col.has-gutter.has-border .column,
  .two-col.ecxhas-gutter.ecxhas-border .column {
    width: 292px !important;
  }
  .three-col.has-gutter.has-border .column,
  .three-col.ecxhas-gutter.ecxhas-border .column,
  .has-gutter.has-border .narrow,
  .has-gutter.ecxhas-border .narrow {
    width: 190px !important;
  }
  .has-gutter.has-border .wide,
  .has-gutter.ecxhas-border .wide {
    width: 396px !important;
  }
}
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
  .fblike {
    background-image: url(https://i3.createsend1.com/static/eb/master/13-the-blueprint-3/images/fblike@2x.png) !important;
  }
  .tweet {
    background-image: url(https://i4.createsend1.com/static/eb/master/13-the-blueprint-3/images/tweet@2x.png) !important;
  }
  .linkedinshare {
    background-image: url(https://i5.createsend1.com/static/eb/master/13-the-blueprint-3/images/lishare@2x.png) !important;
  }
  .forwardtoafriend {
    background-image: url(https://i6.createsend1.com/static/eb/master/13-the-blueprint-3/images/forward@2x.png) !important;
  }
}
@media (max-width: 321px) {
  .fixed-width.has-border .layout__inner {
    border-width: 1px 0 !important;
  }
  .layout,
  .column {
    min-width: 320px !important;
    width: 320px !important;
  }
  .border {
    display: none;
  }
}
.mso div {
  border: 0 none white !important;
}
.mso .w560 .divider {
  Margin-left: 260px !important;
  Margin-right: 260px !important;
}
.mso .w360 .divider {
  Margin-left: 160px !important;
  Margin-right: 160px !important;
}
.mso .w260 .divider {
  Margin-left: 110px !important;
  Margin-right: 110px !important;
}
.mso .w160 .divider {
  Margin-left: 60px !important;
  Margin-right: 60px !important;
}
.mso .w354 .divider {
  Margin-left: 157px !important;
  Margin-right: 157px !important;
}
.mso .w250 .divider {
  Margin-left: 105px !important;
  Margin-right: 105px !important;
}
.mso .w148 .divider {
  Margin-left: 54px !important;
  Margin-right: 54px !important;
}
.mso .font-avenir,
.mso .font-cabin,
.mso .font-open-sans,
.mso .font-ubuntu {
  font-family: sans-serif !important;
}
.mso .font-bitter,
.mso .font-merriweather,
.mso .font-pt-serif {
  font-family: Georgia, serif !important;
}
.mso .font-lato,
.mso .font-roboto {
  font-family: Tahoma, sans-serif !important;
}
.mso .font-pt-sans {
  font-family: "Trebuchet MS", sans-serif !important;
}
.mso .footer__share-button p {
  margin: 0;
}
@media only screen and (min-width: 620px) {
  .wrapper .size-8 {
    font-size: 8px !important;
    line-height: 14px !important;
  }
  .wrapper .size-9 {
    font-size: 9px !important;
    line-height: 16px !important;
  }
  .wrapper .size-10 {
    font-size: 10px !important;
    line-height: 18px !important;
  }
  .wrapper .size-11 {
    font-size: 11px !important;
    line-height: 19px !important;
  }
  .wrapper .size-12 {
    font-size: 12px !important;
    line-height: 19px !important;
  }
  .wrapper .size-13 {
    font-size: 13px !important;
    line-height: 21px !important;
  }
  .wrapper .size-14 {
    font-size: 14px !important;
    line-height: 21px !important;
  }
  .wrapper .size-15 {
    font-size: 15px !important;
    line-height: 23px !important;
  }
  .wrapper .size-16 {
    font-size: 16px !important;
    line-height: 24px !important;
  }
  .wrapper .size-17 {
    font-size: 17px !important;
    line-height: 26px !important;
  }
  .wrapper .size-18 {
    font-size: 18px !important;
    line-height: 26px !important;
  }
  .wrapper .size-20 {
    font-size: 20px !important;
    line-height: 28px !important;
  }
  .wrapper .size-22 {
    font-size: 22px !important;
    line-height: 31px !important;
  }
  .wrapper .size-24 {
    font-size: 24px !important;
    line-height: 32px !important;
  }
  .wrapper .size-26 {
    font-size: 26px !important;
    line-height: 34px !important;
  }
  .wrapper .size-28 {
    font-size: 28px !important;
    line-height: 36px !important;
  }
  .wrapper .size-30 {
    font-size: 30px !important;
    line-height: 38px !important;
  }
  .wrapper .size-32 {
    font-size: 32px !important;
    line-height: 40px !important;
  }
  .wrapper .size-34 {
    font-size: 34px !important;
    line-height: 43px !important;
  }
  .wrapper .size-36 {
    font-size: 36px !important;
    line-height: 43px !important;
  }
  .wrapper .size-40 {
    font-size: 40px !important;
    line-height: 47px !important;
  }
  .wrapper .size-44 {
    font-size: 44px !important;
    line-height: 50px !important;
  }
  .wrapper .size-48 {
    font-size: 48px !important;
    line-height: 54px !important;
  }
  .wrapper .size-56 {
    font-size: 56px !important;
    line-height: 60px !important;
  }
  .wrapper .size-64 {
    font-size: 64px !important;
    line-height: 63px !important;
  }
}
.mso .size-8,
.ie .size-8 {
  font-size: 8px !important;
  line-height: 14px !important;
}
.mso .size-9,
.ie .size-9 {
  font-size: 9px !important;
  line-height: 16px !important;
}
.mso .size-10,
.ie .size-10 {
  font-size: 10px !important;
  line-height: 18px !important;
}
.mso .size-11,
.ie .size-11 {
  font-size: 11px !important;
  line-height: 19px !important;
}
.mso .size-12,
.ie .size-12 {
  font-size: 12px !important;
  line-height: 19px !important;
}
.mso .size-13,
.ie .size-13 {
  font-size: 13px !important;
  line-height: 21px !important;
}
.mso .size-14,
.ie .size-14 {
  font-size: 14px !important;
  line-height: 21px !important;
}
.mso .size-15,
.ie .size-15 {
  font-size: 15px !important;
  line-height: 23px !important;
}
.mso .size-16,
.ie .size-16 {
  font-size: 16px !important;
  line-height: 24px !important;
}
.mso .size-17,
.ie .size-17 {
  font-size: 17px !important;
  line-height: 26px !important;
}
.mso .size-18,
.ie .size-18 {
  font-size: 18px !important;
  line-height: 26px !important;
}
.mso .size-20,
.ie .size-20 {
  font-size: 20px !important;
  line-height: 28px !important;
}
.mso .size-22,
.ie .size-22 {
  font-size: 22px !important;
  line-height: 31px !important;
}
.mso .size-24,
.ie .size-24 {
  font-size: 24px !important;
  line-height: 32px !important;
}
.mso .size-26,
.ie .size-26 {
  font-size: 26px !important;
  line-height: 34px !important;
}
.mso .size-28,
.ie .size-28 {
  font-size: 28px !important;
  line-height: 36px !important;
}
.mso .size-30,
.ie .size-30 {
  font-size: 30px !important;
  line-height: 38px !important;
}
.mso .size-32,
.ie .size-32 {
  font-size: 32px !important;
  line-height: 40px !important;
}
.mso .size-34,
.ie .size-34 {
  font-size: 34px !important;
  line-height: 43px !important;
}
.mso .size-36,
.ie .size-36 {
  font-size: 36px !important;
  line-height: 43px !important;
}
.mso .size-40,
.ie .size-40 {
  font-size: 40px !important;
  line-height: 47px !important;
}
.mso .size-44,
.ie .size-44 {
  font-size: 44px !important;
  line-height: 50px !important;
}
.mso .size-48,
.ie .size-48 {
  font-size: 48px !important;
  line-height: 54px !important;
}
.mso .size-56,
.ie .size-56 {
  font-size: 56px !important;
  line-height: 60px !important;
}
.mso .size-64,
.ie .size-64 {
  font-size: 64px !important;
  line-height: 63px !important;
}
.footer__share-button p {
  margin: 0;
}
</style>
    
    <title></title>
  <!--[if !mso]><!--><style type="text/css">
@import url(https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Ubuntu:400,700,400italic,700italic);
</style><link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Ubuntu:400,700,400italic,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
body{background-color:#ededf1}.mso h1{}.mso h1{font-family:sans-serif !important}.mso h2{}.mso h2{font-family:sans-serif !important}.mso h3{}.mso .column,.mso .column__background td{}.mso .column,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:sans-serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #b4b4c4;border-bottom:1px solid #b4b4c4}.mso .layout-has-bottom-border{border-bottom:1px solid #b4b4c4}.mso .border,.ie .border{background-color:#b4b4c4}@media only screen and (min-width: 
620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
</style><meta name="robots" content="noindex,nofollow" />
<meta property="og:title" content="My First Campaign" />
</head>
<!--[if mso]>
  <body class="mso">
<![endif]-->
<!--[if !mso]><!-->
  <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
<!--<![endif]-->
    <div class="wrapper" style="min-width: 320px;background-color: #ededf1;" lang="x-wrapper">
      <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 173040px);">
        <div style="border-collapse: collapse;display: table;width: 100%;">
        <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
          <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #7c7e7f;font-family: Ubuntu,sans-serif;">
            
          </div>
        <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
          <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #7c7e7f;font-family: Ubuntu,sans-serif;">
            
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
      <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);" id="emb-email-header-container">
      <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
        <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
          <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 134px;" src="<?php echo base_url() ?>images/bidstates-sleek.png" alt="" width="134" /></div>
        </div>
      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
      </div>
      <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;" emb-background-style>
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
          <div class="column" style='text-align: left;color: #7c7e7f;font-size: 14px;line-height: 21px;font-family: "PT Serif",Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);'>
        
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;">
      <div style="line-height:10px;font-size:1px">&nbsp;</div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <h3 style="Margin-top: 0;Margin-bottom: 12px;font-style: normal;font-weight: normal;color: #788991;font-size: 16px;line-height: 24px;text-align: center;">Hello <?php echo $name; ?>:</h3>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div class="divider" style="display: block;font-size: 2px;line-height: 2px;Margin-left: auto;Margin-right: auto;width: 40px;background-color: #b4b4c4;Margin-bottom: 20px;">&nbsp;</div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="line-height:5px;font-size:1px">&nbsp;</div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <h2 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 17px;line-height: 24px;font-family: Ubuntu,sans-serif;"><strong><font size="3">We're sorry&nbsp;to hear that you've been having trouble logging into your BidStates account.</font></strong></h2><h2 style="Margin-top: 16px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 17px;line-height: 24px;font-family: Ubuntu,sans-serif;">We want to get you back up and running quickly. So we've attached a convenient password reset link below.</h2><p style="Margin-top: 16px;Margin-bottom: 20px;">&nbsp;</p>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div class="btn btn--flat btn--large" style="Margin-bottom: 20px;text-align: center;">
        <![if !mso]><a style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #4eaacc;font-family: 'PT Serif', Georgia, serif;" href="<?php echo $reset_link ?>">RESET MY PASSWORD</a><![endif]>
      <!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://test.com" style="width:201px" arcsize="9%" fillcolor="#4EAACC" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,11px,0px,11px"><center style="font-size:14px;line-height:24px;color:#FFFFFF;font-family:Georgia,serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">RESET MY PASSWORD</center></v:textbox></v:roundrect><![endif]--></div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <p style="Margin-top: 0;Margin-bottom: 0;">If the above button doesn't work properly, simply copy and paste this link into your browser: <?php echo $reset_link ?></p><p style="Margin-top: 20px;Margin-bottom: 20px;">Kind regards,<br />
Wesley Long, CEO of BidStates</p>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="left">
          <img style="border: 0;display: block;height: auto;width: 100%;max-width: 160px;" src="<?php echo base_url() ?>images/signature4cropped.png" alt="" width="160" />
        </div>
      </div>
        
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
  
      <div style="line-height:20px;font-size:20px;">&nbsp;</div>
  
      <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
          <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
              
              <div>
                <div>BidStates.com<br />
341 TN Ave N<br />
Parsons, TN 38363</div>
              </div>
              <div style="Margin-top: 18px;">
                <div>You are receiving this message because you are valued BidStates customer.</div>
              </div>
            </div>
          </div>
        <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
          <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
              
            </div>
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
      <div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 600px;" class="w560"><![endif]-->
          <div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
              <div>
                <unsubscribe style="text-decoration: underline;">Unsubscribe</unsubscribe>
              </div>
            </div>
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
      <div style="line-height:40px;font-size:40px;">&nbsp;</div>
    
  </div>
</body></html>

<?php $email_html = ob_get_clean();

return $email_html;
	
	}
	
	
	function reset_password_success_template($name=NULL, $password_reset_auth_key=NULL)
	{

		$email_html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;" >
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bidstates. Please activate your account.</title>
</head>
<body bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">
<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;">
  <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;" ></td>
    <td class="container" bgcolor="#FFFFFF" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;"><!-- content -->
      
      <div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
        <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
          <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <td align="center" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><h1 style="font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Hello '.$name.',</h1>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 20px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">The password of your account was recently changed.</p>
              
              
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">If you did not make these changes, please contact Bidstates Support immediately at support@Bidstates.com.</p>

              <br>
              <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
                <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
                  <td class="padding" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 10px 0;">
                  
             
                  </td>
                </tr>
               </table>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Thank you for using Bidstates.</p>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
              <p></p></td>
          </tr>
        </table>
      </div>
      
      <!-- /content --></td>
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
  </tr>
</table>
<!-- /body --><!-- footer -->
<table class="footer-wrap" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;">
  <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
    <td class="container" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;"><!-- content -->
      
      <div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
        <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
          <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <td align="center" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">Emails from Bidstates will always contain your full name and email address. <a href="#" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #999; margin: 0; padding: 0;">
                <unsubscribe style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">Find out why</unsubscribe>
                </a>.
              
              <address>
              <b>Bidstates</b><br>
              support@bidstates.com <br>
              </address>
              </p></td>
          </tr>
        </table>
      </div>
      
      <!-- /content --></td>
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
  </tr>
</table>
<!-- /footer -->
</body>
</html>
';	

return $email_html;
	
	}
	/***creating mail template for reset password****/
	function reset_password_template_old($name=NULL, $new_password=NULL)
	{
		$email_html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;" >
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bidstates. Password Reset.</title>
</head>
<body bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">
<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;">
  <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;" ></td>
    <td class="container" bgcolor="#FFFFFF" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;"><!-- content -->
      
      <div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
        <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
          <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <td align="center" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><h1 style="font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Hello '. $name.',</h1>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 20px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">We have received your request to reset your BidStates password. <br> Your new password is : '. $new_password.'.</p>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><a href="'.base_url().'login" class="btn-primary" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 25px; background: #348eda; margin: 0 10px 0 0; padding: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Go to Login</a></p>
              <br>
             
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Thank you for using Bidstates.</p>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #348eda; margin: 0; padding: 0;">You are receiving this email because someone with your email address and registered zip code requested it.</b> If you did not make this action, then you should visit BidStates.com directly to review your security settings.</p>
              </p>
              </p>
              </p></td>
          </tr>
        </table>
      </div>
      
      <!-- /content --></td>
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
  </tr>
</table>
<!-- /body --><!-- footer -->
<table class="footer-wrap" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;">
  <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
    <td class="container" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;"><!-- content -->
      
      <div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
        <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
          <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <td align="center" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">Emails from Bidstates will always contain your full name and email address. <a href="#" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #999; margin: 0; padding: 0;">
                <unsubscribe style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">Find out why</unsubscribe>
                </a>.
              
              <address>
              <b>Bidstates</b><br>
              Mobile:(000) 555-5555 <br>
              </address>
              </p></td>
          </tr>
        </table>
      </div>
      
      <!-- /content --></td>
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
  </tr>
</table>
<!-- /footer -->
</body>
</html>';	

return $email_html;
	
	}
	/***creating mail template for account activate****/
	function activate_account_template($name=NULL, $email=NULL, $activation_code=NULL)
	{
		$activation_link=base_url()."login/activate/".$activation_code;
		ob_start(); ?>
        
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
    <meta name="viewport" content="width=device-width" />
    <style type="text/css">
@media only screen and (min-width: 620px) {
  * [lang=x-wrapper] h1 {
    font-size: 26px !important;
    line-height: 34px !important;
  }
  * [lang=x-wrapper] h2 {
    font-size: 20px !important;
    line-height: 28px !important;
  }
  * div [lang=x-size-8] {
    font-size: 8px !important;
    line-height: 14px !important;
  }
  * div [lang=x-size-9] {
    font-size: 9px !important;
    line-height: 16px !important;
  }
  * div [lang=x-size-10] {
    font-size: 10px !important;
    line-height: 18px !important;
  }
  * div [lang=x-size-11] {
    font-size: 11px !important;
    line-height: 19px !important;
  }
  * div [lang=x-size-12] {
    font-size: 12px !important;
    line-height: 19px !important;
  }
  * div [lang=x-size-13] {
    font-size: 13px !important;
    line-height: 21px !important;
  }
  * div [lang=x-size-14] {
    font-size: 14px !important;
    line-height: 21px !important;
  }
  * div [lang=x-size-15] {
    font-size: 15px !important;
    line-height: 23px !important;
  }
  * div [lang=x-size-16] {
    font-size: 16px !important;
    line-height: 24px !important;
  }
  * div [lang=x-size-17] {
    font-size: 17px !important;
    line-height: 26px !important;
  }
  * div [lang=x-size-18] {
    font-size: 18px !important;
    line-height: 26px !important;
  }
  * div [lang=x-size-18] {
    font-size: 18px !important;
    line-height: 26px !important;
  }
  * div [lang=x-size-20] {
    font-size: 20px !important;
    line-height: 28px !important;
  }
  * div [lang=x-size-22] {
    font-size: 22px !important;
    line-height: 31px !important;
  }
  * div [lang=x-size-24] {
    font-size: 24px !important;
    line-height: 32px !important;
  }
  * div [lang=x-size-26] {
    font-size: 26px !important;
    line-height: 34px !important;
  }
  * div [lang=x-size-28] {
    font-size: 28px !important;
    line-height: 36px !important;
  }
  * div [lang=x-size-30] {
    font-size: 30px !important;
    line-height: 38px !important;
  }
  * div [lang=x-size-32] {
    font-size: 32px !important;
    line-height: 40px !important;
  }
  * div [lang=x-size-34] {
    font-size: 34px !important;
    line-height: 43px !important;
  }
  * div [lang=x-size-36] {
    font-size: 36px !important;
    line-height: 43px !important;
  }
  * div [lang=x-size-40] {
    font-size: 40px !important;
    line-height: 47px !important;
  }
  * div [lang=x-size-44] {
    font-size: 44px !important;
    line-height: 50px !important;
  }
  * div [lang=x-size-48] {
    font-size: 48px !important;
    line-height: 54px !important;
  }
  * div [lang=x-size-56] {
    font-size: 56px !important;
    line-height: 60px !important;
  }
  * div [lang=x-size-64] {
    font-size: 64px !important;
    line-height: 63px !important;
  }
}
</style>
    <style type="text/css">
body {
  margin: 0;
  padding: 0;
}
table {
  border-collapse: collapse;
  table-layout: fixed;
}
* {
  line-height: inherit;
}
[x-apple-data-detectors],
[href^="tel"],
[href^="sms"] {
  color: inherit !important;
  text-decoration: none !important;
}
.wrapper .footer__share-button a:hover,
.wrapper .footer__share-button a:focus {
  color: #ffffff !important;
}
.btn a:hover,
.btn a:focus,
.footer__share-button a:hover,
.footer__share-button a:focus,
.email-footer__links a:hover,
.email-footer__links a:focus {
  opacity: 0.8;
}
.ie .btn {
  width: 100%;
}
.ie .column,
[owa] .column,
.ie .gutter,
[owa] .gutter {
  display: table-cell;
  float: none !important;
  vertical-align: top;
}
.ie .preheader,
[owa] .preheader,
.ie .email-footer,
[owa] .email-footer {
  width: 560px !important;
}
.ie .snippet,
[owa] .snippet,
.ie .webversion,
[owa] .webversion {
  width: 280px !important;
}
.ie .header,
[owa] .header,
.ie .layout,
[owa] .layout,
.ie .one-col .column,
[owa] .one-col .column {
  width: 600px !important;
}
.ie .fixed-width.has-border,
[owa] .fixed-width.has-border,
.ie .has-gutter.has-border,
[owa] .has-gutter.has-border {
  width: 602px !important;
}
.ie .two-col .column,
[owa] .two-col .column {
  width: 300px !important;
}
.ie .three-col .column,
[owa] .three-col .column,
.ie .narrow,
[owa] .narrow {
  width: 200px !important;
}
.ie .wide,
[owa] .wide {
  width: 400px !important;
}
.ie .two-col.has-gutter .column,
[owa] .two-col.x_has-gutter .column {
  width: 290px !important;
}
.ie .three-col.has-gutter .column,
[owa] .three-col.x_has-gutter .column,
.ie .has-gutter .narrow,
[owa] .has-gutter .narrow {
  width: 188px !important;
}
.ie .has-gutter .wide,
[owa] .has-gutter .wide {
  width: 394px !important;
}
.ie .two-col.has-gutter.has-border .column,
[owa] .two-col.x_has-gutter.x_has-border .column {
  width: 292px !important;
}
.ie .three-col.has-gutter.has-border .column,
[owa] .three-col.x_has-gutter.x_has-border .column,
.ie .has-gutter.has-border .narrow,
[owa] .has-gutter.x_has-border .narrow {
  width: 190px !important;
}
.ie .has-gutter.has-border .wide,
[owa] .has-gutter.x_has-border .wide {
  width: 396px !important;
}
.ie .fixed-width .layout__inner {
  border-left: 0 none white !important;
  border-right: 0 none white !important;
}
.ie .layout__edges {
  display: none;
}
.mso .layout__edges {
  font-size: 0;
}
.layout-fixed-width,
.mso .layout-full-width {
  background-color: #ffffff;
}
@media only screen and (min-width: 620px) {
  .column,
  .gutter {
    display: table-cell;
    Float: none !important;
    vertical-align: top;
  }
  .preheader,
  .email-footer {
    width: 560px !important;
  }
  .snippet,
  .webversion {
    width: 280px !important;
  }
  .header,
  .layout,
  .one-col .column {
    width: 600px !important;
  }
  .fixed-width.has-border,
  .fixed-width.ecxhas-border,
  .has-gutter.has-border,
  .has-gutter.ecxhas-border {
    width: 602px !important;
  }
  .two-col .column {
    width: 300px !important;
  }
  .three-col .column,
  .column.narrow {
    width: 200px !important;
  }
  .column.wide {
    width: 400px !important;
  }
  .two-col.has-gutter .column,
  .two-col.ecxhas-gutter .column {
    width: 290px !important;
  }
  .three-col.has-gutter .column,
  .three-col.ecxhas-gutter .column,
  .has-gutter .narrow {
    width: 188px !important;
  }
  .has-gutter .wide {
    width: 394px !important;
  }
  .two-col.has-gutter.has-border .column,
  .two-col.ecxhas-gutter.ecxhas-border .column {
    width: 292px !important;
  }
  .three-col.has-gutter.has-border .column,
  .three-col.ecxhas-gutter.ecxhas-border .column,
  .has-gutter.has-border .narrow,
  .has-gutter.ecxhas-border .narrow {
    width: 190px !important;
  }
  .has-gutter.has-border .wide,
  .has-gutter.ecxhas-border .wide {
    width: 396px !important;
  }
}
@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
  .fblike {
    background-image: url(https://i3.createsend1.com/static/eb/master/13-the-blueprint-3/images/fblike@2x.png) !important;
  }
  .tweet {
    background-image: url(https://i4.createsend1.com/static/eb/master/13-the-blueprint-3/images/tweet@2x.png) !important;
  }
  .linkedinshare {
    background-image: url(https://i5.createsend1.com/static/eb/master/13-the-blueprint-3/images/lishare@2x.png) !important;
  }
  .forwardtoafriend {
    background-image: url(https://i6.createsend1.com/static/eb/master/13-the-blueprint-3/images/forward@2x.png) !important;
  }
}
@media (max-width: 321px) {
  .fixed-width.has-border .layout__inner {
    border-width: 1px 0 !important;
  }
  .layout,
  .column {
    min-width: 320px !important;
    width: 320px !important;
  }
  .border {
    display: none;
  }
}
.mso div {
  border: 0 none white !important;
}
.mso .w560 .divider {
  Margin-left: 260px !important;
  Margin-right: 260px !important;
}
.mso .w360 .divider {
  Margin-left: 160px !important;
  Margin-right: 160px !important;
}
.mso .w260 .divider {
  Margin-left: 110px !important;
  Margin-right: 110px !important;
}
.mso .w160 .divider {
  Margin-left: 60px !important;
  Margin-right: 60px !important;
}
.mso .w354 .divider {
  Margin-left: 157px !important;
  Margin-right: 157px !important;
}
.mso .w250 .divider {
  Margin-left: 105px !important;
  Margin-right: 105px !important;
}
.mso .w148 .divider {
  Margin-left: 54px !important;
  Margin-right: 54px !important;
}
.mso .font-avenir,
.mso .font-cabin,
.mso .font-open-sans,
.mso .font-ubuntu {
  font-family: sans-serif !important;
}
.mso .font-bitter,
.mso .font-merriweather,
.mso .font-pt-serif {
  font-family: Georgia, serif !important;
}
.mso .font-lato,
.mso .font-roboto {
  font-family: Tahoma, sans-serif !important;
}
.mso .font-pt-sans {
  font-family: "Trebuchet MS", sans-serif !important;
}
.mso .footer__share-button p {
  margin: 0;
}
@media only screen and (min-width: 620px) {
  .wrapper .size-8 {
    font-size: 8px !important;
    line-height: 14px !important;
  }
  .wrapper .size-9 {
    font-size: 9px !important;
    line-height: 16px !important;
  }
  .wrapper .size-10 {
    font-size: 10px !important;
    line-height: 18px !important;
  }
  .wrapper .size-11 {
    font-size: 11px !important;
    line-height: 19px !important;
  }
  .wrapper .size-12 {
    font-size: 12px !important;
    line-height: 19px !important;
  }
  .wrapper .size-13 {
    font-size: 13px !important;
    line-height: 21px !important;
  }
  .wrapper .size-14 {
    font-size: 14px !important;
    line-height: 21px !important;
  }
  .wrapper .size-15 {
    font-size: 15px !important;
    line-height: 23px !important;
  }
  .wrapper .size-16 {
    font-size: 16px !important;
    line-height: 24px !important;
  }
  .wrapper .size-17 {
    font-size: 17px !important;
    line-height: 26px !important;
  }
  .wrapper .size-18 {
    font-size: 18px !important;
    line-height: 26px !important;
  }
  .wrapper .size-20 {
    font-size: 20px !important;
    line-height: 28px !important;
  }
  .wrapper .size-22 {
    font-size: 22px !important;
    line-height: 31px !important;
  }
  .wrapper .size-24 {
    font-size: 24px !important;
    line-height: 32px !important;
  }
  .wrapper .size-26 {
    font-size: 26px !important;
    line-height: 34px !important;
  }
  .wrapper .size-28 {
    font-size: 28px !important;
    line-height: 36px !important;
  }
  .wrapper .size-30 {
    font-size: 30px !important;
    line-height: 38px !important;
  }
  .wrapper .size-32 {
    font-size: 32px !important;
    line-height: 40px !important;
  }
  .wrapper .size-34 {
    font-size: 34px !important;
    line-height: 43px !important;
  }
  .wrapper .size-36 {
    font-size: 36px !important;
    line-height: 43px !important;
  }
  .wrapper .size-40 {
    font-size: 40px !important;
    line-height: 47px !important;
  }
  .wrapper .size-44 {
    font-size: 44px !important;
    line-height: 50px !important;
  }
  .wrapper .size-48 {
    font-size: 48px !important;
    line-height: 54px !important;
  }
  .wrapper .size-56 {
    font-size: 56px !important;
    line-height: 60px !important;
  }
  .wrapper .size-64 {
    font-size: 64px !important;
    line-height: 63px !important;
  }
}
.mso .size-8,
.ie .size-8 {
  font-size: 8px !important;
  line-height: 14px !important;
}
.mso .size-9,
.ie .size-9 {
  font-size: 9px !important;
  line-height: 16px !important;
}
.mso .size-10,
.ie .size-10 {
  font-size: 10px !important;
  line-height: 18px !important;
}
.mso .size-11,
.ie .size-11 {
  font-size: 11px !important;
  line-height: 19px !important;
}
.mso .size-12,
.ie .size-12 {
  font-size: 12px !important;
  line-height: 19px !important;
}
.mso .size-13,
.ie .size-13 {
  font-size: 13px !important;
  line-height: 21px !important;
}
.mso .size-14,
.ie .size-14 {
  font-size: 14px !important;
  line-height: 21px !important;
}
.mso .size-15,
.ie .size-15 {
  font-size: 15px !important;
  line-height: 23px !important;
}
.mso .size-16,
.ie .size-16 {
  font-size: 16px !important;
  line-height: 24px !important;
}
.mso .size-17,
.ie .size-17 {
  font-size: 17px !important;
  line-height: 26px !important;
}
.mso .size-18,
.ie .size-18 {
  font-size: 18px !important;
  line-height: 26px !important;
}
.mso .size-20,
.ie .size-20 {
  font-size: 20px !important;
  line-height: 28px !important;
}
.mso .size-22,
.ie .size-22 {
  font-size: 22px !important;
  line-height: 31px !important;
}
.mso .size-24,
.ie .size-24 {
  font-size: 24px !important;
  line-height: 32px !important;
}
.mso .size-26,
.ie .size-26 {
  font-size: 26px !important;
  line-height: 34px !important;
}
.mso .size-28,
.ie .size-28 {
  font-size: 28px !important;
  line-height: 36px !important;
}
.mso .size-30,
.ie .size-30 {
  font-size: 30px !important;
  line-height: 38px !important;
}
.mso .size-32,
.ie .size-32 {
  font-size: 32px !important;
  line-height: 40px !important;
}
.mso .size-34,
.ie .size-34 {
  font-size: 34px !important;
  line-height: 43px !important;
}
.mso .size-36,
.ie .size-36 {
  font-size: 36px !important;
  line-height: 43px !important;
}
.mso .size-40,
.ie .size-40 {
  font-size: 40px !important;
  line-height: 47px !important;
}
.mso .size-44,
.ie .size-44 {
  font-size: 44px !important;
  line-height: 50px !important;
}
.mso .size-48,
.ie .size-48 {
  font-size: 48px !important;
  line-height: 54px !important;
}
.mso .size-56,
.ie .size-56 {
  font-size: 56px !important;
  line-height: 60px !important;
}
.mso .size-64,
.ie .size-64 {
  font-size: 64px !important;
  line-height: 63px !important;
}
.footer__share-button p {
  margin: 0;
}
</style>
    
    <title></title>
  <!--[if !mso]><!--><style type="text/css">
@import url(https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Ubuntu:400,700,400italic,700italic);
</style><link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Ubuntu:400,700,400italic,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
body{background-color:#ededf1}.mso h1{}.mso h1{font-family:sans-serif !important}.mso h2{}.mso h2{font-family:sans-serif !important}.mso h3{}.mso .column,.mso .column__background td{}.mso .column,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:sans-serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #b4b4c4;border-bottom:1px solid #b4b4c4}.mso .layout-has-bottom-border{border-bottom:1px solid #b4b4c4}.mso .border,.ie .border{background-color:#b4b4c4}@media only screen and (min-width: 
620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
</style><meta name="robots" content="noindex,nofollow" />
<meta property="og:title" content="My First Campaign" />
</head>
<!--[if mso]>
  <body class="mso">
<![endif]-->
<!--[if !mso]><!-->
  <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
<!--<![endif]-->
    <div class="wrapper" style="min-width: 320px;background-color: #ededf1;" lang="x-wrapper">
      <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 173040px);">
        <div style="border-collapse: collapse;display: table;width: 100%;">
        <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
          <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #7c7e7f;font-family: Ubuntu,sans-serif;">
            
          </div>
        <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
          <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #7c7e7f;font-family: Ubuntu,sans-serif;">
            
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
      <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);" id="emb-email-header-container">
      <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
        <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
          <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 134px;" src="<?php echo base_url() ?>images/bidstates-sleek.png" alt="" width="134" /></div>
        </div>
      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
      </div>
      <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;" emb-background-style>
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
          <div class="column" style='text-align: left;color: #7c7e7f;font-size: 14px;line-height: 21px;font-family: "PT Serif",Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);'>
        
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;">
      <div style="line-height:10px;font-size:1px">&nbsp;</div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <h3 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #788991;font-size: 16px;line-height: 24px;text-align: center;">Welcome to BidStates</h3><h1 style="Margin-top: 12px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 22px;line-height: 31px;font-family: Ubuntu,sans-serif;text-align: center;">Welcome to BidStates&nbsp;</h1><p class="size-16" style="Margin-top: 20px;Margin-bottom: 20px;font-size: 16px;line-height: 24px;" lang="x-size-16"><span>Hi <?php echo $name; ?>, we've received your request to create an account at BidStates.com.</span></p>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div class="divider" style="display: block;font-size: 2px;line-height: 2px;Margin-left: auto;Margin-right: auto;width: 40px;background-color: #b4b4c4;Margin-bottom: 20px;">&nbsp;</div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="line-height:5px;font-size:1px">&nbsp;</div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <h2 style="Margin-top: 0;Margin-bottom: 16px;font-style: normal;font-weight: normal;color: #3e4751;font-size: 17px;line-height: 24px;font-family: Ubuntu,sans-serif;"><strong style="font-size:16px">BidStates is the community where contractors and subcontractors get found.&nbsp;</strong><font size="3"><strong>Complete your registration by clicking the link below</strong></font></h2>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div class="btn btn--flat btn--large" style="Margin-bottom: 20px;text-align: center;">
        <![if !mso]><a style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #4eaacc;font-family: 'PT Serif', Georgia, serif;" href="<? echo $activation_link ?>">CONFIRM EMAIL</a><![endif]>
      <!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://test.com" style="width:163px" arcsize="9%" fillcolor="#4EAACC" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,11px,0px,11px"><center style="font-size:14px;line-height:24px;color:#FFFFFF;font-family:Georgia,serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">CONFIRM EMAIL</center></v:textbox></v:roundrect><![endif]--></div>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <p style="Margin-top: 0;Margin-bottom: 0;">Having trouble, you can also paste this link into your browser: <? echo $activation_link ?></p><p style="Margin-top: 20px;Margin-bottom: 0;">I look forward to seeing your profile and extend&nbsp;a warm welcome to you on our platform.</p><p style="Margin-top: 20px;Margin-bottom: 20px;"><br />
Wesley Long, CEO of BidStates</p>
    </div>
        
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
        <div style="font-size: 12px;font-style: normal;font-weight: normal;" align="left">
          <img style="border: 0;display: block;height: auto;width: 100%;max-width: 160px;" src="<?php echo base_url() ?>images/signature4cropped.png" alt="" width="160" />
        </div>
      </div>
        
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
  
      <div style="line-height:20px;font-size:20px;">&nbsp;</div>
  
      <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
          <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
              
              <div>
                <div>This email was sent to <?php echo $name; ?> at <?php echo $email; ?>.</div>
              </div>
              <div style="Margin-top: 18px;">
                <div>You are receiving this email because someone (hopefully you!) used your email address to sign up for BidStates&#8212;the place for contractors and subcontractors. If this wasn't you, safely disregard &nbsp;this email.</div>
              </div>
            </div>
          </div>
        <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
          <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
              
            </div>
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
      <div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 600px;" class="w560"><![endif]-->
          <div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);">
            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
              <div>
                <unsubscribe style="text-decoration: underline;">Unsubscribe</unsubscribe>
              </div>
            </div>
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
      <div style="line-height:40px;font-size:40px;">&nbsp;</div>
    
  </div>
</body></html>

		
        <?php $email_html = ob_get_clean();	
        return $email_html;
	
	}
	
	function activate_account_template_old($name=NULL, $activation_code=NULL)
	{
		$activation_link=base_url()."login/activate/".$activation_code;
		$email_html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;" >
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bidstates. Please activate your account.</title>
</head>
<body bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;">
<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;">
  <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;" ></td>
    <td class="container" bgcolor="#FFFFFF" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;"><!-- content -->
      
      <div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
        <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
          <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <td align="center" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><h1 style="font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Hello '.$name.',</h1>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 20px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">We have received your request to create an account on BidStates. To finish signing up, click the link below.</p>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;"><a href="'.$activation_link.'" class="btn-primary" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 2; color: #FFF; text-decoration: none; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 25px; background: #348eda; margin: 0 10px 0 0; padding: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;">Activate my Account</a></p>
              <h2 style="font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 28px; line-height: 1.2; color: #000; font-weight: 200; margin: 40px 0 10px; padding: 0;">Finish Sign-Up</h2>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Alternatively, you can also copy and paste the following link into your browser.</p>
              <br>
              <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
                <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
                  <td class="padding" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 10px 0;">
                  <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0; text-align:center;"><a href="#" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #348eda; margin: 0; padding: 0;">'.$activation_link.'</a></p>
             
                  </td>
                </tr>
               </table>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Thank you for using Bidstates.</p>
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
              <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #348eda; margin: 0; padding: 0;">You are receiving this email because you signed up at <b>'.base_url().'</b> If you did not make this action, then you can safely ignore this email.</p>
              </p>
              </p>
              </p></td>
          </tr>
        </table>
      </div>
      
      <!-- /content --></td>
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
  </tr>
</table>
<!-- /body --><!-- footer -->
<table class="footer-wrap" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;">
  <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
    <td class="container" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;"><!-- content -->
      
      <div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;">
        <table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;">
          <tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
            <td align="center" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #666; font-weight: normal; margin: 0 0 10px; padding: 0;">Emails from Bidstates will always contain your full name and email address. <a href="#" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; color: #999; margin: 0; padding: 0;">
                <unsubscribe style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">Find out why</unsubscribe>
                </a>.
              
              <address>
              <b>Bidstates</b><br>
              support@bidstates.com | Are you listed? <br>
              </address>
              </p></td>
          </tr>
        </table>
      </div>
      
      <!-- /content --></td>
    <td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td>
  </tr>
</table>
<!-- /footer -->
</body>
</html>';	

return $email_html;
	
	}
}

