<?php
header("Content-Type:text/html; charset=UTF-8");

class sendmail{
	function __construct($phpmailer_file='class.phpmailer.php', $smtp_file='class.smtp.php'){
		//echo __DIR__ . DIRECTORY_SEPARATOR . $phpmailer_file;
	    require_once __DIR__ . DIRECTORY_SEPARATOR . $phpmailer_file;
	    require_once __DIR__ . DIRECTORY_SEPARATOR . $smtp_file;
	}

	//$to 表示收件人地址 
	//$subject 表示邮件标题 
	//$body表示邮件正文
	function postmail($to,$subject = '',$body = ''){
	    //error_reporting(E_ALL);
	    error_reporting(E_STRICT);
	    date_default_timezone_set('Asia/Shanghai');//设定时区东八区

	    $mail             = new PHPMailer(); //new一个PHPMailer对象出来
	    $body             = eregi_replace("[\]",'',$body); //对邮件内容进行必要的过滤
	    $mail->CharSet 	  = "UTF-8";//设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
	    $mail->IsSMTP(); // 设定使用SMTP服务
	    $mail->SMTPDebug  = 1;					// 启用SMTP调试功能
	    // 1 = errors and messages
	    // 2 = messages only
	    $mail->SMTPAuth   = true;				// 启用 SMTP 验证功能
		//$mail->SMTPSecure = "ssl";			// 安全协议，可以注释掉，QQ服务器要开启这行
												//并且，QQ服务器还要去php.ini中开启openssl扩展模块
	    $mail->Host       = 'smtp.126.com';		// SMTP 服务器(发送服务器)
	    $mail->Port       = 25;					// SMTP服务器的端口号，QQ服务器对应是465

	    // SMTP服务器用户名，也就是发送账户
	    $mail->Username   = 'tfp112233@126.com';
	    $mail->Password   = 'laotang123';       // 客户端授权码，注意，这里不是邮箱密码

	    //回复时回复到这个邮箱，通常跟发送账户那个邮箱一致
	    $mail->SetFrom('tfp112233@126.com', '发送人名字');
	    //$mail->AddReplyTo('tang_fp@sina.cn','who');    //如果没有上一个，则回复到这个邮箱

		//$to:要发送到的email地址，也就是收件地址
		//$name: 要显示的名字
	    $mail->AddAddress($to, '收件人名字');

	    $mail->Subject	= $subject;			//邮件主题
		$mail->Body		= $body;			//邮件主体内容
	    $mail->MsgHTML($body);				//邮件主体内容另一写法
	    //如果客户端显示不了html页面，则显示本文本信息：
	    $mail->AltBody    = '请使用可以显示html内容的邮件阅读软件'; 
		
	    //添加附件
	    //$mail->AddAttachment("H:/itcast/php/phpcase/myblog1/web/upload/20160818/57b572264de3c0.81079342.jpg");
	    //$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
	    if(!$mail->Send()) {
	        echo '邮件发送错误: ' . $mail->ErrorInfo;
			//return $mail->ErrorInfo;
	    } else {
	        echo "Message sent!恭喜，邮件发送成功！";
			//return true;
	    }
		//die('dddd');
	}
}