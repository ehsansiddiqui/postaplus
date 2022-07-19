<?php

    ob_start();
    include('index.php');
    ob_end_clean();
    $CI =& get_instance();
    $CI->load->library('session'); 
    $CI->load->helper(array('form', 'url'));
    if(!$CI->session->userdata('user_id')){
       redirect(base_url()); 
    }
    $CI->load->database();
    $gift_category = $CI->db->get_where('gift_category', array('gift_category_status'=>1))->result();
    
 //Decryption Method for AES Algorithm Starts

function decrypt($code,$key) { 
$code =  hex2ByteArray(trim($code));
$code=byteArray2String($code);
$iv = $key; 
$code = base64_encode($code);
$decrypted = openssl_decrypt($code, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $iv);
return pkcs5_unpad($decrypted);
}

function hex2ByteArray($hexString) {
$string = hex2bin($hexString);
return unpack('C*', $string);
}


function byteArray2String($byteArray) {
$chars = array_map("chr", $byteArray);
return join($chars);
}


function pkcs5_unpad($text) {
$pad = ord($text{strlen($text)-1});
if ($pad > strlen($text)) {
return false;	
}
if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) {
return false;
}
return substr($text, 0, -1 * $pad);
}

//Decryption Method for AES Algorithm Ends

    
    
/*
******************************************************************************************
Disclaimer:- Important Note in Sample Pages
- This is a sample demonstration page only meant for demonstration, this page 
should not be used in production.
- Transaction data should only be accepted once from a browser at the point 
of input, and then kept in a way that does not allow others to modify it 
(example server session, database etc..)
- Any information displayed to a customer such as amount, should 
be passed only as display information and the actual transaction data should 
be retrieved from a secure source at the end point of processing the transaction.
- Any information passed through the customer's browser can potentially be 
modified/edited/changed/deleted by the customer, or even by third parties to 
fraudulently alter the transaction data/information. Therefore, all transaction 
information should not be passed through the browser to Payment Gateway in a way
that could potentially be modified (example hidden form fields). 
******************************************************************************************
*/


/* Below is the list of parameters sent from PG to merchant. 
========================================================= */
if(isset($_REQUEST['ErrorText']) || isset($_REQUEST['Error'])) 
{
$ResErrorText= $_REQUEST['ErrorText']; 	  	//Error Text/message
$ResErrorNo = $_REQUEST['Error'];           //Error Number
$ResTranData = null;
} else {
$ResErrorText= null; 	  	
$ResErrorNo = null;
$ResTranData= $_REQUEST['trandata'];
}	
$ResPaymentId = $_REQUEST['paymentid'];		//Payment Id
$ResTrackID = $_REQUEST['trackid'];       	//Merchant Track ID
$ResResult =  $_REQUEST['result'];          //Transaction Result
$ResPosdate = $_REQUEST['postdate'];        //Postdate
$ResTranId = $_REQUEST['tranid'];           //Transaction ID
$ResAuth = $_REQUEST['auth'];               //Auth Code		
$ResRef = $_REQUEST['ref'];                 //Reference Number also called Seq Number
$ResAmount = $_REQUEST['amt'];              //Transaction Amount
$Resudf1 = $_REQUEST['udf1'];               //UDF1
$Resudf2 = $_REQUEST['udf2'];               //UDF2
$Resudf3 = $_REQUEST['udf3'];               //UDF3
$Resudf4 = $_REQUEST['udf4'];               //UDF4
$Resudf5 = $_REQUEST['udf5'];               //UDF5

/* Below Terminal resource Key is used to decrypt the response sent from Payment Gateway.
Terminal Resource Key is generated while creating terminal and this the Key that is used for decrypting 
the response from PG. Please contact PGSupport@knet.com.kw to extract this key. */
$termResourceKey="9183369917709183";

