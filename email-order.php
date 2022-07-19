<?php 
$result = isset($_GET['result']) ? $_GET['result'] : '';
$trackid = isset($_GET['trackid']) ? $_GET['trackid'] : '';
$PaymentID = isset($_GET['paymentid']) ? $_GET['paymentid'] : '';
$ref = isset($_GET['ref']) ? $_GET['ref'] : '';
$tranid = isset($_GET['tranid']) ? $_GET['tranid'] : '';
$amount = isset($_GET['amt']) ? $_GET['amt'] : '';
$trx_error = isset($_GET['Error']) ? $_GET['Error'] : '';
$trx_errortext = isset($_GET['ErrorText']) ? $_GET['ErrorText'] : '';
$postdate = isset($_GET['postdate']) ? $_GET['postdate'] : date('Y-m-d');
$auth = isset($_GET['auth']) ? $_GET['auth'] : '';
$udf1 = isset($_GET['udf1']) ? $_GET['udf1'] : '';
$udf2 = isset($_GET['udf2']) ? $_GET['udf2'] : '';
$udf3 = isset($_GET['udf3']) ? $_GET['udf3'] : '';
$udf4 = isset($_GET['udf4']) ? $_GET['udf4'] : '';
$udf5 = isset($_GET['udf5']) ? $_GET['udf5'] : '';

?>


<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>Posta Plus Student Center - Registration</title>
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
                                                                                                <img alt="Logo" src="https://www.postastc.com/images/logo-colored-en.svg" width="200px"  ></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="30" style="font-size:2px">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            <font style="font-family:'HelveticaNeue',Arial,Helvetica,sans-serif;font-size:16px;line-height:18px;color:#000000;font-weight:bold"> Order Confirmation, <br><br>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            <font style="font-family:'HelveticaNeue',Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#000000">
                                                                                            <p style="float:left;">Thank you for using </p>  <p style="color: #ea7f1d;font-weight: bold; margin-left:10px; float:left;"> Postaplus Student Center</p>
                                                                                            </font>

                                                                                        </td>
                                                                                    </tr>


                                                                                    <tr><td>
                                                                                        
                                                                                       <table class="table"   style="margin-left:auto; margin-right:auto;   width:90%; margin-bottom:50px; margin-top:20px; ">
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>8</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>6</td>
                                    </tr>
                                </table></td>
                                                                                    </tr> 

                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            <font style="font-family:'HelveticaNeue',Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#000000">
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
                                                                                            <font style="font-family:'HelveticaNeue',Arial,Helvetica,sans-serif;font-size:13px;line-height:18px;color:#000000">
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

</html>