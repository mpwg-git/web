<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 18:33:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenxzF6u" */ ?>
<?php /*%%SmartyHeaderCode:1246987466561be0e61eddf6-41964255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23ff81ba0a94daa253771475c29945de2b44a3f9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenxzF6u',
      1 => 1444667622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1246987466561be0e61eddf6-41964255',
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
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Raum"),$_smarty_tpl);?>
</a>  
                    <ul>
                        <li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Bearbeiten"),$_smarty_tpl);?>
</a></li>
                        <li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>31),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"User einladen"),$_smarty_tpl);?>
</a></li>
                        <li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>32),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Löschen"),$_smarty_tpl);?>
</a></li>
                    </ul>
                <?php }else{ ?>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'createNew'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Neuen Raum anlegen"),$_smarty_tpl);?>
</a>   
                <?php }?>
            </li>
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Mein Konto"),$_smarty_tpl);?>
</a>        
            </li>
            
            
        </ul>
        
    </div>
</div>