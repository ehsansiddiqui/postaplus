<?php

class rest_m extends CI_Model

	{

	var $user = 'user';

	public

	function __construct()

		{

		parent::__construct();

		$this->load->database();

		}

	public

	function check_user($username, $password)

		{

		$sql = "SELECT * FROM user U  WHERE  U.phone_number = '$username' AND U.password = '$password' AND U.status = 1";

		$query = $this->db->query($sql);

		return $query->row();

		}

	public

	function user_updated($device_id, $device_type, $user_id)

		{

		$created_date = date('Y-m-d H:i:s', time());

		$data = array(

			'device_id' => $device_id,

			'device_type' => $device_type,

			'last_login_date' => $created_date

		);

		$this->db->where('user_id', $user_id);

		$this->db->update('user', $data);

		}

	public

	function add_user($data)

		{

		$this->db->insert('user', $data);

		return $this->db->insert_id();

		}

	public

	function users_check($phone_number)

		{

		$query = $this->db->get_where('user', array(

			'phone_number' => $phone_number

		));

		return $query->row();

		}

                

                

          

        public

	function get_profiles($user_id)

		{

    $this->db->select('user_id,phone_number,full_name,email_id,image') ;

		$query = $this->db->get_where('user', array(

			'user_id' => $user_id

		));

		return $query->row();

		}       

                

	public

	function get_users()

		{

            

		/*$this->db->select('U.user_id,U.phone_number,U.first_name,U.last_name,U.profile_image,U.email_id,U.country,U.gender,U.designation,U.address,U.hef_member_status,U.chapter_id,U.website,U.company,U.state,U.category,C.chapter_name');

		$this->db->join('chapter C', 'C.chapter_id= U.chapter_id', 'left');

		$this->db->order_by('C.chapter_name', 'ASC');

		$this->db->order_by('U.first_name', 'ASC');

		$query = $this->db->get_where('user U', array(

			'U.status' => 1

		));*/

            

                

                $sql = "SELECT

    `U`.`user_id`,

    `U`.`phone_number`,

    `U`.`first_name`,

    `U`.`last_name`,

    `U`.`profile_image`,

    `U`.`email_id`,

    `U`.`country`,

    `U`.`gender`,

    `U`.`designation`,

    `U`.`address`,

    `U`.`hef_member_status`,

    `U`.`chapter_id`,

    `U`.`website`,

    `U`.`company`,

    `U`.`state`,

    `U`.`category`,

    `C`.`chapter_name`

FROM

    `user` `U`

LEFT JOIN `chapter` `C` ON

    `C`.`chapter_id` = `U`.`chapter_id`

WHERE

    `U`.`status` = 1

ORDER BY

    COALESCE(`C`.`chapter_name`, 'zz') ASC,

    `U`.`first_name` ASC";

                

                $query = $this->db->query($sql);

		return $query->result();

                

		}

	public

	function get_advertisement()

		{

		$this->db->select('advertisement_id,advertisement_name,advertisement_url,advertisement_image');

		$query = $this->db->get_where('advertisement', array(

			'status' => 1

		));

		return $query->result();

		}

	public

	function edit_user($data, $user_id)

		{

		$this->db->where('user_id', $user_id);

		$this->db->update('user', $data);

		return $user_id;

		}

	public

	function add_posts($data)

		{

		$this->db->insert('user_posts', $data);

		return $this->db->insert_id();

		}

	public

	function get_user_post()

		{

		$sql = "SELECT UP.*,U.first_name,U.last_name,U.phone_number,U.email_id FROM user_posts UP , user U WHERE UP.user_id = U.user_id";

		$query = $this->db->query($sql);

		return $query->result();

		}

	public

	function get_chapter()

		{

		$this->db->order_by('chapter_name', 'ASC');

		$query = $this->db->get_where('chapter', array(

			'status' => 1

		));

		return $query->result();

		}

	public

	function get_user_divice_id($user_id)

		{

		$this->db->select('device_id,device_type');

		$query = $this->db->get_where('user', array(

			'user_id !=' => $user_id

		));

		return $query->result();

		}

	public

	function get_articles()

		{

		// $this->db->select('articles_id,articles_title,articles_desc');

		$query = $this->db->get_where('articles', array(

			'status' => 1

		));

		return $query->result();

		}

	public

	function get_message()

		{

		// $this->db->select('message_id,message_title,message_desc');

		$query = $this->db->get_where('message', array(

			'status' => 1

		));

		return $query->result();

		}

                

        public 

         

        function get_search($search_text){

            

          $sql = "SELECT

    U.user_id,

    U.phone_number,

    U.first_name,

    U.last_name,

    U.profile_image,

    U.email_id,

    U.country,

    U.gender,

    U.designation,

    U.address,

    U.hef_member_status,

    U.chapter_id,

    U.website,

    U.company,

    U.state,

    U.category,

    C.chapter_name

FROM

    `user` U

LEFT JOIN `chapter` C ON

    (C.chapter_id = U.chapter_id) WHERE ( C.chapter_name LIKE '%$search_text%' OR U.first_name LIKE '%$search_text%' OR U.last_name LIKE '%$search_text%' OR U.company LIKE '%$search_text%' OR U.category LIKE '%$search_text%' OR U.phone_number LIKE '%$search_text%' ) AND U.status = 1"; 

     

    $query = $this->db->query($sql);

    return $query->result();      

          

        }

        

        

        public

	function get_category()

		{

		$this->db->order_by('category_name', 'ASC');

		$query = $this->db->get_where('category', array(

			'status' => 1

		));

		return $query->result();

		}

                

                

        public

	function get_printing_type($language_id)

		{

            

		//$this->db->order_by('print_type_name', 'ASC');

             if($language_id == 1){

                $this->db->select('pt.print_type_id,pt.pri_type_name as print_type_name');

              }  else {

                $this->db->select('pt.print_type_id,pt.ar_pri_type_name as print_type_name');

              }  

                $this->db->where('pt.print_type_status',1);

		$query = $this->db->get('print_type pt'); 

               // print_r($this->db->last_query());die;

		return $query->result();   

              } 

                

                

        public

	function get_language()

		{

		

		$query = $this->db->get_where('language', array(

			'language_status' => 1

		));

		return $query->result();

		}

                

                

                

                

    public function get_printing($language_id,$print_type_id){

                    

//    $sql = "SELECT

//    P.printing_id,

//    P.price,

//    A.attributes_id,

//    AD.attributes_name,

//    PTD.print_type_name

//FROM

//    printing P,

//    print_type PT,

//    print_type_description PTD,

//    attributes A,

//    attributes_description AD

//WHERE

//    A.attributes_id = AD.attributes_id AND P.print_type_id = PT.print_type_id AND PT.print_type_id = PTD.print_type_id AND P.print_type_id = $print_type_id

//GROUP BY

//    AD.attributes_id";

        

        

        if($language_id == 1){

        $sql = "SELECT p.printing_id,p.print_type_id,p.attributes_id,p.price,pd.pri_type_name as print_type_name,ad.atr_name as attributes_name FROM printing p , print_type pd , attributes ad WHERE p.print_type_id = $print_type_id AND p.print_type_id = pd.print_type_id AND p.attributes_id = ad.attributes_id";

        }else{

           $sql = "SELECT p.printing_id,p.print_type_id,p.attributes_id,p.price,pd.ar_pri_type_name as print_type_name,ad.ar_atr_name as attributes_name FROM printing p , print_type pd , attributes ad WHERE p.print_type_id = $print_type_id AND p.print_type_id = pd.print_type_id AND p.attributes_id = ad.attributes_id"; 

        }   

        $query = $this->db->query($sql);            

        return $query->result(); 

        

    }

                

    public

             

    function printing_order($data)

		{

		$this->db->insert('order_details', $data);

		return $this->db->insert_id();

               }

     

     

               

               

        public

	function get_gift_category($language_id)

		{

            

		//$this->db->order_by('print_type_name', 'ASC');

            

                if($language_id == 1){

                $this->db->select('gc.gift_category_id,gc.gift_cate_name as gift_category_name,gift_cate_image');

                }else{

                 $this->db->select('gc.gift_category_id,gc.ar_gift_cate_name as gift_category_name,gift_cate_image');  

                }   

                $this->db->where('gc.gift_category_status',1);

		$query = $this->db->get('gift_category gc');

		return $query->result();

                

		}

                

                

                

    public function get_gift($language_id,$gift_category_id){

        

        if($language_id == 1){

        $sql = "SELECT g.gift_id,g.gift_category_id,g.attributes_id,g.price,gd.gift_cate_name as gift_category_name,agd.attr_group_name as attributes_group_name,a.atr_name as attributes_name FROM gift g , gift_category gd ,  attributes a , attributes_group agd WHERE g.gift_category_id = $gift_category_id AND g.gift_category_id = gd.gift_category_id AND g.attributes_id = a.attributes_id  AND a.attributes_group_id = agd.attributes_group_id";

        }else{

            

       $sql = "SELECT g.gift_id,g.gift_category_id,g.attributes_id,g.price,gd.ar_gift_cate_name as gift_category_name,agd.ar_attr_group_name as attributes_group_name,a.ar_atr_name as attributes_name FROM gift g , gift_category gd ,  attributes a , attributes_group agd WHERE g.gift_category_id = $gift_category_id AND g.gift_category_id = gd.gift_category_id AND g.attributes_id = a.attributes_id  AND a.attributes_group_id = agd.attributes_group_id";   

        }

        $query = $this->db->query($sql);            

        return $query->result(); 

    }

    

    

    

    public

             

    function gift_order($data)

     {

	$this->db->insert('order_details', $data);

	return $this->db->insert_id();

     }

    

    

        public

	function get_government_paper_category($language_id)

		{

            

                if($language_id == 1){

                $this->db->select('gp.government_paper_category_id,gp.government_paper_cate_name as government_paper_category_name');

                }else{

                 $this->db->select('gp.government_paper_category_id,gp.ar_government_paper_cate_name as government_paper_category_name');      

                }  

                $this->db->where('gp.government_paper_category_status',1);

		$query = $this->db->get('government_paper_category gp');

		return $query->result();

                

               }

            

            public 

            function get_government_papers($language_id,$government_paper_category_id){

                

          if($language_id == 1){      

        $sql = "SELECT g.government_paper_id,g.government_paper_category_id,g.price,g.government_paper_title FROM government_paper g   WHERE g.government_paper_category_id = $government_paper_category_id";

          }else{

              

         $sql = "SELECT g.government_paper_id,g.government_paper_category_id,g.price,g.ar_government_paper_title as government_paper_title FROM government_paper g   WHERE g.government_paper_category_id = $government_paper_category_id";      

              

          }

  

        $query = $this->db->query($sql);            

        return $query->result(); 

        

             }

                     

             

    public

            

    function government_papers_order($data)

     {

	$this->db->insert('order_details',$data);

	return $this->db->insert_id();

     }

     

     

     public 

             

     function get_photo_printing($language_id){

     

         if($language_id == 1){

  $sql = "SELECT p.photoprinting_id,p.photoprinting_title,p.attributes_id,p.price,ad.atr_name as attributes_name FROM photoprinting p , attributes ad WHERE  p.attributes_id = ad.attributes_id";


         }else{

             

       $sql = "SELECT p.photoprinting_id,p.ar_photoprinting_title as photoprinting_title, p.attributes_id,p.price,ad.ar_atr_name as attributes_name FROM photoprinting p , attributes ad WHERE  p.attributes_id = ad.attributes_id";

     

         }

     $query = $this->db->query($sql);            

     return $query->result(); 

         

     }

     

     

     

    public

            

    function photo_printing_order($data)
     {

	$this->db->insert('order_details',$data);

	return $this->db->insert_id();

     }

     

     

     

        public

	function get_others($language_id)

		{

            

		//$this->db->order_by('print_type_name', 'ASC');

                if($language_id == 1){
                $this->db->select('o.others_id,o.others_tittle,o.others_description,o.others_image');
                }else{
                    
                 $this->db->select('o.others_id,o.ar_others_tittle as others_tittle,o.ar_others_description as others_description ,o.others_image');   
                }


                $this->db->where('o.others_status',1);

		$query = $this->db->get('others o');

		return $query->result();

                

		}

                

        public

        function get_order($user_id){

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

   o.order_type

FROM

    order_details o

WHERE

    o.user_id = $user_id
";
    
$query = $this->db->query($sql);            
return $query->result(); 

  }

        

        

    public function get_branch($language_id){

        

        if($language_id == 1){

            $this->db->select('branch_id,branch_name,branch_image,address,phone_number,pincode');

        }

        if($language_id == 2){

            $this->db->select('branch_id,branch_name_ar as branch_name,branch_image,address,phone_number,pincode');

        } 

        $query = $this->db->get_where('branch', array(

			'status' => 1

		));

	return $query->result();

            

    }

    
    public function get_banner($language_id){                 
        $this->db->select('shop_banner_id as banner_id,shop_banner_name as banner_name,shop_banner_image as banner_image');
        $query = $this->db->get_where('shop_banner', array('status' => 1));
	return $query->result();        
    }
    
    
    public function get_class($language_id){
            if($language_id == 1){
                $this->db->select('c.class_id,c.class_name');
                }else{        
                 $this->db->select('c.class_id,c.ar_class_name as class_name');   
                }
                $this->db->where('c.class_status',1);
		$query = $this->db->get('class c');
	      return $query->result();
    }
    
    public 

    function get_summary($language_id,$class_id){
        
          if($language_id == 1){      
   $sql = "SELECT s.summary_id,s.class_id,s.summary_tittle,s.summary_price FROM summary s WHERE s.class_id = $class_id";
          }else{
      $sql = "SELECT s.summary_id,s.class_id,s.ar_summary_tittle as summary_tittle,s.summary_price FROM summary s WHERE s.class_id = $class_id ";
           }
        $query = $this->db->query($sql);            
        return $query->result(); 
        
        }
        
        
        
        
     public 

    function get_brand($language_id,$class_id){
         
      if($language_id == 1){      
          $sql = "SELECT b.brand_id,b.brand_name FROM brand b WHERE class_id = '$class_id'";
          }else{
          $sql = "SELECT b.brand_id,b.ar_brand_name as brand_name FROM brand b WHERE class_id = '$class_id'";
           }
        $query = $this->db->query($sql);            
        return $query->result(); 
        
        }    

        
        
    public
    function summary_order($data)
     {
	$this->db->insert('order_details',$data);
	return $this->db->insert_id();
     }   
     
    public function get_brands($language_id){       
            if($language_id == 1){
                $this->db->select('b.brand_id,b.brand_name,b.brand_price');
                }else{        
                 $this->db->select('b.brand_id,b.ar_brand_name as brand_name,b.brand_price');   
                }
                $this->db->where('b.status',1);
		$query = $this->db->get('brand b');
	        return $query->result();             
    } 
     
    
}?>