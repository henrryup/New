<?php
/* Smarty version 3.1.30, created on 2017-03-09 21:45:43
  from "D:\OOP\blog\App\Home\View\Public\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c15c8765ba86_33111937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b830be91efcb1b2895db4b807dab14f04992b3c1' => 
    array (
      0 => 'D:\\OOP\\blog\\App\\Home\\View\\Public\\header.html',
      1 => 1489066616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c15c8765ba86_33111937 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>
    #topnav span{
        float: right;
        color:whitesmoke;
        padding: 0 15px;
        text-align: center;
        background-color: darkturquoise;
        margin-left: 10px;
    }
</style>
<?php echo '<script'; ?>
>
    window.onload = function () {
        //注册
        document.getElementById('reg').onclick = function () {
            location.href = 'index.php?c=Login&a=register';
        }
        //登录
        document.getElementById('log').onclick = function () {
            location.href = 'index.php?c=Login&a=log';
        }
        //退出
        document.getElementById('logout').onclick = function (){
            location.href = 'index.php?c=Login&a=logout';
        }
    }
<?php echo '</script'; ?>
>
<header>
    <h1>如影随形</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="/"></a></div>
    <nav id="topnav">
        <a href="/">首页</a>
        <a href="index.php?c=About&categoryid=1">关于我</a>
        <a href="index.php?c=List&categoryid=2&type=da">慢生活</a>
        <a href="index.php?c=List&categoryid=3&type=da">学无止境</a>

        <span href=""  id = "logout" <?php if (isset($_SESSION['uname'])) {?>style="display:block"<?php } else { ?>style="display:none"<?php }?>>退出</span>
        <span href=""  id = "uname" <?php if (isset($_SESSION['uname'])) {?>style="display:block"<?php } else { ?>style="display:none"<?php }?>><?php echo $_SESSION['uname'];?>
</span>

        <span href=""  id = "reg" <?php if (isset($_SESSION['uname'])) {?>style="display:none"<?php } else { ?>style="display:block"<?php }?>>注册</span>
        <span href=""  id = "log" <?php if (isset($_SESSION['uname'])) {?>style="display:none"<?php } else { ?>style="display:block"<?php }?>>登录</span>
    </nav>
</header>
<?php }
}
