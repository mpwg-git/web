<?php /* Smarty version Smarty-3.0.7, created on 2015-07-02 15:50:43
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekGJled" */ ?>
<?php /*%%SmartyHeaderCode:1835249933559541b399e9c4-51061943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4039927f643bb0bb660562dbfcb2dbaba50a5ff1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekGJled',
      1 => 1435845043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1835249933559541b399e9c4-51061943',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="chat">
    <div class="header clearfix">
        
        <div class="name">Andi <br/> Mustermann</div>
        
        <div class="controls">
            <p class="control">
                neue Nachricht 
            </p>
            <p class="control">
                neue Gruppe
            </p>
            <p class="control">
                Benutzer melden 
            </p>
        </div>
        
    </div>
    <div class="chatwindow">
        <div class="item">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>163,'w'=>70,'h'=>80,'rmode'=>"cco",'class'=>"chatimage"),$_smarty_tpl);?>

            
            <p class="name">Ann-Marie <span class="timestamp">01.05.2015 15:35</span></p>
            <p class="text"></p>
        </div>
        
        
        
    </div>
    <div class="textwindow">
        <textarea placeholder="dein text"></textarea>
    </div>
    
</div>