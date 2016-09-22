<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 05:10:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLfgc7P" */ ?>
<?php /*%%SmartyHeaderCode:100511648855dbdc99bd14a0-44613912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a27c1c8f05787212db5ea1bac9af0cc975627b3f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLfgc7P',
      1 => 1440472217,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100511648855dbdc99bd14a0-44613912',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="button-container-favblock clearfix">
    <div class="inner clearfix">
        <div class="item">
            <?php echo smarty_function_xr_atom(array('a_id'=>769,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('user')->value['STATE_FAV'],'return'=>1),$_smarty_tpl);?>

        </div>
        <div class="item">
            <?php echo smarty_function_xr_atom(array('a_id'=>770,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('user')->value['STATE_BLOCK'],'return'=>1),$_smarty_tpl);?>

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
" m_suffic=$user['wz_id']%<?php ?>>>
                        <span class="icon icon-Map_Profil"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                    </a>
                </div>
            <?php }?>
        <?php }?>
        
    </div>
</div>