<?php

class Banner_web extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('Banner_w', 'Obj_Banner_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }


    private function uploads($userfile){

        $this->load->helper(array('image_helper'));
        $config = array(
            'upload_path' => './banner/',
            'allowed_types' => "jpg|png|jpeg",
            'overwrite' => TRUE,'encrypt_name' =>TRUE);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($userfile)){
            $upload_data = $this->upload->data();
            return $upload_data ;
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message1','invalid image');
            redirect('banner');
        }
    }

    function index() {
        $data['result'] = $this->Obj_Banner_M->get_all_banner();
        $this->layout->view('banner_web/banner_v', $data);
    }

    function add() {

        if ($this->input->post('submit')){

            $shop_id = 1;
            $shop_banner_name =   $this->Obj_Banner_M->escapeString($this->input->post('shop_banner_name'));
            $shop_banner_description =   $this->Obj_Banner_M->escapeString($this->input->post('shop_banner_description'));

            $data = array('shop_id' =>$shop_id,'shop_banner_name'=>$shop_banner_name,'shop_banner_description'=>$shop_banner_description);
            $banner_id = $this->Obj_Banner_M->add_banner($data);

            if (!empty($_FILES['userfile']['name'])){
                $userfile = 'userfile';
                $upload_data = $this->uploads($userfile);
                $file_name = $upload_data['file_name'];
                $data1 = array('shop_banner_image' => $file_name);
                $this->db->where('shop_banner_id', $banner_id);
                $this->db->update('shop_banner', $data1);
            }



            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('banner');

        }

        $data = array();
        //$data['shop'] = $this->Obj_Banner_M->get_all_shop();
        $this->layout->view('banner_web/add_banner_v',$data);
    }

    function edit($id = '') {

        //$data['shop'] = $this->Obj_Banner_M->get_all_shop();
        $data['result'] = $this->Obj_Banner_M->get_banners($id);
        $data['id'] = $id;
        $this->layout->view('banner_web/add_banner_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');
            $shop_id =   1;
            $shop_banner_name =   $this->Obj_Banner_M->escapeString($this->input->post('shop_banner_name'));
            $shop_banner_description =   $this->Obj_Banner_M->escapeString($this->input->post('shop_banner_description'));

            $data = array('shop_id' =>$shop_id,'shop_banner_name'=>$shop_banner_name,'shop_banner_description'=>$shop_banner_description);
            $this->Obj_Banner_M->update_banner($data, $id);

            if (!empty($_FILES['userfile']['name'])){

                $userfile = 'userfile';
                $upload_data = $this->uploads($userfile);
                $file_name = $upload_data['file_name'];
                $data1 = array('shop_banner_image' => $file_name);
                $this->db->where('shop_banner_id', $id);
                $this->db->update('shop_banner', $data1);

            }

            $this->session->set_flashdata('message', 'Updated Successfully');

        }
        redirect('banner');
    }

    function delete($banner_id){
        $this->db->delete('shop_banner', array('shop_banner_id' => $banner_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('banner');
    }

}

?>