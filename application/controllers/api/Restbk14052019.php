<?phpdefined('BASEPATH') OR exit('No direct script access allowed');// This can be removed if you use __autoload() in config.php OR use Modular Extension/** @noinspection PhpIncludeInspection */require APPPATH . 'libraries/REST_Controller.php';/** * This is an example of a few basic user interaction methods you could use * all done with a hardcoded array * @package         CodeIgniter * @subpackage      Rest Server * @category        Controller * @author          Shijin * @license         MIT */class Rest extends REST_Controller{	function __construct()	{		// Construct the parent class		parent::__construct();		// Configure limits on our controller methods		// Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php		// $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key		// $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key		// $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key		$this->load->helper(array(			'form',			'url'		));		$this->load->model('rest_m', 'Obj_Rest_M', TRUE);		$this->load->database();		date_default_timezone_set('Asia/Kuwait');        }	private	function sendPushNotification($registration_ids = '', $message = '', $device_type = '', $notification_type = '')		{		$fields = array();		$url = 'https://fcm.googleapis.com/fcm/send';		if ($device_type == 'android')			{			if (!defined('GOOGLE_API_KEYs')) define('GOOGLE_API_KEYs', 'AIzaSyDcugxHQ7on_IMy0Q63YcBFrECmIXL7Wpg');			$fields = array(				'to' => $registration_ids,				'priority' => 'high',				'notification' => array(					'notification_type' => $notification_type,					'title' => 'business bandhu',					'body' => $message				)			);			}		if ($device_type == 'ios')			{			if (!defined('GOOGLE_API_KEYs')) define('GOOGLE_API_KEYs', 'AIzaSyDcugxHQ7on_IMy0Q63YcBFrECmIXL7Wpg');			$fields = array(				'to' => $registration_ids,				'content_available' => true,				'priority' => 'high',				'notification' => array(					'body' => $message,					'title' => 'business bandhu'				) ,				'data' => array(					'notification_type' => $notification_type				)			);			}		$headers = array(			'Authorization: key=' . GOOGLE_API_KEYs,			'Content-Type: application/json'		);		$ch = curl_init();		curl_setopt($ch, CURLOPT_URL, $url);		curl_setopt($ch, CURLOPT_POST, true);		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));		$result = curl_exec($ch);		if ($result === FALSE)			{			die('Curl failed: ' . curl_error($ch));			}		curl_close($ch);		// print_r($result);die;		return $result;		}	private	function escapeString($val)		{		$db = get_instance()->db->conn_id;		$val = mysqli_real_escape_string($db, $val);		return $val;		}	private	function uploads($userfile)		{		$this->load->helper(array(			'image_helper'		));		$config = array(			'upload_path' => './user/',			'allowed_types' => "gif|jpg|png|jpeg|pdf",			'overwrite' => TRUE,			'encrypt_name' => TRUE		);		$this->load->library('upload', $config);		if ($this->upload->do_upload($userfile))			{			$upload_data = $this->upload->data();			return $upload_data;			}		  else			{			$error = array(				'error' => $this->upload->display_errors()			);			$this->session->set_flashdata('message1', 'invalid image');			redirect('driver');			}		}	public	function uploads_post($userfile)		{		$this->load->helper(array(			'image_helper'		));		$config = array(			'upload_path' => './user_post/',			'allowed_types' => "gif|jpg|png|jpeg|pdf",			'overwrite' => TRUE,			'encrypt_name' => TRUE		);		$this->load->library('upload', $config);		if ($this->upload->do_upload($userfile))			{			$upload_data = $this->upload->data();			return $upload_data;			}		  else			{			$error = array(				'error' => $this->upload->display_errors()			);			$this->session->set_flashdata('message1', 'invalid image');			redirect('driver');			}		}	public	function SignIn_post()		{		if (isset($_REQUEST['phone_number']) && !empty($_REQUEST['phone_number']) && isset($_REQUEST['password']) && !empty($_REQUEST['password']) && isset($_REQUEST['fcm_token']) && !empty($_REQUEST['fcm_token']) && isset($_REQUEST['device_type']) && !empty($_REQUEST['device_type']))			{                    			$phone_number = $_REQUEST['phone_number'];			$password = $_REQUEST['password'];			$device_id = $_REQUEST['fcm_token'];			$device_type = $_REQUEST['device_type'];			$result = $this->Obj_Rest_M->check_user($phone_number, $password);			if (!empty($result))				{				$message = ['status' => TRUE, 'user_id' => $result->user_id, 'phone_number' => $result->phone_number, 'full_name' => $result->full_name, 'profile_image' => $result->image];				$this->Obj_Rest_M->user_updated($device_id, $device_type, $result->user_id);				$this->set_response($message, REST_Controller::HTTP_OK);				}			  else				{				$message = ['status' => FALSE, 'message' => 'Sorry, could not match that mobile number & password.'];				$this->set_response($message, REST_Controller::HTTP_NOT_FOUND);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}	public	function SignUp_post()		{		if (isset($_REQUEST['phone_number']) && !empty($_REQUEST['phone_number']) && isset($_REQUEST['password']) && !empty($_REQUEST['password']) && isset($_REQUEST['full_name']) && !empty($_REQUEST['full_name']) && isset($_REQUEST['fcm_token']) && isset($_REQUEST['device_type']) && isset($_REQUEST['email_id']))			                    {			$phone_number = $this->escapeString($this->input->post('phone_number')); 			$password =     $this->escapeString($this->input->post('password'));                              $email_id =     $this->escapeString($this->input->post('email_id'));			$full_name =    $this->escapeString($this->input->post('full_name'));			$device_id =    $this->input->post('fcm_token');			$device_type =  $this->input->post('device_type');			$created_date = date('Y-m-d H:i:s', time());			$res = $this->Obj_Rest_M->users_check($phone_number);			if (!empty($res))				{				$message = ['status' => FALSE, 'message' => 'Already exists'];				$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);				}			  else				{				$data = array(					'phone_number' => $phone_number,					'password' => $password,					'full_name' => $full_name,                                        'email_id'=>$email_id, 					'device_id' => $device_id,					'device_type' => $device_type,					'created_date' => $created_date,					'modified_date' => $created_date				);				$user_id = $this->Obj_Rest_M->add_user($data);				if (!empty($_FILES['userfile']['name']))					{					$userfile = 'userfile';					$upload_data = $this->uploads($userfile);					$file_name = $upload_data['file_name'];					$data1 = array(						'image' => $file_name					);					$this->db->where('user_id', $user_id);					$this->db->update('user', $data1);					}				if (!empty($user_id))					{					$message = ['status' => TRUE, 'user_id' => $user_id];					$this->set_response($message, REST_Controller::HTTP_CREATED);					}				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                                                                                        public	function profile_get()		{		$user_id = $this->get('user_id');		if (isset($user_id) && !empty($user_id))			{			$result = $this->Obj_Rest_M->get_profiles($user_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit				$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                   	public	function EditProfile_post()		{		if (isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id']) && isset($_REQUEST['phone_number']) && !empty($_REQUEST['phone_number']) && isset($_REQUEST['full_name']) && !empty($_REQUEST['full_name'])&& isset($_REQUEST['email_id'])){			$user_id = $this->escapeString($this->input->post('user_id'));			$phone_number = $this->escapeString($this->input->post('phone_number'));			$full_name = $this->escapeString($this->input->post('full_name'));			$email_id = $this->escapeString($this->input->post('email_id'));			$created_date = date('Y-m-d H:i:s', time());			$data = array(				'full_name' => $full_name,				'email_id' => $email_id,				'modified_date' => $created_date			);                                               // print_r($data);die;			$user_id = $this->Obj_Rest_M->edit_user($data, $user_id);			$file_name = NULL;			if (!empty($_FILES['userfile']['name']))				{				$userfile = 'userfile';				$upload_data = $this->uploads($userfile);				$file_name = $upload_data['file_name'];				$data1 = array(					'image' => $file_name				);				$this->db->where('user_id', $user_id);				$this->db->update('user', $data1);				}			if (!empty($user_id))				{				$message = ['status' => TRUE, 'user_id' => $user_id];				$this->set_response($message, REST_Controller::HTTP_CREATED);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}        public   	function Language_get($id = NULL)		{			$result = $this->Obj_Rest_M->get_language();			// If the id parameter doesn't exist return all the users			if ($id === NULL)				{				if ($result)					{					// Set the response and exit					$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);					}				  else					{					// Set the response and exit					$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);					}				}			$id = (int)$id;			if ($id <= 0)				{				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);				}			$response = NULL;			if (!empty($result))				{				foreach($result as $key => $value)					{					if (isset($value->language_id) && $value->language_id == $id)						{						$response = $value;						}					}				}			if (!empty($response))				{				$this->set_response(['status' => TRUE, 'data' => $response], REST_Controller::HTTP_OK);				}			  else				{				$this->set_response(['status' => FALSE, 'message' => 'could not be found'], REST_Controller::HTTP_NOT_FOUND);				}				}	            	public   	function PrintingType_get($id = NULL)		{		$user_id =     $this->get('user_id');                $language_id = $this->get('language_id');		if (isset($user_id))			{			$result = $this->Obj_Rest_M->get_printing_type($language_id);			// If the id parameter doesn't exist return all the users			if ($id === NULL)				{				if ($result)					{					// Set the response and exit					$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);					}				  else					{					// Set the response and exit					$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);					}				}			$id = (int)$id;			if ($id <= 0)				{				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);				}			$response = NULL;			if (!empty($result))				{				foreach($result as $key => $value)					{					if (isset($value->print_type_id) && $value->print_type_id == $id)						{						$response = $value;						}					}				}			if (!empty($response))				{				$this->set_response(['status' => TRUE, 'data' => $response], REST_Controller::HTTP_OK);				}			  else				{				$this->set_response(['status' => FALSE, 'message' => 'could not be found'], REST_Controller::HTTP_NOT_FOUND);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                                                     public	function Printing_get()		{		$user_id =     $this->get('user_id');                $language_id = $this->get('language_id');                $print_type_id = $this->get('print_type_id');		if (isset($user_id)&&isset($language_id)&&isset($print_type_id))			{			$result = $this->Obj_Rest_M->get_printing($language_id,$print_type_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit				$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                                        public	function PrintingOrder_post()		{		if (isset($_REQUEST['user_id'])  && isset($_REQUEST['print_type_id']) && !empty($_REQUEST['print_type_id']) && isset($_REQUEST['attributes_id']) && !empty($_REQUEST['attributes_id'])&& isset($_REQUEST['qty'])&& !empty($_REQUEST['qty'])&& isset($_REQUEST['pickup_addr'])&& !empty($_REQUEST['pickup_addr'])&& isset($_REQUEST['delivery_addr'])&& !empty($_REQUEST['delivery_addr'])&& isset($_REQUEST['price'])&& !empty($_REQUEST['price'])&& isset($_REQUEST['total_price'])&& !empty($_REQUEST['total_price'])){			$user_id =    $this->escapeString($this->input->post('user_id'));			$print_type_id = $this->escapeString($this->input->post('print_type_id'));			$attributes_id = $this->escapeString($this->input->post('attributes_id'));			$qty = $this->escapeString($this->input->post('qty'));                        $pickup_addr = $this->escapeString($this->input->post('pickup_addr'));                        $delivery_addr = $this->escapeString($this->input->post('delivery_addr'));                        $price = $this->escapeString($this->input->post('price'));                        $total_price = $this->escapeString($this->input->post('total_price'));                          $order_date = date('Y-m-d');			$created_date = date('Y-m-d H:i:s', time());			$data = array(				'user_id' => $user_id,				'category_id' => $print_type_id,				'attributes_id' => $attributes_id,                                'qty' =>$qty,                                'pickup_addr' =>$pickup_addr,                                'delivery_addr' =>$delivery_addr,                                'price'=>$price,                                'total_price'=>$total_price,                                'order_date'=>$order_date,			);                                               // print_r($data);die;			$printing_order_id = $this->Obj_Rest_M->printing_order($data);			$file_name = NULL;			if (!empty($_FILES['userfile']['name']))				{				$userfile = 'userfile';				$upload_data = $this->uploads($userfile);				$file_name = $upload_data['file_name'];				$data1 = array(					'printing_file' => $file_name				);				$this->db->where('printing_order_id', $printing_order_id);				$this->db->update('printing_order', $data1);				}			if (!empty($printing_order_id))				{				$message = ['status' => TRUE, 'printing_order_id' => $printing_order_id];				$this->set_response($message, REST_Controller::HTTP_CREATED);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                                        public	function Gift_category_get()		{		$user_id =     $this->get('user_id');                $language_id = $this->get('language_id');           		if (isset($user_id)&&isset($language_id))			{			$result = $this->Obj_Rest_M->get_gift_category($language_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit				$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		  else                       {			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);		       }		}                                                        public	function Gift_get()		{		$user_id            =     $this->get('user_id');                $language_id        =     $this->get('language_id');                $gift_category_id   =     $this->get('gift_category_id');		if (isset($user_id)&&isset($language_id)&&isset($gift_category_id))			{			$result = $this->Obj_Rest_M->get_gift($language_id,$gift_category_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit				$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		  else                       {			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);		       }		}                                                                        public	function GiftOrder_post()		{		if (isset($_REQUEST['user_id'])  && isset($_REQUEST['gift_category_id']) && !empty($_REQUEST['gift_category_id']) && isset($_REQUEST['attributes_id']) && !empty($_REQUEST['attributes_id'])&& isset($_REQUEST['qty'])&& !empty($_REQUEST['qty'])&& isset($_REQUEST['pickup_addr'])&& !empty($_REQUEST['pickup_addr'])&& isset($_REQUEST['delivery_addr'])&& !empty($_REQUEST['delivery_addr'])&& isset($_REQUEST['price'])&& !empty($_REQUEST['price'])&& isset($_REQUEST['total_price'])&& !empty($_REQUEST['total_price'])){			$user_id =    $this->escapeString($this->input->post('user_id'));			$gift_category_id = $this->escapeString($this->input->post('gift_category_id'));			$attributes_id = $this->escapeString($this->input->post('attributes_id'));			$qty = $this->escapeString($this->input->post('qty'));                        $pickup_addr = $this->escapeString($this->input->post('pickup_addr'));                        $delivery_addr = $this->escapeString($this->input->post('delivery_addr'));                        $price = $this->escapeString($this->input->post('price'));                        $total_price = $this->escapeString($this->input->post('total_price'));                          $order_date = date('Y-m-d');			$created_date = date('Y-m-d H:i:s', time());			$data = array(				'user_id' => $user_id,				'category_id' => $gift_category_id,				'attributes_id' => $attributes_id,                                'qty' =>$qty,                                'pickup_addr' =>$pickup_addr,                                'delivery_addr' =>$delivery_addr,                                'price'=>$price,                                'total_price'=>$total_price,                                'order_date'=>$order_date,			);                                               // print_r($data);die;			$printing_order_id = $this->Obj_Rest_M->gift_order($data);			$file_name = NULL;			if (!empty($_FILES['userfile']['name']))				{				$userfile = 'userfile';				$upload_data = $this->uploads($userfile);				$file_name = $upload_data['file_name'];				$data1 = array(					'printing_file' => $file_name				);				$this->db->where('gift_order_id', $printing_order_id);				$this->db->update('gift_order', $data1);                                				}			if (!empty($printing_order_id))				{                            				$message = ['status' => TRUE, 'gift_order_id' => $printing_order_id];				$this->set_response($message, REST_Controller::HTTP_CREATED);                                				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                                        public	function Government_paper_category_get()		{		$user_id =     $this->get('user_id');                $language_id = $this->get('language_id');           		if (isset($user_id)&&isset($language_id))			{			$result = $this->Obj_Rest_M->get_government_paper_category($language_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit				$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		  else                       {			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);		       }		}                                                        public	function GovernmentPapers_get()		{		$user_id            =     $this->get('user_id');                $language_id        =     $this->get('language_id');                $government_paper_category_id   =     $this->get('government_paper_category_id');		if (isset($user_id)&&isset($language_id)&&isset($government_paper_category_id))			{			$result = $this->Obj_Rest_M->get_government_papers($language_id,$government_paper_category_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit				$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		  else                       {			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);		       }		}                                                        public	function GovernmentPapers_post()		{		if (isset($_REQUEST['user_id'])  && isset($_REQUEST['government_paper_category_id']) && !empty($_REQUEST['government_paper_category_id']) && isset($_REQUEST['qty'])&& !empty($_REQUEST['qty'])&& isset($_REQUEST['pickup_addr'])&& !empty($_REQUEST['pickup_addr'])&& isset($_REQUEST['delivery_addr'])&& !empty($_REQUEST['delivery_addr'])&& isset($_REQUEST['price'])&& !empty($_REQUEST['price'])&& isset($_REQUEST['total_price'])&& !empty($_REQUEST['total_price'])){			$user_id =       $this->input->post('user_id');	                $government_paper_category_id =  $this->input->post('government_paper_category_id');			                        if(isset($_REQUEST['government_paper_id'])){                               $government_paper_id = $_REQUEST['government_paper_id'];                        }else{                            $government_paper_id  = 0;                          }                                                $qty =           $this->input->post('qty');                        $pickup_addr =   $this->input->post('pickup_addr');                        $delivery_addr = $this->input->post('delivery_addr');                        $price =         $this->input->post('price');                        $total_price =   $this->input->post('total_price');                          $order_date = date('Y-m-d');			$created_date = date('Y-m-d H:i:s', time());			$data = array(				'user_id' => $user_id,                                'item_id'=>$government_paper_id,				'category_id' => $government_paper_category_id,                                'qty' =>$qty,                                'pickup_addr' =>$pickup_addr,                                'delivery_addr' =>$delivery_addr,                                'price'=>$price,                                'total_price'=>$total_price,                                'order_date'=>$order_date,			);                        			$government_paper_order_id = $this->Obj_Rest_M->government_papers_order($data);			$file_name = NULL;			if (!empty($_FILES['userfile']['name']))				{				$userfile = 'userfile';				$upload_data = $this->uploads($userfile);				$file_name = $upload_data['file_name'];				$data1 = array(					'printing_file' => $file_name				);				$this->db->where('government_paper_order_id', $government_paper_order_id);				$this->db->update('government_paper_order', $data1);				}			if (!empty($government_paper_order_id))				{				$message = ['status' => TRUE, 'government_paper_order_id' => $government_paper_order_id];				$this->set_response($message, REST_Controller::HTTP_CREATED);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                                        public	function PhotoPrinting_get()		 {		$user_id =     $this->get('user_id');                $language_id = $this->get('language_id');		if (isset($user_id)&&isset($language_id))			{			$result = $this->Obj_Rest_M->get_photo_printing($language_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		    else{                        			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			                                                }		}                                        public	function PhotoPrinting_post()		{		if (isset($_REQUEST['user_id']) && isset($_REQUEST['attributes_id']) && !empty($_REQUEST['attributes_id']) && isset($_REQUEST['qty'])&& !empty($_REQUEST['qty'])&& isset($_REQUEST['pickup_addr'])&& !empty($_REQUEST['pickup_addr'])&& isset($_REQUEST['delivery_addr'])&& !empty($_REQUEST['delivery_addr'])&& isset($_REQUEST['price'])&& !empty($_REQUEST['price'])&& isset($_REQUEST['total_price'])&& !empty($_REQUEST['total_price'])){			$user_id =    $this->escapeString($this->input->post('user_id'));	                $attributes_id = $this->escapeString($this->input->post('attributes_id'));			$qty =        explode(",",$this->input->post('qty'));                        $pickup_addr = $this->escapeString($this->input->post('pickup_addr'));                        $delivery_addr = $this->escapeString($this->input->post('delivery_addr'));                        $price = explode(",",$this->input->post('price'));                        $total_price = $this->escapeString($this->input->post('total_price'));                          $order_date = date('Y-m-d');			$created_date = date('Y-m-d H:i:s', time());			$data = array(				'user_id' => $user_id,				'attributes_id' => $attributes_id,                                'pickup_addr' =>$pickup_addr,                                'delivery_addr' =>$delivery_addr,                                'total_price'=>$total_price,                                'order_date'=>$order_date,                                'created_date'=>$created_date			);                        	        $photo_printing_order_id = $this->Obj_Rest_M->photo_printing_order($data);                                                             if (!empty($_FILES['userfile']['name'])){                    $this->load->library('upload');                    $dataInfo = array();                    $files = $_FILES;                    $cpt = count($_FILES['userfile']['name']);                    for ($i = 0; $i < $cpt; $i++) {                        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];                        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];                        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];                        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];                        $this->upload->initialize($this->set_upload_options());                        $this->upload->do_upload();                        $dataInfo[$i] = $this->upload->data();                        $file_name = $dataInfo[$i]['file_name'];                        $user_image = array('photo_printing_order_id' => $photo_printing_order_id, 'photo_printing_image' => $file_name, 'qty' => $qty[$i], 'price' =>$price[$i]);                        $this->db->insert('photo_printing_images', $user_image);                    }                }                                			if (!empty($photo_printing_order_id))				{				$message = ['status' => TRUE, 'photo_printing_order_id' => $photo_printing_order_id];				$this->set_response($message, REST_Controller::HTTP_CREATED);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                        private function set_upload_options() {        //upload an image options        $config = array();        $config['upload_path'] = './user/';        $config['allowed_types'] = 'jpg|png|jpeg';        $config['max_size'] = '0';        $config['overwrite'] = TRUE;        return $config;        }                                                public	function Others_get()		 {		$user_id =     $this->get('user_id');                $language_id = $this->get('language_id');		if (isset($user_id)&&isset($language_id))			{			$result = $this->Obj_Rest_M->get_others($language_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		    else{                        			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			                                                }		}                                        public	function SignUpGuest_post()		{            		if (isset($_REQUEST['phone_number']) && !empty($_REQUEST['phone_number'])  && isset($_REQUEST['full_name']) && !empty($_REQUEST['full_name']) && isset($_REQUEST['email_id']))                    {			$phone_number = $this->input->post('phone_number');			$full_name =    $this->input->post('full_name');                        $email_id =     $this->input->post('email_id');     			$type =  0;                                                			$created_date = date('Y-m-d H:i:s', time());			$res = $this->Obj_Rest_M->users_check($phone_number);			if (!empty($res))				{                            				$data = array(					'phone_number' => $phone_number,					'full_name' => $full_name,                                   					'email_id' => $email_id,					'created_date' => $created_date,					'modified_date' => $created_date,                                        'type'=>$type				);                                                                $user_id = $this->Obj_Rest_M->edit_user($data,$res->user_id);                                $message = ['status' => TRUE, 'user_id' => $user_id];			        $this->set_response($message, REST_Controller::HTTP_CREATED);                                				}			  else				{				$data = array(					'phone_number' => $phone_number,					'full_name' => $full_name,                                   					'email_id' => $email_id,					'created_date' => $created_date,					'modified_date' => $created_date,                                        'type'=>$type				);                                				$user_id = $this->Obj_Rest_M->add_user($data);                                				if (!empty($_FILES['userfile']['name']))					{					$userfile = 'userfile';					$upload_data = $this->uploads($userfile);					$file_name = $upload_data['file_name'];					$data1 = array(						'image' => $file_name					);					$this->db->where('user_id', $user_id);					$this->db->update('user', $data1);					}				if (!empty($user_id))					{					$message = ['status' => TRUE, 'user_id' => $user_id];					$this->set_response($message, REST_Controller::HTTP_CREATED);					}				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                                        public	function Myorder_get()		{            		$user_id = $this->get('user_id');		if (isset($user_id) && !empty($user_id))			{			$result = $this->Obj_Rest_M->get_order($user_id);			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit				$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}			}		  else			{			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);			}		}                                        public	function Branch_get()		{                            $language_id = $this->get('language_id');		                if (isset($language_id))			{                    			$result = $this->Obj_Rest_M->get_branch($language_id);                        			if ($result)				{				// Set the response and exit				$this->response(['status' => TRUE, 'data' => $result], REST_Controller::HTTP_OK);				}			  else				{				// Set the response and exit				$this->response(['status' => FALSE, 'message' => 'No records found'], REST_Controller::HTTP_NOT_FOUND);				}                           }                        else			{                            			$message = ['status' => FALSE, 'message' => 'Invalid Parameters'];			$this->set_response($message, REST_Controller::HTTP_BAD_REQUEST);                        			}	        }           }?>