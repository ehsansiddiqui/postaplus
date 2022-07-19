<?php

class Features extends CI_Controller {

    function Features() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('features_m', 'Obj_features_M', TRUE);
        $this->load->model('variant_m', 'Obj_variant_M', TRUE);
        $this->load->model('specifications_m', 'Obj_specifications_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index() {
        $data['result'] = $this->Obj_features_M->get_features();
        $this->layout->view('features_v', $data);
    }

    public function add_features() {

        $data = array();
        $data['category'] = $this->Obj_variant_M->get_category();
        $data['variant'] = $this->Obj_features_M->get_all_variant();
        $data['vehicle'] = $this->Obj_features_M->get_all_vehicle();
        $data['features'] = $this->Obj_features_M->get_all_features_master();


        if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());


            $res = $this->Obj_specifications_M->get_vehicle_to_variant_id($this->input->post('vehicle_id'), $this->input->post('variant_id'));
            
            if (!empty($res)) {
                
                $result = $this->Obj_features_M->check_feature($res->vehicle_to_variant_id, $this->input->post('feature_id'));
                if (!empty($result)) {
                    $this->session->set_flashdata('message1', 'Already exist');
                } else {
                    $data = array('vehicle_to_variant_id' => $res->vehicle_to_variant_id,
                        'feature_id' => $this->input->post('feature_id'),
                        'feature_value' => $this->input->post('feature_value'));
                    $this->Obj_features_M->add_features($data);
                    $this->session->set_flashdata('message', 'Inserted Successfully');
                }
            }
            redirect('features');
        } else {
            $this->layout->view('add_features_v', $data);
        }
    }

    function edit_features($id = NULL) {

        $data = array();
        $data['variant'] = $this->Obj_features_M->get_all_variant();
        $data['vehicle'] = $this->Obj_features_M->get_all_vehicle();
        $data['features'] = $this->Obj_features_M->get_all_features_master();
        $data["id"] = $id;
        $data['result'] = $this->Obj_features_M->get_featuress($id);
        $this->layout->view('add_features_v', $data);
    }

    function edit_featuress($id = NULL) {

        if ($this->input->post('submit')){

            $date = date('Y-m-d h:i:s', time());

            $res = $this->Obj_specifications_M->get_vehicle_to_variant_id($this->input->post('vehicle_id'), $this->input->post('variant_id'));
            
            if (!empty($res)){
                
               $result = $this->Obj_features_M->check_features_edit($res->vehicle_to_variant_id,$this->input->post('feature_id'),$id); 
                if (!empty($result)) {
                    $this->session->set_flashdata('message1', 'Already exist');
                } else {
                $data = array('vehicle_to_variant_id' => $res->vehicle_to_variant_id,
                    'feature_id' => $this->input->post('feature_id'),
                    'feature_value' => $this->input->post('feature_value'));
                $this->Obj_features_M->update_features($data, $id);
                $this->session->set_flashdata('message', 'Update Successfully');
                }
            }else {
                $this->session->set_flashdata('message1', 'Not Match Model And Variant ');
            }


           
            redirect('features');
            
            
        } else {
            redirect('features');
        }
    }

    function delete_features($id) {

        $this->db->delete('vehicle_features', array('vehicle_feature_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('features');
    }

}

?>