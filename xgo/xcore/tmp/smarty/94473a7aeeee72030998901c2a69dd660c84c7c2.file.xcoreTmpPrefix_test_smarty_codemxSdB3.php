<?php /* Smarty version Smarty-3.0.7, created on 2017-03-07 10:34:43
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemxSdB3" */ ?>
<?php /*%%SmartyHeaderCode:188824647558be7eb393a723-29050962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94473a7aeeee72030998901c2a69dd660c84c7c2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemxSdB3',
      1 => 1488879283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188824647558be7eb393a723-29050962',
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
    }
            
</script>
