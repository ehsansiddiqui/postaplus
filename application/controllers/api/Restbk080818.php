<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Shijin
 * @license         MIT
 */
class Rest extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->helper(array('form', 'url'));
        $this->load->model('rest_m', 'Obj_Rest_M', TRUE);
        $this->load->database();
        date_default_timezone_set('Asia/Kuwait');
    }
    
    
    
    private function escapeString($val){
        
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    
    
     private function uploads($userfile){

                   $this->load->helper(array('image_helper'));    
                    $config = array(
                        'upload_path' => './user/',
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,'encrypt_name' =>TRUE);
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload($userfile)){      
                        $upload_data = $this->upload->data();
                        return $upload_data ;
                    } else { 
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message1','invalid image');
                        redirect('driver');
                  }      
        }
        
        
        public function uploads_post($userfile){
            
                $this->load->helper(array('image_helper'));    
                    $config = array(
                        'upload_path' => './user_post/',
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,'encrypt_name' =>TRUE);
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload($userfile)){      
                        $upload_data = $this->upload->data();
                        return $upload_data ;
                    } else { 
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message1','invalid image');
                        redirect('driver');
                  } 
            
            
        }

        
        public function SignIn_post(){

        if (isset($_REQUEST['phone_number'])&& !empty($_REQUEST['phone_number']) && isset($_REQUEST['password'])&&!empty($_REQUEST['password'])){


            $phone_number = $_REQUEST['phone_number'];
            $password = $_REQUEST['password'];

            $result = $this->Obj_Rest_M->check_user($phone_number,$password);

            if (!empty($result)){

                $message = [
                    'status' => TRUE,
                    'user_id' => $result->user_id,
                    'phone_number' => $result->phone_number,
                    'first_name' => $result->first_name,
                    'last_name' => $result->last_name,
                    'profile_image' => $result->profile_image,
                    'email_id' => $result->email_id,
                    'country' => $result->country,
                    'gender' => $result->gender,
                    'designation' => $result->designation,
                    'address' => $result->address,
                    'hef_member_status' => $result->hef_member_status   
                ];

                $this->Obj_Rest_M->user_updated($result->user_id);
                $this->set_response($message, REST_Controller::HTTP_OK);
                
            } else {

                $message = [
                    'status' => FALSE,
                    'message' => 'Sorry, could not match that mobile number & password.'
                ];
                $this->set_response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        } else {

            $message = [
                'status' => FALSE,
                'message' => 'Invalid Parameters'
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    
    
    public function SignUp_post() {

        if (isset($_REQUEST['phone_number'])&&!empty($_REQUEST['phone_number']) && isset($_REQUEST['password'])&&!empty($_REQUEST['password']) && isset($_REQUEST['first_name'])&&!empty($_REQUEST['first_name'])&&isset($_REQUEST['last_name'])&&!empty($_REQUEST['last_name']) && isset($_REQUEST['email_id'])&&!empty($_REQUEST['email_id']) && isset($_REQUEST['country'])&&!empty($_REQUEST['country']) && isset($_REQUEST['designation'])&&!empty($_REQUEST['designation']) && isset($_REQUEST['address'])&&!empty($_REQUEST['address']) && isset($_REQUEST['hef_member_status'])){


            $phone_number = $this->escapeString($this->input->post('phone_number'));
            $password = $this->escapeString($this->input->post('password'));
            $first_name = $this->escapeString($this->input->post('first_name'));
            $last_name = $this->escapeString($this->input->post('last_name'));
            $email_id = $this->escapeString($this->input->post('email_id'));
            $country = $this->escapeString($this->input->post('country'));
            $gender = $this->escapeString($this->input->post('gender'));
            $designation = $this->escapeString($this->input->post('designation'));
            $address = $this->escapeString($this->input->post('address'));
            $hef_member_status = $this->escapeString($this->input->post('hef_member_status'));
            $created_date = date('Y-m-d H:i:s', time());
            
            
            $res = $this->Obj_Rest_M->users_check($phone_number);

            if (!empty($res)) {

                $message = [
                    'status' => FALSE,
                    'message' => 'Already exists'
                ];
                $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
            } else {

                $data = array('phone_number' => $phone_number, 'password' => $password, 'first_name' => $first_name, 'last_name' => $last_name, 'email_id' =>$email_id,'country'=>$country,'gender'=>$gender,'designation'=>$designation,'address'=>$address,'hef_member_status'=>$hef_member_status,'created_date'=>$created_date,'modified_date'=>$created_date);

                $user_id = $this->Obj_Rest_M->add_user($data);
                
                
                  if (!empty($_FILES['userfile']['name'])){
                      
                        $userfile = 'userfile';
                        $upload_data = $this->uploads($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('profile_image' => $file_name);
                        $this->db->where('user_id', $user_id);
                        $this->db->update('user', $data1);
                   }
                
                
                

                if (!empty($user_id)){

                    $message = [
                        'status' => TRUE,
                        'user_id' => $user_id
                    ];

                    $this->set_response($message, REST_Controller::HTTP_CREATED);
                }
            }
        } else {

            $message = [
                'status' => FALSE,
                'message' => 'Invalid Parameters'
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    
    
    public function EditProfile_post() {

        if (isset($_REQUEST['user_id'])&&!empty($_REQUEST['user_id']) && isset($_REQUEST['password'])&&!empty($_REQUEST['password']) && isset($_REQUEST['first_name'])&&!empty($_REQUEST['first_name'])&&isset($_REQUEST['last_name'])&&!empty($_REQUEST['last_name']) && isset($_REQUEST['email_id'])&&!empty($_REQUEST['email_id']) && isset($_REQUEST['country'])&&!empty($_REQUEST['country']) && isset($_REQUEST['designation'])&&!empty($_REQUEST['designation']) && isset($_REQUEST['address'])&&!empty($_REQUEST['address']) && isset($_REQUEST['hef_member_status'])){


            $user_id = $this->escapeString($this->input->post('user_id'));
            $password = $this->escapeString($this->input->post('password'));
            $first_name = $this->escapeString($this->input->post('first_name'));
            $last_name = $this->escapeString($this->input->post('last_name'));
            $email_id = $this->escapeString($this->input->post('email_id'));
            $country = $this->escapeString($this->input->post('country'));
            $gender = $this->escapeString($this->input->post('gender'));
            $designation = $this->escapeString($this->input->post('designation'));
            $address = $this->escapeString($this->input->post('address'));
            $hef_member_status = $this->escapeString($this->input->post('hef_member_status'));
            $created_date = date('Y-m-d H:i:s', time());


         
            $data = array('phone_number' => $phone_number, 'password' => $password, 'first_name' => $first_name, 'last_name' => $last_name, 'email_id' =>$email_id,'country'=>$country,'gender'=>$gender,'designation'=>$designation,'address'=>$address,'hef_member_status'=>$hef_member_status,'modified_date'=>$created_date);

                $user_id = $this->Obj_Rest_M->edit_user($data,$user_id);
                
                
                  if (!empty($_FILES['userfile']['name'])){
                      
                        $userfile = 'userfile';
                        $upload_data = $this->uploads($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('profile_image' => $file_name);
                        $this->db->where('user_id', $user_id);
                        $this->db->update('user', $data1);
                   }
                
                
                

                if (!empty($user_id)){

                    $message = [
                        'status' => TRUE,
                        'user_id' => $user_id
                    ];

                    $this->set_response($message, REST_Controller::HTTP_CREATED);
                }
            
        } else {

            $message = [
                'status' => FALSE,
                'message' => 'Invalid Parameters'
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    
    
    

    public function UserList_get($id = NULL) {


        $user_id = $this->get('user_id');

        if (isset($user_id)){

            $result = $this->Obj_Rest_M->get_users();


            // If the id parameter doesn't exist return all the users


            if ($id === NULL) {

                if ($result) {
                    // Set the response and exit    

                    $this->response([
                        'status' => TRUE,
                        'data' => $result
                            ], REST_Controller::HTTP_OK);
                } else {
                    // Set the response and exit
                    $this->response([
                        'status' => FALSE,
                        'message' => 'No records found'
                            ], REST_Controller::HTTP_NOT_FOUND);
                }
            }

            $id = (int) $id;

            if ($id <= 0) {
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            }

            $response = NULL;
            if (!empty($result)) {


                foreach ($result as $key => $value) {
                    if (isset($value->user_id) && $value->user_id == $id) {
                        $response = $value;
                    }
                }
            }

            if (!empty($response)) {

                $this->set_response([
                    'status' => TRUE,
                    'data' => $response
                        ], REST_Controller::HTTP_OK);
            } else {
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'could not be found'
                        ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {


            $message = [
                'status' => FALSE,
                'message' => 'Invalid Parameters'
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function advertisement_get() {

        $user_id = $this->get('user_id');


        if (isset($user_id) && !empty($user_id)) {

            $result = $this->Obj_Rest_M->get_advertisement();

            if ($result) {
                // Set the response and exit    

                $this->response([
                    'status' => TRUE,
                    'data' => $result
                        ], REST_Controller::HTTP_OK);
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No records found'
                        ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $message = [
                'status' => FALSE,
                'message' => 'Invalid Parameters'
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
    
    public function AddPost_post(){

        if (isset($_REQUEST['user_id'])&&!empty($_REQUEST['user_id'])&&isset($_REQUEST['title'])&&!empty($_REQUEST['title']) && isset($_REQUEST['category'])&&!empty($_REQUEST['category']) && isset($_REQUEST['discription'])){


            $user_id = $this->escapeString($this->input->post('user_id'));
            $title = $this->escapeString($this->input->post('title'));
            $category = $this->escapeString($this->input->post('category'));
            $discription = $this->escapeString($this->input->post('discription'));
            $created_date = date('Y-m-d H:i:s', time());


         
            $data = array('user_id'=>$user_id, 'title' =>$title, 'category' => $category, 'discription' => $discription, 'created_date'=>$created_date);

                $user_posts_id = $this->Obj_Rest_M->add_posts($data);
                
                
                  if (!empty($_FILES['userfile']['name'])){
                      
                        $userfile = 'userfile';
                        $upload_data = $this->uploads_post($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('image' => $file_name);
                        $this->db->where('user_posts_id', $user_posts_id);
                        $this->db->update('user_posts', $data1);
                   }
                
                
                

                if (!empty($user_posts_id)){

                    $message = [
                        'status' => TRUE,
                        'user_posts_id' => $user_posts_id
                    ];

                    $this->set_response($message, REST_Controller::HTTP_CREATED);
                }
            
        } else {

            $message = [
                'status' => FALSE,
                'message' => 'Invalid Parameters'
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    
  
    public function UserPosts_get() {

        $user_id = $this->get('user_id');


        if (isset($user_id) && !empty($user_id)) {

            $result = $this->Obj_Rest_M->get_user_post();

            if ($result) {
                // Set the response and exit    

                $this->response([
                    'status' => TRUE,
                    'data' => $result
                        ], REST_Controller::HTTP_OK);
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No records found'
                        ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $message = [
                'status' => FALSE,
                'message' => 'Invalid Parameters'
            ];
            $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    
}?>