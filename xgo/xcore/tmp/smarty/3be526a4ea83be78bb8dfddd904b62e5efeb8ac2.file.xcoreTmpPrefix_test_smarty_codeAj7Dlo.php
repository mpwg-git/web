<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 16:26:55
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAj7Dlo" */ ?>
<?php /*%%SmartyHeaderCode:190306284355d5e3af2f0073-99237702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3be526a4ea83be78bb8dfddd904b62e5efeb8ac2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAj7Dlo',
      1 => 1440080815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190306284355d5e3af2f0073-99237702',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('user')->value),$_smarty_tpl);?>
>

div class="button-container-favblock clearfix">
    <div class="inner clearfix">
        <div class="item">
            <?php echo smarty_function_xr_atom(array('a_id'=>769,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('user')->value['STATE_FAV'],'return'=>1),$_smarty_tpl);?>

        </div>
        <div class="item">
            <?php echo smarty_function_xr_atom(array('a_id'=>770,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('user')->value['STATE_BLOCK'],'return'=>1),$_smarty_tpl);?>

        </div>
        
        <?php if ($_smarty_tpl->getVariable('favblockonly')->value!=1){?>
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
        <?php }?>
        
    </div>
</div>