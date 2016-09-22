<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 16:55:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEWfrro" */ ?>
<?php /*%%SmartyHeaderCode:843218081561bc9d85f3371-71943259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '789e1a3b5eaa856930e5f5230214e0881e908ac6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEWfrro',
      1 => 1444661720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '843218081561bc9d85f3371-71943259',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['USER'], null, null);?>
<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>
<?php $_smarty_tpl->tpl_vars['room'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ROOM'], null, null);?>

<div class="profil suche">

    <div class="profil-inner">
        
        
        <div class="profil-inner-padding profile-inner-padding-room">
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
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>12,'id'=>$_smarty_tpl->getVariable('room')->value['wz_ADMIN'],'m_suffix'=>"room/".($_smarty_tpl->getVariable('user')->value['wz_id'])),$_smarty_tpl);?>
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