<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 23:03:15
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codej1X0Ms" */ ?>
<?php /*%%SmartyHeaderCode:245060367561c2013046fb8-58271306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3994506b633af1e40aab6ace12b8322fa72ce54e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codej1X0Ms',
      1 => 1444683794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245060367561c2013046fb8-58271306',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="meinprofil-container meinraum-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Zu Raum beitreten</h2>
        
        <div class="button-joinroom-container row">
            <div class="col-xs-6">
                <button class="js-accept-join" data-room="<?php echo $_REQUEST['joinRoom'];?>
" ></button>    
            </div>
            <div class="col-xs-6">
                <button class="js-reject-join" data-room="<?php echo $_REQUEST['joinRoom'];?>
" ></button>    
            </div>
        </div>
        
    </div>
</div>