<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of demo-online
 *
 * @author ThanhNgan
 */

include ("ajax_config.php");
sendMailDemoOnline();

function sendMailDemoOnline(){
    global $d;
    $request_body = file_get_contents('php://input');
    $arrRequest = json_decode($request_body, true);
    include_once "../sources/phpMailer/class.phpmailer.php";	
                $mail = new PHPMailer();
                $mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
                $mail->Host       = $ip_host;   // tên SMTP server
                $mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
                $mail->Username   = $mail_host; // SMTP account username
                $mail->Password   = $pass_mail;  

                //Thiết lập thông tin người gửi và email người gửi
                $mail->SetFrom($mail_host,$ten);

                //Thiết lập thông tin người nhận và email người nhận
                $mail->AddAddress($company['email'], $company['ten']);

                //Thiết lập email nhận hồi đáp nếu người nhận nhấn nút Reply
//                $mail->AddReplyTo($arrRequest['Email'],"");

                //Thiết lập file đính kèm nếu có
                if(!empty($_FILES['file']))
                {
                        $mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);	
                }

                //Thiết lập tiêu đề email
                $mail->Subject    = "Demo online";
                $mail->IsHTML(true);

                //Thiết lập định dạng font chữ tiếng việt
                $mail->CharSet = "utf-8";	
                        $body = '<table>';
                        $body .= '
                                <tr>
                                        <th colspan="2">&nbsp;</th>
                                </tr>
                                <tr>
                                        <th colspan="2">Thư liên hệ từ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
                                </tr>
                                <tr>
                                        <th colspan="2">&nbsp;</th>
                                </tr>
                                <tr>
                                        <th>Clinic :</th><td>'.$arrRequest['Clinic'].'</td>
                                </tr>
                                <tr>
                                        <th>Contact :</th><td>'.$arrRequest['Contact'].'</td>
                                </tr>
                                <tr>
                                        <th>Country :</th><td>'.$arrRequest['Country'].'</td>
                                </tr>
                                <tr>
                                        <th>Zipcode :</th><td>'.$arrRequest['Zipcode'].'</td>
                                </tr>

                                <tr>
                                        <th>Phone :</th><td>'.$arrRequest['Phone'].'</td>
                                </tr>
                                <tr>
                                        <th>Email :</th><td>'.$arrRequest['Email'].'</td>
                                </tr>
                                <tr>
                                        <th>Request date :</th><td>'.$arrRequest['Request_date'].'</td>
                                </tr>
                                <tr>
                                        <th>Product name :</th><td>'.$arrRequest['Product_name'].'</td>
                                </tr>
                                <tr>
                                        <th>Comment :</th><td>'.$arrRequest['comment'].'</td>
                                </tr>';
                        $body .= '</table>';

                        $mail->Body = $body;
                        if($mail->Send())
                        {
                                $return['thongbao'] = _guilienhethanhcong;
                                $return['nhaplai'] = 'nhaplai';
                        }
                        else
                        {
                                $return['thongbao'] = _guilienhethatbai;
                                $return['nhaplai'] = '2';
                        }
        }
	echo json_encode($return);
