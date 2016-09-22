<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 12:34:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYMw8tN" */ ?>
<?php /*%%SmartyHeaderCode:59847970755c9cfc8d205c5-58285874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '881fbd486372f872df7b07e6c3591941887a51f5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYMw8tN',
      1 => 1439289288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59847970755c9cfc8d205c5-58285874',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><header class="clearfix black header-suche <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    <nav class="left-row">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>161,'w'=>25,'h'=>25,'rmode'=>"cco",'class'=>"main-item profile-image",'style'=>"vertical-align:top"),$_smarty_tpl);?>

        </a>
    </nav>
    
    <nav class="middle-row">
        <div class="logo-legend-section pull-right">
            <div class="item">
                <span class="icon-Favourite_inaktiv logo-legend-icon"></span>
                Favourites
            </div>
            <div class="item no-margin">
                <span class="icon-Blocked_inaktiv logo-legend-icon"></span>
                Blocked
            </div>
            <div class="clearfix"></div>
        </div>
    </nav>
    
</header>