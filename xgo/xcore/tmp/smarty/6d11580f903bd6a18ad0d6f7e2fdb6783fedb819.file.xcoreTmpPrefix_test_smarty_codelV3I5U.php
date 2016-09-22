<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 16:02:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelV3I5U" */ ?>
<?php /*%%SmartyHeaderCode:213546132656532aa36435e7-26362787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d11580f903bd6a18ad0d6f7e2fdb6783fedb819' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelV3I5U',
      1 => 1448290979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213546132656532aa36435e7-26362787',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="button-container-favblock clearfix">
    <div class="inner clearfix">
        <div class="item">
            <?php echo smarty_function_xr_atom(array('a_id'=>769,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('state')->value['FAV'],'return'=>1),$_smarty_tpl);?>

        </div>
        <div class="item">
            <!-- 702 mobile -->
            <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('state')->value),$_smarty_tpl);?>

            <?php echo smarty_function_xr_atom(array('a_id'=>770,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('state')->value['BLOCK'],'return'=>1),$_smarty_tpl);?>

        </div>
        
        <?php if ($_smarty_tpl->getVariable('favblockonly')->value!=1){?>
            <div class="item">
                 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16,'id'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'m_suffix'=>$_smarty_tpl->getVariable('user')->value['wz_id']),$_smarty_tpl);?>
">
                    <span class="icon icon-Chat_Profil">
        			    <span class="path1"></span><span class="path2"></span><span class="path3"><span class="path4"></span>
        		    </span>
        		 </a>
            </div>
            
            <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT']!=0&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG']!=0){?>
                <div class="item">
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>19,'id'=>$_smarty_tpl->getVariable('user')->value['wz_id']),$_smarty_tpl);?>
" m_suffix=$user['wz_id']%<?php ?>>
                        <span class="icon icon-Map_Profil"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                    </a>
                </div>
            <?php }?>
        <?php }?>
        
    </div>
</div>