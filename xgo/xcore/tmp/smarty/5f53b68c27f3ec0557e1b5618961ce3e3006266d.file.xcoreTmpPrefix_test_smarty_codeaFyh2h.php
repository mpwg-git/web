<?php /* Smarty version Smarty-3.0.7, created on 2017-03-02 22:47:01
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaFyh2h" */ ?>
<?php /*%%SmartyHeaderCode:33591624858b892d5bca6e6-93163335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f53b68c27f3ec0557e1b5618961ce3e3006266d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaFyh2h',
      1 => 1488491221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33591624858b892d5bca6e6-93163335',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_lessWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_lessWrapper.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>647,'return'=>1),$_smarty_tpl);?>

	
	<body>
        <div class="page-wrapper">
            <?php echo smarty_function_xr_atom(array('a_id'=>940,'return'=>1),$_smarty_tpl);?>

            
            <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

            
            <?php echo smarty_function_xr_atom(array('a_id'=>943,'return'=>1),$_smarty_tpl);?>

        </div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>

        
        <!-- JS FILES -->
        <?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

        <script src="/xstorage/template/bootstrap/js/bootstrap-toggle.min.js" type="text/javascript" ></script>
        <script>
            $(document).on('click', function (e) {
                if ($(e.target).closest("#anmelden-inner").length === 0) {
                    $("#anmelden-inner").collapse('hide');
                }
            });
        </script>
        
        
        <!--<?php echo smarty_function_xr_lessWrapper(array('ids'=>'26'),$_smarty_tpl);?>
-->
        
        
        <!--media queries-->
        <!--<link rel="stylesheet" href="/assets/codeless/32.css" class="css_flush" media="only screen and (min-width:992px) and (max-width:1199px)">-->

        <!--<link rel="stylesheet" href="/assets/codeless/27.css" class="css_flush" media="only screen and (max-width:320px)">-->
        <!--<link rel="stylesheet" href="/assets/codeless/28.css" class="css_flush" media="only screen and (min-width:321px) and (max-width:480px)">-->
        <!--<link rel="stylesheet" href="/assets/codeless/29.css" class="css_flush" media="only screen and (min-width:481px) and (max-width:768px)">-->
        <!--<link rel="stylesheet" href="/assets/codeless/30.css" class="css_flush" media="all">-->
        <link rel="stylesheet" href="/xstorage/template/redesign/css_less/_main.css" media="all">
    </body>
</html>
