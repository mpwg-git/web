<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 02:19:05
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYhMiqa" */ ?>
<?php /*%%SmartyHeaderCode:125615887561c4df9d36534-22312847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad76bd50d654c85caa8b30e970c01e71f49082bf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYhMiqa',
      1 => 1444695545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125615887561c4df9d36534-22312847',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'var'=>"roomdata"),$_smarty_tpl);?>




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
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>0),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Mein WG Test"),$_smarty_tpl);?>
</a>   
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
                <a data-toggle="collapse" href="#collapseProfileKonto""><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>        
                <div class="collapse" id="collapseProfileKonto">
                    
                    
                    
                    <li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>32),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Deaktivieren"),$_smarty_tpl);?>
</a></li>
                </ul>
            </li>
            
            
        </ul>
        
    </div>
</div>