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

    

    private function sendPushNotification($registration_ids='', $message='', $device_type='', $notification_type=''){

        $fields = array();
        $url = 'https://fcm.googleapis.com/fcm/send';

        if ($device_type == 'android') {
            
            
            if (!defined('GOOGLE_API_KEYs')) define('GOOGLE_API_KEYs', 'AIzaSyDcugxHQ7on_IMy0Q63YcBFrECmIXL7Wpg');
            $fields = array('to' => $registration_ids,
                'priority' => 'high', 
                'notification' => array(
                    'notification_type' => $notification_type,'title'=>'business bandhu',
                    'body'=>$message
                )
            );
        }
        
        if ($device_type == 'ios') {

             if (!defined('GOOGLE_API_KEYs')) define('GOOGLE_API_KEYs','AIzaSyDcugxHQ7on_IMy0Q63YcBFrECmIXL7Wpg');

            $fields = array('to' => $registration_ids, 'content_available' => true, 'priority' => 'high', 'notification' => array('body' => $message, 'title' => 'business bandhu'), 'data' => array('notification_type' => $notification_type));
        }
        
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEYs,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        
       // print_r($result);die;
        
        return $result;
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



        if (isset($_REQUEST['phone_number'])&& !empty($_REQUEST['phone_number']) && isset($_REQUEST['password'])&&!empty($_REQUEST['password'])&&isset($_REQUEST['device_id'])&&!empty($_REQUEST['device_id'])&&isset($_REQUEST['device_type'])&&!empty($_REQUEST['device_type'])){


            $phone_number = $_REQUEST['phone_number'];
            $password = $_REQUEST['password'];
            $device_id = $_REQUEST['device_id']; 
            $device_type = $_REQUEST['device_type'];

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
                    
                    'state' => $result->state,
                    
                    'category' => $result->category,

                    'hef_member_status' => $result->hef_member_status,
                    
                    'website' => $result->website,
                    
                    'company' => $result->company,
                    
                    'chapter_id' => $result->chapter_id

                ];



                $this->Obj_Rest_M->user_updated($device_id,$device_type,$result->user_id);

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



        if (isset($_REQUEST['phone_number'])&&!empty($_REQUEST['phone_number']) && isset($_REQUEST['password'])&&!empty($_REQUEST['password']) && isset($_REQUEST['first_name'])&&!empty($_REQUEST['first_name'])&&isset($_REQUEST['last_name'])&&!empty($_REQUEST['last_name']) && isset($_REQUEST['email_id'])&&!empty($_REQUEST['email_id']) && isset($_REQUEST['country'])&&!empty($_REQUEST['country']) && isset($_REQUEST['designation'])&&!empty($_REQUEST['designation']) && isset($_REQUEST['state'])&&!empty($_REQUEST['state']) && isset($_REQUEST['category'])&&!empty($_REQUEST['category']) && isset($_REQUEST['hef_member_status'])&&isset($_REQUEST['device_id'])&&isset($_REQUEST['device_type'])){





            $phone_number = $this->escapeString($this->input->post('phone_number'));

            $password = $this->escapeString($this->input->post('password'));

            $first_name = $this->escapeString($this->input->post('first_name'));

            $last_name = $this->escapeString($this->input->post('last_name'));

            $email_id = $this->escapeString($this->input->post('email_id'));

            $country = $this->escapeString($this->input->post('country'));

            $gender = $this->escapeString($this->input->post('gender'));

            $designation = $this->escapeString($this->input->post('designation'));

            $state = $this->escapeString($this->input->post('state'));
            
            $category = $this->escapeString($this->input->post('category'));

            $hef_member_status = $this->escapeString($this->input->post('hef_member_status'));

            $chapter_id = NULL;

            if(isset($_REQUEST['chapter_id'])){  

               $chapter_id = $this->input->post('chapter_id');  

             }

            $device_id =   $this->input->post('device_id');
            $device_type = $this->input->post('device_type');
            $created_date = date('Y-m-d H:i:s', time());

            

            

            $res = $this->Obj_Rest_M->users_check($phone_number);



            if (!empty($res)) {



                $message = [

                    'status' => FALSE,

                    'message' => 'Already exists'

                ];

                $this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);

            } else {



                $data = array('phone_number' => $phone_number, 'password' => $password, 'first_name' => $first_name, 'last_name' => $last_name, 'email_id' =>$email_id,'country'=>$country,'state'=>$state,'gender'=>$gender,'designation'=>$designation,'category'=>$category,'hef_member_status'=>$hef_member_status,'chapter_id'=>$chapter_id,'device_id'=>$device_id,'device_type'=>$device_type,'created_date'=>$created_date,'modified_date'=>$created_date);



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



        if (isset($_REQUEST['user_id'])&&!empty($_REQUEST['user_id'])&&isset($_REQUEST['phone_number'])&&!empty($_REQUEST['phone_number']) && isset($_REQUEST['password'])&&!empty($_REQUEST['password']) && isset($_REQUEST['first_name'])&&!empty($_REQUEST['first_name'])&&isset($_REQUEST['last_name'])&&!empty($_REQUEST['last_name']) && isset($_REQUEST['email_id'])&&!empty($_REQUEST['email_id']) && isset($_REQUEST['country'])&&!empty($_REQUEST['country']) && isset($_REQUEST['designation'])&&!empty($_REQUEST['designation']) && isset($_REQUEST['address'])&&!empty($_REQUEST['address']) && isset($_REQUEST['hef_member_status'])&& isset($_REQUEST['website'])&& isset($_REQUEST['company'])&& isset($_REQUEST['state'])&& isset($_REQUEST['category'])){





            $user_id = $this->escapeString($this->input->post('user_id'));

            $phone_number = $this->escapeString($this->input->post('phone_number'));
            
            $password = $this->escapeString($this->input->post('password'));

            $first_name = $this->escapeString($this->input->post('first_name'));

            $last_name = $this->escapeString($this->input->post('last_name'));

            $email_id = $this->escapeString($this->input->post('email_id'));

            $country = $this->escapeString($this->input->post('country'));

            $gender = $this->escapeString($this->input->post('gender'));

            $designation = $this->escapeString($this->input->post('designation'));

            $address = $this->escapeString($this->input->post('address'));
            
            $state = $this->escapeString($this->input->post('state'));
            
            $category = $this->escapeString($this->input->post('category'));

            $hef_member_status = $this->escapeString($this->input->post('hef_member_status'));

            $website = $this->escapeString($this->input->post('website'));

            $company = $this->escapeString($this->input->post('company')); 

            $chapter_id = NULL;

            

            if(isset($_REQUEST['chapter_id'])){  

               $chapter_id = $this->input->post('chapter_id');  

             }

             $created_date = date('Y-m-d H:i:s', time());





         

            $data = array('phone_number' => $phone_number, 'password' => $password, 'first_name' => $first_name, 'last_name' => $last_name, 'email_id' =>$email_id,'country'=>$country,'state'=>$state,'gender'=>$gender,'designation'=>$designation,'address'=>$address,'category'=>$category,'hef_member_status'=>$hef_member_status,'chapter_id'=>$chapter_id,'website'=>$website,'company'=>$company,'modified_date'=>$created_date);



                $user_id = $this->Obj_Rest_M->edit_user($data,$user_id);

                

                  $file_name = NULL; 

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

                        'user_id' => $user_id,
                        
                        'file_name'=>$file_name

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
                    
                 $user_result = $this->Obj_Rest_M->get_user_divice_id($user_id);
                 $notification_type = 1;   
                 if(!empty($user_result)){    
                     foreach ($user_result as $row){      
                         $this->sendPushNotification($row->device_id,$title,$row->device_type,$notification_type);       
                     }   
                 }
                 

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

    

    

    

    

    

   public function chapter_get(){



        $user_id = $this->get('user_id');



        if (isset($user_id) && !empty($user_id)){



            $result = $this->Obj_Rest_M->get_chapter();



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

    

    public function articles_get() {
        

        $user_id = $this->get('user_id');


        if (isset($user_id) && !empty($user_id)) {



            $result = $this->Obj_Rest_M->get_articles();



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
    
    
     public function message_get(){
        

        $user_id = $this->get('user_id');


        if (isset($user_id) && !empty($user_id)) {



            $result = $this->Obj_Rest_M->get_message();



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
    
    
        private function sendPushNotification_test($registration_ids, $message, $device_type, $notification_type){

        $fields = array();
        $url = 'https://fcm.googleapis.com/fcm/send';

        if ($device_type == 'android') {
            
            
             define('GOOGLE_API_KEY', 'AIzaSyDcugxHQ7on_IMy0Q63YcBFrECmIXL7Wpg');
            $fields = array('to' => $registration_ids,
                'priority' => 'high', 
                'notification' => array(
                    'notification_type' => $notification_type,'title'=>'businessbandhu',
                    'body'=>$message
                )
            );
        }
        

        
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        
   
        
        return $result;
    }
    
    
    
    public function Push_post(){
        
         $device_id = "ejWcXcKJHJI:APA91bHR2112p9R2CZsI84a5aAgsNkcN3pG_f_25u3OQHq93g8RnjlewINV3Nqg-55A237oKMP5j3DGxIYINAB25H2IB5XSnLO7Xn_nmzFW8qmEwHmEIdlqFpXLDO_hXe213ThsPkCFojP4r2t8LbHeKLqVsuzaWjw";
         
         $title = 'hai';
         $android = 'android';
         $notification_type = 1;
        echo   $this->sendPushNotification_test($device_id,$title,$android,$notification_type);
        
    }
   
}?>