<?php

class home_m extends CI_Model {


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_banner() {
        
        $this->db->select('SC.*,S.shop_name');
        $this->db->join('shop S','SC.shop_id=S.shop_id');
        $query = $this->db->order_by('shop_banner_id', 'desc')->get_where('shop_banner SC', array('SC.status' => 1));
        return $query->result();
    }

 

    function get_about() {
        $result = $this->db->get_where('page', array('page_id' =>1));
        return $result->row();
    }

    
    function get_technology() {
        $result = $this->db->get_where('page', array('page_id' =>2));
        return $result->row();
    }
    
    function get_category(){
        $result = $this->db->get_where('shop_category', array('status' =>1));
        return $result->result();
    }
    
    function get_home(){
        $result = $this->db->get_where('page', array('page_id' =>3));
        return $result->row();
    }
    
    
     function get_contact(){
        $result = $this->db->get_where('page', array('page_id' =>4));
        return $result->row();
    }
    
    function get_product(){
       $result = $this->db->get_where('shop_product', array('status'=>1));
       return $result->result();
    }
    
    
      function get_all_product(){
       $result = $this->db->get_where('shop_product', array('status'=>1));
       return $result->result();
    }
    
    
    
    function get_client(){
        $result = $this->db->get_where('clients', array('status' =>1));
        return $result->result();
    }
    
    function get_product_details($shop_product_id){
 $result = $this->db->get_where('shop_product', array('shop_product_id' =>$shop_product_id,'status'=>1));
        return $result->row();
    }
    
    
    
    function get_services_home(){   
       $result = $this->db->get_where('services', array('services_home_page_status'=>1,'services_status'=>1));
       return $result->result();
    }
    
    
    function get_testimonial(){   
       $result = $this->db->get_where('testimonial', array('testimonial_satatus'=>1));
       return $result->result();
    }
    
    
     function get_services(){   
       $result = $this->db->get_where('services', array('services_status'=>1));
       return $result->result();
    }
    
    
    function get_services_details($services_id){
        $result = $this->db->get_where('services', array('services_id' =>$services_id,'services_status'=>1));
        return $result->row();
    }
    
    function get_gift_category(){
       $result = $this->db->get_where('gift_category', array('gift_category_status'=>1));
       return $result->result();        
    }
    
    function get_print_type(){    
       $result = $this->db->get_where('print_type', array('print_type_status'=>1));
       return $result->result();   
    }
    
    function get_gift($gift_id){
        $sql = "select * from gift where gift_id in ($gift_id)";
        $result = $this->db->query($sql);
        return $result->result();  
    }
    
    
    function get_print($printing_id){
        $result = $this->db->get_where('printing', array('printing_id'=>$printing_id));
       return $result->row();  
    }
    
    
     function get_government_paper($government_paper_id){
        $result = $this->db->get_where('government_paper', array('government_paper_id'=>$government_paper_id));
       return $result->row();  
    }
    
    
    function get_branch($language_id = ''){
                
        if($language_id == 2){
            $this->db->select('branch_id,branch_name_ar as branch_name,branch_image,branch_email,phone_number,whatsapp_no,address,pincode,google_map_url');
        }else{
            $this->db->select('branch_id,branch_name,branch_image,branch_email,phone_number,whatsapp_no,address,pincode,google_map_url');   
        }
        $result = $this->db->get_where('branch', array('status'=>1));
        return $result->result(); 
    }
    
    function get_gift_category_one($gift_category_id){
       $result = $this->db->get_where('gift_category', array('gift_category_id'=>$gift_category_id));
       return $result->row();  
    }
    
   function government_paper_category(){
       $result = $this->db->get_where('government_paper_category', array('government_paper_category_status'=>1));
       return $result->result(); 
   }
   
   
   function get_order_details($order_id){
       $result = $this->db->get_where('order_details', array('order_id'=>$order_id));
       return $result->row(); 
   }
   
   
   function get_photo_printing($photoprinting_id){
        $result = $this->db->get_where('photoprinting', array('photoprinting_id'=>$photoprinting_id));
        return $result->row();  
   }
   
   function get_class(){  
       $result = $this->db->get_where('class', array('class_status'=>1));
       return $result->result();
   }
   
   
   function get_summery($summery_id){
       
        $result = $this->db->get_where('summary', array('summary_id'=>$summery_id));
        return $result->row();  
   }
   
  function get_other($language_id){
       
      if($language_id==1){ 
        $this->db->select('others_id,others_tittle');
       }else{
        $this->db->select('others_id,ar_others_tittle as others_tittle'); 
       }
       $result = $this->db->get_where('others', array('others_status'=>1));
       return $result->result();
   }
   
   
   function get_other_one($language_id,$others_id){
      if($language_id==1){ 
        $this->db->select('others_id,others_tittle,others_description,others_image');
       }else{
        $this->db->select('others_id,ar_others_tittle as others_tittle,ar_others_description as others_description,others_image'); 
       }
       $result = $this->db->get_where('others', array('others_id'=>$others_id,'others_status'=>1));
       return $result->row();
   }
   
   
   function get_myorder($language_id,$user_id){
       
    $sql = "SELECT
    o.order_id,
    o.category_id,
    o.attributes_id,
    o.printing_file,
    o.qty,
    o.pickup_addr,
    o.delivery_addr,
    o.price,
    o.total_price,
    o.order_date,
    o.status,
    o.order_type,
    u.full_name,
    u.phone_number,
    u.email_id,
    b.branch_name,
    os.order_status
    
FROM
    order_details o
    
LEFT JOIN user u ON (u.user_id = o.user_id) LEFT JOIN branch b ON (b.branch_id = o.branch_id) LEFT JOIN order_status os ON (os.order_status_id = o.status) WHERE o.user_id = $user_id AND o.payment_status = 'paid' ORDER BY o.order_id DESC";  
        $query = $this->db->query($sql); 
        return $query->result();
   }
   
   
    public function get_myprofile($language_id,$user_id){
        
       $result = $this->db->get_where('user', array('user_id'=>$user_id));
       return $result->row();
       
    }
    
    public function update_profile($user_id,$data){ 
        $this->db->where('user_id',$user_id);
        $this->db->update('user',$data);
        return $user_id;  
    }
    
    public function change_password($data,$user_id){
        
        $this->db->where('user_id',$user_id);
        $this->db->update('user',$data);
        return TRUE;
    }
   
   
}
?>