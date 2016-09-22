<?php /* Smarty version Smarty-3.0.7, created on 2015-07-02 15:48:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJ9V9ec" */ ?>
<?php /*%%SmartyHeaderCode:127403032755954117cde1c1-08788984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d42cfde8338b5c85cbf10567f959fa11aff0f17' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJ9V9ec',
      1 => 1435844887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127403032755954117cde1c1-08788984',
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

        </div>
        
        
        
    </div>
    <div class="textwindow">
        <textarea placeholder="dein text"></textarea>
    </div>
    
</div>