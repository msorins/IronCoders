<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:34:17
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/ui/blocks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140247329657753bf9844be1-58581708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00a059faaf9306879a5252928f2e25e1c96fc105' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/ui/blocks.tpl',
      1 => 1467300274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140247329657753bf9844be1-58581708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'theme' => 0,
    'blocks' => 0,
    'av_blocks' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753bf9ac8a66_45773433',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753bf9ac8a66_45773433')) {function content_57753bf9ac8a66_45773433($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/ironcoders/public_html/codoforum/sys/Ext/Smarty/plugins/function.html_options.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-laptop"></i> UI Elements</li>
        <li><i class="fa fa-cubes"></i> Blocks</li>
    </ol>

</section>
<div class="col-md-12">

    <div class="box box-info">
        <form  action="?page=ui/blocks" role="form" method="post" enctype="multipart/form-data">
            <input type="hidden" value="!AwCT43Vhl#$@kDbkF" name="test_post"/>
            <div class="box-header">
                <br>
                <h3 class="box-title">Blocks for theme: <em><?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
</em></h3>

            </div><!-- /.box-header -->
            <div class="box-body table-responsive">


                <div class='col-md-2' style='padding:0'> 
                    <a class='btn btn-primary btn-block' style='color:#fff' href="?page=ui/blocks&action=addnewblock"><i class="fa fa-plus"></i> Add Block</a>
                </div>
                <br><br>
                <hr>
                <table id="blocktable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Block Name</th>
                            <th>Region</th>
                            <th>Weight</th>
                            <th>Type</th>
                            <th>Configure</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['blk'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['blk']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['name'] = 'blk';
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['blocks']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['total']);
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['title'];?>
</td>
                                <td>
                                    <select name="bid_<?php echo $_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['id'];?>
" size="1" class='form-control'>
                                        <option value="<none>">&lt;none&gt;</option>
                                        <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['av_blocks']->value,'output'=>$_smarty_tpl->tpl_vars['av_blocks']->value,'selected'=>$_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['region']),$_smarty_tpl);?>

                                    </select>

                                </td>
                                <td>
                                    <input type="number" name="bweight_<?php echo $_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['weight'];?>
" class="form-control" />
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['module'];?>
</td>
                                <td>
                                    <span class="">                                                             
                                        <a class='btn btn-info btn-flat btn-sm' href="index.php?page=ui/blocks&action=editblock&id=<?php echo $_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['id'];?>
"><i style="color:#fff" class="fa fa-edit"></i> Edit</a>                                                            
                                        &nbsp;&nbsp; <a class='btn btn-danger btn-flat btn-sm' href="javascript:void(0)" onclick="delete_block(<?php echo $_smarty_tpl->tpl_vars['blocks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['id'];?>
)"><i style="color:#fff" class="fa fa-trash-o"></i> Delete</a>
                                    </span>
                                </td>
                            </tr>
                        <?php endfor; endif; ?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Block Name</th>
                            <th>Region</th>
                            <th>Weight</th>
                            <th>Type</th>
                            <th>Configure</th>

                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
                <input type="submit" value="Save" class="btn btn-primary"/>
            </div>
        </form>
    </div>    


</div> 

<script>


    function delete_block(id) {


        var flag = confirm("Are you sure you want to delete this block?");

        if (flag == true) {

            console.log("block " + id + " delete req sent");
            window.location = "index.php?page=ui/blocks&id="+id+"&action=delete&CSRF_token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
";

        } else {
            console.log("req cancelled");
        }



    }

</script>
<?php }} ?>
