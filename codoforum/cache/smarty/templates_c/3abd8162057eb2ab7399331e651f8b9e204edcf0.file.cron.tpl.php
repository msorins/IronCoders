<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:34:48
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/system/cron.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14387044357753c184fde42-75200508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3abd8162057eb2ab7399331e651f8b9e204edcf0' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/system/cron.tpl',
      1 => 1467300274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14387044357753c184fde42-75200508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'self' => 0,
    'token' => 0,
    'crons' => 0,
    'cron' => 0,
    'home' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753c18544cf2_66454315',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753c18544cf2_66454315')) {function content_57753c18544cf2_66454315($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class=""><i class="fa fa-desktop"></i> System</li>            
        <li class="active"><i class="fa fa-clock-o"></i> Cron</li>
    </ol>

</section>

<style type="text/css">
    table .btn{
        padding: 1px 5px 1px;
        font-size: 10px;
        margin-right: -3px;
    }
</style>

<div class="row col-md-12">

    <p>Cron takes care of scheduling periodic tasks . </p>

    <div id="edit_cron" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Editing cron</h4>
                </div>
                <form action="<?php echo $_smarty_tpl->tpl_vars['self']->value;?>
?page=system/cron" method="POST">
                    <div class="modal-body">

                        <label>Cron Name</label>
                        <input type="text" name="name" id="cron_name" class="form-control" readonly="readonly"/>
                        <br/>
                        <label>Cron type</label>
                        <input type="text" name="type" id="cron_type" class="form-control" readonly="readonly"/>

                        <br/>
                        <label>Cron Interval</label>
                        <select class="form-control" name="e_interval">
                            <option value="3600">hourly</option>
                            <option value="86400">daily</option>
                            <option value="604800">weekly</option>
                            <option value="2592000">monthly</option>
                        </select><br/>
                        <p><b><u>Or</u></b> specify a custom value in seconds</p>
                        <input class="form-control" type="number" name="interval">
                        <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>    </div>

    <table class="table" style="background: #fff;box-shadow: 1px 1px 1px #ccc">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Interval</th>
            <th>Last started</th>
            <th>Last ended</th>
            <th>Status</th>
            <th></th>
        </tr>

        <tbody>

            <?php  $_smarty_tpl->tpl_vars['cron'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cron']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['crons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cron']->key => $_smarty_tpl->tpl_vars['cron']->value) {
$_smarty_tpl->tpl_vars['cron']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_name'];?>
</td>
                    <td id="type_<?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_type'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_interval'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_started'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_last_run'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_status'];?>
</td>
                    <td><div id="edit_<?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_name'];?>
" class="btn btn-default edit">edit</div> &nbsp;|&nbsp; 
                        <div id="run_<?php echo $_smarty_tpl->tpl_vars['cron']->value['cron_name'];?>
" class="btn btn-primary run"> run</div>
                    </td>

                <?php } ?>            
        </tbody>
    </table>
</div>
<script type="text/javascript">

    jQuery(document).ready(function ($) {

        $('.edit').click(function () {

            var name = $(this).attr('id').replace("edit_", "");
            $('#cron_name').val(name);
            $('#cron_type').val($('#type_' + name).html());

            $('#edit_cron').modal();
        });

        $('.run').click(function () {

            var name = $(this).attr('id').replace("run_", "");

            setTimeout(function () {
                window.location.reload(true)
            }, 1000);

            $.get('<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
Ajax/cron/run/' + name, {
                token: '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
'
            }, function (data) {

                if (data != '') {

                    alert(data);
                }
            });


        });
    });
</script><?php }} ?>
