<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 09:52:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderRnwLs" */ ?>
<?php /*%%SmartyHeaderCode:641686848565576cb693204-91947539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e36a454b75e4347379f8440c8b0a8c7644148d6b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderRnwLs',
      1 => 1448441547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '641686848565576cb693204-91947539',
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
        <div class="logo-legend-section pull-right" style="vertical-align:top;font-size: 3.5vw">

            
            <?php echo smarty_function_xr_atom(array('a_id'=>782,'showFace'=>0,'mobile'=>1,'return'=>1,'desc'=>'icons block / fav'),$_smarty_tpl);?>
 
            
            <div class="clearfix"></div>
        </div>
    </nav>
    
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfUserHasAnyQuestionAnswered','var'=>'hasQuestionsAnswered'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfCurrentUserIsInMatchingToDoTable','var'=>'stillToDo'),$_smarty_tpl);?>

    <?php if ($_REQUEST['dev']==1||$_smarty_tpl->getVariable('stillToDo')->value===true){?>
        <div style="margin: 40px 0 0 0; width: 100%; background: black; color: white; padding: 5px; text-align: center;">
        <p>Dr. Duck vergleicht dich gerade mit 12.345 weiteren Profilen<br>
        und ist noch mit der Auswertung beschäftigt.</p>
        </div>
    <?php }elseif($_REQUEST['dev']==2||$_smarty_tpl->getVariable('hasQuestionsAnswered')->value===false){?>
        <div style="margin: 40px 0 0 0; width: 100%; background: black; color: white; padding: 5px; text-align: center;">
        <p>Du hast noch keine Fragen vom WG-Test beantwortet!<br>
        Dr. Duck kann dir deswegen nicht sagen, wer am besten zu dir passt!</p>
        </div>
    <?php }?>
</header>