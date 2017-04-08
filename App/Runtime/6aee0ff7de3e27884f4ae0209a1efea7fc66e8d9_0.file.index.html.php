<?php
/* Smarty version 3.1.30, created on 2017-03-09 21:55:49
  from "D:\OOP\blog\App\Home\View\Article\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c15ee5426314_57838257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6aee0ff7de3e27884f4ae0209a1efea7fc66e8d9' => 
    array (
      0 => 'D:\\OOP\\blog\\App\\Home\\View\\Article\\index.html',
      1 => 1489056495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
    'file:../Public/right.html' => 1,
  ),
),false)) {
function content_58c15ee5426314_57838257 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\OOP\\blog\\Frame\\Smarty\\plugins\\modifier.date_format.php';
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
Home/css/style.css" rel="stylesheet">
    <link href="<?php echo __PUBLIC__;?>
Home/css/media.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="<?php echo __PUBLIC__;?>
Home/js/modernizr.js"><?php echo '</script'; ?>
>
    <![endif]-->

    <link rel="stylesheet" href="<?php echo __PUBLIC__;?>
highlight/default.css">
    <?php echo '<script'; ?>
 src="<?php echo __PUBLIC__;?>
highlight/highlight.pack.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>hljs.initHighlightingOnLoad();<?php echo '</script'; ?>
>
</head>
<body>
<div class="ibody">
    <?php $_smarty_tpl->_subTemplateRender("file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <article>
        <h2 class="about_h">您现在的位置是：<a href="/"><?php echo $_smarty_tpl->tpl_vars['name']->value['name'];?>
</a>><a href="1/"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</a>><a href="1/"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h2>
        <div class="index_about">
            <h2 class="c_titile"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</h2>
            <p class="box_c">
                <span class="d_time">发布时间：<?php echo $_smarty_tpl->tpl_vars['row']->value['ptime'];?>
</span>
                <span>分类：<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</span>
                <span>浏览（<?php echo $_smarty_tpl->tpl_vars['row']->value['hits'];?>
）</span>
                <span>评论览（14）</span>
            </p>
            <ul class="infos">
             <?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>

              </ul>
            <div class="keybq">
                <p><span>关键字词</span>：黑色,个人博客,时间轴,响应式</p>
            </div>
            <div class="nextinfo">
                <p>上一篇：<a href="/news/s/2013-09-04/606.html">程序员应该如何高效的工作学习</a></p>
                <p>下一篇：<a href="/news/s/2013-10-21/616.html">柴米油盐的生活才是真实</a></p>
            </div>
            <!--评论 start-->
            <div class="pinglun">
                <h2>精彩评论</h2>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pinglun']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
                    <li>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['face'];?>
">
                        <div class="parea">
                            <div class="sender"><?php echo $_smarty_tpl->tpl_vars['val']->value['username'];?>
</div>
                            <p class="pcontent"><?php echo $_smarty_tpl->tpl_vars['val']->value['content'];?>
</p>
                            <div>
                                <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['ctime'],"%Y-%m-%d");?>
</span>
                            </div>
                        </div>
                    </li>
                   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </ul>
                <?php if (isset($_SESSION['uname'])) {?>
                <form action="?c=Comment&a=addComment&categoryid=<?php echo $_GET['categoryid'];?>
&type=xiao" method="post">
                    <textarea name="content"></textarea>
                    <input type="hidden" name="articleid" value="<?php echo $_GET['articleid'];?>
">
                    <input type="submit" value="发表">
                </form>
               <?php } else { ?>
                    <p style="color: #0d0d0d; font-size: 18px; padding:8px;">如果要发表评论，请先
                        <a href="index.php?c=Login&a=log">登录</a>
                    </p>

                <?php }?>
            </div>
            <!--评论 end-->
            <div class="otherlink">
                <h2>相关文章</h2>
                <ul>
                    <li><a href="/news/s/2013-07-25/524.html" title="现在，我相信爱情！">现在，我相信爱情！</a></li>
                    <li><a href="/newstalk/mood/2013-07-24/518.html" title="我希望我的爱情是这样的">我希望我的爱情是这样的</a></li>
                    <li><a href="/newstalk/mood/2013-07-02/335.html" title="有种情谊，不是爱情，也算不得友情">有种情谊，不是爱情，也算不得友情</a></li>
                    <li><a href="/newstalk/mood/2013-07-01/329.html" title="世上最美好的爱情">世上最美好的爱情</a></li>
                    <li><a href="/news/read/2013-06-11/213.html" title="爱情没有永远，地老天荒也走不完">爱情没有永远，地老天荒也走不完</a></li>
                    <li><a href="/news/s/2013-06-06/24.html" title="爱情的背叛者">爱情的背叛者</a></li>
                </ul>
            </div>
        </div>
    </article>
    <aside>
        <div class="rnav">
            <li class="rnav1 "><a href="/"><?php echo $_smarty_tpl->tpl_vars['smalltitle']->value[0]['name'];?>
</a></li>
            <li class="rnav2 "><a href="/"><?php echo $_smarty_tpl->tpl_vars['smalltitle']->value[1]['name'];?>
</a></li>
            <li class="rnav3 "><a href="/"><?php echo $_smarty_tpl->tpl_vars['smalltitle']->value[2]['name'];?>
</a></li>
            <li class="rnav4 "><a href="/"><?php echo $_smarty_tpl->tpl_vars['smalltitle']->value[3]['name'];?>
</a></li>
        </div>
        <div class="ph_news">
            <h2>
                <p>点击排行</p>
            </h2>
            <ul class="ph_n">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hits']->value, 'art');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
?>
                <li><a href="?c=Article&a=index&articleid=<?php echo $_smarty_tpl->tpl_vars['art']->value['articleid'];?>
&categoryid=<?php echo $_GET['categoryid'];?>
&type=''"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
            <h2>
                <p>栏目推荐</p>
            </h2>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new']->value, 'res');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
?>
                <li><a href="?c=Article&a=index&articleid=<?php echo $_smarty_tpl->tpl_vars['res']->value['articleid'];?>
&categoryid=<?php echo $_GET['categoryid'];?>
&type=''"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>

    <?php $_smarty_tpl->_subTemplateRender("file:../Public/right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- 清除浮动 -->
</div>
</body>
</html>
<?php }
}
