<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 23:12:38
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZiIoDy" */ ?>
<?php /*%%SmartyHeaderCode:59041907858ab69d6c29a18-26488247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9972930c27ed6324aceb94ceb909a9b4ff171807' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZiIoDy',
      1 => 1487628758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59041907858ab69d6c29a18-26488247',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
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

        
        <script>
            $(document).on('click', function (e) {
                if ($(e.target).closest("#anmelden-inner").length === 0) {
                    $("#anmelden-inner").collapse('hide');
                }
            });
        </script>
        
        <!--media queries-->
        <link rel="stylesheet" href="/assets/codeless/27.css" class="css_flush" media="only screen and (max-width:320px)">
        <link rel="stylesheet" href="/assets/codeless/28.css" class="css_flush" media="only screen and (min-width:321px) and (max-width:480px)">
        <link rel="stylesheet" href="/assets/codeless/29.css" class="css_flush" media="only screen and (min-width:481px) and (max-width:768px)">
        
    </body>
</html>
