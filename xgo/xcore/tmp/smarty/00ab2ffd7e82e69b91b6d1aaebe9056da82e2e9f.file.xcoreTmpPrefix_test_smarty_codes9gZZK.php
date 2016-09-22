<?php /* Smarty version Smarty-3.0.7, created on 2015-07-25 15:45:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes9gZZK" */ ?>
<?php /*%%SmartyHeaderCode:178420303355b392eae0d328-78379612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00ab2ffd7e82e69b91b6d1aaebe9056da82e2e9f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes9gZZK',
      1 => 1437831914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178420303355b392eae0d328-78379612',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="meinprofil-container">
    
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
">Meine Daten</a>        
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