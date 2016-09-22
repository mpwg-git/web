<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 11:06:00
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeej4l50" */ ?>
<?php /*%%SmartyHeaderCode:202169387856937e884cb5d9-51226741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d34f521700cf040443bf1a9cdd48ab872c472a0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeej4l50',
      1 => 1452506760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202169387856937e884cb5d9-51226741',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<head>
    <style type="text/css">

    </style>
    
    <script type="text/javascript" src="testupload.js"></script>
    
</head>    
<body>
    
<div id="yourId"></div>
<form action="xsite/call/fe_testupload/test" method="post">
  
    Image: <input type="file" name="image" id="image">
    <button type="submit">Submit</button>
</form>


