<?php 

class Session{

	public $user_id;
	public $user_signed_in;

	public function __construct()
	{
		session_start();

		$this->check_login();

	}

   private function check_login()
   {
   	 if(isset($_SESSION['user_id']))
   	 {
   	 	$this->user_id = $_SESSION['user_id'];
   	 	$this->user_signed_in = true;
   	 }else{
   	 	$this->user_id = null;
   	 	$this->user_signed_in = false;
   	 }
   }
  
  public function is_singed_in()
  {
  	return $this->user_signed_in = true;
  } 

 public function login($user)
 {
 	if($user)
 	{
    $this->user_id = $_SESSION['user_id'] = $user->id;
    $this->user_signed_in = true;
    header("location:index.php");

   }else{
   	 $this->user_signed_in = false;
   }
 }

 public function logout()
 {
  	 unset($_SESSSION['user_id']);
  	 session_destroy();
  	 session_regenerate_id(true);

  	 header("location:login.php");
 }

}



 ?>