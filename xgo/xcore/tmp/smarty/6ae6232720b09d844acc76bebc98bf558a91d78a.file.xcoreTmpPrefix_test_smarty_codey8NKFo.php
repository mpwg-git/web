<?php /* Smarty version Smarty-3.0.7, created on 2015-11-10 17:52:05
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codey8NKFo" */ ?>
<?php /*%%SmartyHeaderCode:654865947564220b5a059a8-00578330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ae6232720b09d844acc76bebc98bf558a91d78a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codey8NKFo',
      1 => 1447174325,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '654865947564220b5a059a8-00578330',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['USER'], null, null);?>
<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>

<div class="profil suche">

    <div class="profil-inner">
        
        <?php if ($_smarty_tpl->getVariable('user')->value['wz_PROFILBILD']==0){?>
            <a href="<?php echo $_smarty_tpl->getVariable('user')->value['PROFILE_URL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>540,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>
</a>
        <?php }else{ ?>
            <a href="<?php echo $_smarty_tpl->getVariable('user')->value['PROFILE_URL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('user')->value['wz_PROFILBILD'],'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>
</a>
        <?php }?>
        
        <div class="profil-inner-padding">
            <div class="matchinginfos">
                <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
                <p class="match-text">
                    <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['GESAMT'];?>

                </p>
                <span class="prozent"><?php echo $_smarty_tpl->getVariable('matching')->value['RESULT']['matchGesamt'];?>
</span>
                <span class="match">match</span>
                 <div class="clearfix"></div>
            </div>
            
           
            
            
            
           
        </div>
        
    </div>    
</div>