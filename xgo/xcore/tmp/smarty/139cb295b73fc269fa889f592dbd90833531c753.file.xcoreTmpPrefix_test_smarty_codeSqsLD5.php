<?php /* Smarty version Smarty-3.0.7, created on 2015-07-19 16:05:01
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSqsLD5" */ ?>
<?php /*%%SmartyHeaderCode:68510211755abae8de51a99-06987105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '139cb295b73fc269fa889f592dbd90833531c753' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSqsLD5',
      1 => 1437314701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68510211755abae8de51a99-06987105',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="meinprofil-container">
    
    <div class="col-xs-4">
        <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <span class="looklikeh1">
            Profil
        </span>
        
        <ul>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">Meine Daten</a>        
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>9),$_smarty_tpl);?>
">Meine Fakten</a>        
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