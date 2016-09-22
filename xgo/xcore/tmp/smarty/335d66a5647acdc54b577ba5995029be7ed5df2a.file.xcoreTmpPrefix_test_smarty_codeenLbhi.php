<?php /* Smarty version Smarty-3.0.7, created on 2015-11-17 15:06:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeenLbhi" */ ?>
<?php /*%%SmartyHeaderCode:255287064564b346672a7e0-02271443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '335d66a5647acdc54b577ba5995029be7ed5df2a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeenLbhi',
      1 => 1447769190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255287064564b346672a7e0-02271443',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><header class="clearfix black header-suche <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    <nav class="left-row">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
            
            <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyProfileImage",'var'=>'profImg'),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->getVariable('profImg')->value!=false){?>
                <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('profImg')->value,'w'=>25,'h'=>25,'colorspace'=>"gray",'var'=>"profileImg"),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_img(array('s_id'=>161,'w'=>25,'h'=>25,'colorspace'=>"gray",'var'=>"profileImg"),$_smarty_tpl);?>

            <?php }?>
            
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                <img src="<?php echo $_smarty_tpl->getVariable('profileImg')->value['src'];?>
" class="main-item profile-image" style="vertical-align:top;margin-top:-5px;">
            </a>
            
        </a>
    </nav>
    
    <nav class="middle-row">
        <div class="" style="font-size: 3.8vw; margin-top:5px; margin-left:200px;">

            
            <?php echo smarty_function_xr_atom(array('a_id'=>782,'showFace'=>0,'mobile'=>1,'return'=>1,'desc'=>'icons block / fav'),$_smarty_tpl);?>
 
            
            <div class="clearfix"></div>
        </div>
    </nav>
    
</header>