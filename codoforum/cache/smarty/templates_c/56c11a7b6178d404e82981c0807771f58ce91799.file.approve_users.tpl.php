<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:38:22
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/moderation/approve_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192758860857753ceedb7509-44565294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56c11a7b6178d404e82981c0807771f58ce91799' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/moderation/approve_users.tpl',
      1 => 1467300273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192758860857753ceedb7509-44565294',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'users' => 0,
    'user' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753ceedf6303_50665870',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753ceedf6303_50665870')) {function content_57753ceedf6303_50665870($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class=""><i class="fa"></i> Moderation</li>            
        <li class="active"><i class="fa fa-check"></i> Approve users</li>    </ol>
</section>


<div class="row" id="add_cat">
    <div class="col-lg-8"> 
        <div class="box box-info ">

            <form class="box-body" action="index.php?page=moderation/approve_users" role="form" id="add_user_form" method="post">


                <label>
                    Pending registrations that require your approval
                </label>

                <?php ob_start();?><?php if (empty($_smarty_tpl->tpl_vars['users']->value)) {?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>


                <br/><br/>
                <p>
                    No users awaiting approval.
                </p>
                <?php ob_start();?><?php } else { ?><?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>

                <br/><br/>
                <table class='table table-bordered'>

                    <tr>
                        <th></th>
                        <th>username</th>
                        <th>registration time </th>
                        <th>email id</th>
                        <th>email confirmed ?</th>                        
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                        <tr>
                            <td><input name='ids[]' value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" type='checkbox'/></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['created'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['mail'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['confirmed'];?>
</td>
                        </tr>
                    <?php } ?>
                </table>

                <br/>
                <i id='select_to_act'>Select user(s) to approve/reject</i>

                <div id='when_checked'>

                    With <b id='num_checked'></b> selected
                    <select name="action" class='form-control col-ld-3'>
                        <option value="approve">Approve</option>
                        <option value="delete">Delete</option>
                    </select><br/>
                    <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

                    <input class="btn btn-success" type='submit' />
                </div>

                <?php ob_start();?><?php }?><?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>

            </form>
        </div>

    </div>
</div>

<script type='text/javascript'>

    jQuery('document').ready(function ($) {

        $('#when_checked').hide();
        $('#select_to_act').show();

        $('#check_all').on('ifChecked', function () {
            $('#add_cat input').iCheck('check');
        }).on('ifUnchecked', function () {
            $('#add_cat input').iCheck('uncheck');
        });

        $('#add_cat input').on('ifToggled', function () {

            var checked = $('#add_cat input[type=checkbox]:checked').length; //recompute and waste resources :P

            if ($('#check_all').is(':checked'))
                checked--;

            if (checked) {

                $('#num_checked').html(checked + "");
                $('#when_checked').show();
                $('#select_to_act').hide();
            } else {

                $('#when_checked').hide();
                $('#select_to_act').show();
            }
        });
    });
</script><?php }} ?>
