<?php

class Order extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('order_m', 'Obj_Order_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        // date_default_timezone_set('Asia/Kuwait');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    function index() {
        $data['result'] = $this->Obj_Order_M->get_all_order();
        $this->layout->view('order_v', $data);
    }
    
   function details($order_id){
       $data['result'] = $this->Obj_Order_M->get_order_details($order_id);
       $this->layout->view('order_detail_v', $data); 
   }
            
    
    

    function add() {

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
        $result = $this->Obj_Order_M->check_order_a($this->Obj_Order_M->escapeString($this->input->post('phone_number')));
            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('order');
            }else{

               $data = array('phone_number' =>$this->Obj_Order_M->escapeString($this->input->post('phone_number')),'password' =>$this->Obj_Order_M->escapeString($this->input->post('password')),'first_name' =>$this->Obj_Order_M->escapeString($this->input->post('first_name')),'last_name' =>$this->Obj_Order_M->escapeString($this->input->post('last_name')),'email_id' =>$this->Obj_Order_M->escapeString($this->input->post('email_id')),'created_date' => $date, 'modified_date' => $date);
                $order_id = $this->Obj_Order_M->add_order($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
               redirect('order');
            }
        }
        $this->layout->view('add_order_v');
    }

    function edit($id = '') {

        $data['result'] = $this->Obj_Order_M->get_orders($id);
        $data['id'] = $id;
        $this->layout->view('add_order_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Order_M->check_order($this->input->post('order'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {
                $data = array('activity_name' => $this->input->post('order'), 'activity_description' => $this->input->post('activity_description'),
                    'created_date' => $date, 'modified_date' => $date);
                $this->Obj_Order_M->update_order($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('order');
    }

    function delete($order_id){
        $this->db->delete('order_details', array('order_id' => $order_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('order');
    }

}

?>