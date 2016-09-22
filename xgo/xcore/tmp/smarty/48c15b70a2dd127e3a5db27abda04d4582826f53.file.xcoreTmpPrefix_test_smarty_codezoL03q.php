<?php /* Smarty version Smarty-3.0.7, created on 2015-11-30 11:38:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezoL03q" */ ?>
<?php /*%%SmartyHeaderCode:314898290565c2720971604-54417039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48c15b70a2dd127e3a5db27abda04d4582826f53' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezoL03q',
      1 => 1448879904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314898290565c2720971604-54417039',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"roomdata"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRooms",'var'=>"roomdataNew"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getAllQuestionsAndState",'var'=>"wgtestdata"),$_smarty_tpl);?>



<div class="meinprofil-container">   
    <?php if ($_REQUEST['dev']==1){?>
        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('roomdataNew')->value),$_smarty_tpl);?>

    <?php }?>
    
    <div class="col-xs-4 meinprofil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>678,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <span class="looklikeh1 ">
            <?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>

            <div style="clear:both"></div>
            <span class="subheadline whoiam"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?><?php echo smarty_function_xr_translate(array('tag'=>"Suchender"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Anbieter"),$_smarty_tpl);?>
<?php }?></span>
        </span>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>851,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

       
        <ul class="meinprofil-options">
            
            
            <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->getVariable('wgteststate')->value!=1&&$_smarty_tpl->getVariable('wgteststate')->value!=2){?>
            <br>
            <div style="color:white;" class="col-lg-8">
              <span><b> <span class="icon-duck" style="color:black;font-size:40px;"></span><span style="color:#04e0d7; font-size:25px;text-transform:uppercase!important;"><?php echo smarty_function_xr_translate(array('tag'=>"Hallo!"),$_smarty_tpl);?>
</span></b><br><?php echo smarty_function_xr_translate(array('tag'=>"Du hast deinen WG-Test noch nicht ausgeflüllt!"),$_smarty_tpl);?>
</span><br>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Bitte investiere 5 Minuten in die Beantwortung deiner Erwartungen an deine Mitbewohner(innen)."),$_smarty_tpl);?>
<br></span>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Erst dann kann Dr.Duck Dir Deinen optimalen Mitbewohner finden."),$_smarty_tpl);?>
</span><br>
              <span><?php echo smarty_function_xr_translate(array('tag'=>"Du erkennst Sie an der hohen % Zahl im Profil."),$_smarty_tpl);?>
</span>
              
              <br><br>
             
            </div>
            <div class="col-lg-4">
                 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>1),$_smarty_tpl);?>
"> 
                 <div class="stoerer" style="height: 140px;width: 140px; background-image: url('/xstorage/template/img/sys/delete.svg'); background-repeat: no-repeat; background-size: 140px; text-align: center;">
                     
                    <span style="color:white;"><br><br><br><?php echo smarty_function_xr_translate(array('tag'=>"Zu den Fragen"),$_smarty_tpl);?>
</span> 
                 </div> 
                 </a>
            </div>

            
            
            
            <div class="empfehlungen empfehlungen-js">
               <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>1),$_smarty_tpl);?>
"> <span><?php echo smarty_function_xr_translate(array('tag'=>"Zu den Fragen"),$_smarty_tpl);?>

               </span></a><br><br><br>
               
            </div>
             
            <?php }?>
            
            
            
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?> 
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</a>        
            </li>
            <?php }?>
            
            <li>
                <a data-toggle="collapse" href="#collapseProfileWgtest"><?php echo smarty_function_xr_translate(array('tag'=>"Mein WG Test"),$_smarty_tpl);?>
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
                    <a data-toggle="collapse" href="#collapseProfileRoom"><?php echo smarty_function_xr_translate(array('tag'=>"Meine Räume"),$_smarty_tpl);?>
</a>  
                    <ul class="meinprofil-submenu collapse" id="collapseProfileRoom">
                        <?php echo smarty_function_xr_atom(array('a_id'=>850,'roomdataNew'=>$_smarty_tpl->getVariable('roomdataNew')->value,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

                        
                        <?php echo smarty_function_xr_atom(array('a_id'=>852,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

                    </ul>
                </li>    
            
            <?php }?>
            
            <li>
                <a data-toggle="collapse" href="#collapseProfileKonto"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>        
                <div class="meinprofil-meinkonto-collapse collapse" id="collapseProfileKonto">
                    
            		
            		<div class="submitbutton-container">
                        <button id="form-del-account" class="button button-default button-small"><?php echo smarty_function_xr_translate(array('tag'=>"Account löschen"),$_smarty_tpl);?>
</button>
                    </div>
                </div>
            </li>
           
            

        </ul>
        
    </div>
</div>