<?php

class Price extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('price_m', 'Obj_Price_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    function index(){
        
        $data['result'] = $this->Obj_Price_M->get_all_price();
        $data['category'] = $this->Obj_Price_M->get_types();
        $data['price_package'] = $this->Obj_Price_M->get_price_package();
        $data['gender_type'] = $this->Obj_Price_M->get_gender_type(); 
        $data['product'] = $this->Obj_Price_M->get_product(); 
        $this->layout->view('price_v', $data);
    }

    function add(){

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            
        $result = $this->Obj_Price_M->check_price_a($this->Obj_Price_M->escapeString($this->input->post('price_package_id')),$this->Obj_Price_M->escapeString($this->input->post('types_id')),$this->Obj_Price_M->escapeString($this->input->post('product_id')),$this->Obj_Price_M->escapeString($this->input->post('gender_id')));
        
            if (!empty($result)){
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('price');
            }else{

    $data = array('price_package_id'=>$this->Obj_Price_M->escapeString($this->input->post('price_package_id')),'types_id' =>$this->Obj_Price_M->escapeString($this->input->post('types_id')),'product_id' =>$this->Obj_Price_M->escapeString($this->input->post('product_id')),'gender_id' =>$this->Obj_Price_M->escapeString($this->input->post('gender_id')),'product_price' =>$this->Obj_Price_M->escapeString($this->input->post('product_price')));
                $price_id = $this->Obj_Price_M->add_price($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
               redirect('price');
            }
        }
        $data = array();
        $data['category'] = $this->Obj_Price_M->get_types();
        $data['product'] = $this->Obj_Price_M->get_product();
        $data['gender'] = $this->Obj_Price_M->get_gender_type();
        $data['price_package'] = $this->Obj_Price_M->get_price_package();
        $this->layout->view('add_price_v',$data);
    }

    function edit($id = ''){
        
        $data = array();
        $data['res'] = $this->Obj_Price_M->get_prices($id);
        $data['id'] = $id; 
        $data['category'] = $this->Obj_Price_M->get_types();
        $data['product'] = $this->Obj_Price_M->get_product();
        $data['gender'] = $this->Obj_Price_M->get_gender_type();
        $data['price_package'] = $this->Obj_Price_M->get_price_package();
        $this->layout->view('add_price_v',$data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')){

            $date = date('Y-m-d');

            $result = $this->Obj_Price_M->check_price_e($this->Obj_Price_M->escapeString($this->input->post('price_package_id')),$this->Obj_Price_M->escapeString($this->input->post('types_id')),$this->Obj_Price_M->escapeString($this->input->post('product_id')),$this->Obj_Price_M->escapeString($this->input->post('gender_id')), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {
         
                
             $data = array('price_package_id'=>$this->Obj_Price_M->escapeString($this->input->post('price_package_id')),'types_id' =>$this->Obj_Price_M->escapeString($this->input->post('types_id')),'product_id' =>$this->Obj_Price_M->escapeString($this->input->post('product_id')),'gender_id' =>$this->Obj_Price_M->escapeString($this->input->post('gender_id')),'product_price' =>$this->Obj_Price_M->escapeString($this->input->post('product_price')));
                $this->Obj_Price_M->update_price($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('price');
    }

    function delete($product_type_id){
        $this->db->delete('product_types', array('product_type_id' =>$product_type_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('price');
    }
    
    
    function search(){
        
                $search = array();   
                $types_id = $this->input->post('types_id');
                $price_package_id = $this->input->post('price_package_id');
                $gender_id = $this->input->post('gender_id');
                $product_id = $this->input->post('product_id');

                
                $sql = "";
                
                if ($types_id != NULL){
                    $sql .=  " AND PT.types_id = ".$types_id;
                }
                if ($price_package_id != NULL){
                    $sql .= " AND PT.price_package_id = ".$price_package_id;
                }
                if ($gender_id != NULL){
                    $sql .= " AND PT.gender_id = ".$gender_id;
                }
                if ($product_id != NULL){
                    $sql .= " AND PT.product_id = ".$product_id;
                }
                
               $data['types_id'] = @$types_id;
               $data['price_package_id'] = @$price_package_id;
               $data['gender_id'] = @$gender_id;
               $data['product_id'] = @$product_id;      
               $data['result'] = $this->Obj_Price_M->search($sql);
               $data['category'] = $this->Obj_Price_M->get_types();
               $data['price_package'] = $this->Obj_Price_M->get_price_package();
               $data['gender_type'] = $this->Obj_Price_M->get_gender_type(); 
               $data['product'] = $this->Obj_Price_M->get_product(); 
               $this->layout->view('price_v', $data);

        
    }
    

}?>