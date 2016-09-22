<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 02:13:10
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuXl9sB" */ ?>
<?php /*%%SmartyHeaderCode:144801278455dbb316775c01-85479881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd43fffc26a40ac2d787ed503d44636b5f0044fa7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuXl9sB',
      1 => 1440461590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144801278455dbb316775c01-85479881',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


<div class="item">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['wz_PROFILBILD'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage"),$_smarty_tpl);?>

    <div class="text-wrapper">
        <p class="name">Ann-Marie <span class="timestamp">01.05.2015 15:35</span></p>
        <p class="text">Lorem Ipsum dolor se Lorem Ipsum dolor se Lorem Ipsum dolor se Lorem Ipsum dolor se Lorem Ipsum dolor se Lorem Ipsum dolor se Lorem Ipsum dolor se Lorem Ipsum dolor se Lorem Ipsum dolor se</p>
    </div>
</div>
<?php echo smarty_function_xr_atom(array('a_id'=>681,'return'=>1),$_smarty_tpl);?>
