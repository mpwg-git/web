<?php /* Smarty version Smarty-3.0.7, created on 2014-11-14 16:30:09
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/663.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:178374916754662e11507d95-90476220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ff6955f421f2b37b03b391fc1f648da2ed64d12' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/663.cache.html',
      1 => 1415982607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178374916754662e11507d95-90476220',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_detaillinks::sc_get_buttons','var'=>'buttons'),$_smarty_tpl);?>

<span class="detailprevnextcontainer">
        		   
    <?php if (($_smarty_tpl->getVariable('buttons')->value['BUTTON_PREV']!='')){?>
        <a href="<?php echo $_smarty_tpl->getVariable('buttons')->value['BUTTON_PREV'];?>
" class="but detailbutton_prev">Prev</a>
    <?php }?>
    <?php if (($_smarty_tpl->getVariable('buttons')->value['BUTTON_NEXT']!='')){?>
        <a href="<?php echo $_smarty_tpl->getVariable('buttons')->value['BUTTON_NEXT'];?>
" class="but detailbutton_next">Next</a>
    <?php }?>

</span>