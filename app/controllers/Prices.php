<?php
class Prices extends CI_Controller {

    function Prices() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('prices_m', 'Obj_prices_M', TRUE);
        $this->load->model('variant_m', 'Obj_variant_M', TRUE);
        $this->load->model('specifications_m', 'Obj_specifications_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        
        $data['result'] = $this->Obj_prices_M->get_prices(); 
        $this->layout->view('prices_v', $data);
    }

    public function add_prices(){
        
        $data = array();
        $data['vehicle_to_variant'] = $this->Obj_prices_M->get_vehicle_to_variant();
        $data['state'] = $this->Obj_prices_M->get_state();
        $data['city'] = $this->Obj_prices_M->get_city();
        
        $data['category'] = $this->Obj_variant_M->get_category();
        $data['variant'] = $this->Obj_specifications_M->get_all_variant();
        $data['vehicle'] = $this->Obj_specifications_M->get_all_vehicle();
       

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            
            
             $res = $this->Obj_specifications_M->get_vehicle_to_variant_id($this->input->post('vehicle_id'), $this->input->post('variant_id'));
             
             
             if(!empty($res)){
                 
            $result = $this->Obj_prices_M->check_price($res->vehicle_to_variant_id,$this->input->post('city_id'));
            
            
                 if (!empty($result)) {
                            $this->session->set_flashdata('message1', 'Already exist');
                        }
                        else {

                $data = array('city_id'=>$this->input->post('city_id'),
                'vehicle_to_variant_id' => $res->vehicle_to_variant_id,
               'onroad_price' => $this->input->post('onroad_price'));
                $this->Obj_prices_M->add_prices($data);    
                $this->session->set_flashdata('message', 'Inserted Successfully');
                       
                       
                        }   
                 
             }
       
            redirect('prices');
            
        } else {
            $this->layout->view('add_prices_v',$data);
        }
    }

    function edit_prices($id = NULL){
        
        $data = array();
        $data['vehicle_to_variant'] = $this->Obj_prices_M->get_vehicle_to_variant();
        $data['state'] = $this->Obj_prices_M->get_state();
        $data['city'] = $this->Obj_prices_M->get_city();
        $data["id"] = $id;
        $data['result'] = $this->Obj_prices_M->get_pricess($id);
        $this->layout->view('add_prices_v',$data);
    }

    function edit_pricess($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
            
          $result = $this->Obj_prices_M->check_price($this->input->post('vehicle_to_variant_id'),$this->input->post('city_id'));  
          
                 if (!empty($result)) {
                            $this->session->set_flashdata('message1', 'Already exist');
                        }
                        else {
            
           $data = array('city_id' => $this->input->post('city_id'),
                'vehicle_to_variant_id' => $this->input->post('vehicle_to_variant_id'),
                'onroad_price' => $this->input->post('onroad_price'));
            
            $this->Obj_prices_M->update_prices($data,$id);
         
     
            $this->session->set_flashdata('message', 'Update Successfully');
            
                        }
            
            redirect('prices');
        } else {
            redirect('prices');
        }
        
        
        
        
    }

    function delete_prices($id) {
        $this->db->delete('vehicle_onroadprice', array('vehicle_on_road_price_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('prices');
    }
    
    
    function get_state(){
        $state_id = $_POST['ids'];
        $data['city'] = $this->Obj_prices_M->get_state_city($state_id);
        $this->load->view('city_v1',$data); 
    }
    
}?>