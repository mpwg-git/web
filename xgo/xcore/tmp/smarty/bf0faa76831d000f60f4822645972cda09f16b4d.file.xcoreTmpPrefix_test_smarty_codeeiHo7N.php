<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 10:27:55
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeiHo7N" */ ?>
<?php /*%%SmartyHeaderCode:192857384055c8608b1070d1-09380781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf0faa76831d000f60f4822645972cda09f16b4d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeiHo7N',
      1 => 1439195275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192857384055c8608b1070d1-09380781',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_SESSION['ONE_TIME_PAD']),$_smarty_tpl);?>


<div class="meinprofil-container">
    
    <div class="col-xs-4 meinprofil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <span class="looklikeh1">
            Profil
        </span>
        
        <ul class="meinprofil-options">
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
?profiltype=1">Meine Daten (Suche)</a>        
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">Meine Daten (Biete)</a>        
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
">Mein Konto</a>        
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
">Mein WG Test</a>   
            </li>
        </ul>
        
    </div>
</div>