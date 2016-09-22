<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:33:40
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/604.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:191221391853d14374b34e43-09484393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c15b10c8c4086c6c29a07fa636d2d93ade95e4a5' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/604.cache.html',
      1 => 1406223220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191221391853d14374b34e43-09484393',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><h3>Newsletter</h3>
<p>Please sign up to get our monthly newsletter.</p>
<br />

<form id="wz_form" name="wz_form" class="wzForm newslb" action="<?php echo smarty_function_xr_genlink(array('p_id'=>120),$_smarty_tpl);?>
" method="post">
	<?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

	<input name="IPADRESSE" id="IPADRESSE" type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR'];?>
" />
	<div id="newsletter-signup">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Email Address" name="EMAIL" id="EMAIL" rel="required_email">
			<div class="error" id="EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'E-Mail address is required'),$_smarty_tpl);?>
</div>
			<button type="submit" class="btn btn-default" onclick="submitWithValidation('wz_form');">Subscribe</button>
		</div>
	</div>
</form>