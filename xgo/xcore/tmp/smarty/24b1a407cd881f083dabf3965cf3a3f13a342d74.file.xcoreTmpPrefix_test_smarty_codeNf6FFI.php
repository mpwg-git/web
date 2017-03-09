<?php /* Smarty version Smarty-3.0.7, created on 2017-03-07 10:34:07
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNf6FFI" */ ?>
<?php /*%%SmartyHeaderCode:55726535858be7e8fb8c9a2-77615985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24b1a407cd881f083dabf3965cf3a3f13a342d74' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNf6FFI',
      1 => 1488879247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55726535858be7e8fb8c9a2-77615985',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script src="/xstorage/template/redesign/js/bootstrap.min.js"></script>


<script>
    $(window).on("resize", function () {
        if ($(window).width() > 991) {
            $('#register-affix').attr({
                'data-spy': 'affix',
                'data-offset-top': '50',
                'data-offset-bottom': '100'
            })
        } else {
            $('#register-affix').removeAttr('data-spy data-offset-top data-offset-bottom');
        }
    })
    
    if ($(window).width() > 991) {
        $('#myAffix').affix({
          offset: {
            top: 100,
            bottom: function () {
              return (this.bottom = $('.footer').outerHeight(true))
            }
        }
    })
            
</script>
