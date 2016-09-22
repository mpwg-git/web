<?php /* Smarty version Smarty-3.0.7, created on 2015-07-02 15:53:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaaeOW2" */ ?>
<?php /*%%SmartyHeaderCode:126390009355954265b14d47-56140309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f8626b80a7f26c019df9972d9f38a5ef4f607ec' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaaeOW2',
      1 => 1435845221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126390009355954265b14d47-56140309',
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

            <div class="text-wrapper">
                <p class="name">Ann-Marie <span class="timestamp">01.05.2015 15:35</span></p>
                <p class="text">Lorem Ipsum dolor se Lorem Ipsum dolor se Lorem Ipsum dolor se</p>
            </div>
        </div>
        
        
        
    </div>
    <div class="textwindow">
        <textarea placeholder="dein text"></textarea>
    </div>
    
</div>