<?php /* Smarty version Smarty-3.0.7, created on 2015-06-30 15:05:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYCYMio" */ ?>
<?php /*%%SmartyHeaderCode:152633819955929418ef9ca0-87374269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e061fe2238bfa103a8846c12710a9e01fb6f1532' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYCYMio',
      1 => 1435669528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152633819955929418ef9ca0-87374269',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="profil">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>161,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

    <div class="matchinginfos">
        <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
        
        <span class="prozent">85</span>
        <span class="match">match</span>
    </div>
    
    <div class="clearfix"></div>
    <div class="maininfo">
        <p class="name">Name</p>
        <p class="subinfo">Nachname | 26 Jahre</p>
    </div>
    
</div>