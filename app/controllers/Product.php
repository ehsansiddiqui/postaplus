<?php

class Product extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('product_m', 'Obj_Product_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    function index() {

        $data['result'] = array();
        $this->layout->view('product_v', $data);
    }

    function add() {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');
            $result = $this->Obj_Product_M->check_product_a($this->Obj_Product_M->escapeString($this->input->post('product_name')));
            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('product');
            } else {

                $data = array('product_name' => $this->Obj_Product_M->escapeString($this->input->post('product_name')), 'created_date' => $date, 'modified_date' => $date);
                $product_id = $this->Obj_Product_M->add_product($data);



                if (!empty($_FILES['userfile']['name'])) {

                    $this->load->helper(array('image_helper'));

                    $config = array(
                        'upload_path' => './product/',
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => TRUE,);
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload()) {

                        $upload_data = $this->upload->data();
                        $file_name = $upload_data['file_name'];
                        $data1 = array('product_image' => $file_name);
                        $this->db->where('product_id', $product_id);
                        $this->db->update('products', $data1);
                        
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message1','invalid image');
                        redirect('product');
                    }
                }


                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('product');
            }
        }
        $this->layout->view('add_product_v');
    }

    function edit($id = '') {

        $data['result'] = $this->Obj_Product_M->get_products($id);
        $data['id'] = $id;
        $this->layout->view('add_product_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Product_M->check_product_e($this->input->post('product_name'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {

                $data = array('product_name' => $this->Obj_Product_M->escapeString($this->input->post('product_name')), 'created_date' => $date, 'modified_date' => $date);

                $this->Obj_Product_M->update_product($data, $id);
                
                
            if (!empty($_FILES['userfile']['name'])){

                    $this->load->helper(array('image_helper'));

                    $config = array(
                        'upload_path' => './product/',
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => TRUE,);
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload()) {

                        $upload_data = $this->upload->data();
                        $file_name = $upload_data['file_name'];
                        $data1 = array('product_image' => $file_name);
                        $this->db->where('product_id', $id);
                        $this->db->update('products', $data1);
                        
                    } else {

                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message1',$error['error']);
                        redirect('product');
                    }
            }     
                
            $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('product');
    }

    function delete($product_id) {
        $this->db->delete('products', array('product_id' => $product_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('product');
    }
    
    function disable_image($product_id){
        $data = array('product_image' =>NULL);
        $this->db->where('product_id', $product_id);
        $this->db->update('products', $data);
         redirect('product');
    }

}

?>