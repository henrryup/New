<?php
/* Smarty version 3.1.30, created on 2017-03-09 21:55:45
  from "D:\OOP\blog\App\Home\View\List\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c15ee12f2388_97374113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c1aa2e6997f3e5f2ed1eee037b2086a73afcf89' => 
    array (
      0 => 'D:\\OOP\\blog\\App\\Home\\View\\List\\index.html',
      1 => 1489067744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
  ),
),false)) {
function content_58c15ee12f2388_97374113 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>黑色Html5响应式个人博客模板——主题《如影随形》</title>
<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。" />
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
</head>
<body>
<div class="ibody">
  <?php $_smarty_tpl->_subTemplateRender("file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <article>
    <h2 class="about_h">您现在的位置是：<a href="/"><?php echo $_smarty_tpl->tpl_vars['name']->value['name'];?>
</a></h2>
    <div class="bloglist">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
      <div class="newblog">
        <ul>
          <h3><a href="index.php?c=Article&categoryid=<?php echo $_smarty_tpl->tpl_vars['name']->value['categoryid'];?>
&type=xiao&articleid=<?php echo $_smarty_tpl->tpl_vars['val']->value['articleid'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
</a></h3>
          <div class="autor"><span>作者：<?php echo $_smarty_tpl->tpl_vars['val']->value['author'];?>
</span>
            <span>分类：[<a href="?c=List&categoryid=<?php echo $_smarty_tpl->tpl_vars['val']->value['categoryid'];?>
&titleid=<?php echo $_smarty_tpl->tpl_vars['name']->value['categoryid'];?>
&type=xiao"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a>]</span>
            <span>浏览（<a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['hits'];?>
</a>）</span>
            <span>评论（<a href="/">30</a>）</span>
          </div>
          <p>
            <?php echo $_smarty_tpl->tpl_vars['val']->value['description'];?>

          </p>
        </ul>
        <figure><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['pic'];?>
" style="max-height: 180px;max-width: 210px;" ></figure>
        <div class="dateview"><?php echo $_smarty_tpl->tpl_vars['val']->value['ptime'];?>
</div>
      </div>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
    <div class="page">
        <?php echo $_smarty_tpl->tpl_vars['show']->value;?>

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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hits']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
        <li><span class="num1">1</span><a href="/"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
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
        <li><a href="/"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</a></li>
       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ul>
      <h2>
        <p>最新评论</p>
      </h2>
      <ul class="pl_n">
        <dl>
          <dt><img src="<?php echo __PUBLIC__;?>
Home/images/s8.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49分钟前</time>
          </dd>
          <dd><a href="/">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</a></dd>
        </dl>
        <dl>
          <dt><img src="<?php echo __PUBLIC__;?>
Home/images/s7.jpg"> </dt>
          <dt> </dt>
          <dd>yisa
            <time>2小时前</time>
          </dd>
          <dd><a href="/">我手机里面也有这样一个号码存在</a></dd>
        </dl>
        <dl>
          <dt><img src="<?php echo __PUBLIC__;?>
Home/images/s6.jpg"> </dt>
          <dt> </dt>
          <dd>小林博客
            <time>8月7日</time>
          </dd>
          <dd><a href="/">博客色彩丰富，很是好看</a></dd>
        </dl>
        <dl>
          <dt><img src="<?php echo __PUBLIC__;?>
Home/images/003.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49分钟前</time>
          </dd>
          <dd><a href="/">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</a></dd>
        </dl>
        <dl>
          <dt><img src="<?php echo __PUBLIC__;?>
Home/images/002.jpg"> </dt>
          <dt> </dt>
          <dd>yisa
            <time>2小时前</time>
          </dd>
          <dd><a href="/">我手机里面也有这样一个号码存在</a></dd>
        </dl>
      </ul>
      <h2>
        <p>最近访客</p>
        <ul>
          <img src="<?php echo __PUBLIC__;?>
Home/images/vis.jpg"><!-- 直接使用“多说”插件的调用代码 -->
        </ul>
      </h2>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">DanceSmile</a></p>
        <p>蜀ICP备11002373号-1</p>
        </p>
      </ul>
    </div>
  </aside>
  <!--右侧边栏-->

  <!-- 清除浮动 --> 
</div>
</body>
</html>
<?php }
}
