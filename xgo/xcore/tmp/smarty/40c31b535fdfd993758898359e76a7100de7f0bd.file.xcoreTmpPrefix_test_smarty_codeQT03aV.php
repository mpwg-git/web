<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 13:06:43
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQT03aV" */ ?>
<?php /*%%SmartyHeaderCode:171826935856978f53b634d3-15358527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40c31b535fdfd993758898359e76a7100de7f0bd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQT03aV',
      1 => 1452773203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171826935856978f53b634d3-15358527',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"roomdata"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRooms",'var'=>"roomdataNew"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getAllQuestionsAndState",'var'=>"wgtestdata"),$_smarty_tpl);?>



<div class="meinprofil-container grey-bg clearfix">
    
    
    <div class="col-xs-12 default-container-paddingtop">
        
        <span class="looklikeh1">
            <?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>

            <div style="clear:both"></div>
            <span class="subheadline whoiam"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?><?php echo smarty_function_xr_translate(array('tag'=>"Suchender"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Anbieter"),$_smarty_tpl);?>
<?php }?> - ID <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_id'];?>
</span>
        </span>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>851,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

        
        
        <ul class="meinprofil-options">
            
            <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->getVariable('wgteststate')->value!=1&&$_smarty_tpl->getVariable('wgteststate')->value!=2){?>
            <br>
            <div style="color:white;" class="col-xs-8">
              <span><span class="icon-duck" ></span>
              <span class="hallo-headline"><?php echo smarty_function_xr_translate(array('tag'=>"Hallo!"),$_smarty_tpl);?>
</span><br><?php echo smarty_function_xr_translate(array('tag'=>"Du hast deinen WG-Test noch nicht ausgeflüllt!"),$_smarty_tpl);?>
</span><br>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Bitte investiere 5 Minuten in die Beantwortung deiner Erwartungen an deine Mitbewohner(innen)."),$_smarty_tpl);?>
<br></span>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Erst dann kann Dr.Duck Dir Deinen optimalen Mitbewohner finden."),$_smarty_tpl);?>
</span><br>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Du erkennst Sie an der hohen % Zahl im Profil."),$_smarty_tpl);?>
</span>
              
              
              <br><br>
             
            </div> 
            
            <div class="col-xs-4">
                 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>1),$_smarty_tpl);?>
"> 
                 <div class="stoerer" >
                    <span><?php echo smarty_function_xr_translate(array('tag'=>"Zu den Fragen"),$_smarty_tpl);?>
</span> 
                 </div> 
                 </a>
            </div>
            
            
            
            <div class="clearfix">
               
               </a><br><br><br>
               
            </div>
             
            <?php }?>
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>42),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Über mich"),$_smarty_tpl);?>
</a>  
            </li>
            
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?> 
                <li>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</a>
                </li>
            <?php }?>
            
            
            <!-- 
            <li>
                <a href="frageid"><?php echo smarty_function_xr_translate(array('tag'=>"Mein WG Test"),$_smarty_tpl);?>
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
            -->
            
            
            
            <li>
                <a data-toggle="collapse" href="#collapseProfileWgtest"><?php echo smarty_function_xr_translate(array('tag'=>"Mein WG Test"),$_smarty_tpl);?>
</a>        
                <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileWgtest">
                    <?php if (empty($_smarty_tpl->getVariable('wgtestdata',null,true,false)->value)){?>
                        <p><?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine Fragen beantwortet"),$_smarty_tpl);?>
. 
                        <br><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"WG Test jetzt starten"),$_smarty_tpl);?>
!</a>
                        </p>
                    <?php }else{ ?>
                        
                        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_wgtest::sc_get_fragen_count','var'=>'fragenGesamt'),$_smarty_tpl);?>

                        <?php echo smarty_function_xr_translate(array('tag'=>"Du hast bereits"),$_smarty_tpl);?>
 <?php echo count($_smarty_tpl->getVariable('wgtestdata')->value);?>
 <?php echo smarty_function_xr_translate(array('tag'=>"von"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('fragenGesamt')->value;?>
 <?php echo smarty_function_xr_translate(array('tag'=>"Fragen beantwortet"),$_smarty_tpl);?>
.
                    
                        <?php if (count($_smarty_tpl->getVariable('wgtestdata')->value)<$_smarty_tpl->getVariable('fragenGesamt')->value){?>
                            <a class="" href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Fortsetzen bei nächster unbeantworteten Frage"),$_smarty_tpl);?>
</a>
                        <?php }?>
                        
                        <?php if (count($_smarty_tpl->getVariable('wgtestdata')->value)==$_smarty_tpl->getVariable('fragenGesamt')->value){?>
                            <a class="" href=""><?php echo smarty_function_xr_translate(array('tag'=>"Alle Fragen noch einmal durchgehen"),$_smarty_tpl);?>
</a>
                        <?php }?>
                        
                    <?php }?>
                    
                </div>
            </li>
            
            
            
            
            
            
            
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']!='suche'){?> 
                <li>
                    <a data-toggle="collapse" href="#collapseProfileRoom"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Räume"),$_smarty_tpl);?>
</a>  
                    <ul class="meinprofil-submenu collapse" id="collapseProfileRoom">
                        
                        <?php echo smarty_function_xr_atom(array('a_id'=>850,'roomdataNew'=>$_smarty_tpl->getVariable('roomdataNew')->value,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

                        
                        <?php echo smarty_function_xr_atom(array('a_id'=>852,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

                    </ul>
                </li>
            <?php }?>
            
            <!--            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>
                 <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileKonto">
                    <p><b><?php echo smarty_function_xr_translate(array('tag'=>"Kostenlos"),$_smarty_tpl);?>
</b><?php echo smarty_function_xr_translate(array('tag'=>"bis 1.2.2016"),$_smarty_tpl);?>
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
            -->
             <li>
                <a data-toggle="collapse" href="#collapseProfileKonto"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>        
                <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileKonto">
            		<div class="submitbutton-container">
                        <button id="form-del-account" class="button button-default button-small"><?php echo smarty_function_xr_translate(array('tag'=>"Account löschen"),$_smarty_tpl);?>
</button>
                    </div>
                    <br/>
                    <div class="submitbutton-container">
                        <button id="<?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ACTIVE']=='Y'){?>form-deactivate-account<?php }else{ ?>form-reactivate-account<?php }?>" class="button button-default button-small">
                            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ACTIVE']=='Y'){?>
                                <?php echo smarty_function_xr_translate(array('tag'=>"Account deaktivieren"),$_smarty_tpl);?>

                            <?php }else{ ?>
                                <?php echo smarty_function_xr_translate(array('tag'=>"Account wieder aktivieren"),$_smarty_tpl);?>

                            <?php }?>
                        </button>
                    </div>
                    <br/>
                </div>
            </li>
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>28),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Abmelden"),$_smarty_tpl);?>
</a>
            </li>
            
            
           
            
            
        </ul>
        
    </div>
</div>