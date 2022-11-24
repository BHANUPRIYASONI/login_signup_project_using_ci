<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class DashboardController extends REST_Controller
{

  public function __construct()
  {
    parent::__construct();


    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('AuthModel');
    $this->load->library('Authorization_Token');
    $this->load->helper('token');

  }


// -------- Name Validation Api --------  //
  public function nameValidationApi_post()
  {
    $data = array(
      'user_name' => $this->input->post('userName'),
    );
    
    $result =$this->AuthModel->userLogin($data);
    if($result==0)
    {
      $this->session->set_flashdata('errors', validation_errors());
      echo 'true';
    }
    else
    {
		  echo 'false';
	  }
  }


// -------- Email Validation Api --------  //
  public function emailValidationApi_post()
  {
    $data = array(
      'email' => $this->input->post('userEmail'),
    );
    $result =$this->AuthModel->userLogin($data);
    if($result==0)
    {
      $this->session->set_flashdata('errors', validation_errors());
      echo 'true';
    }
    else
    {
		  echo 'false';
	  }
  }
  

// -------- User Registration Api --------  //
  public function userRegisterApi_post()
  {
    $filename = $_FILES['userProfilePic']['name'];
    $file_tmp_name = $_FILES['userProfilePic']['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uniquename = md5(date('ymdHis')) . rand(11111, 99999);
    move_uploaded_file($file_tmp_name, "uploads/users/$uniquename.$ext");
    $image = "uploads/users/$uniquename.$ext";

    $data = array(
      'full_name' => $this->input->post('userFullName'),
      'user_name' => $this->input->post('userName'),
      'email' => $this->input->post('userEmail'),
      'city_name' => $this->input->post('userCity'),
      'state_name' => $this->input->post('userState'),
      'address' => $this->input->post('userAddress'),
      'password' => md5($this->input->post('userPassword')),
      'profile_picture' => $image,
      'gender' => $this->input->post('gender'),
    );

    $result = $this->AuthModel->insert_item('user_table', $data);
    if ($result) {
      $this->response(array("message" => "Registered Successfully"), REST_Controller::HTTP_OK);
    } else {
      $this->response(array("message" => "Not Registered"), REST_Controller::HTTP_BAD_REQUEST);
    }
  }


// -------- User Login Api --------  //
  public function userLoginApi_post()
  {
    $data = array(
      'email' => $this->input->post('userEmail'),
      'password' => md5($this->input->post('userPassword')),
    );
    $result = $this->AuthModel->userLogin($data);
    $tokenData['id'] =  $result['user_id'];
    $tokenData['email'] =  $result['email'];
    $tokenData['role'] =  'User';
    $encode = $this->authorization_token->generateToken($tokenData);  // Generate Encoded Token //
    $this->session->set_userdata('token', $encode);                  // Put Token into Session //
    if ($result) {
      $this->response(array("message" => "Logined Successfully"), REST_Controller::HTTP_OK);
    } else {
      $this->response(array("message" => "Not Logined"), REST_Controller::HTTP_BAD_REQUEST);
    }
  }


// -------- Get Profile Api --------  //
  public function getProfileApi_get()
  {
    $headers = $this->input->request_headers();
    $headers = verifiedToken($headers);       // Session Token Decoded //
    if ($headers) {
      $user_id = $headers['id'];
      $result = $this->AuthModel->getDatabyId($user_id);
      if ($result) {
        $this->response(array("message" => "Success", 'user' => $result), REST_Controller::HTTP_OK);
      } else {
        $this->response(array("message" => "Failed", 'user' => array()), REST_Controller::HTTP_BAD_REQUEST);
      }
    } else {
      $this->response(array("message" => 'Invalid Token'), REST_Controller::HTTP_BAD_REQUEST);
    }
  }

// -------- User Edit Profile Api --------  //
public function userEditProfileApi_post()
{
    $filename = $_FILES['userProfilePic']['name'];
    $file_tmp_name = $_FILES['userProfilePic']['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uniquename = md5(date('ymdHis')) . rand(11111, 99999);
    move_uploaded_file($file_tmp_name, "uploads/users/$uniquename.$ext");
    $image = "uploads/users/$uniquename.$ext";

    $data = array(
      'full_name' => $this->input->post('userFullName'),
      'user_name' => $this->input->post('userName'),
      'email' => $this->input->post('userEmail'),
      'city_name' => $this->input->post('userCity'),
      'state_name' => $this->input->post('userState'),
      'address' => $this->input->post('userAddress'),
      'profile_picture' => $image,
      'gender' => $this->input->post('gender'),
    );

    $headers = $this->input->request_headers();
    $headers = verifiedToken($headers);        // Session Token Decoded //
    $user_id = $headers['id'];
    $result = $this->AuthModel->update($user_id, $data);
    if ($result) {
      $this->response(array("message" => "Profile edited Successfully", "user" => $result), REST_Controller::HTTP_OK);
    } else {
      $this->response(array("message" => "Profile not edited" ,"user" => array()), REST_Controller::HTTP_BAD_REQUEST);
    }
}

// -------- Change Password Api --------  //
public function changePasswordApi_post()
{
  $headers = $this->input->request_headers();
  $headers = verifiedToken($headers);           // Session Token Decoded //
  $user_id = $headers['id'];
  $result = $this->AuthModel->getDatabyId($user_id);
  $password = $result['password'];
  $oldPassword = md5($this->input->post('oldPassword'));
    if(($oldPassword == $password))
    {
      $data = array(
        'password' => md5($this->input->post('confirmPassword')),
        );
        $result = $this->AuthModel->update($user_id, $data);
        if ($result) {
          $this->response(array("message" => "Password updated Successfully"), REST_Controller::HTTP_OK);
        } else {
          $this->response(array("message" => "error.Password is not updated"), REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    else{
      $this->response(array("message" => "Invalid old Password"), REST_Controller::HTTP_BAD_REQUEST);
    }   
}


}
