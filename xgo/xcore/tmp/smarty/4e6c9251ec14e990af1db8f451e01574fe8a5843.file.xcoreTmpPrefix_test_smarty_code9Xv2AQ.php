<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 09:57:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code9Xv2AQ" */ ?>
<?php /*%%SmartyHeaderCode:37767164055d1940098e578-99762316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e6c9251ec14e990af1db8f451e01574fe8a5843' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code9Xv2AQ',
      1 => 1439798272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37767164055d1940098e578-99762316',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="button-container-favblock clearfix">
    <div class="inner clearfix">
        <div class="item">
            
            <div class="js-toggle-favourite" data-id="<?php echo $_smarty_tpl->getVariable('userid')->value;?>
">
                <span class="icon icon-Favourite_inaktiv"></span>    
            </div>
            
        </div>
        <div class="item">
            
            <div class="js-toggle-blocked" data-id="<?php echo $_smarty_tpl->getVariable('userid')->value;?>
">
                <span class="icon icon-Blocked_inaktiv"></span>
            </div>
            
        </div>
        <div class="item">
             <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
">
                <span class="icon icon-Chat_Profil">
    			    <span class="path1"></span><span class="path2"></span><span class="path3"><span class="path4"></span>
    		    </span>
    		 </a>
        </div>
        <div class="item">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>19),$_smarty_tpl);?>
">
                <span class="icon icon-Map_Profil"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
            </a>
        </div>
    </div>
</div>