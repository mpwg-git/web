<?php /* Smarty version Smarty-3.0.7, created on 2016-08-03 12:37:27
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/694.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:159455284257a1c967179517-07509631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dee231fe9bdad1087f351ace1f6f807a4d52714d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/694.cache-1.html',
      1 => 1451984363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159455284257a1c967179517-07509631',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><footer class="clearfix footer black footer-suche container">
   
    <div class="row">
        <div class="col-xs-3 footer-menu-item item-suche <?php if ($_smarty_tpl->getVariable('P_ID')->value==11){?>active<?php }?>">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
">
                <span class="icon-Lupe"></span>
            </a>
        </div>
        <div class="col-xs-3 footer-menu-item item-suchergebnis <?php if ($_smarty_tpl->getVariable('P_ID')->value==17){?>active<?php }?>">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>17),$_smarty_tpl);?>
">
                <span class="icon-treffer footer-search-results"></span>
            </a>
        </div>
        <div class="col-xs-3 footer-menu-item item-chat <?php if ($_smarty_tpl->getVariable('P_ID')->value==16){?>active<?php }?>">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
">
                <span class="icon-Chat">
    			    <span class="path1"></span><span class="path2"></span><span class="path3"></span>
    		    </span>
		    </a>
        </div>
        <div class="col-xs-3 footer-menu-item item-hilfe <?php if ($_smarty_tpl->getVariable('P_ID')->value==29){?>active<?php }?>">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>29),$_smarty_tpl);?>
">
                <span class="icon-Hilfe">?</span>
            </a>
        </div>
    </div>
    
</footer>