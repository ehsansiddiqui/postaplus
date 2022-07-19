<?php

class Specifications extends CI_Controller {

    function Specifications() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('specifications_m', 'Obj_specifications_M', TRUE);
        $this->load->model('variant_m', 'Obj_variant_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index() {
        $data['result'] = $this->Obj_specifications_M->get_specifications();
        $this->layout->view('specifications_v', $data);
    }

    public function add_specifications() {

        $data = array();

        $data['category'] = $this->Obj_variant_M->get_category();
        $data['variant'] = $this->Obj_specifications_M->get_all_variant();
        $data['vehicle'] = $this->Obj_specifications_M->get_all_vehicle();
        $data['specification'] = $this->Obj_specifications_M->get_all_specification_master();


        if ($this->input->post('submit')) {



            $date = date('Y-m-d h:i:s', time());

            $i = 1;

            foreach ($_POST['specification_name'] as $k => $v) {

                if (!empty($v)) {


                    $res = $this->Obj_specifications_M->get_vehicle_to_variant_id($this->input->post('vehicle_id'), $this->input->post('variant_id'));


                    if (!empty($res)) {

                        $result = $this->Obj_specifications_M->check_specifications($res->vehicle_to_variant_id, $i);

                        if (!empty($result)) {

                            $this->session->set_flashdata('message1', 'Already exist');
                        } else {

                            $data = array('vehicle_to_variant_id' => $res->vehicle_to_variant_id,
                                'specification_id' => $i,
                                'specification_value' => $v);
                            $this->Obj_specifications_M->add_specifications($data);
                            $this->session->set_flashdata('message', 'Inserted Successfully');
                        }
                    }
                }
                $i++;
            }

            redirect('specifications');
        } else {
            $this->layout->view('add_specifications_v', $data);
        }
    }

    function edit_specifications($id = NULL) {

        $data['variant'] = $this->Obj_specifications_M->get_all_variant();
        $data['vehicle'] = $this->Obj_specifications_M->get_all_vehicle();
        $data['specification'] = $this->Obj_specifications_M->get_all_specification_master();
        $data["id"] = $id;
        $data['result'] = $this->Obj_specifications_M->get_specificationss($id);
        $this->layout->view('add_specifications_v', $data);
    }

    function edit_specificationss($id = NULL) {

        if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());

            $res = $this->Obj_specifications_M->get_vehicle_to_variant_id($this->input->post('vehicle_id'), $this->input->post('variant_id'));

            if (!empty($res)) {

            $result = $this->Obj_specifications_M->check_specifications_edit($res->vehicle_to_variant_id, $this->input->post('specification_id'), $id);

                if (!empty($result)) {
                    $this->session->set_flashdata('message1', 'Already exist');
                } else {
                    $data = array('vehicle_to_variant_id' => $res->vehicle_to_variant_id,
                        'specification_id' => $this->input->post('specification_id'),
                        'specification_value' => $this->input->post('specification_value'));
                    $this->Obj_specifications_M->update_specifications($data, $id);
                    $this->session->set_flashdata('message', 'Update Successfully');
                }
            }
        }

        redirect('specifications');
    }

    function delete_specifications($id) {
        $this->db->delete('vehicle_specifications', array('vehicle_specification_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('specifications');
    }

    public function get_brand() {
        $data['brand'] = $this->Obj_variant_M->get_brands($_POST['ids']);
        $this->load->view('get_brand_variant', $data);
    }

    public function dropdown_fetch_variant() {
        $data['variant'] = $this->Obj_specifications_M->get_variant_by_vehicle($_POST['ids']);
        $this->load->view('get_variant_model', $data);
    }

}

?>