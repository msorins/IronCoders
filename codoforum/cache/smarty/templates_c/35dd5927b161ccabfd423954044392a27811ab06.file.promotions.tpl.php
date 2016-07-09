<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:34:30
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/reputation/promotions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189634774357753c06b63c39-00672437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35dd5927b161ccabfd423954044392a27811ab06' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/reputation/promotions.tpl',
      1 => 1467300274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189634774357753c06b63c39-00672437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'groups' => 0,
    'group' => 0,
    'token' => 0,
    'rules' => 0,
    'rule' => 0,
    'home' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753c06c97663_86234520',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753c06c97663_86234520')) {function content_57753c06c97663_86234520($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-level-up"></i> Promotions</li>
    </ol>

</section>

<style type='text/css'>

    .well {

        background: #fff;
    }

    table .btn{
        padding: 1px 5px 1px;
        font-size: 12px;
        margin-right: -3px;
    }

</style>

<div class='well well-sm'>
    <p>The user will be promoted or demoted according to the rules mentioned here.
        <br/>

        If a new rule is added, it will only take affect when a user's reputation or post count changes
    </p>

</div>
<div class="col-md-6">
    <div  class="box box-info">


        <form class="box-body" action="?page=reputation/promotions&action=add" role="form" method="post" enctype="multipart/form-data">

            <label>If a user has</label>
            <br/>
            <div class="input-group">
                <input name="reputation" placeholder='Enter required reputation points here' type="number" class="form-control" required>
                <span class="input-group-addon" id="basic-addon2">reputation</span>
            </div>
            <br/>
            <select name="type" class='form-control' >
                <option value="0">AND</option>
                <option value="1">OR</option>                
            </select>
            <br/>
            <div class="input-group">
                <input name="posts" placeholder='Enter required no. of posts here' type="text" class="form-control" required>
                <span class="input-group-addon" id="basic-addon2">posts</span>
            </div>
            <br/>
            <label>promote/demote to</label>
            <br/>
            <select name="role" class='form-control'>
                <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
                    <option value='<?php echo $_smarty_tpl->tpl_vars['group']->value['rid'];?>
'><?php echo $_smarty_tpl->tpl_vars['group']->value['rname'];?>
</option>
                <?php } ?>
            </select>
            <br/>

            <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
            <input type="submit" value="Add rule" class="btn btn-primary"/>

        </form>
    </div>
</div>
<div class="col-md-12">
    <div  class="box box-info">

        <table class="table">

            <tr>
                <th>

                </th>
                <th>
                    reputation
                </th>

                <th>
                    type
                </th>

                <th>
                    posts
                </th>

                <th>
                    promote/demote to group
                </th>
                <th>
                    action
                </th>
            </tr>         

            <?php  $_smarty_tpl->tpl_vars['rule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rule']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rule']->key => $_smarty_tpl->tpl_vars['rule']->value) {
$_smarty_tpl->tpl_vars['rule']->_loop = true;
?>
                <tr>

                    <td>
                        If user has
                    </td>

                    <td id="reputation_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['rule']->value['reputation'];?>

                    </td>

                    <td>

                        <span id="type_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" style="display:none"><?php echo $_smarty_tpl->tpl_vars['rule']->value['type'];?>
</span>
                        <?php if ($_smarty_tpl->tpl_vars['rule']->value['type']==0) {?>
                            AND
                        <?php } else { ?>
                            OR
                        <?php }?> 
                    </td>

                    <td id="posts_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['rule']->value['posts'];?>

                    </td>

                    <td>
                        <span id="group_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" style="display:none"><?php echo $_smarty_tpl->tpl_vars['rule']->value['rid'];?>
</span>                            
                        <?php echo $_smarty_tpl->tpl_vars['rule']->value['rname'];?>

                    </td>

                    <td>
                        <div style="display: inline-block" id="edit_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" class="btn btn-success edit">edit</div> &nbsp;&nbsp; 
                        <div style="display: inline-block">
                            <form action="?page=reputation/promotions&action=delete" method="POST">
                                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" name="ruleid" />
                                <button type="submit" id="delete_<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
" class="btn btn-danger delete"> delete</button>
                            </form>
                        </div>
                    </td>
                </tr>

            <?php } ?>

        </table>
    </div>

    <div id="edit_rule" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editing rule</h4>
                </div>
                <form action="?page=reputation/promotions&action=edit" method="POST">
                    <div class="modal-body">

                        <label>If a user has</label>
                        <br/>
                        <div class="input-group">
                            <input id="modal_rep" name="reputation" placeholder='Enter required reputation points here' type="number" class="form-control" required>
                            <span class="input-group-addon" id="basic-addon2">reputation</span>
                        </div>
                        <br/>
                        <select id="modal_type" name="type" class='form-control' >
                            <option value="0">AND</option>
                            <option value="1">OR</option>                
                        </select>
                        <br/>
                        <div class="input-group">
                            <input id="modal_posts" name="posts" placeholder='Enter required no. of posts here' type="text" class="form-control" required>
                            <span class="input-group-addon" id="basic-addon2">posts</span>
                        </div>
                        <br/>
                        <label>promote/demote to</label>
                        <br/>
                        <select id="modal_group" name="role" class='form-control'>
                            <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
                                <option value='<?php echo $_smarty_tpl->tpl_vars['group']->value['rid'];?>
'><?php echo $_smarty_tpl->tpl_vars['group']->value['rname'];?>
</option>
                            <?php } ?>
                        </select>
                        <br/>

                        <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                        <input type="hidden" id="modal_ruleid" name="ruleid" value="" />
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>
        </div>    </div>

</div>

<script type="text/javascript">


    jQuery(document).ready(function ($) {

        $('.edit').click(function () {


            var id = $(this).attr('id').replace("edit_", "");

            var rep = parseInt($('#reputation_' + id).html());
            var type = $('#type_' + id).html();
            var posts = parseInt($('#posts_' + id).html());
            var rid = $('#group_' + id).html();

            $('#modal_rep').val(rep);
            $('#modal_type option[value=' + type + ']').prop('selected', true);
            $('#modal_posts').val(posts);
            $('#modal_group option[value=' + rid + ']').prop('selected', true);
            $('#modal_ruleid').val(id);

            $('#edit_rule').modal();

        });


        $('.delete').click(function () {


            $.get('<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
Ajax/cron/run/' + name, {
                token: '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
'
            }, function (data) {

                if (data != '') {

                    alert(data);
                }
            });

        })



    });
</script><?php }} ?>
