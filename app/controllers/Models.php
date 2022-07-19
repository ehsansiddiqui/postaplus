<?php
class Models extends CI_Controller {

    function Models() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $Models_Obj = array('models_m' => 'Obj_model_M','user_m'=>'Obj_User_M');      
        $this->load->model($Models_Obj, TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_model_M->get_models();
        $this->layout->view('models_v',$data);
    }

    public function add_models() {
        
        $data = array();
        $data['category'] =   $this->Obj_User_M->get_all_category_type();
        $data['brand'] =     $this->Obj_User_M->get_all_barand();
        $data['body_type'] = $this->Obj_model_M->get_vehicle_body_type();

        
        if ($this->input->post('submit')) {
            
            $date = date('Y-m-d h:i:s', time());
            $result = $this->Obj_model_M->check_models($this->input->post('short_title'),$id = '');
            
            if(!empty($result)){
            $this->session->set_flashdata('message1', 'Already exists this model name');
            redirect('models');
                
            }  else {
                 
            $data = array(
                'category_id' => $this->input->post('category_id'),
                'brand_id' => $this->input->post('brand_id'),
                'vehicle_body_type_id' => $this->input->post('vehicle_body_type_id'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'expected_price' => $this->input->post('expected_price'),
                'model_price_max' => $this->input->post('model_price_max'),
                'featured_status' => $this->input->post('featured_status'),
                'recommended_status' => $this->input->post('recommended_status'),
                'popular_status' => $this->input->post('popular_status'),
                'upcoming_status' => $this->input->post('upcoming_status'),
                'bestoffer_status' => $this->input->post('bestoffer_status'));
            
            $this->Obj_model_M->add_models($data);
            
            $models_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                
                $this->load->helper(array('image_helper'));
//                if (!is_dir('models/' . $models_id)) {
//                    mkdir('models/' . $models_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/new/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('vehicle_id', $models_id);
                    $this->db->update('vehicle_models', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message1', $error['error']);
                    redirect('models/add_models');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('models');
            
        }
            
        } else {
            $this->layout->view('add_models_v',$data);
        }
    }

    function edit_models($id = NULL){
        $data["id"] = $id;
        $data['category'] = $this->Obj_User_M->get_all_category_type();
        $data['brand'] = $this->Obj_User_M->get_all_barand();
        $data['body_type'] = $this->Obj_model_M->get_vehicle_body_type();
        $data['result'] = $this->Obj_model_M->get_modelss($id);
        $this->layout->view('add_models_v',$data);
    }

    function edit_modelss($id = NULL) {

      if ($this->input->post('submit')) {
          
           $date = date('Y-m-d h:i:s', time());
           $result = $this->Obj_model_M->check_models($this->input->post('short_title'),$id);
              
            if(!empty($result)){
               
            $this->session->set_flashdata('message1', 'Already exists this model name');
            redirect('models');
                
            }  else {
               
            
       $data = array(
                'category_id' => $this->input->post('category_id'),
                'brand_id' => $this->input->post('brand_id'),
                'vehicle_body_type_id' => $this->input->post('vehicle_body_type_id'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'expected_price' => $this->input->post('expected_price'),
                'model_price_max' => $this->input->post('model_price_max'),
                'featured_status' => $this->input->post('featured_status'),
                'recommended_status' => $this->input->post('recommended_status'),
                'popular_status' => $this->input->post('popular_status'),
                'upcoming_status' => $this->input->post('upcoming_status'),
                'bestoffer_status' => $this->input->post('bestoffer_status'));
            
            $this->Obj_model_M->update_models($data,$id);
            $models_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('models/' . $models_id)) {
//                    mkdir('models/' . $models_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/new/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('vehicle_id', $models_id);
                    $this->db->update('vehicle_models', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                     $this->session->set_flashdata('message1', $error['error']);
                    redirect('models/add_models');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('models');
            
            }
        } else {
            redirect('models');
        }
    }

    function delete_models($id){
        $this->db->delete('vehicle_models', array('vehicle_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('models');
    }
    
    function get_variant($vehicle_id){
        $data['result'] = $this->Obj_model_M->get_variant($vehicle_id);
        $data['vehicle_id'] = $vehicle_id;
        $this->layout->view('vehicle_variant_v',$data);
    }
    
    public function get_brand(){
          
         $data = array(); 
         $cate = $_POST['cate'];
         
         if($cate!=null){
           $data['result'] = $this->Obj_model_M->get_modelss($cate);   
         }
         
         $data['brand'] = $this->Obj_model_M->get_brand($_POST['ids']);
         $this->load->view('get_brand_v',$data);
    }
    
    
}?>