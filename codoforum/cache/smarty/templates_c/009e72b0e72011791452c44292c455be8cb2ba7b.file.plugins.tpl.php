<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:39:14
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/plugins.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128711293657753d22082cf3-02125860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '009e72b0e72011791452c44292c455be8cb2ba7b' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/plugins.tpl',
      1 => 1467300266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128711293657753d22082cf3-02125860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'plugins' => 0,
    'plugin' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753d220d3018_56962197',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753d220d3018_56962197')) {function content_57753d220d3018_56962197($_smarty_tpl) {?>


<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-gears"></i> Plugins</li>
    </ol>

</section>

<style>
    .plgenabled{

        background-color:#fff;

    }

    .plgdisabled{

        background-color:#fff;

    }

</style>

<div class="row">
    <div class="col-lg-12">

        <div class="table-responsive">
            <table class="table"  style="background: #fff;box-shadow: 1px 1px 1px #ccc">
                <thead>
                    <tr>
                        <th><a href="#">Plugin Name</a> </th>
                        <th><a href="#">Status</a> </th>
                        <th>Description</th>

                        <th>Version </th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['plugin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plugin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plugin']->key => $_smarty_tpl->tpl_vars['plugin']->value) {
$_smarty_tpl->tpl_vars['plugin']->_loop = true;
?>
                        <tr class=<?php echo $_smarty_tpl->tpl_vars['plugin']->value['rowstyle'];?>
>
                            <td>

                                <?php echo $_smarty_tpl->tpl_vars['plugin']->value['name'];?>
 <br><br>

                                <?php if ($_smarty_tpl->tpl_vars['plugin']->value['admin']==true) {?>

                                    <a href="index.php?page=ploader&plugin=<?php echo $_smarty_tpl->tpl_vars['plugin']->value['plg_name'];?>
">[Settings]</a>

                                <?php }?>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="plugin" value="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['plg_name'];?>
" />
                                    <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

                                    <?php if ($_smarty_tpl->tpl_vars['plugin']->value['plg_status']==1) {?>

                                        <input type="hidden" name="action" value="install" />
                                        <input type="submit" value="Install" class="btn btn-primary" />

                                    <?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['plg_status']==2) {?>

                                        <input type="hidden" name="action" value="enable" />
                                        <input type="submit" value="Enable" class="btn btn-default" />
                                    <?php } elseif ($_smarty_tpl->tpl_vars['plugin']->value['plg_status']==4) {?>

                                        <input type="hidden" name="action" value="upgrade" />
                                        <input type="submit" value="Upgrade" class="btn btn-success" />

                                    <?php } else { ?>  

                                        <input type="hidden" name="action" value="disable" />
                                        <input type="submit" value="Disable" class="btn" />

                                    <?php }?>


                                </form>  
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['plugin']->value['description'];?>

                                <br>
                                <br>
                                <strong>Author:</strong> <?php echo $_smarty_tpl->tpl_vars['plugin']->value['author'];?>
 <br>
                                <strong>Website:</strong> <a target="_blank" href='<?php echo $_smarty_tpl->tpl_vars['plugin']->value['author_url'];?>
'><?php echo $_smarty_tpl->tpl_vars['plugin']->value['author_url'];?>
</a>
                            </td>

                            <td><?php echo $_smarty_tpl->tpl_vars['plugin']->value['version'];?>
</td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div><?php }} ?>
