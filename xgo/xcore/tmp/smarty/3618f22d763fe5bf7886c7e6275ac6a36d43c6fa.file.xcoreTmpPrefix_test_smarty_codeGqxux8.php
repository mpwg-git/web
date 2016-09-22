<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 10:49:52
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGqxux8" */ ?>
<?php /*%%SmartyHeaderCode:26857920054f9784071ba22-37862102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3618f22d763fe5bf7886c7e6275ac6a36d43c6fa' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGqxux8',
      1 => 1425635392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26857920054f9784071ba22-37862102',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<div class="row">
    <div class="col-sm-4">
        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['FILTER']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <div class="panel-group">
        		<div class="panel panel-default">
        			
        			<div class="panel-heading">
        				<h4 class="panel-title"><a data-toggle="collapse" data-parent="#shopFilter_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" href=""><?php echo $_smarty_tpl->tpl_vars['v']->value['NAME'];?>
 <span class="icon icon-pfeil-down pull-right"></span></a></h4>
        			</div>
        			
        			<div id="#shopFilter_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="panel-collapse collapse in">
        				<div class="panel-body">
        					<ul>
        					
        					    <?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
 $_smarty_tpl->tpl_vars['k2']->value = $_smarty_tpl->tpl_vars['v2']->key;
?>
								    <li><a href="<?php echo $_smarty_tpl->tpl_vars['v2']->value['URL'];?>
"><span class="icon icon-pfeil"></span><?php echo $_smarty_tpl->tpl_vars['v2']->value['NAME'];?>
</a> <small><?php echo $_smarty_tpl->tpl_vars['v2']->value['COUNT'];?>
</small></li>
								<?php }} ?>
								
        					</ul>
        				</div>
        			</div>
        			
        		</div>
        	</div>
        <?php }} ?>
        
    </div>
    
    <div class="col-sm-8">
        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <div class="row">
                
                <div class="col-sm-4">
                    <?php echo $_smarty_tpl->tpl_vars['v']->value['BILD'];?>

                </div>
                
                <div class="col-sm-8">
                    <?php echo $_smarty_tpl->tpl_vars['v']->value['DETAILS'];?>

                </div>

            </div>
        <?php }} ?>
        
    </div>
    
</div>