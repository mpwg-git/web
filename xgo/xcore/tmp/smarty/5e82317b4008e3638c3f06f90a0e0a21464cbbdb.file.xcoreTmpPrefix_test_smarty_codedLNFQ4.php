<?php /* Smarty version Smarty-3.0.7, created on 2017-02-22 09:52:45
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedLNFQ4" */ ?>
<?php /*%%SmartyHeaderCode:76930074058ad515d753864-10931357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e82317b4008e3638c3f06f90a0e0a21464cbbdb' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedLNFQ4',
      1 => 1487753565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76930074058ad515d753864-10931357',
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
        <link rel="stylesheet" href="/assets/codeless/32.css" class="css_flush" media="only screen and (min-width:991px) and (max-width:1200)">

        
        
        <link rel="stylesheet" href="/assets/codeless/27.css" class="css_flush" media="only screen and (max-width:320px)">
        <link rel="stylesheet" href="/assets/codeless/28.css" class="css_flush" media="only screen and (min-width:321px) and (max-width:480px)">
        <link rel="stylesheet" href="/assets/codeless/29.css" class="css_flush" media="only screen and (min-width:481px) and (max-width:768px)">
        <link rel="stylesheet" href="/assets/codeless/30.css" class="css_flush" media="all">
    </body>
</html>
