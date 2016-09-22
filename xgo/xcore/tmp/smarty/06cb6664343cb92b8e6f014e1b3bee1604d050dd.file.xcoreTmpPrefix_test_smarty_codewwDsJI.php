<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 16:04:04
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewwDsJI" */ ?>
<?php /*%%SmartyHeaderCode:164449753556532ae47b5d43-20023714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06cb6664343cb92b8e6f014e1b3bee1604d050dd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewwDsJI',
      1 => 1448291044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164449753556532ae47b5d43-20023714',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="button-container-favblock clearfix">
    <div class="inner clearfix">
        <!-- Fav -->
        <div class="item">
            <!-- 702 desktop -->
            <?php echo smarty_function_xr_atom(array('a_id'=>769,'return'=>1),$_smarty_tpl);?>

        </div>
        
        <!-- Block -->
        <div class="item">
            <!-- 702 desktop -->
            <?php echo smarty_function_xr_atom(array('a_id'=>770,'return'=>1),$_smarty_tpl);?>

        </div>
        
        <div class="item">
             <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16,'id'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'m_suffix'=>$_smarty_tpl->getVariable('user')->value['wz_id']),$_smarty_tpl);?>
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