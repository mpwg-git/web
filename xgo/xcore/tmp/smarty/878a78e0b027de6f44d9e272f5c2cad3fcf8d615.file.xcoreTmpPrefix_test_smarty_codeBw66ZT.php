<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 19:07:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBw66ZT" */ ?>
<?php /*%%SmartyHeaderCode:35390197155cb7d420afb73-74612255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '878a78e0b027de6f44d9e272f5c2cad3fcf8d615' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeBw66ZT',
      1 => 1439399234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35390197155cb7d420afb73-74612255',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="chat default-container-paddingtop">
    <div class="js-chatheader header clearfix">
        
        <div class="name">Andi <br/> Mustermann</div>
        
        <div class="controls">
            <p class="control">
                neue Nachricht <span class="icon-rel icon-plus-rel"></span>
            </p>
            <p class="control"> <span class="icon-rel icon-melden-rel"></span>
                Benutzer melden 
            </p>
        </div>
        
    </div>
    <div class="js-chatwindow chatwindow <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
        
        <?php echo smarty_function_xr_atom(array('a_id'=>680,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>680,'dayChange'=>1,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>680,'return'=>1),$_smarty_tpl);?>

        
        
    </div>
    <div class="js-chattext textwindow">
        <textarea placeholder="dein text"></textarea>
    </div>
    
</div>