<?php /* Smarty version Smarty-3.0.7, created on 2016-01-07 18:05:11
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/857.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:948730677568e9ac73d3ab2-15360163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36d5b5b29a56fcf7c3d90f1bae340090d66fca84' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/857.cache.html',
      1 => 1451984363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '948730677568e9ac73d3ab2-15360163',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><div class="item">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['chat_img'],'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage blackandwhite"),$_smarty_tpl);?>

    <div class="text-wrapper">
        <p class="name"><?php echo smarty_function_xr_translate(array('tag'=>'Achtung'),$_smarty_tpl);?>
<span class="timestamp"><?php echo smarty_modifier_date_format(time(),"%d.%m.%Y %H:%M:%S");?>
</span></p>
        <p class="text">
            <?php if ($_smarty_tpl->getVariable('error')->value=='sender_inactive'){?>
                <?php echo smarty_function_xr_translate(array('tag'=>'Die Nachricht wurde nicht zugestellt, da dein Konto zur Zeit deaktiviert ist!'),$_smarty_tpl);?>

            <?php }elseif($_smarty_tpl->getVariable('error')->value=='receiver_inactive'){?>
                <?php echo smarty_function_xr_translate(array('tag'=>'Die Nachricht wurde nicht zugestellt, da das Konto des Chat-Empfängers zur Zeit deaktiviert ist!'),$_smarty_tpl);?>

            <?php }elseif($_smarty_tpl->getVariable('error')->value=='you_block_receiver'){?>
                <?php echo smarty_function_xr_translate(array('tag'=>'Die Nachricht wurde nicht zugestellt, da der Empfänger in Deiner Blockliste ist!'),$_smarty_tpl);?>

            <?php }elseif($_smarty_tpl->getVariable('error')->value=='receiver_blocking_you'){?>
                <?php echo smarty_function_xr_translate(array('tag'=>'Die Nachricht wurde nicht zugestellt, da der Empfänger dich blockt!'),$_smarty_tpl);?>

            <?php }?>
        </p>
    </div>
</div>
