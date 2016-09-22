<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 13:55:39
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCU5yAc" */ ?>
<?php /*%%SmartyHeaderCode:2032278295561b9fbb7965c5-75511951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5196c71a55fe78ed50533ff00db17bd44cb58eba' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCU5yAc',
      1 => 1444650939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2032278295561b9fbb7965c5-75511951',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['USER'], null, null);?>
<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>

<div class="profil suche">

    <div class="profil-inner">
        
        <?php if ($_smarty_tpl->getVariable('user')->value['wz_PROFILBILD']==0){?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>540,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('user')->value['wz_PROFILBILD'],'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

        <?php }?>
        
        <div class="profil-inner-padding">
            <div class="matchinginfos">
                <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
                <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHING']['RESULT']['MATCHROOM']['matchGesamt'];?>
</span>
                <span class="match">match</span>
                 <div class="clearfix"></div>
            </div>
            
            <p class="match-text">
                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['GESAMT'];?>

            </p>
            
            
            
            
            <p>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>12,'id'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'m_suffix'=>$_smarty_tpl->getVariable('user')->value['wz_id']),$_smarty_tpl);?>
">
                    <div class="icons">
                        <span class="icon-Chat_Profil">
        				<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
        				</span> <span class="icon-description">Nachricht</span>
                    </div>
                </a>
            </p>
            
           
        </div>
        
    </div>    
</div>