<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 16:13:47
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codex6Zleu" */ ?>
<?php /*%%SmartyHeaderCode:175151729255db269b85b230-82346715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0ca39fce6d1e9d2658aca9716e9053899ce8ce7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codex6Zleu',
      1 => 1440425627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175151729255db269b85b230-82346715',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
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
        <div class="col-xs-3 footer-menu-item item-hilfe">
            <a href="#">
                <span class="icon-Hilfe">?</span>
            </a>
        </div>
    </div>
    
</footer>