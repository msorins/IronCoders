<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:34:45
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/system/importer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23696443957753c15785ab9-11294521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91c3b14908165b23e494602f66c9e066b3e1727e' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/system/importer.tpl',
      1 => 1467300274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23696443957753c15785ab9-11294521',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'files' => 0,
    'file' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753c15810be2_82494677',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753c15810be2_82494677')) {function content_57753c15810be2_82494677($_smarty_tpl) {?><style type="text/css">

    .error {

        background: #770000;
        color: white;
        border: 1px solid #600;
        padding: 6px;
        margin-top: 15px;
    }

    .success {

        background: #428bca;
        color: white;
        border: 1px solid #1471af;
        padding: 6px;        
        margin-top: 15px;

    }

    .warn {

        padding: 6px;
        background: rgb(170, 15, 1);
        color: white;
        margin-bottom: 10px;
    }

</style>
<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class=""><i class="fa fa-desktop"></i> System</li> 
         <li class="active"><i class="fa fa-exclamation-circle"></i> Importer</li>
    </ol>
    
</section>


<div class="row col-md-12">

    <div class="warn">Note: All your forum categories, topics, posts and users will be overwritten!</div>

    <form id="codo_importer" role="form" method="POST" class="form form-horizontal">

        <fieldset>
            <legend>Import details</legend>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="name">database name</label>
                <div class="col-sm-8">
                    <input value="" type="text" class="form-control" id="db_name" placeholder="Enter database name" required>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="name">database username</label>
                <div class="col-sm-8">
                    <input value="" type="text" class="form-control" id="db_user" placeholder="Enter username" required>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="name">database password</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="db_pass" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="name">database host</label>
                <div class="col-sm-8">
                    <input value="localhost" type="text" class="form-control" id="db_host" placeholder="Enter database host" required>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="name">table prefix</label>
                <div class="col-sm-8">
                    <input value="" type="text" class="form-control" id="tbl_prefix" value="" placeholder="Enter table prefix">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label" for="name">max rows per request</label>
                <div class="col-sm-8">
                    <input value="500" type="text" class="form-control" id="max_rows" placeholder="Enter table name" required>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label" for="name">importer</label>
                <div class="col-sm-8">
                    <select id="import_from" class="form-control" required>

                        <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value;?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <hr/>        

            <p>Enter the email address of the admin user that will be imported from the above database
            </p>
            <div class="form-group">
                <label  class="col-sm-2 control-label" for="name">E-mail address</label>
                <div class="col-sm-8">
                    <input  type="text" class="form-control" id="admin_mail" placeholder="Enter admin e-mail address" required>
                </div>
            </div>

            <p>Your current admin password of codoforum will not change. </p>
            <br/>

            <input type="submit" class="btn btn-success" value="Import" />

        </fieldset>
    </form>

    <div style="display: none" class="error" id="codo_import_status"></div>

</div>

<script type="text/javascript">

    jQuery('document').ready(function($) {

        $('#codo_importer').submit(function() {

            $('#codo_import_status').html('Importing .... please wait!').removeClass('error').addClass('success').show();
            $("html, body").animate({
                scrollTop: $(document).height()
            }, 1000);
            
            
            $.get('index.php?page=system/importer&import=yes', {
                db_host: $('#db_host').val(),
                db_name: $('#db_name').val(),
                db_user: $('#db_user').val(),
                db_pass: $('#db_pass').val(),
                admin_mail: $('#admin_mail').val(),
                max_rows: $('#max_rows').val(),
                tbl_prefix: $('#tbl_prefix').val(),
                import_from: $('#import_from').val(),
                CSRF_token: "<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
"
            }, function(response) {

                $('#codo_import_status').html(response).show();

                if (response === 'Unable to connect to database' || response === 'admin e-mail address given does not exists!') {

                    $('#codo_import_status').addClass('error').removeClass('success');
                }
            });
            return false;
        }
        );
    });

</script><?php }} ?>
