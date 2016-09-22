<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 16:28:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh3m4pQ" */ ?>
<?php /*%%SmartyHeaderCode:92147997755d5e4283677c6-40362331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94b76dd5fffb1ecbbb8ca1b1ba3c6a87c5d9c923' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh3m4pQ',
      1 => 1440080936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92147997755d5e4283677c6-40362331',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="col-xs-6 picture-col searchresult-single">
    
    
    <div class="img-wrapper" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'h'=>500,'w'=>470,'rmode'=>"cco",'class'=>"img-responsive shower-img"),$_smarty_tpl);?>

            
            <?php echo smarty_function_xr_atom(array('a_id'=>774,'return'=>1,'data'=>$_smarty_tpl->getVariable('data')->value,'desc'=>'map indicator'),$_smarty_tpl);?>

            
            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper is-suche">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <div class="infos">
                        
                        <?php if ($_smarty_tpl->getVariable('data')->value['GESCHLECHT']=='M'){?>
                            <span class="icon-mann_black"></span>
                        <?php }else{ ?>
                            <span class="icon-frau_black"></span>
                        <?php }?>
                        
                        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</p>
                        <p class="durchschnitt"><?php echo $_smarty_tpl->getVariable('data')->value['ALTER'];?>
 Jahre</p>
                        
                        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value['USER']),$_smarty_tpl);?>

                        
                        <?php echo smarty_function_xr_atom(array('a_id'=>702,'user'=>$_smarty_tpl->getVariable('data')->value,'favblockonly'=>1,'return'=>1,'desc'=>'button container'),$_smarty_tpl);?>

                        
                        <p class="button-container">
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>14,'id'=>$_smarty_tpl->getVariable('data')->value['ID'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['ID']),$_smarty_tpl);?>
">Profil</a>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>