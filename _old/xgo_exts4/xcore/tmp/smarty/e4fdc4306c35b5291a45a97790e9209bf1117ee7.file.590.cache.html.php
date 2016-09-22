<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:33:41
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/590.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:49185914253d14375134974-10643443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4fdc4306c35b5291a45a97790e9209bf1117ee7' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/590.cache.html',
      1 => 1406223221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49185914253d14375134974-10643443',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div id='<?php echo $_smarty_tpl->getVariable('div_id')->value;?>
'>

<div class="pagerdatacontent">
<?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('paged_atom')->value,'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

</div>

<div class="row">
   
    <div class="col-sm-12">

<!--- pagination start --->
		
		
            <div class="pagination-wrapper">
                <ul class="pagination pagination-box fe_pager">

                    <li><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('pager')->value;?>
' data-pager-pos='<?php echo $_smarty_tpl->getVariable('prev')->value;?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('div_id')->value;?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('cnt')->value;?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('params')->value;?>
'>&laquo;</a></li>
                    
                    
                    <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('buttons')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['b']->value==$_smarty_tpl->getVariable('pos')->value){?>active<?php }?>"><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('pager')->value;?>
' data-pager-pos='<?php echo $_smarty_tpl->tpl_vars['b']->value;?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('div_id')->value;?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('cnt')->value;?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('params')->value;?>
'><?php echo $_smarty_tpl->tpl_vars['b']->value+1;?>
</a></li>
                    <?php }} ?>
                    
                    <li><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('pager')->value;?>
' data-pager-pos='<?php echo $_smarty_tpl->getVariable('next')->value;?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('div_id')->value;?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('cnt')->value;?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('params')->value;?>
'>&raquo;</a></li>
                    
                    
                </ul>
                
                <div class="pagernumberswrapper">
                <div class="btn-group number-items-dropdown fe_pager_cnt">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->getVariable('cnt')->value;?>
 <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                        
                        <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('limits')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
?>
                        <li><a href="#" data-cnt='<?php echo $_smarty_tpl->tpl_vars['l']->value;?>
' data-pager='<?php echo $_smarty_tpl->getVariable('pager')->value;?>
' data-div='<?php echo $_smarty_tpl->getVariable('div_id')->value;?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('params')->value;?>
'><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</a></li>
                        <?php }} ?>
                        
                    </ul>
                </div>
                <div class="number-per-page">Items per page:</div>
                </div>
                
            </div>
            
<!--- pagination end --->
    </div>


</div>

</div>

