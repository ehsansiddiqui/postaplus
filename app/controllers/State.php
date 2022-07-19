<?php
class State extends CI_Controller {

    function State() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('state_m', 'Obj_state_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_state_M->get_state();
        $this->layout->view('state_v', $data);
    }

    public function add_state() {

        if ($this->input->post('submit')) {
            
             $check_result = $this->Obj_state_M->check_state($this->input->post('state_name'));
             
             if(!empty($check_result)){
                 
               $this->session->set_flashdata('message1', 'Already exist');
               
             }else{
            
            
            $date = date('Y-m-d h:i:s', time());
            $data = array('state_name' => $this->input->post('state_name'),'cm_date'=>$date);
            $this->Obj_state_M->add_state($data);
            $state_id = $this->db->insert_id();



            $this->session->set_flashdata('message', 'Inserted Successfully');
            
        }
            
            
            redirect('state');
        } else {
            $this->layout->view('add_state_v');
        }
    }

    function edit_state($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_state_M->get_states($id);
        $this->layout->view('add_state_v',$data);
    }

    function edit_states($id = NULL) {

      if ($this->input->post('submit')) {
          
            $date = date('Y-m-d h:i:s', time());
            
            $check_result = $this->Obj_state_M->check_state_edit($this->input->post('state_name'),$id);
            
            if(!empty($check_result)){
                
                 $this->session->set_flashdata('message1', 'Already exist');
                 
            }else{
            
            $data = array('state_name' => $this->input->post('state_name'),'cm_date'=>$date); 
            $this->Obj_state_M->update_state($data,$id);
            $this->session->set_flashdata('message', 'Update Successfully');
            
            }
            
           
            redirect('state');
            
            
        } else {
            redirect('state');
        }
    }

    function delete_state($id) {
        $this->db->delete('state', array('state_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('state');
    }   
}?>