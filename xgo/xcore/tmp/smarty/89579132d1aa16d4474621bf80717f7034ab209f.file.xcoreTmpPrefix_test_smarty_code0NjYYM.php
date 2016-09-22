<?php /* Smarty version Smarty-3.0.7, created on 2015-08-19 11:56:19
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0NjYYM" */ ?>
<?php /*%%SmartyHeaderCode:28842651555d452c3139fa6-52011715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89579132d1aa16d4474621bf80717f7034ab209f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0NjYYM',
      1 => 1439978179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28842651555d452c3139fa6-52011715',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="meinprofil-erklaerung">
    
    <span class="icon-duck"></span>
    <p class="line-1">dr duck says:</p>
    <span class="line-2 looklikeh1">hello</span>
    <p class="line-1"><?php echo $_SESSION['xredaktor_feUser_wsf']['wz_VORNAME'];?>
</p>
    
    <ol>
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==7||$_smarty_tpl->getVariable('P_ID')->value==8){?>class="active"<?php }?>>
            Fülle dein Profil aus.<br />
            Lorem ipsum dolor sit sed,
            etiam in nonullum.
        </li>
        <li <?php if ($_smarty_tpl->getVariable('P_ID')->value==10){?>class="active"<?php }?>>
            Beantworte die Fragen,
            lorem ipsum dolor sit sed.<br />
            Etiam in nonullum.
        </li>
        <li>
            Wähle deine gewünschte
            Mitgliedschaft. Lorem in 
            sed etiam nonulli quibus es.
        </li>
    </ol>
    
    <p class="gleich-waehlen">
        <span class="icon-pfeil"></span>Gleich ein Package wählen?
    </p>
    
    <p class="line-3">
        Und schon kannst du lorem ipsum dolor sit. Sed etiam in nonulli.
    </p>
    
</div>