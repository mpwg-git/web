<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 10:45:43
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3oo3fA" */ ?>
<?php /*%%SmartyHeaderCode:1805282075565583470f1713-31315416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '956f42c5d2b2a1ddf8486362f73ff5fad9adba33' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3oo3fA',
      1 => 1448444743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1805282075565583470f1713-31315416',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"roomdata"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRooms",'var'=>"roomdataNew"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getAllQuestionsAndState",'var'=>"wgtestdata"),$_smarty_tpl);?>



<div class="meinprofil-container">
    
    
    <div class="col-xs-12 default-container-paddingtop">
        
        <span class="looklikeh1">
            <?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>

            <div style="clear:both"></div>
            <span class="subheadline whoiam"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?><?php echo smarty_function_xr_translate(array('tag'=>"Suchender"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Anbieter"),$_smarty_tpl);?>
<?php }?></span>
        </span>
        
        <ul class="meinprofil-options">
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?> 
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</a>
                
            </li>
            <?php }?>
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>0),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Mein WG Test"),$_smarty_tpl);?>
</a> 
                <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileWgtest">
                    <?php if (empty($_smarty_tpl->getVariable('wgtestdata',null,true,false)->value)){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine Fragen beantwortet"),$_smarty_tpl);?>
. <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"WG Test jetzt starten"),$_smarty_tpl);?>
!</a>
                    <?php }else{ ?>
                        <p><strong>Bereits beantwortete Fragen:</strong></p>
                        <p>Meinung geändert? Einfach die Frage anklicken!</p>
                        <ul class="wgtest-ul">
                            
                        <?php if (count($_smarty_tpl->getVariable('wgtestdata')->value)<15){?>
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Fortsetzen"),$_smarty_tpl);?>
</a>
                        <?php }?>
                            
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('wgtestdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li><span><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
.</span><a class="matching-fragen-ue" href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>$_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'],'m_suffix'=>$_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_FRAGE'];?>
</a></li>
                        <?php }} ?>
                        </ul>
                    <?php }?>
                    
                </div>
            </li>
            
            
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']!='suche'){?> 
                <li>
                    <?php if ($_smarty_tpl->getVariable('roomdata')->value!=false||$_smarty_tpl->getVariable('roomdataNew')->value){?>
                        <a data-toggle="collapse" href="#collapseProfileRoom"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Räume"),$_smarty_tpl);?>
</a>  
                        
                        <ul class="meinprofil-submenu collapse" id="collapseProfileRoom">
                            <?php  $_smarty_tpl->tpl_vars['room'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('roomdataNew')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["roomloop"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['room']->key => $_smarty_tpl->tpl_vars['room']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["roomloop"]['iteration']++;
?>
                                <li class="room-settings">
                                    <a class="room-edit" href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
                                        <span class="room-number">
                                            <?php echo smarty_function_xr_translate(array('tag'=>'Raum'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['roomloop']['iteration'];?>

                                        </span>
                                        <span class="room-name">
                                            <?php echo $_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN'];?>
 
                                        </span>
                                    </a>
                                    
                                    <?php ob_start();?><?php echo smarty_function_xr_translate(array('tag'=>'Aktivieren'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['activate'] = new Smarty_variable($_tmp1, null, null);?>
                                    <?php if ($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_ACTIVE']=='N'){?>
                                        <?php ob_start();?><?php echo smarty_function_xr_translate(array('tag'=>'Deaktivieren'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['activate'] = new Smarty_variable($_tmp2, null, null);?>
                                    <?php }?>
                                    
                                    <a title="<?php echo $_smarty_tpl->getVariable('activate')->value;?>
" class="room-edit-icon icon-status <?php if ($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_ACTIVE']=='N'){?>inactive<?php }else{ ?>active<?php }?>" href="<?php echo smarty_function_xr_genlink(array('p_id'=>32,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
                                        <span><?php echo $_smarty_tpl->getVariable('activate')->value;?>
</span>
                                    </a>
                                    
                                    <a title="<?php echo smarty_function_xr_translate(array('tag'=>"User einladen"),$_smarty_tpl);?>
" class="room-edit-icon icon-invite" href="<?php echo smarty_function_xr_genlink(array('p_id'=>31,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
                                        <span><?php echo smarty_function_xr_translate(array('tag'=>"User einladen"),$_smarty_tpl);?>
</span>
                                    </a>
                                    
                                    <a title="<?php echo smarty_function_xr_translate(array('tag'=>"Raum löschen"),$_smarty_tpl);?>
" class="room-edit-icon icon-delete" href="<?php echo smarty_function_xr_genlink(array('p_id'=>31,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
                                        <span><?php echo smarty_function_xr_translate(array('tag'=>"User einladen"),$_smarty_tpl);?>
</span>
                                    </a>
                                </li>
                            <?php }} ?>
                            <li class="room-settings room-new">
                                <span class="room-name no-padding-left">
                                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'createNew'=>1),$_smarty_tpl);?>
">&nbsp;<?php echo smarty_function_xr_translate(array('tag'=>"Neuen Raum anlegen"),$_smarty_tpl);?>
</a>
                                </span>
                            </li>
                        </ul>
                    <?php }?>
                </li>
            
            <?php }?>
            
            
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>
                 <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileKonto">
                    <p><b><?php echo smarty_function_xr_translate(array('tag'=>"Kostenlos"),$_smarty_tpl);?>
 </b> <?php echo smarty_function_xr_translate(array('tag'=>"bis 1.2.2016"),$_smarty_tpl);?>
<br />(<?php echo smarty_function_xr_translate(array('tag'=>"Danach entstehende Kosten: nur nach expliziter Zustimmung"),$_smarty_tpl);?>
).</p> 
            		<p><?php echo smarty_function_xr_translate(array('tag'=>"Mitgliedschaft seit:"),$_smarty_tpl);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['USER']['wz_created'],"%d.%m.%Y");?>
</p>
            		<div class="submitbutton-container">
                        <button id="form-del-account" class="button button-default button-small"><?php echo smarty_function_xr_translate(array('tag'=>"Account löschen"),$_smarty_tpl);?>
</button>
                    </div>
                </div>
            </li>
            
            <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->getVariable('wgteststate')->value!=1&&$_smarty_tpl->getVariable('wgteststate')->value!=2){?>
            <br>
            <div style="color:black;">
              <span><b><?php echo smarty_function_xr_translate(array('tag'=>"Hallo!"),$_smarty_tpl);?>
</b><br><?php echo smarty_function_xr_translate(array('tag'=>"Du hast deinen WG-Test noch nicht ausgeflüllt!"),$_smarty_tpl);?>
</span><br>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Bitte investiere 5 Minuten in die Beantwortung deiner Erwartungen an deine Mitbewohner(innen)."),$_smarty_tpl);?>
</span><br>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Erst dann kann Dr.Duck Dir Deinen optimalen Mitbewohner finden."),$_smarty_tpl);?>
</span><br>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Du erkennst Sie an der hohen % Zahl im Profil."),$_smarty_tpl);?>
</span>
              <br><br>
              <span class="icon-duck" style="color:#04E0D7;font-size:60px;"></span>
            </div> 
             
            <div class="empfehlungen empfehlungen-js">
                <span><?php echo smarty_function_xr_translate(array('tag'=>"Meine Empfehlungen"),$_smarty_tpl);?>
</span><br>
                <span><?php echo smarty_function_xr_translate(array('tag'=>"Für Dich"),$_smarty_tpl);?>
 <span class="pfeil icon-pfeil animated shake"></span></span><br>
            </div> 
             
             
            <?php }?>
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>28),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Abmelden"),$_smarty_tpl);?>
</a>
                
            </li>
            
            
        </ul>
        
    </div>
</div>