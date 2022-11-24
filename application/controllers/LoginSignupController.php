<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  

class LoginSignupController extends CI_Controller { 

  public function __construct() {
    parent::__construct(); 

     $this->load->library('session');
     $this->load->model('AuthModel');
     $this->load->library('form_validation');
     
 }


// -------- Index Page Redirect--------  //
public function index()
{
  if($this->session->userdata('token')){  
    redirect(base_url('dashboard'));      
  } 
  else{
    $this->load->view('login');
  }
}


//  -------  Registration Page  -------   //
public function registration()
{
  if($this->session->userdata('token')){  
  redirect(base_url('dashboard'));      
  } 
  else{
    $this->load->view('registration');
  }
}


//  -------  Dashboard Page Redirect-------   //
public function dashboard()
{
  $this->load->view('dashboard');
}


// -------- Edit Profile Page Redirect--------  //
public function editProfile()
{
  $this->load->view('editProfile');
}


// -------- Change Password Page Redirect--------  //
public function changePassword()
{
  $this->load->view('changePassword');
}


// -------- Logout Page Redirect--------  //
public function logout()
{
  $this->session->unset_userdata('token');
  $this->session->sess_destroy();
  if(($this->session->userdata('token'))!=""){  
    redirect(base_url('dashboard'));      
  } 
  else{ 
    redirect('');
  }
}



}
