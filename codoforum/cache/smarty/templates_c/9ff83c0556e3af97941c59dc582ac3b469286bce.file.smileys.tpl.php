<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:34:20
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/ui/smileys.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54341391057753bfcad3f96-34570323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ff83c0556e3af97941c59dc582ac3b469286bce' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/ui/smileys.tpl',
      1 => 1467300274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54341391057753bfcad3f96-34570323',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'token' => 0,
    'smilies' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753bfcb225e3_32263114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753bfcb225e3_32263114')) {function content_57753bfcb225e3_32263114($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/ironcoders/public_html/codoforum/sys/Ext/Smarty/plugins/modifier.replace.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-laptop"></i> UI Elements</li>
        <li><i class="fa fa-smile-o"></i> Smileys</li>
    </ol>

</section>
<?php if ($_smarty_tpl->tpl_vars['msg']->value=='') {?>
<?php } else { ?>
    <div class='row'>
        <div class="col-md-6">
            <div class="alert alert-info alert-dismissable">
                <i class="fa fa-info"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

            </div>
        </div>
    </div>
<?php }?>
<div class="col-md-6">

    <div class="box box-info">

        <div class="box-body">

            <form  action="?page=ui/smileys&action=add" role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Smiley Code:</label>
                    <textarea name="smiley_code" required placeholder="" rows="4" class="form-control" ></textarea>
                    <div class="callout callout-info">
                        Specify Smiley by using their smiley code. <br>Enter one Smiley variant per line.<br>  
                        Example for "Happy Face":<br> <code>:)<br>:-)<br>:smile:</code>
                    </div>
                </div>


                <div class="form-group">
                    <label>Smiley Weight/Order:</label>
                    <input type="number" name="weight"  value="0" class="form-control" required />

                </div>                


                <div class="form-group">
                    <label>Smiley Image:</label>
                    <input type="file" name="smiley_image"  value="" class="form-control" required />

                </div>
                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                <input type="submit" value="Add Smiley" class="btn btn-success" />

            </form>
        </div>
    </div>
</div>

<div class="col-md-12">

    <div class="box box-info">
        <form  action="?page=ui/blocks" role="form" method="post" enctype="multipart/form-data">
            <input type="hidden" value="!AwCT43Vhl#$@kDbkF" name="test_post"/>
            <div class="box-header">
                <br>


            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="blocktable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Smiley</th>
                            <th>Code</th>
                            <th>Weight</th>

                            <th>Configure</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['smile'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['smile']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['name'] = 'smile';
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['smilies']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['smile']['total']);
?>
                            <tr>
                                <td><img src='<?php echo $_smarty_tpl->tpl_vars['smilies']->value[$_smarty_tpl->getVariable('smarty')->value['section']['smile']['index']]['image_name'];?>
' /></td>
                                <td><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['smilies']->value[$_smarty_tpl->getVariable('smarty')->value['section']['smile']['index']]['symbol'],"\n","<br>");?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['smilies']->value[$_smarty_tpl->getVariable('smarty')->value['section']['smile']['index']]['weight'];?>
</td>

                                <td>
                                    <span class="">                                                             
                                        <a class='btn btn-info btn-flat btn-sm' href="index.php?page=ui/smileys&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['smilies']->value[$_smarty_tpl->getVariable('smarty')->value['section']['smile']['index']]['id'];?>
"><i style="color:#fff" class="fa fa-edit"></i> Edit</a>                                                           
                                        &nbsp;&nbsp; <a class='btn btn-danger btn-flat btn-sm' href="javascript:void(0)" onclick="delete_smiley(<?php echo $_smarty_tpl->tpl_vars['smilies']->value[$_smarty_tpl->getVariable('smarty')->value['section']['smile']['index']]['id'];?>
)"><i style="color:#fff" class="fa fa-trash-o"></i> Delete</a>
                                    </span>
                                </td>
                            </tr>
                        <?php endfor; endif; ?>


                    </tbody>

                </table>
            </div><!-- /.box-body -->


        </form>
    </div>    


</div> 

<script>


    function delete_smiley(id) {


        var flag = confirm("Are you sure you want to delete this smiley?");

        if (flag == true) {

            console.log("block " + id + " delete req sent");
            window.location = "index.php?page=ui/smileys&id=" + id + "&action=delete&CSRF_token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
";

        } else {
            console.log("req cancelled");
        }



    }

</script>
<?php }} ?>
