<?php
class Enquiry extends CI_Controller {

    function Enquiry() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('enquiry_m', 'Obj_enquiry_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_enquiry_M->get_enquiry();
        $this->layout->view('enquiry_v', $data);
    }
    
    public function detail_view($enquiry_id){
        
        $data['result'] = $this->Obj_enquiry_M->get_enquiry_details($enquiry_id);
        
        if($data['result']->enquiry_type_id == 1){
            
        $data['new'] = $this->Obj_enquiry_M->get_new_vehicle_details($data['result']->enquiry_ref_id); 
        
        }elseif ($data['result']->enquiry_type_id == 2){
            
        $data['used'] = $this->Obj_enquiry_M->get_used_vehicle_details($data['result']->enquiry_ref_id);
        
        }elseif ($data['result']->enquiry_type_id == 3){
            
        $data['parts'] = $this->Obj_enquiry_M->get_parts_vehicle_details($data['result']->enquiry_ref_id);
        
        }else{
            
        $data['acess'] = $this->Obj_enquiry_M->get_acess_vehicle_details($data['result']->enquiry_ref_id);
         
        }
        
        $data['enquiry_id'] = $enquiry_id;
        $this->layout->view('enquiry_detail_v', $data);
        
    }
    
    
    public function send_mail($enquiry_id){
        
       $data = $this->Obj_enquiry_M->get_enquiry_details($enquiry_id);
       
       
    $header =   'MIME-Version: 1.0' . "\r\n";
    $header .=  "Content-type:text/html\r\n";
    $header .=  'From: Proton.128.199.118.56' . "\r\n";
   //$header.= "From:info@128.199.118.56";
    $id = base64_encode($enquiry_id);
    $subject = "PROTON";
    $link = "http://128.199.118.56/proton_new/payumoney/index.php?id=$id";

    $message = '<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>HOMER -  Email Template</title>
    <style>
        * {
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            font-size: 100%;
            line-height: 1.6em;
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 600px;
            width: 100%;
        }

        body {
            -webkit-font-smoothing: antialiased;
            height: 100%;
            -webkit-text-size-adjust: none;
            width: 100% !important;
        }

        a {
            color: #348eda;
        }

        .btn-primary {
            Margin-bottom: 10px;
            width: auto !important;
        }

        .btn-primary td {
            background-color: #62cb31;
            border-radius: 3px;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-size: 14px;
            text-align: center;
            vertical-align: top;
        }

        .btn-primary td a {
            background-color: #62cb31;
            border: solid 1px #62cb31;
            border-radius: 3px;
            border-width: 4px 20px;
            display: inline-block;
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
            line-height: 2;
            text-decoration: none;
        }

        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .padding {
            padding: 10px 0;
        }

        table.body-wrap {
            padding: 20px;
            width: 100%;
        }

        table.body-wrap .container {
            border: 1px solid #e4e5e7;
        }

        table.footer-wrap {
            clear: both !important;
            width: 100%;
        }

        .footer-wrap .container p {
            color: #666666;
            font-size: 12px;

        }

        table.footer-wrap a {
            color: #999999;
        }

        h1,
        h2,
        h3 {
            color: #111111;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-weight: 200;
            line-height: 1.2em;
            margin: 40px 0 10px;
        }

        h1 {
            font-size: 36px;
        }
        h2 {
            font-size: 28px;
        }
        h3 {
            font-size: 22px;
        }

        p,
        ul,
        ol {
            font-size: 14px;
            font-weight: normal;
            margin-bottom: 10px;
        }

        ul li,
        ol li {
            margin-left: 5px;
            list-style-position: inside;
        }
        .container {
            clear: both !important;
            display: block !important;
            Margin: 0 auto !important;
            max-width: 600px !important;
        }

        .body-wrap .container {
            padding: 40px;
        }

        .content {
            display: block;
            margin: 0 auto;
            max-width: 600px;
        }
        .content table {
            width: 100%;
        }

    </style>
</head>

<body bgcolor="#f7f9fa">

<table class="body-wrap" bgcolor="#f7f9fa">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">

            <div class="content">
                <table>
                    <tr>
                        <td>
                            <strong>Please Make Payment</strong>
                            <p>Click on the "Click here to Pay" link in the email.</p>
                     
                            <table class="btn-primary" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td>
                                        <a href="'.$link.'">Click here to Pay</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

        </td>
        <td></td>
    </tr>
</table>

<table class="footer-wrap">
    <tr>
        <td></td>
        <td class="container">

            <div class="content">
                <table>
                    <tr>
                        <td align="center">
                      <p>Proton</p>
                        </td>
                    </tr>
                </table>
            </div>

        </td>
        <td></td>
    </tr>
</table>

</body>
</html>';

    @mail("$data->email", "$subject", "$message", "$header");      
    redirect('enquiry/detail_view/'.$enquiry_id);
  
    }
}?>