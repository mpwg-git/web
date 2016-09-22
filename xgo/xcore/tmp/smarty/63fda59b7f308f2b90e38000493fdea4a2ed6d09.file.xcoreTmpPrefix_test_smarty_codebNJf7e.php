<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 04:16:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebNJf7e" */ ?>
<?php /*%%SmartyHeaderCode:1756571850561c69969eb5e2-01118502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63fda59b7f308f2b90e38000493fdea4a2ed6d09' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebNJf7e',
      1 => 1444702614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1756571850561c69969eb5e2-01118502',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"roomdata"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getAllQuestionsAndState",'var'=>"wgtestdata"),$_smarty_tpl);?>



<div class="meinprofil-container">
    
    <div class="col-xs-4 meinprofil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>678,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <span class="looklikeh1">
            Profil
        </span>
        
        <ul class="meinprofil-options">
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</a>        
            </li>
            
            <li>
                <a data-toggle="collapse" href="#collapseProfileWgtest"><?php echo smarty_function_xr_translate(array('tag'=>"Mein WG Test"),$_smarty_tpl);?>
</a>        
                <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileWgtest">
                    
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('wgtestdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_FRAGE'];?>

                    <?php }} ?>
                    
                </div>
            </li>
             
            <li>
                <?php if ($_smarty_tpl->getVariable('roomdata')->value!=false){?>
                    <a data-toggle="collapse" href="#collapseProfileRoom"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Raum"),$_smarty_tpl);?>
</a>  
                    <ul class="meinprofil-submenu collapse" id="collapseProfileRoom">
                        <li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Bearbeiten"),$_smarty_tpl);?>
</a></li>
                        <li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>31),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"User einladen"),$_smarty_tpl);?>
</a></li>
                        <li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>32),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Deaktivieren"),$_smarty_tpl);?>
</a></li>
                    </ul>
                <?php }else{ ?>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'createNew'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Neuen Raum anlegen"),$_smarty_tpl);?>
</a>   
                <?php }?>
            </li>
            
            <li>
                <a data-toggle="collapse" href="#collapseProfileKonto"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>        
                <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileKonto">
                    <p><b>Kostenlos</b> bis 1.2.2016<br />(Danach entstehende Kosten: nur nach expliziter Zustimmung).</p> 
            		<p>Mitgliedschaft seit: <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['USER']['wz_created'],"%d.%m.%Y");?>
</p>
            		<div class="submitbutton-container">
                        <button id="form-del-account" class="button button-default button-small"><?php echo smarty_function_xr_translate(array('tag'=>"Account löschen"),$_smarty_tpl);?>
</button>
                    </div>
                </div>
            </li>
            
            
        </ul>
        
    </div>
</div>