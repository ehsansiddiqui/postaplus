<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layout
{
    
    var $obj;
    var $layout;
    var $ses;


    
    
    function __construct($layout = "design/index")
    {
        $this->obj =& get_instance();
        $this->layout = $layout;
        $CI = $this->obj;
        $CI->load->library("session");
        $this->ses = $CI->session->userdata('id');
        
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }
    
    function view($view, $data=null, $return=false)
    {
        
        $db = $this->obj->load->database('default', TRUE) ;
        $query = $db->get_where('login',array('id'=>$this->ses));
        $data['page_data'] = $query->row();   
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);
        
        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
}

