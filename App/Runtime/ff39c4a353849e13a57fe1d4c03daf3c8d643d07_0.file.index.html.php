<?php
/* Smarty version 3.1.30, created on 2017-03-09 21:49:11
  from "D:\OOP\blog\App\Home\View\Index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c15d5784de00_45133489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff39c4a353849e13a57fe1d4c03daf3c8d643d07' => 
    array (
      0 => 'D:\\OOP\\blog\\App\\Home\\View\\Index\\index.html',
      1 => 1489067350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
  ),
),false)) {
function content_58c15d5784de00_45133489 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>黑色Html5响应式个人博客模板——主题《如影随形》</title>
    <meta name="keywords" content="个人博客模板,博客模板,响应式"/>
    <meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。"/>
    <link href="<?php echo __PUBLIC__;?>
Home/css/base.css" rel="stylesheet">
    <link href="<?php echo __PUBLIC__;?>
Home/css/index.css" rel="stylesheet">
    <link href="<?php echo __PUBLIC__;?>
Home/css/media.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="<?php echo __PUBLIC__;?>
Home/js/modernizr.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>
<body>
<div class="ibody">
   <?php $_smarty_tpl->_subTemplateRender("file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <article>
        <div class="banner">
            <ul class="texts">
                <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
                <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
            </ul>
        </div>
        <div class="bloglist">
            <h2>
                <p><span>推荐</span>文章</p>
            </h2>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
            <div class="blogs">
                <h3><a href="index.php?c=Article&articleid=<?php echo $_smarty_tpl->tpl_vars['val']->value['articleid'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</a></h3>
                <figure><img style="max-height: 120px; max-width: 175px;" src="<?php echo $_smarty_tpl->tpl_vars['val']->value['pic'];?>
"></figure>
                <ul>
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['description'];?>

                    </p>
                    <a href="index.php?c=Article&articleid=<?php echo $_smarty_tpl->tpl_vars['val']->value['articleid'];?>
" class="readmore">阅读全文&gt;&gt;</a>
                </ul>
                <p class="autor">
                    <span>作者：<?php echo $_smarty_tpl->tpl_vars['val']->value['author'];?>
</span>
                    <span>分类：【<a href="index.php?c=List&categoryid=<?php echo $_smarty_tpl->tpl_vars['val']->value['categoryid'];?>
&type=xiao"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a>】</span>
                    <span>浏览（<a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['hits'];?>
</a>）</span>
                    <span>评论（<a href="/">30</a>）</span>
                </p>
                <div class="dateview"><?php echo $_smarty_tpl->tpl_vars['val']->value['ptime'];?>
</div>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </article>

    <aside>
        <div class="avatar"><a href="about.html"><span>关于我</span></a></div>
        <div class="topspaceinfo">
            <h1>执子之手，与子偕老</h1>
            <p>于千万人之中，我遇见了我所遇见的人....</p>
        </div>
        <div class="about_c">
            <p>网名：DanceSmile | 即步非烟</p>
            <p>职业：Web前端设计师、网页设计 </p>
            <p>籍贯：四川省—成都市</p>
            <p>电话：13662012345</p>
            <p>邮箱：dancesmiling@qq.com</p>
        </div>
        <div class="bdsharebuttonbox">
            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
            <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
            <a href="#" class="bds_more" data-cmd="more"></a>
        </div>
        <div class="tj_news">
            <h2>
                <p class="tj_t1">最新文章</p>
            </h2>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new']->value, 'res');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
?>
                <li><a href="?c=Article&a=right&articleid=<?php echo $_smarty_tpl->tpl_vars['res']->value['articleid'];?>
&categoryid=0"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</a></li>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
            <h2>
                <p class="tj_t2" >推荐文章</p>
            </h2>
            <ul>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hits']->value, 'art');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
?>
                <li><a href="?c=Article&a=right&articleid=<?php echo $_smarty_tpl->tpl_vars['res']->value['articleid'];?>
&categoryid=0"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</a></li>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
        <div class="links">
            <h2>
                <p>友情链接</p>
            </h2>
            <ul>
                <li><a href="/">W3C</a></li>
                <li><a href="/">3DST技术社区</a></li>
            </ul>
        </div>
        <div class="copyright">
            <ul>
                <p> Design by <a href="/">DanceSmile</a></p>
                <p>蜀ICP备11002373号-1</p>
                </p>
            </ul>
        </div>
    </aside>
    <?php echo '<script'; ?>
 src="<?php echo __PUBLIC__;?>
Home/js/silder.js"><?php echo '</script'; ?>
>
    <div class="clear"></div>
    <!-- 清除浮动 -->
</div>
</body>
</html>
<?php }
}
