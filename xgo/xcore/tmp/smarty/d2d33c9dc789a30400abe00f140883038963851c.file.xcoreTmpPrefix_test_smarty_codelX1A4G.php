<?php /* Smarty version Smarty-3.0.7, created on 2015-12-23 01:35:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelX1A4G" */ ?>
<?php /*%%SmartyHeaderCode:5845093095679ec4f4396a4-39895871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2d33c9dc789a30400abe00f140883038963851c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelX1A4G',
      1 => 1450830927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5845093095679ec4f4396a4-39895871',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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
" class="main-item profile-image" style="vertical-align:middle">
            </a>
            
        </a>
    </nav>
    
    <nav class="middle-row">
        <div class="logo-legend-section pull-right" style="vertical-align:top;font-size: 3.5vw">

            
            <?php echo smarty_function_xr_atom(array('a_id'=>782,'showFace'=>0,'mobile'=>1,'return'=>1,'desc'=>'icons block / fav'),$_smarty_tpl);?>
 
            
            <div class="clearfix"></div>
        </div>
    </nav>
    
    <?php if ($_smarty_tpl->getVariable('P_ID')->value==17){?>
        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfUserHasAnyQuestionAnswered','var'=>'hasQuestionsAnswered'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfCurrentUserIsInMatchingToDoTable','var'=>'stillToDo'),$_smarty_tpl);?>

        <?php if ($_REQUEST['dev']==1||$_smarty_tpl->getVariable('stillToDo')->value===true){?>
            <div style=" margin: 40px 0 0 0; width: 100%; background: #04e0d7; color: black; padding: 5px; text-align: center; font-family: 'jaapokkiregular'; font-weight: bold; text-transform: uppercase;">
                <br>
                <p>
                    <?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck vergleicht dich gerade mit weiteren Profilen und ist noch mit der Auswertung beschäftigt.'),$_smarty_tpl);?>

                </p>
                <span class="icon-duck" style="color:black;font-size:60px;"></span>
            </div>
        <?php }elseif($_REQUEST['dev']==2||$_smarty_tpl->getVariable('hasQuestionsAnswered')->value===false){?>
            <div style=" margin: 40px 0 0 0; width: 100%; background: #04e0d7; color: black; padding: 5px; text-align: center; font-family: 'jaapokkiregular'; font-weight: bold; text-transform: uppercase;">
                <br>
                <p>
                    <?php echo smarty_function_xr_translate(array('tag'=>'Du hast noch keine Fragen vom WG-Test beantwortet!'),$_smarty_tpl);?>

                    <?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck kann dir deswegen nicht sagen, wer am besten zu dir passt!'),$_smarty_tpl);?>

                </p>
                <span class="icon-duck" style="color:black;font-size:60px;"></span>
            </div>
        <?php }?>
    <?php }?>
</header>