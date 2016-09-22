<?php /* Smarty version Smarty-3.0.7, created on 2015-08-21 13:10:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coded0qc3Z" */ ?>
<?php /*%%SmartyHeaderCode:166323676255d70711248ce1-41215822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c54c6748c8b3dfa6d9d93c1e6177869745b37b95' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coded0qc3Z',
      1 => 1440155409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166323676255d70711248ce1-41215822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><footer class="clearfix footer black footer-suche container">
   
    <div class="row">
        <div class="col-xs-3 footer-menu-item <?php if ($_smarty_tpl->getVariable('P_ID')->value==11){?>active<?php }?>">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
">
                <span class="icon-Lupe"></span>
            </a>
        </div>
        <div class="col-xs-3 footer-menu-item <?php if ($_smarty_tpl->getVariable('P_ID')->value==17){?>active<?php }?>">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>17),$_smarty_tpl);?>
">
                <span class="icon-treffer"></span>
            </a>
        </div>
        <div class="col-xs-3 footer-menu-item">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
">
                <span class="icon-Chat">
    			    <span class="path1"></span><span class="path2"></span><span class="path3"></span>
    		    </span>
		    </a>
        </div>
        <div class="col-xs-3 footer-menu-item">
            <a href="#">
                <span class="icon-Hilfe">?</span>
            </a>
        </div>
    </div>
    
</footer>