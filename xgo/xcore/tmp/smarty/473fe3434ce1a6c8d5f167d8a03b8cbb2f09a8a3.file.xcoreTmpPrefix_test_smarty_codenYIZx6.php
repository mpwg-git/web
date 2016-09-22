<?php /* Smarty version Smarty-3.0.7, created on 2015-07-19 16:03:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenYIZx6" */ ?>
<?php /*%%SmartyHeaderCode:113909200755abae4047b0a2-75792694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '473fe3434ce1a6c8d5f167d8a03b8cbb2f09a8a3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenYIZx6',
      1 => 1437314624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113909200755abae4047b0a2-75792694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="meinprofil-container default-container-paddingtop">
    
    <div class="col-xs-4">
        <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8">
        
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