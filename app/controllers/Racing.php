<?php

class Racing extends CI_Controller {
    

    public function __construct(){
 
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('racing_m','Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date =  date('Y-m-d');
      

    }

    function index(){
        $data['result'] = $this->Obj_Track_Type_M->get_all_racing();
        $this->layout->view('racing_v', $data);
    }

    function add(){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_racing($this->input->post('racing'));

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('racing');
                
            } else {
                
                $data = array('racing_name' => $this->input->post('racing'),
                    'created_date' => $date,'modified_date'=>$date);
                $this->Obj_Track_Type_M->add_racing($data);
                $this->session->set_flashdata('message', 'Insert Sueccessfully');
                redirect('racing');
            }
        }
        
        $this->layout->view('add_racing_v');
    }

    function edit($id = ''){
        $data['result'] = $this->Obj_Track_Type_M->get_racings($id);
        $data['id'] = $id;
        $this->layout->view('add_racing_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_racing($this->input->post('racing'));
            if (!empty($result)){
                $this->session->set_flashdata('message', 'Already Exist');
            } else {
             $data = array('racing_name' => $this->input->post('racing'),
                    'created_date' => $date,'modified_date'=>$date);
             
                $this->Obj_Track_Type_M->update_racing($data, $id);
                
                $this->session->set_flashdata('message', 'Update Sueccessfully');
            }
        }
        redirect('racing');
    }

    function delete($id){
        $this->db->delete('racing_details', array('racing_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('racing');
    }

}?>