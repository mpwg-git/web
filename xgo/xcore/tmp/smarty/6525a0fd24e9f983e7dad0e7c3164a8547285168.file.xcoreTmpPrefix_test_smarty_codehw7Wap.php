<?php /* Smarty version Smarty-3.0.7, created on 2016-09-19 12:52:19
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehw7Wap" */ ?>
<?php /*%%SmartyHeaderCode:2517783257dfc363d00c02-22412501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6525a0fd24e9f983e7dad0e7c3164a8547285168' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehw7Wap',
      1 => 1474282339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2517783257dfc363d00c02-22412501',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>	
<meta property="og:site_name" content="MeinePerfekteWG"/>
<meta property="og:type" content="website" />
<?php if ($_smarty_tpl->getVariable('P_ID')->value==46){?>
    <?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','r_id'=>$_REQUEST['blogId'],'var'=>'blogEntry'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_REQUEST['blogId'],'var'=>'blogEntryURL'),$_smarty_tpl);?>

    
    <?php if ($_smarty_tpl->getVariable('blogEntry')->value['wz_BILD']>0){?>
        <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('blogEntry')->value['wz_BILD'],'ext'=>'jpg','w'=>600,'var'=>'blogPostImage'),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['blogPostImage'] = new Smarty_variable(false, null, null);?>
    <?php }?>
    
    <meta property="og:title" content="<?php echo $_smarty_tpl->getVariable('blogEntry')->value['wz_HEADLINE'];?>
" />
    <meta property="og:description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />
    <?php if ($_smarty_tpl->getVariable('blogPostImage')->value){?>
        <meta property="og:image" content="http://www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('blogPostImage')->value['src'];?>
"/>
    <?php }?>
    <meta property="og:url" content="//www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('blogEntryURL')->value;?>
" />
    
    <meta name="twitter:title" content="<?php echo $_smarty_tpl->getVariable('blogEntry')->value['wz_HEADLINE'];?>
" />
    <meta name="twitter:description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />
    <meta name="twitter:image" content="http://www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('blogPostImage')->value['src'];?>
" />
    <meta name="twitter:url" content="http://www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('blogEntryURL')->value;?>
" />

    <meta name="description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />
<?php }else{ ?>
    
    <?php echo smarty_function_xr_img(array('s_id'=>18388,'ext'=>'jpg','w'=>300,'var'=>'ogImage'),$_smarty_tpl);?>

    
    <meta property="og:title" content="MeinePerfekteWG.com - <?php echo smarty_function_xr_translate(array('tag'=>'Deine persönliche WG-Suchmaschine'),$_smarty_tpl);?>
" />
    <meta property="og:description" content="<?php echo smarty_function_xr_translate(array('tag'=>'Suchen'),$_smarty_tpl);?>
.<?php echo smarty_function_xr_translate(array('tag'=>'Matchen'),$_smarty_tpl);?>
.<?php echo smarty_function_xr_translate(array('tag'=>'Wohnen'),$_smarty_tpl);?>
. <?php echo smarty_function_xr_translate(array('tag'=>'Du entscheidest was dir wichtig ist und wir zeigen dir durch schnelle und simple Fragen wer zu dir passt'),$_smarty_tpl);?>
." />
    <meta property="og:image" content="http://www.meineperfektewg.com<?php echo $_smarty_tpl->getVariable('ogImage')->value['src'];?>
"/>
    <meta property="og:url" content="http://www.meineperfektewg.com" />
    
<?php }?>
