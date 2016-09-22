<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 16:08:01
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7Ao7dG" */ ?>
<?php /*%%SmartyHeaderCode:27177650055ddc8412d5ce0-30580915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '285d9c101a78a8f884f93a123ffcf790659ee5a6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7Ao7dG',
      1 => 1440598081,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27177650055ddc8412d5ce0-30580915',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="item">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage blackandwhite"),$_smarty_tpl);?>

    <div class="text-wrapper">
        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['chat_vorname'];?>
 <span class="timestamp"><?php echo $_smarty_tpl->getVariable('data')->value['chat_time'];?>
</span></p>
        <p class="text"><?php echo $_smarty_tpl->getVariable('data')->value['chat_text'];?>
</p>
    </div>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>681,'return'=>1),$_smarty_tpl);?>
