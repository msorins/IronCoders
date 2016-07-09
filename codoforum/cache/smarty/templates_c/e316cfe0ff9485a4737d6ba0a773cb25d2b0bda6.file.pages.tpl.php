<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:38:24
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/pages/pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183341928857753cf044c4f5-44019819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e316cfe0ff9485a4737d6ba0a773cb25d2b0bda6' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/pages/pages.tpl',
      1 => 1467300273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183341928857753cf044c4f5-44019819',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pages' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753cf048a1a7_67044152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753cf048a1a7_67044152')) {function content_57753cf048a1a7_67044152($_smarty_tpl) {?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li><i class="fa fa-file-powerpoint-o"></i> Pages</li>
    </ol>

</section>
<div class="col-md-12">

    <div class="box box-info">
        <form  action="?page=ui/blocks" role="form" method="post" enctype="multipart/form-data">
            <input type="hidden" value="!AwCT43Vhl#$@kDbkF" name="test_post"/>
            <div class="box-header">
                <br>


            </div><!-- /.box-header -->
            <div class="box-body table-responsive">


                <div class='col-md-2' style='padding:0'> 
                    <a class='btn btn-primary btn-block' style='color:#fff' href="?page=pages/pages&action=addnewpage"><i class="fa fa-plus"></i> Add Page</a>
                </div>
                <br><br>
                <hr>
                <table id="blocktable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Page Title</th>
                            <th>Page URL</th>
                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['blk'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['blk']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['name'] = 'blk';
$_smarty_tpl->tpl_vars['smarty']->value['section']['blk']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pages']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                                <td><?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['title'];?>
</td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['url'];?>


                                </td>

                                <td>
                                    <span class="">      
                                        <a class='btn btn-success btn-flat btn-sm' target="_blank" href="../index.php?u=/page/<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['url'];?>
"><i style="color:#fff" class="fa fa-eye"></i> View</a>                                                            
                                        &nbsp;&nbsp; <a class='btn btn-info btn-flat btn-sm' href="index.php?page=pages/pages&action=editpage&id=<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['id'];?>
"><i style="color:#fff" class="fa fa-edit"></i> Edit</a>                                                            
                                        &nbsp;&nbsp; <a class='btn btn-danger btn-flat btn-sm' href="javascript:void(0)" onclick="delete_page(<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['blk']['index']]['id'];?>
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


    function delete_page(id) {


        var flag = confirm("Are you sure you want to delete this Page?");

        if (flag == true) {

            console.log("block " + id + " delete req sent");
            window.location = "index.php?page=pages/pages&id=" + id + "&action=delete&CSRF_token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
";

        } else {
            console.log("req cancelled");
        }



    }

</script>
<?php }} ?>