/* Merchant (ME) checks, if error is NOT present,then go for decryption using required parameters */
/* NOTE - MERCHANT MUST LOG THE RESPONSE RECEIVED IN LOGS AS PER BEST PRACTICE */
if($ResErrorText==null && $ResErrorNo==null && $ResTranData !=null)
{

//Decryption logice starts
$decrytedData=decrypt($ResTranData,$termResourceKey);

/* IMPORTANT NOTE - MERCHANT SHOULD UPDATE TRANACTION PAYMENT STATUS IN HIS DATABASE AT THIS POINT 
AND THEN REDIRECT CUSTOMER TO THE RESULT PAGE. */

  $Responce= explode("&",$decrytedData);
//   print_r($Responce);
  
  $ResponceDataAmount = explode("=",$Responce[13]);
  $DataAmount = $ResponceDataAmount[1]; 
  $ResponceDataPaymentId = explode("=",$Responce[0]);
  $DataPaymentId = $ResponceDataPaymentId[1]; 
  $ResponceDataTrackId = explode("=",$Responce[5]);
  $DataTrackId = $ResponceDataTrackId[1]; 
  $ResponceDataudf1 = explode("=",$Responce[8]);
  $ResponceDataudfTrack = explode("=",$Responce[7]);
  $Dataudf1 = $ResponceDataudf1[1]; 
  $ResponceDataRef = explode("=",$Responce[4]);
  $DataRef = $ResponceDataRef[1];  
  $ResponceDataRef = explode("=",$Responce[4]);
  $DataRef = $ResponceDataRef[1]; 
  $ResponceDataResult = explode("=",$Responce[1]);
  $DataResult = $ResponceDataResult[1];
  $date = date('Y-m-d H:i:s');
  

  $data = array('payment_id'=>$DataPaymentId,'trackid'=>$DataTrackId,'order_id'=>$Dataudf1,'ref'=>$DataRef,'result'=>$DataResult,'date'=>$date,'amt'=>$DataAmount);
    
if($CI->db->insert('payment',$data)){
    
    $to = $CI->session->userdata('email_id');
    $full_name = $CI->session->userdata('full_name');
    $subject = 'Your Order Confirmation from '.date('M d').', '.date('Y').''; 
    
    if($DataResult == 'NOT+CAPTURED'){
     $sql1 = "UPDATE `order_details` SET `payment_status`='failed' WHERE order_id =  $Dataudf1";   
     $CI->db->query($sql1);
    }elseif($DataResult == 'CAPTURED'){       
       $sql1 = "UPDATE `order_details` SET `payment_status`='paid' WHERE order_id = $Dataudf1";   
       $CI->db->query($sql1);    
    }
     

        	
	$message = '<!DOCTYPE html>
        <html>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>Posta Plus Student Center - Order Confirmation</title>
        <style>
            html{background-color:#efefef;}
            .table td{
                height:30px;
            }
            .table tr:nth-child(even) {
                background-color: #f7f7f7;
            }
        </style>
    </head>
    <body >
        <div bgcolor="#efefef" style="background:#efefef"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;" bgcolor="#efefef"  >
                <tbody>
                    <tr>
                        <td valign="top">
                            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#efefef" >
                                <tbody>
                                    <tr> 
                                        <td width="579" valign="top">
                                            <table width="579" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td height="5" style="font-size:2px">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td height="12" style="font-size:2px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" height="14">
                                                            <table width="579" border="0" cellspacing="0" cellpadding="0" height="14" style="line-height:0">
                                                                <tbody><tr height="14">
                                                                        <td valign="top" height="14">
                                                                            <img alt="" src="https://ci4.googleusercontent.com/proxy/_fDpSAmiJ3_gqrJKi9c14Gm_FeFo-f0j8HnvVEOtLOy430VDXYHjoZiNTkDJAw6DTA_PNK58gjoJ-uuViWYZlt_mmafNNpsG52G1f6UcBv3P=s0-d-e1-ft#http://pkt-emails.s3.amazonaws.com/rounded_top-original.gif" border="0" >
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" bgcolor="#FFFFFF">
                                                            <table width="579" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="33">
                                                                            &nbsp;</td>
                                                                        <td width="510" valign="top">
                                                                            <table width="510" border="0" cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td height="10" style="font-size:2px">
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td valign="top" align="center"> 
                                                                                            <a href="https://www.postastc.com/" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://www.postastc.com/" target="_blank">
      <img alt="Logo" src="https://www.postastc.com/postaplus/assets/web/images/logo-colored-en.png" width="200px"  ></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="30" style="font-size:2px">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            <font style="font-family:HelveticaNeue,Arial,Helvetica,sans-serif;font-size:16px;line-height:18px;color:#000000;font-weight:bold"> Hi '.$full_name.', <br><br>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top">
        <font style="font-family:HelveticaNeue,Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#000000">
        <p style="float:left;">Thank you for using </p>  <p style="color: #ea7f1d;font-weight: bold; margin-left:10px; float:left;"> Postaplus Student Center </p></font>

                                                                                        </td>
                                                                                    </tr>


                                                                                    <tr><td>
                                                                                        
                                                                                       <table class="table"   style="margin-left:auto; margin-right:auto;   width:90%; margin-bottom:50px; margin-top:20px; ">
                                    <tr>
                                        <td>ORDER ID</td>
                                        <td>'.$Dataudf1.'</td>
                                    </tr>
                                    <tr>
                                        <td>Ref No</td>
                                        <td>'.$DataRef.'</td>
                                    </tr>
                                     <tr>
                                        <td>Payment ID</td>
                                        <td>'.$DataPaymentId.'</td>
                                    </tr>
                                     <tr>
                                        <td>Transaction ID</td>
                                        <td>'.$DataTrackId.'</td>
                                    </tr>
                                    <tr>
                                        <td>AMOUNT</td>
                                        <td>'.$DataAmount.'</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>STATUS</td>
                                        <td>'.$DataResult.'</td>
                                    </tr> 
                                      
                                    <tr>
                                        <td>DATE</td>
                                        <td>'.date('d-M-Y H:i',strtotime($date)).'</td>
                                    </tr>

                                </table></td>
                                                                                    </tr> 

                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            <font style="font-family:HelveticaNeue,Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#000000">
                                                                                            Your satisfaction is important to us. If you have any inquiries, feel free to contact us on 
                                                                                            <a href="mailto:support@postastc.com" target="_top" style="text-decoration:none; color:#ea7f1d">support@postastc.com</a>.
                                                                                             
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td height="20" style="font-size:2px">
                                                                                        </td>
                                                                                    </tr>

                                                                                     

 


                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            <font style="font-family:HelveticaNeue,Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#000000">
                                                                                            Thank You <br/>
                                                                                            <b>The PostaPlus Student Center Team</b> </font>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="24" style="font-size:2px">
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody></table>
                                                                        </td>
                                                                        <td width="36">
                                                                            &nbsp;</td>
                                                                    </tr>
                                                                </tbody></table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table cellspacing="0" id="m_2679404925164352584templateFooter" border="0" style="height:57px;table-layout:fixed" width="100%" cellpadding="0">
                                                                <tbody style="height:57px;table-layout:fixed;background-color: #ea7f1d;">
                                                                    <tr>
                                                                        <td height="10" style="font-size:2px">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td valign="top">
                                                            <table width="579" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody><tr>
                                                                        <td height="24" style="font-size:2px">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="22" style="font-size:2px">
                                                                        </td>
                                                                    </tr>
                                                                </tbody></table>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                        <td width="10">
                                            &nbsp;</td>
                                    </tr>
                                </tbody></table>
                        </td>
                    </tr>
                </tbody></table>

            <img src="https://ci4.googleusercontent.com/proxy/nUdkGrPerA8xMw6l5C9DJFv7jg8gg7x9sAyrWEG35bRZieSYsEScsyMhHlHCA314XABfYlmdKH1APB-gS8QXPEYBHkWZ3rRXvIBF7aov8OGbzAu_T2VKAWn-HXg8ns5ArEJe26y-NCHrnXJE1RxCWuh3NpNdT2oSPojm-bNKu6yaAxTTWEWMrUdBCecL01zxuQTkyGNTkp9F_bAoyJIZurF5MqIczTKCrgQEJDaGVe45nYOqlRtSO711LHsmq_7QeelxMTV85EYAfHUJ7lXTRmRkNWiFJLQImLzF2P4_U1QFnYiFpHZUO0AyVu0xPEqNG-Nz-4UTcn4cwMeQzn5YIOoddhvaXls1_Pd7MOv1UEsKuhk7E92qhVUFRhzTdAyMHAEijveNjs2IwM_WTvIOqbmuur0GPhuhDFYxOA=s0-d-e1-ft#http://email.getpocket.com/wf/open?upn=vrhtrdJgsHGdyxgClkrF855wPr29QaMeJ0-2FZ8hZnpW7tnncBDyK4lZKL7gqtTOtd6qOAzc-2FyFjQC0aowjpEvDAzaZuvNNKwktPMMxFqv53pMIIYcLnLlpP-2BWBq45uCbYHO1piG1cJmPjjQlQ082B9D8WCSxKD-2F52c75whfxHiKyiVBjNxm3szb0-2B6yoBm3FYrWxErTfzP-2FyKnccECS7kWn-2FQeji5rIQyNL3-2Fgle5QIg-3D" alt="" width="1" height="1" border="0" style="height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important" class="CToWUd"> </div>
    </body>

</html>';
	$headers = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
        $headers .= 'From:postastc.com' . "\n";
        if(mail($to,$subject,$message,$headers)){
            
             
        $admin_email = 'info@postastc.com';
        $full_name = $CI->session->userdata('full_name');
        $subject = 'New Order Placed from '.date('M d').', '.date('Y').'';	
	$message = '<table width="400" border="0" cellpadding="3">
               <tr>
               <td>New Order Placed Order id '.$Dataudf1.'</td>
              </tr>
            </table>';
	 $headers = 'MIME-Version: 1.0' . "\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
         $headers .= 'From:postastc.com' . "\n";
         @mail($admin_email,$subject,$message,$headers);    
        }
        
        
}


//header("Location: https://www.postastc.com/postaplus/result.php?".$decrytedData);
//exit();

?>

<!DOCTYPE php>
<html dir="ltr" lang="en-US">
    <head>

        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="author" content="Amer Salloum - SPlus Kuwait" />
        <!-- Stylesheets
        ============================================= -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
              rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/style.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/swiper.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/magnific-popup.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/responsive.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/colors.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:image" content="http://www.postastc.com/Posta-Logo.jpg" />
        <link rel="mask-icon" sizes="any" href="<?=base_url()?>assets/web/favicon-32x32.png" />
        <link rel="icon" type="image/png" href="<?=base_url()?>assets/web/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?=base_url()?>assets/web/favicon-16x16.png" sizes="16x16" />
        <!-- Document Title
        ============================================= -->
        <title>Posta Plus - Printing Office (Student Center)</title>
        <style>
            #header {
                background-color: #FFF !important;
                /*ea7f1d*/
            }
            #primary-menu li {

                border-bottom: solid 1px #b96518;
                overflow: hidden;
            }
            #primary-menu a {

                margin: 20px 20px;
            }
            #primary-menu li:after {}
            #primary-menu li.active {
                background-color: #ea7f1d !important;
            }
            #primary-menu li.active a {
                color: #FFF !important;
            }

            #primary-menu li:hover {
                background-color: #ea7f1d !important;
                color: #FFF !important;
            }

            #primary-menu li:hover a {
                color: #FFF !important;
            }

            .side-header #primary-menu ul li {
                float: none;
                margin: 0;
            }

            .side-header #logo:not(.nobottomborder)::after,
            .side-header #primary-menu:not(.nobottomborder)::after {
                border-bottom: none !important;
            }

            .d-lg-block {

                position: fixed;
                bottom: 0;
            }

            .side-header #header {
                border-right: none;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.065);
            }

            #logo img {
                padding: 0 20px;
            }

            .homepageicon {}

            .homepageicon:before {
                font-family: 'font-icons';
                content: "\e6d0";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;

                max-height: 100%;

            }

            .abouticon:before {
                font-family: 'font-icons';
                content: "\e710";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;

                max-height: 100%;

            }

            .servicesicon:before {
                font-family: 'font-icons';
                content: "\e6ce";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;

                max-height: 100%;

            }
            
            .servicesicon2:before{
                font-family: 'font-icons';
                content: "\e72f";  
                font-style: normal;
                font-weight: normal; 
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity:0.2;
                right:0px;
                top:20px;  
                z-index: 1;
                max-height: 100%;

            }

            .locationsicon:before {
                font-family: 'font-icons';
                content: "\e7c2";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;
                max-height: 100%;

            }

            .contacticon:before {
                font-family: 'font-icons';
                content: "\e748";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;

                max-height: 100%;

            }

            #primary-menu ul li a:before {
                color: #bebebe;
            }

            #primary-menu ul li.active a:before {
                color: #dedede;
            }

            #primary-menu ul li:hover a:before {
                color: #bebebe;
            }
            
            @media only screen and (max-width: 600px){
                .fbox-media{
                    margin-bottom: 0px !important;
                }
                .feature-box.media-box p{
                    margin-top:0px !important;
                }
                .feature-box {
                    box-shadow: #dedede 1px 1px 8px;

                }
                .fbox-desc{
                    padding:10px;
                }
            }
            .fbox-desc h3{
                color: #333333;
                font-size:18px;
            }
            .fbox-desc p{
                color: #444;
            }

            
            .service-box:hover {
                background-color: transparent;
                border: 5px solid #E87D1E;
            }
            .service-box:hover .st0{
                fill:#E87D1E;
            }
            
            .st0{
                fill:#fff;
            }
            .st0:hover{
                fill:#E87D1E;
            }

                        /* Extra small devices (phones, 600px and down) */
           @media only screen and (max-width: 600px) {
           .service-box{
                border: none;
                background-color: #E87D1E; 
                border-radius: 10px;
                height: 100px;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
               
               .service-box svg{
                position: absolute;
                height: 60px;
                width:60px;  
                left:50%;
                margin-left:-50px; 
                margin-top:25px;

            }
           }

           /* Small devices (portrait tablets and large phones, 600px and up) */
           @media only screen and (min-width: 600px) {
           .service-box{
                border: none;
                background-color: #E87D1E; 
                border-radius: 10px;
                height: 100px;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
               
               .service-box svg{
                position: absolute;
                height: 60px;
                width:60px;  
                left:50%;
                margin-left:-50px; 
                margin-top:25px;

            }
           }

           /* Medium devices (landscape tablets, 768px and up) */
           @media only screen and (min-width: 768px) {
           
           }

           /* Large devices (laptops/desktops, 992px and up) */
           @media only screen and (min-width: 992px) {
           .service-box{
                border: none;
                background-color: #E87D1E; 
                border-radius: 10px;
                height: 140px;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
               
               .service-box svg{
                position: absolute;
                height: 80px;
                width:80px;  
                left:50%;
                margin-left:-50px; 
                margin-top:25px;

            }
           }

           /* Extra large devices (large laptops and desktops, 1200px and up) */
           @media only screen and (min-width: 1200px) {
           .service-box{
                border: none;
                background-color: #E87D1E; 
                border-radius: 10px;
                height: 177px;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
               .service-box svg{
                position: absolute;
                height: 110px;
                width:110px;  
                left:50%;
                margin-left:-50px; 
                margin-top:25px;

            }
           }
           
                       .footerfixed {
                position:fixed !important; 
                bottom:0;     
                width: calc(100% - 260px);
                width: -moz-calc(100% - 260px);
                width: -webkit-calc(100% - 260px);
            }
            @media only screen and (max-width: 990px) {
                .footerfixed {
                    position:fixed !important; 
                    bottom:0px;
                    width: 100% !important; 
                }
            }
            .label{
                margin-top:10px;
            }
            .divDevider{
                margin-left:auto; 
                margin-right:auto; 
                width:100%; 
                max-width:100%; 
                margin-top:30px; 
                border:1px solid #ccc; 
                border-radius: 10px; 
                box-shadow: #ddd 0px 5px 5px; 
            }
            
        #overlay {
                background: rgba(0,0,0,0.5);
                color: #666666;
                position: fixed;
                height: 100%;
                width: 100%;
                z-index: 5000;
                top: 0;
                left: 0;
                float: left;
                text-align: center;
                padding-top: 25%;
            }

            
            
        </style>
        <link rel="stylesheet" href="<?=base_url()?>assets/sweetalert.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/services.css" type="text/css" />
        <script src="<?=base_url()?>assets/web/js/jquery.js"></script>
    </head>

    <body class="stretched side-header" data-loader="2" data-animation-in="fadeIn" data-speed-in="1500" data-animation-out="fadeOut"
          data-speed-out="800" data-loader-color="ea7f1d">

          <div id="overlay" style='display:none'>
                    <img src="<?=base_url()?>loader.gif" alt="Loading" /><br/>
                    Loading...
          </div> 

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="login-pop" tabindex="-1" role="dialog" aria-labelledby="login-popLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="login-popLabel"> Login </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form class="default-form" id="login-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="number" name="phone_number" class="form-control" id="exampleFormControlInput1" maxlength="15" placeholder="Phone number" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" maxlength="255" placeholder="Password">
                            </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>

                   </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="registration-pop" tabindex="-1" role="dialog" aria-labelledby="registration-popLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registration-popLabel"> Registration </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="default-form" id="login-registration" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
    <input type="number" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number" required="" maxlength="15">
                            </div>
                            
                            <div class="form-group">
   <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
                            </div>
                            
    
                            <div class="form-group">
    <input type="email" name="email_id" class="form-control" id="email_id" placeholder="Email" required="">
                            </div>
                    
                            <div class="form-group">
    <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Name">
                            </div>
                    
                     <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <div class="user-section">
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    My Account
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    
                    <?php if($CI->session->userdata('user_id')){ ?>
                    
                    <div class="user_acc_wrapper">
                        <div class="user_icon">
                            <?php if(!empty($CI->session->userdata('image'))){ ?>
                 <img src="<?=base_url()?>user/<?=$CI->session->userdata('image')?>" alt="" width="80" height="80">
                            <?php }else{ ?>
                            <img src="https://dummyimage.com/80x80/000/fff" alt="">
                            <?php } ?>
                        </div>
                        <h3><?=$CI->session->userdata('full_name')?></h3>
                        <p><?=$CI->session->userdata('email_id')?></p>
                    </div>
                    
                    
                    <a href="<?=site_url('profile')?>" class="dropdown-item <?php if ($CI->uri->segment(1) == 'profile') { ?> active <?php } ?>"> My Account </a>
                    <a href="<?=site_url('myorder')?>" class="dropdown-item <?php if ($CI->uri->segment(1) == 'myorder') { ?> active <?php } ?>">  My Orders </a>
                    <a href="<?=site_url('login/logout')?>" class="dropdown-item"> Logout </a>
                    
                    <?php }else{ ?>
<!--                <button class="dropdown-item" type="button"> Share with friends </button>
                    <button class="dropdown-item" type="button"> Leave Feedback </button>
                    <button class="dropdown-item" type="button"> Rate us on play Store </button>-->
           <button class="dropdown-item" type="button" data-toggle="modal" data-target="#login-pop"> Login </button>
           <button class="dropdown-item" type="button" data-toggle="modal" data-target="#registration-pop"> Registration
                    <?php } ?>
                    </button>

                </div>
            </div>
        </div>


        <!-- Document Wrapper
        ============================================= -->
        <div id="wrapper" class="clearfix">

            <!-- Header
        ============================================= -->
            <header id="header" class="no-sticky ">

                <div id="header-wrap">

                    <div class="container clearfix" style="padding: 0 !important;">

                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                        <!-- Logo
        ============================================= -->
                        <div id="logo" class="nobottomborder" style="">
                            <a href="<?=base_url()?>" class="standard-logo" data-dark-logo="../images/logo-en.svg"><img src="<?=base_url()?>assets/web/images/logo-colored-en.svg"
                                                                                                                   alt="Posta Plus Logo"></a>
                            <a href="<?=base_url()?>" class="retina-logo" data-dark-logo="../images/logo-en.svg"><img src="<?=base_url()?>assets/web/images/logo-colored-en.svg"
                                                                                                                 alt="Posta Plus Logo"></a>
                        </div><!-- #logo end -->

                        <div class="col_full center">
<!--                            <a href="../ar/index.html" style="color:#444; font-size:20px;">عربي</a>-->
                        </div>
                        <!-- Primary Navigation
        ============================================= -->
                        <nav id="primary-menu" class="">

                            <ul>
                                <li <?php if ($CI->uri->segment(1) == '') { ?> class="active"<?php } ?>>
                                    <a href="<?=base_url()?>" class="homepageicon">
                                        <div>Home</div>
                                    </a></li>
                                    
                                    
                                <li <?php if ($CI->uri->segment(1) == 'about') { ?> class="active"<?php } ?>>
                                    <a href="<?=site_url('about')?>" class="abouticon">
                                        <div>About</div>
                                    </a> 
                                </li>
                                
                                <li <?php if ($CI->uri->segment(1) == 'online_services') { ?> class="active"<?php } ?>>
                                    <a href="<?=site_url('online_services')?>" class="servicesicon2">
                                        <div>All Services</div>
                                    </a> 
                                </li>
                                
    <!--		<li><a href="services.html" class="servicesicon">
                              <div>Services</div>
                             </a>
    </li>-->
                            <li class="dd_menu_cover<?php if ($CI->uri->segment(1) == 'services') { ?> active <?php } ?>">
                                    
                                    <a href="<?=site_url('services')?>" class="servicesicon">
                                        <div>Online Services</div>
                                    </a>
                                    
                                    
                                    <div class="dd_menu" >
                                        <ol>
                                            <li>
                                                <?php if($CI->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('printing');?>"> Printing </a>
                                                <?php }else{ ?>
                                                <a href="<?=site_url('login?page=printing');?>"> Printing </a>
                                                <?php } ?>
                                            </li>
                                            <li>
               <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Gift </a>
                                            <div class="collapse" id="collapseExample">
                                   <?php foreach ($gift_category as $row): ?> 
                                  <?php if($CI->session->userdata('user_id')){ ?>                 
     <a class="sub-in-list" href="<?=site_url('gift?category_id='.$row->gift_category_id)?>"><?=$row->gift_cate_name;?></a>
                                      <?php }else{ ?>
        <a class="sub-in-list" href="<?=site_url('login?page=gift?category_id='.$row->gift_category_id);?>"> <?=$row->gift_cate_name;?> </a>
                                        <?php } ?>
     
                                   <?php endforeach;?>        
                                            </div>
                                                
                                            </li>
                                            <li>
                                           <?php if($CI->session->userdata('user_id')){ ?>
                                            <a href="<?=site_url('government_pappers')?>"> Government Pappers </a>
                                            <?php }else{ ?>   
                                   <a href="<?=site_url('login?page=government_pappers');?>"> Government Pappers </a>   
                                               <?php } ?>
                                            </li>
                                            <li>
                                               
                                                 <?php if($CI->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('photo_printing')?>"> Photo Printing </a>
                                                <?php }else{ ?> 
                                    <a href="<?=site_url('login?page=photo_printing');?>"> photo Printing </a>
                                                 <?php } ?>
                                                
                                            </li>
                                            <li>
                                                 <?php if($CI->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('summery')?>"> Summery </a>
                                                  <?php }else{ ?> 
                                    <a href="<?=site_url('login?page=summery');?>"> Summery </a>
                                                 <?php } ?>
                                            </li>
<!--                                            <li>
                                                <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                                                    Others </a>
                                                <div class="collapse " id="collapseExample1">
                                                   
                    <?php if(!empty($other)){  foreach ($other as $oth){ ?>                                  
                    <a class="sub-in-list" href="<?=site_url('other?id='.$oth->others_id)?>"><?=$oth->others_tittle?></a>
                    <?php } } ?>
                     
                                                </div>
                                            </li>-->
                                        </ol>


                                    </div>
                                </li>

   
                                <li <?php if ($CI->uri->segment(1) == 'branch') { ?> class="active"<?php } ?>>
                                    <a href="<?=site_url('branch')?>" class="locationsicon">
                                        <div>Branches</div>
                                    </a> 
                                </li>
                                
                                
                                <li <?php if ($CI->uri->segment(1) == 'contact') { ?> class="active"<?php } ?>>   
                                    <a href="<?=site_url('contact')?>" class="contacticon">
                                        <div>Contact</div>
                                    </a> 
                                </li>

                            </ul>

                        </nav><!-- #primary-menu end -->

                        <div class="clearfix d-none d-lg-block ">
                            <a href="https://www.facebook.com/postaplus.sc/" target="_blank" class="social-icon si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/postaplus.sc/" target="_blank" class="social-icon si-small si-borderless si-instagram">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>

                        </div>


                    </div>

                </div>

            </header>
            
            
        <section id="content">

                <div class="content-wrap"  style=" margin-bottom: 100px;">
                    <div class="container clearfix " style="  margin-left: auto; margin-right:auto;"> 
                        <div class='row' >
                            <div class="col-md-8 offset-md-2 col-sm-12">
                                
                                <?php if($DataResult == 'NOT+CAPTURED'){  ?> 

                    <div class="style-msg dangermsg" style="margin-left: auto; margin-right:auto;color: #721c24;background-color:#f8d7da;border-color:#f5c6cb;" >
                     <div class="sb-msg"><i class="icon-thumbs-up"></i>Sorry! There is something wrong, please send us the information below for more information.</div>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                                <?php }else{ ?> 
                                                              
                                <div class="style-msg successmsg" style="margin-left: auto; margin-right:auto;  " >
                     <div class="sb-msg"><i class="icon-thumbs-up"></i>We received your order successfully.</div>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                </div> 

                    <h3 style="margin-left: auto; margin-right:auto;  ">Thank you for using Posta Plus Student center </h3>                                           
                                <?php } ?>   
                                
                                
                                <div class="clearfix"></div>     
  <div   class="divDevider" >
      
      <div style="background-color:#ea7f1d; width:100%; padding:10px; border-radius: 10px 10px 0px 0px;  ">
           <h4 class="nobottommargin" style="color:#fff;">Transaction Details</h4>
          </div>
  <table  class="table"  style="margin-left:auto; margin-right:auto; width:100%; max-width:100%; ">
     
  <tr>
    <td>Payment ID :</td>
    <td><?php echo $DataPaymentId; ?></td>
  </tr>
  <tr>
    <td>Post Date :</td>
    <td><?php echo $date;?></td>
  </tr>
   <tr>
    <td>Transaction ID :</td>
    <td><?php echo $DataTrackId;?></td>
  </tr>
  <tr>
    <td>Result Code :</td>
    <td><?php echo $DataResult;?></td>
  </tr>
  <tr>
    <td>Track ID :</td>
    <td><?php echo $ResponceDataudfTrack[1];?></td>
  </tr>
  <tr>
    <td>Ref No :</td>
    <td><?php echo $DataRef;?></td>
  </tr>
  <tr>
    <td>Amount :</td>
    <td><?php echo $DataAmount;?></td>
  </tr>

</table>
            
</div>
                                
                            
                                
</div>



<br><br><br><br><br><br>   

                        </div>




                    </div>

                </div>

            </section><!-- #content end -->

            <!-- Footer
            ============================================= -->
            <footer id="footer" class="dark footerfixed  " style="">

                <!-- Copyrights
                ============================================= -->
                <div id="copyrights" style="padding: 20px 0;">

                    <div class="container clearfix">

                        <div class="col_half">
                            <img src="../images/logo-side-dark.png" style="height:50px; margin-bottom: 0px;" alt="" class="footer-logo">

                            Copyrights &copy; 2019 All Rights Reserved by Pusta Plus.
                        </div>

                        <div class="col_half col_last tright">
                            <div class="copyrights-menu copyright-links fright clearfix">
                                <a href="index.php">Home</a>/<a href="about.php">About</a>/<a href="services.php">Services</a>/<a href="branches.php">Branches</a>/<a href="contact.php">Contact</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="copyrights-menu copyright-links fright clearfix">
                                Phone: <a href="#">+965-24738383</a> <span style="margin-left:20px;"></span>Email:<a href="#">info@postastc.com</a>
                            </div>

                        </div>

                    </div>

                </div><!-- #copyrights end -->

            </footer><!-- #footer end -->

        </div><!-- #wrapper end -->

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>

        <!-- External JavaScripts
        ============================================= -->
        <script src="../js/jquery.js"></script>
        <script src="../js/plugins.js"></script>

        <!-- Footer Scripts
        ============================================= -->
        <script src="../js/functions.js"></script>

    </body>
</html>






<?php
}
else{
    
    
header("Location: https://www.postastc.com/postaplus/result.php?Error=".$ResErrorNo."&ErrorText=".$ResErrorText."&trackid=".$ResTrackID."&amt=".$ResAmount."&paymentid=".$ResPaymentId."&tranid=".$ResTranId."&result=".$ResResult);
exit();

}

?>


