<?php
class Verify{

    //实现验证码的方法
    public static function code($width = 200, $height = 80){
        //新建一张真彩色图像
        $im = imagecreatetruecolor($width, $height);
        //给图片添加背景颜色
        //创建一种随机颜色
        $bgcolor = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
        //填充背景颜色
        imagefill($im, 0, 0, $bgcolor);

        //简单的模糊处理--加入线段
        for($i=0; $i<10; $i++){
            $linecolor = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
            imageline($im, mt_rand(0,200), mt_rand(0,80), mt_rand(0,200), mt_rand(0,80), $linecolor);
        }

        //写trueType类型字体（系统中的字体，需要指定一个字体文件）
        //先处理验证码字符串
        $baseStr = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $shuffle = str_shuffle($baseStr); //打乱字符串
        $yzm = substr($shuffle, 0, 4); //截取了四个字符
        //将验证码字符写入到session中，以便使用验证码的时候进行判断
        $_SESSION['yzm'] = $yzm;
        for($i=0; $i<4; $i++){
            $ttfcolor = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
            imagettftext($im, '50', mt_rand(-30,30), 50*$i,65, $ttfcolor, CORE_PATH . 'STKAITI.TTF', substr($yzm,$i,1));
        }

        //清空输出缓冲区
        ob_clean();
        //设定图片类型
        header('content-type:image/png');
        //输出图像
        imagepng($im);
        //销毁资源
        imagedestroy($im);
    }

    //验证验证码的方法（选做）
}
?>