<?php
class Parts extends CI_Controller {

    function Parts() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $Parts_Obj = array('parts_m' => 'Obj_parts_M','user_m'=>'Obj_User_M');      
        $this->load->model($Parts_Obj, TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_parts_M->get_parts();
        $this->layout->view('parts_v',$data);
    }

    public function add_parts(){
        
        $data = array();
        
        $data['result'] = $this->Obj_parts_M->get_parts_type();
        
         if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $data = array(
                'parts_types_id' => $this->input->post('parts_type_id'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'expected_price' => $this->input->post('expected_price'),
                'model_price_max' => $this->input->post('model_price_max'),
                'featured_status' => $this->input->post('featured_status'),
                'recommended_status' => $this->input->post('recommended_status'),
                'popular_status' => $this->input->post('popular_status'),
                'upcoming_status' => $this->input->post('upcoming_status'));
                
            $this->Obj_parts_M->add_parts($data);
            $parts_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                
                $this->load->helper(array('image_helper'));
                
//                if (!is_dir('parts/' . $parts_id)) {
//                    mkdir('parts/' . $parts_id, 0777, true);
//                }
                
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/parts/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('parts_id', $parts_id);
                    $this->db->update('parts', $data1); 
                } else{
                    
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message',$error);
                    redirect('parts/add_parts');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('parts');
        } else {
            $this->layout->view('add_parts_v',$data);
        }
    }

    function edit_parts($id = NULL){
        $data["id"] = $id;
        $data['parts'] = $this->Obj_parts_M->get_parts_type();;
        $data['result'] = $this->Obj_parts_M->get_partss($id);
        $this->layout->view('add_parts_v',$data);
    }

    function edit_partss($id = NULL){

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
       $data = array(
                'parts_types_id' => $this->input->post('parts_type_id'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'expected_price' => $this->input->post('expected_price'),
                'model_price_max' => $this->input->post('model_price_max'),
                'featured_status' => $this->input->post('featured_status'),
                'recommended_status' => $this->input->post('recommended_status'),
                'popular_status' => $this->input->post('popular_status'),
                'upcoming_status' => $this->input->post('upcoming_status'));
            
            $this->Obj_parts_M->update_parts($data,$id);
            $parts_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('parts/' . $parts_id)) {
//                    mkdir('parts/' . $parts_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/parts/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('parts_id', $parts_id);
                    $this->db->update('parts', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('parts/add_parts');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('parts');
        } else {
            redirect('parts');
        }
    }

    function delete_parts($id){
        $this->db->delete('parts', array('parts_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('parts');
    }
}?>