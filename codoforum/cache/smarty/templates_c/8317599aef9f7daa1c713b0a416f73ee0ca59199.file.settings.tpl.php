<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:34:24
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/reputation/settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83763999857753c00c12e38-31945659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8317599aef9f7daa1c713b0a416f73ee0ca59199' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/reputation/settings.tpl',
      1 => 1467300274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83763999857753c00c12e38-31945659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753c00c76e60_06221102',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753c00c76e60_06221102')) {function content_57753c00c76e60_06221102($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-wrench"></i> Settings</li>
    </ol>

</section>
<div class="col-md-6">
    <div  class="box box-info">
        <form class="box-body" action="?page=reputation/settings" role="form" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Enable reputation system ?</label>
                <br/>
                <input 
                    class="simple form-control" name="enable_reputation" 
                    data-permission='yes'
                    <?php ob_start();?><?php echo smarty_modifier_get_opt("enable_reputation");?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=='yes') {?> checked="checked" <?php }?>
                    type="checkbox"  data-toggle="toggle"
                    data-on="yes" data-off="no" data-size="mini"
                    data-onstyle="success" data-offstyle="danger">
            </div>

            <div class="form-group">
                <label>Maximum times a user can give/take reputation in one day</label>
                <br/>
                <input type="text" class="form-control" name="max_rep_per_day" value="<?php echo smarty_modifier_get_opt("max_rep_per_day");?>
" />
            </div>

            <div class="form-group">
                <label>Maximum times reputation can be incremented/decremented of the same user</label>
                <br/>
                <input type="text" class="form-control" name="rep_times_same_user" value="<?php echo smarty_modifier_get_opt("rep_times_same_user");?>
" />
            </div>

            <div class="form-group">
                <label>Time in hours after which the reputation counts will be reset for above rule </label>
                <br/>
                <input type="text" class="form-control" name="rep_hours_same_user" value="<?php echo smarty_modifier_get_opt("rep_hours_same_user");?>
" />
            </div>

                    
            <div class="form-group">
                <label>Reputation required to increment reputation points of a post </label>
                <br/>
                <input type="text" class="form-control" name="rep_req_to_inc" value="<?php echo smarty_modifier_get_opt("rep_req_to_inc");?>
" />
            </div>

            <div class="form-group">
                <label>Number of posts required to increment reputation points of a post </label>
                <br/>
                <input type="text" class="form-control" name="posts_req_to_inc" value="<?php echo smarty_modifier_get_opt("posts_req_to_inc");?>
" />
            </div>

            <div class="form-group">
                <label>Reputation required to decrement reputation points of a post </label>
                <br/>
                <input type="text" class="form-control" name="rep_req_to_dec" value="<?php echo smarty_modifier_get_opt("rep_req_to_dec");?>
" />
            </div>

            <div class="form-group">
                <label>Number of posts required to decrement reputation points of a post </label>
                <br/>
                <input type="text" class="form-control" name="posts_req_to_dec" value="<?php echo smarty_modifier_get_opt("posts_req_to_dec");?>
" />
            </div>
                    
            <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
            <input type="submit" value="Save" class="btn btn-primary"/>

        </form>
    </div>
</div><?php }} ?>
