<?php if(!defined('_lib')) die("Error");

	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	$config_url=$_SERVER["SERVER_NAME"].':81/vcontrol';	
	
	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = 'demo11_ncon';
	$config['database']['refix'] = 'table_';
	$meta_robots = 'INDEX, FOLLOW';
	
	$ip_host = '116.193.76.23';
	$mail_host = 'noreply@demo11.ninavietnam.com.vn';
	$pass_mail = '123@zxc';

	$config['lang']=array(''=>'Tiếng Việt','en'=>'Tiếng Anh');#Danh sách ngôn ngữ hỗ trợ
	
	$config['author']['name'] = 'Phạm Nhựt Phương';
	$config['author']['email'] = 'phuongpham0603.nina@gmail.com';
	$config['author']['timefinish'] = '';
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
?>