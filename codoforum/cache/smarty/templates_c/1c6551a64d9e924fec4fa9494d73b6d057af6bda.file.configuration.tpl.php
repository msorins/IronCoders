<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:34:34
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/mail/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38499678157753c0a811722-79386131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c6551a64d9e924fec4fa9494d73b6d057af6bda' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/mail/configuration.tpl',
      1 => 1467300273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38499678157753c0a811722-79386131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753c0a849937_89503893',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753c0a849937_89503893')) {function content_57753c0a849937_89503893($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class=""><i class="fa fa-envelope"></i> Mail Settings</li>
         <li class="active"><i class="fa fa-gear"></i> Configuration</li>
    </ol>
    
</section>
<div class="col-md-6">
<div  class="box box-info">
<form class="box-body" action="?page=mail/configuration" role="form" method="post" enctype="multipart/form-data">



Mail Type:


<select name='mail_type' class="form-control">
    <option value='smtp' <?php if (smarty_modifier_get_opt("mail_type")=='smtp') {?> selected <?php }?>>SMTP</option>
    <option value='mail'  <?php if (smarty_modifier_get_opt("mail_type")=='mail') {?> selected <?php }?>>mail()</option>
    
</select><br>

<hr>
<span style="font-size:smaller">The below settings are required only if you have selected SMTP above.</span>

<br><br>
SMTP Protocol:
<input type="text" class="form-control" name="smtp_protocol" value="<?php echo smarty_modifier_get_opt("smtp_protocol");?>
" />

<br/>

SMTP Server:
<input type="text" class="form-control" name="smtp_server" value="<?php echo smarty_modifier_get_opt("smtp_server");?>
" /><br/>

SMTP Port:
<input type="text" class="form-control" name="smtp_port" value="<?php echo smarty_modifier_get_opt("smtp_port");?>
" /><br/>

SMTP username:
<input type="text" class="form-control" name="smtp_username" value="<?php echo smarty_modifier_get_opt("smtp_username");?>
" /><br/>

SMTP Password:
<input type="text" class="form-control" name="smtp_password" value="<?php echo smarty_modifier_get_opt("smtp_password");?>
" /><br/>


<input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

<input type="submit" value="Save" class="btn btn-primary"/>
</form>
 
<?php }} ?>
