<?php /* Smarty version Smarty-3.0.7, created on 2014-08-13 18:38:36
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1FcBV8" */ ?>
<?php /*%%SmartyHeaderCode:149532179253eb948caa82d3-97295241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c562c0fae6abd938209f06d25126cc08c2145525' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1FcBV8',
      1 => 1407947916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149532179253eb948caa82d3-97295241',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_students::sc_get_submissions_voting','var'=>'data'),$_smarty_tpl);?>

    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	<!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-9">
            <div class="line-top"></div>
            <form class="issue-suche">
                <div class="form-group floatLeft">
		        <h1>Students Contest</h1>
		        </div>
				<div class="clearer"></div>
		    </form>
		    <ul class="nav nav-pills p-woche">
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
">Current Year</a></li>
				<li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30),$_smarty_tpl);?>
">Vote for the students contest</a></li>
			</ul>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <div class="row">
		<div class="col-sm-12">
			<h2 class="linieBottom">Vote for the students contest</h2>
		</div>
	</div>
    
    <div class="row">
	
	    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    		<div class="col-sm-4">
    			<div class="lw-item"> 
    				<h3 class="nowra"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3>
    				<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['TITLE'])."-".($_smarty_tpl->tpl_vars['v']->value['ID']),'r_id'=>$_smarty_tpl->tpl_vars['v']->value['ID'],'p_id'=>31),$_smarty_tpl);?>
"><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>698,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>
<img class="lazy img-responsive" with="698" height="416" src="<?php echo $_smarty_tpl->getVariable('prethumb')->value['src'];?>
" data-original="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"></a></p>
    			</div>
    		</div>
    		
    		<?php $_smarty_tpl->tpl_vars['k1'] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value+1, null, null);?>
    		<?php if ($_smarty_tpl->getVariable('k1')->value%3==0){?></div><div class="row"><?php }?>
    	<?php }} ?>
		
	</div>
	
	
	