<?php
class City extends CI_Controller {

    function City() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('city_m', 'Obj_city_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_city_M->get_city();
        $this->layout->view('city_v', $data);
    }

    public function add_city() {
        
         $data['state'] = $this->Obj_city_M->get_state();
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            
          $check_result = $this->Obj_city_M->check_city($this->input->post('state_id'),$this->input->post('city_name')); 
          
          if(!empty($check_result)){
              
            $this->session->set_flashdata('message1', 'Already exist');
            
          }else{
            
            $data = array('state_id' => $this->input->post('state_id'),
                'city_name' => $this->input->post('city_name'),
                'cm_date' => $date);
            $this->Obj_city_M->add_city($data);
            $this->session->set_flashdata('message', 'Inserted Successfully');
          }
            redirect('city');
            
        } else {
            $this->layout->view('add_city_v',$data);
        }
    }

    function edit_city($id = NULL){
        $data['state'] = $this->Obj_city_M->get_state();
        $data["id"] = $id;
        $data['result'] = $this->Obj_city_M->get_citys($id);
        $this->layout->view('add_city_v',$data);
    }

    function edit_citys($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
           
            $check_result = $this->Obj_city_M->check_city_edit($this->input->post('state_id'),$this->input->post('city_name'),$id);
            
            if(!empty($check_result)){
                 $this->session->set_flashdata('message1', 'Already exist');
            }else{
            $data = array('state_id' => $this->input->post('state_id'),
                'city_name' => $this->input->post('city_name'),
                'cm_date' => $date);
            $this->Obj_city_M->update_city($data,$id);
            $this->session->set_flashdata('message', 'Update Successfully'); 
            }
            
            redirect('city');
            
        } else {
            redirect('city');
        }
    }

    function delete_city($id) {
        $this->db->delete('city', array('city_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('city');
    }   
}?>