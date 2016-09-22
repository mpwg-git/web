<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 17:36:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexGl24Z" */ ?>
<?php /*%%SmartyHeaderCode:127406319955df2e6dc10c99-23723600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aba8bf3d03f82ee0e6ac638d53246818540cec84' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexGl24Z',
      1 => 1440689773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127406319955df2e6dc10c99-23723600',
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
        
         <span class="popover-del" data-deltype='bild' data-delid="<?php echo $_smarty_tpl->getVariable('v')->value['wz_id'];?>
">
            <span class="icon-rel icon-minus-rel"></span>
        </span>
        
    </div>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>681,'return'=>1),$_smarty_tpl);?>
