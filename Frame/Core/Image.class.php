<?php
class Image
{
    //加水印
    /*
     * dst 要加水印的图片
     * water 水印图片路径
     * position 水印图片的位置，采用九宫格的方式，1表示左上角,9表示右下角
     * */
    public static function water($dst, $water, $position = 9)
    {
        //获取要加水印图片的信息
        $dst_info = getimagesize($dst);

        //返回图像数组,其中mime = image/jpg  /  image/gif  /  image/png
        //要加水印的图片可能是jpg、gif、png图片

        //创建一个动态打开图像的函数
        $dstCreateFun = str_replace('/', 'createfrom', $dst_info['mime']);
        $dst_im = $dstCreateFun($dst);


        ///////////////////////////

        //同样的方法获取水印图片的信息，以及打开水印图片
        $water_info = getimagesize($water);
        $waterCreateFun = str_replace('/', 'createfrom', $water_info['mime']);
        $water_im = $waterCreateFun($water);

        switch ($position) {
            case 1:
                $x = 0;
                $y = 0;
                break;
            case 2:
                $x = ($dst_info[0] - $water_info[0]) / 2;
                $y = 0;
                break;
            case 3:
                $x = $dst_info[0] - $water_info[0];
                $y = 0;
                break;
            case 4:
                $x = 0;
                $y = ($dst_info[1] - $water_info[1]) / 2;
                break;
            case 5:
                $x = ($dst_info[0] - $water_info[0]) / 2;
                $y = ($dst_info[1] - $water_info[1]) / 2;
                break;
            case 6:
                $x = $dst_info[0] - $water_info[0];
                $y = ($dst_info[1] - $water_info[1]) / 2;
                break;
            case 7:
                $x = 0;
                $y = $dst_info[1] - $water_info[1];
                break;
            case 8:
                $x = ($dst_info[0] - $water_info[0]) / 2;
                $y = $dst_info[1] - $water_info[1];
                break;
            case 9:
                $x = $dst_info[0] - $water_info[0];
                $y = $dst_info[1] - $water_info[1];
                break;
        }

        //加水印  使用函数  水印png--imagecopy()    水印jpg/gif--imagecopymerge();
        if ($water_info[2] == 3) {
            //水印图片是png
            imagecopy($dst_im, $water_im, $x,$y, 0, 0, $water_info[0], $water_info[1]);
        } else {
            imagecopymerge($dst_im, $water_im, $x,$y, 0, 0, $water_info[0], $water_info[1], 80);
        }

        //保存加好水印的图片dst
        //创建一个保存图片的动态函数
        $saveFun = str_replace('/', '', $dst_info['mime']);
        $saveFun($dst_im, '1.jpg');//第二个参数 ，为图片命名。可直接输入$dst，覆盖原图
        //销毁图像资源
        imagedestroy($dst_im);
        imagedestroy($water_im);
    }

   // Image::water('meimei.jpg','water.png');


    //缩略图vvvvvvvvvvvvvvvvvvv
    //width 缩放的宽度；height 缩放的高度;
    //is_dengbi 是否是等比缩放，true表示是等比缩放，false表示不是等比缩放;
    public static function thumb($src,$width,$height,$is_dengbi = true){
        //获取图像信息
        $src_info = getimagesize($src);
        //创建一个打开图像的函数
        $srcCreateFun = str_replace('/','createfrom',$src_info['mime']);
        //打开要缩略的图像
        $src_im = $srcCreateFun($src);

        //计算真实的宽、高，实现等比缩放
        $w = $width;
        $h = $height;
        if ($is_dengbi){
            //$src_info[0]; //原始的宽
            //$src_info[1]; //原始的高
            //$width;       //用户传递的宽度
            //$height;     //用户传递的高度

            if ($src_info[0] / $width >= $src_info[1] / $height){
                //以新的宽度为标准
                $w = $width;
                $h = $src_info[1] * $width / $src_info[0];
            }else{
                //以新的高度为标准
                $w = $src_info[0] * $height / $src_info[1];
                $h = $height;
            }
        }

        //创建一个小图
        $dst_im = imagecreatetruecolor($w,$h);
        //拷贝(缩略处理)
        imagecopyresampled($dst_im,$src_im,0,0,0,0,$w,$h,$src_info[0],$src_info[1]);
        //保存缩略后的图片
        //创建保存图片的动态函数
        $dstSaveFun =  $srcCreateFun = str_replace('/','',$src_info['mime']);
        $dstSaveFun($dst_im,'12.jpg');
        //销毁图像资源
        imagedestroy($src_im);
        imagedestroy($dst_im);
    }
}
//Image::thumb('car.jpg',300,300);
?>