<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 10:26:53
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/881.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:16264524958bfce5d3c6f53-76706412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '149f06a3c54afbec05176855c23141a80cb61745' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/881.cache-3.html',
      1 => 1488885596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16264524958bfce5d3c6f53-76706412',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','r_id'=>$_REQUEST['blogId'],'var'=>'v'),$_smarty_tpl);?>


<div class="blog-page default-container-paddingtop">
    <!-- <h1>FAQ</h1> -->
    <div class="blog-item" id="post-<?php echo $_smarty_tpl->getVariable('v')->value['wz_id'];?>
">  
        <div class="image-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('v')->value['wz_BILD'],'w'=>240,'h'=>290,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>
 
        </div>
        <div class="content">
            <div class="header-wrapper">
                <h3 class="headline"><?php echo $_smarty_tpl->getVariable('v')->value['wz_HEADLINE'];?>
</h3>
                <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('v')->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
            </div>
            <div class="text"><?php echo $_smarty_tpl->getVariable('v')->value['wz_TEXT'];?>
</div>
            <div class="reporter"><?php echo $_smarty_tpl->getVariable('v')->value['wz_REPORTER'];?>
</div>
            <br/>
            <br/>
            <a style="display:block;text-align:right" href="<?php echo smarty_function_xr_genlink(array('p_id'=>36),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"zurück zur Übersicht"),$_smarty_tpl);?>
</a>
        </div>
        <div class="clearfix"></div>
    </div>    
</div>