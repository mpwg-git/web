<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 10:20:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKCGBDL" */ ?>
<?php /*%%SmartyHeaderCode:13521784685677c454a982f7-82641818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c5643410b562c66df7bf5cc613c1050d10c489a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKCGBDL',
      1 => 1450689620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13521784685677c454a982f7-82641818',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="item">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage blackandwhite"),$_smarty_tpl);?>

    <div class="text-wrapper">
        <p class="name"><?php echo smarty_function_xr_translate(array('tag'=>'Achtung'),$_smarty_tpl);?>
<span class="timestamp"><?php echo $_smarty_tpl->getVariable('data')->value['chat_time'];?>
</span></p>
        <p class="text">
            <?php if ($_smarty_tpl->getVariable('error')->value=='sender_inactive'){?>
                <?php echo smarty_function_xr_translate(array('tag'=>'Die Nachricht wurde nicht zugestellt, da dein Konto zur Zeit deaktiviert ist!'),$_smarty_tpl);?>

            <?php }elseif($_smarty_tpl->getVariable('error')->value=='receiver_inactive'){?>
                <?php echo smarty_function_xr_translate(array('tag'=>'Die Nachricht wurde nicht zugestellt, da das Konto des Chat-Empfängers zur Zeit deaktiviert ist!'),$_smarty_tpl);?>

            <?php }?>
        </p>
    </div>
</div>
