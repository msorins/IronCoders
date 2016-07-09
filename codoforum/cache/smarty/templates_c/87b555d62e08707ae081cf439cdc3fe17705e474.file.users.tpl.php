<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:31:29
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24100115157753b515dca21-84192629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87b555d62e08707ae081cf439cdc3fe17705e474' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/users.tpl',
      1 => 1467300266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24100115157753b515dca21-84192629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'token' => 0,
    'entered_username' => 0,
    'role_options' => 0,
    'role_selected' => 0,
    'status_options' => 0,
    'status_selected' => 0,
    'sort_url' => 0,
    'users' => 0,
    'user' => 0,
    'pagination_links' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753b51650765_28930630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753b51650765_28930630')) {function content_57753b51650765_28930630($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/ironcoders/public_html/codoforum/sys/Ext/Smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_get_pretty_time')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_pretty_time.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users"></i> Users</li>
    </ol>

</section>

<style>

    .pagination_links {
        text-align: center;
        margin: 20px
    }
    .pagination_links a {
        background: #777;
        display: inline-block;
        margin-right: 3px;
        padding: 4px 12px;
        text-decoration: none;
        line-height: 1.5em;
        color: #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    .pagination_links a:hover {
        background-color: #BEBEBE;
        color: #fff;
    }
    .pagination_links a:active {
        background: rgba(190, 190, 190, 0.75);
    }
    .pagination_links .codo_topics_curr_page {
        color: #fff;
        background-color: #BEBEBE;
    }    
</style>



<?php if ($_smarty_tpl->tpl_vars['msg']->value=='') {?>
<?php } else { ?>
    <div class="alert alert-info alert-dismissable">
        <i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

    </div>
<?php }?>
<div class="row" id="add_cat">
    <div class="col-lg-4"> 
        <div class="box box-info ">

            <form class="box-body" action="index.php?page=users" role="form" id="add_user_form" method="post">

                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

                <input type="text" name="a_username"  value="" class="form-control" placeholder="Enter Username"  required="required"/>
                <br/>
                <input type="email" name="a_email"  value="" class="form-control" placeholder="Enter Email"  required="required" />
                <br/>
                <input type="password" name="a_password" id="a_password" value="" class="form-control" placeholder="Enter Password" required="required" />
                <br/>
                <input type="password" name="a_repassword" onblur="" id="a_repassword"  value="" class="form-control" placeholder="Re-Enter Password" required="required" />
                <br/>
                <input type="button"  onclick="add_user()" value="Add user" class="btn btn-success" />

            </form>

            <script>
                var is_form_valid = false;
                $('#add_user_form').submit(function () {

                    //return false;
                });

                function checkpass() {
                    var p1 = $('#a_password').val();
                    var p2 = $('#a_repassword').val();

                    if (p1 === p2 && p1 !== "") {

                        is_form_valid = true;

                    } else {

                        alert("Error: Passwords do not match!");
                    }

                }

                function add_user() {
                    checkpass();

                    if (is_form_valid)
                        $('#add_user_form').submit();

                }

            </script>

        </div>

    </div>

    <div class="col-lg-4">
        <div class="box box-primary">

            <form class="box-body" action="index.php" role="form" method="get">


                <input type="hidden" name="page" value="users" />
                <input type="text" name="username"  value="<?php echo $_smarty_tpl->tpl_vars['entered_username']->value;?>
" class="form-control" placeholder="Enter Username"  />
                <br/>
                <select class="form-control"  name="role">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['role_options']->value,'selected'=>$_smarty_tpl->tpl_vars['role_selected']->value),$_smarty_tpl);?>

                </select><br/>
                <select  class="form-control" name="status">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['status_options']->value,'selected'=>$_smarty_tpl->tpl_vars['status_selected']->value),$_smarty_tpl);?>

                </select><br/>
                <input type="submit" value="Search" class="btn btn-success" />

            </form>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">


        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><a href="<?php echo $_smarty_tpl->tpl_vars['sort_url']->value;?>
&sort_by=username">Username</a> </th>
                                <th><a href="<?php echo $_smarty_tpl->tpl_vars['sort_url']->value;?>
&sort_by=status">Status</a> </th>
                                <th>Role </th>
                                <th><a href="<?php echo $_smarty_tpl->tpl_vars['sort_url']->value;?>
&sort_by=no_posts">Posts</a> </th>
                                <th><a href="<?php echo $_smarty_tpl->tpl_vars['sort_url']->value;?>
&sort_by=created">Created</a> </th>
                                <th colspan="2">Options </th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                                    <td><?php if ($_smarty_tpl->tpl_vars['user']->value['user_status']==1) {?>
                                        Active
                                        <?php } else { ?>
                                            Blocked
                                            <?php }?>
                                            </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['role'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['no_posts'];?>
</td>
                                            <td><?php echo smarty_modifier_get_pretty_time($_smarty_tpl->tpl_vars['user']->value['created']);?>
</td>
                                            <td><a href="index.php?page=users&action=edit&user_id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Edit</a></td>
                                            <td><a href="javascript:delete_user(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)">Delete</a></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="pagination_links">
                            <?php echo $_smarty_tpl->tpl_vars['pagination_links']->value;?>

                        </div>
                    </div>

                </div>

                <div id="delete_user" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Delete User</h4>
                            </div>
                            <form action="index.php?page=users" method="POST">
                                <div class="modal-body">

                                    <label>When deleting the account:</label>
                                    <br><br>
                                    <input type="radio" name="delete_type" class="form-control" value="ban_and_keep"/> Ban the account and keep its content.
                                    <br><br>
                                    <input type="radio" name="delete_type" class="form-control" value="ban_and_delete"/> Ban the account and delete its content.
                                    <br><br>
                                    <input type="radio" name="delete_type" class="form-control" value="delete_and_anonymous"/> Delete the account and make its content belong to the <i>Anonymous</i> user.
                                    <br><br>
                                    <input type="radio" name="delete_type" class="form-control" value="delete_and_delete" checked /> Delete the account and delete its content.
                                    <br/>    

   

                                    <input type="hidden"  id="delete_id" name="delete_id" value=""/>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Cancel Account</button>
                                </div>
                                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                            </form>
                        </div>
                    </div>  
                </div>                     

                <script>

                    function delete_user(id) {

                        $('#delete_id').val(id);
                        $('#delete_user').modal();

                    }
                </script><?php }} ?>
