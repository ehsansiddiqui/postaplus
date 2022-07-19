<?php
class Colour extends CI_Controller {

    function Colour() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('colour_m', 'Obj_colour_M', TRUE);
        $this->load->model('features_m','Obj_features_M', TRUE);
        $this->load->model('variant_m','Obj_variant_M', TRUE);
        $this->load->model('specifications_m', 'Obj_specifications_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        
        $data['result'] = $this->Obj_colour_M->get_colour(); 
        $this->layout->view('colour_v', $data);
    }

    public function add_colour(){
        
        $data = array();


        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            
            $data = array('color_name' => $this->input->post('color_name'),
                'color_code' => $this->input->post('color_code'),
                'cm_date' => $date);
            
            $this->Obj_colour_M->add_colour($data);
            $colour_id = $this->db->insert_id();
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('colour');
        } else {
            $this->layout->view('add_colour_v',$data);
        }
    }

    function edit_colour($id = NULL){
        
        $data = array();
        $data["id"] = $id;
        $data['result'] = $this->Obj_colour_M->get_colours($id);
        $this->layout->view('add_colour_v',$data);
    }

    function edit_colours($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
            
            $data = array('color_name' => $this->input->post('color_name'),
                'color_code' => $this->input->post('color_code'),
                'cm_date' => $date);
            
            $this->Obj_colour_M->update_colour($data,$id);
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('colour');
        } else {
            redirect('colour');
        }
    }

    function delete_colour($id) {
        $this->db->delete('vehicle_colors', array('vehicle_color_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('colour');
    }

}?>