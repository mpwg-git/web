<?php /* Smarty version Smarty-3.0.7, created on 2015-07-19 16:03:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedyyfWR" */ ?>
<?php /*%%SmartyHeaderCode:8009769155abae4f788199-83227671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ac0919276c6e29e94f826724bf452bfb112de4f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedyyfWR',
      1 => 1437314639,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8009769155abae4f788199-83227671',
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