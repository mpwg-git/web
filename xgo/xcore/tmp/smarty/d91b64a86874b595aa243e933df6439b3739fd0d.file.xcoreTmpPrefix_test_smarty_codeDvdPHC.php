<?php /* Smarty version Smarty-3.0.7, created on 2015-07-02 15:48:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDvdPHC" */ ?>
<?php /*%%SmartyHeaderCode:12042067455595413c582a05-36154128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd91b64a86874b595aa243e933df6439b3739fd0d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDvdPHC',
      1 => 1435844924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12042067455595413c582a05-36154128',
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

            
            <p class="name">Ann-Marie</p>
            <p class="text"></p>
        </div>
        
        
        
    </div>
    <div class="textwindow">
        <textarea placeholder="dein text"></textarea>
    </div>
    
</div>