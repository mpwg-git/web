<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 14:10:49
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevs28Jx" */ ?>
<?php /*%%SmartyHeaderCode:179577850655b77149958134-23336893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3c58f9894a53d2329fcd5948e6cf29ab47434de' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevs28Jx',
      1 => 1438085449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179577850655b77149958134-23336893',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="col-xs-12 default-container-paddingtop meinprofil-wgtest">
    
    <span class="looklikeh1">
        WG-Test
    </span>
    
    
    <p class="frage-header">
        Frage 1/15
    </p>
    
    <p class="frage-frage">
        Lorem ipsum dolor sit, sed etiam in nonulla res nostra cupid dol-<br/>oribus?
    </p>
    
    <ol class="frage-antworten">
        <li>
            Ja, muss sein. Jeder muss gleich viel beitragen
        </li>
        <li>
            Unnötig. Jeder vernünftige Mensch macht seinen Dreck selber weg.
        </li>
        <li>
            Wir sprechen darüber und werden uns schon einig.
        </li>
    </ol>
    
    <div class="row frage-ich-container">
        <div class="col-xs-12">
            <div class="frage-ich frage-ichbin">
                <span class="ich-beschreibung">
                    Ich bin 
                </span>
                <ul class="option-container">
                    <li class="option">a</li>
                    <li class="option">b</li>
                    <li class="option">c</li>    
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        
        <div class="col-xs-12">
            <div class="frage-ich frage-ichwuensche">
                <span class="ich-beschreibung">
                    Ich wünsche 
                </span>
                <ul class="option-container">
                    <li class="option">a</li>
                    <li class="option">b</li>
                    <li class="option">c</li>    
                </ul>
                <div class="clearfix"></div>
            </div>        
        </div>
    </div>
    
    
    
    <p>
        Wie wichtig ist dir dieses Thema?
    </p>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>703,'return'=>1),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
    
    <div class="frage-button-container clearfix">
        
        <a href="" class="frage-button-prev-question">
            <span class="icon-pfeil pull-left"></span>
            <span class="pull-left beschreibung">Zurück</span>
        </a>
        <a href="" class="frage-button-next-question">
            <span class="icon-pfeil pull-right"></span>
            <span class="pull-right beschreibung">Weiter</span>
        </a>    
    </div>
    
    
    
</div>