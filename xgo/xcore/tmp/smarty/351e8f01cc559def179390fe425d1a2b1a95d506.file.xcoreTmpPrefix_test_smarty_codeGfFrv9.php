<?php /* Smarty version Smarty-3.0.7, created on 2015-07-02 15:54:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGfFrv9" */ ?>
<?php /*%%SmartyHeaderCode:7789674755595429b17c5a4-61810857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '351e8f01cc559def179390fe425d1a2b1a95d506' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGfFrv9',
      1 => 1435845275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7789674755595429b17c5a4-61810857',
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