<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:30:51
         compiled from "/home/ironcoders/public_html/codoforum/admin/layout/templates/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59612524057753b2b4367f1-92144673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77f17acd38b7916fec6166fdcb0ef3e495e6b505' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/admin/layout/templates/layout.tpl',
      1 => 1467300266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59612524057753b2b4367f1-92144673',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'A_RURI' => 0,
    'A_username' => 0,
    'logged_in' => 0,
    'A_avatar' => 0,
    'A_created' => 0,
    'active' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753b2b524840_14935219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753b2b524840_14935219')) {function content_57753b2b524840_14935219($_smarty_tpl) {?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CODOFORUM | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <!-- Theme style -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/favicon.ico?v=1">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/apple-touch-icon-152x152.png">
        <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/favicon-196x196.png" sizes="196x196">
        <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
img/favicon-32x32.png" sizes="32x32">

        <!-- jQuery 2.0.2 -->
        <script src="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
js/jquery-2.1.1.min.js"></script>    

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                CF - ACP
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">


                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php if (isset($_smarty_tpl->tpl_vars['A_username']->value)) {?>

                                    <?php echo $_smarty_tpl->tpl_vars['A_username']->value;?>

                                    <?php } else { ?>
                                        Hello
                                        <?php }?> <i class="caret"></i></span>
                                    </a>
                                    <?php if (isset($_smarty_tpl->tpl_vars['logged_in']->value)&&$_smarty_tpl->tpl_vars['logged_in']->value=="yes") {?>
                                        <ul class="dropdown-menu">
                                            <!-- User image -->
                                            <li class="user-header bg-light-blue">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['A_avatar']->value;?>
" class="img-circle" alt="User Image" />
                                                <p>
                                                    <?php echo $_smarty_tpl->tpl_vars['A_username']->value;?>
 - Administrator
                                                    <small>Member since <?php echo $_smarty_tpl->tpl_vars['A_created']->value;?>
</small>
                                                </p>
                                            </li>

                                            <!-- Menu Footer-->
                                            <li class="user-footer">
                                                <div class="pull-left">
                                                    <a href="../?u=user/profile" target="_blank" class="btn btn-default btn-flat">Profile</a>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="index.php?page=login&logout=true" class="btn btn-default btn-flat">Sign out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php }?>        
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <?php if (isset($_smarty_tpl->tpl_vars['logged_in']->value)&&$_smarty_tpl->tpl_vars['logged_in']->value=="yes") {?>
                        <!-- Left side column. contains the logo and sidebar -->
                        <aside class="left-side sidebar-offcanvas">
                            <!-- sidebar: style can be found in sidebar.less -->
                            <section class="sidebar">

                                <!-- sidebar menu: : style can be found in sidebar.less -->
                                <ul class="sidebar-menu">
                                    <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['index'];?>
">
                                        <a href="index.php">
                                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['users'];?>
">
                                        <a href="index.php?page=users">
                                            <i class="fa fa-users"></i> <span>Users</span> 
                                        </a>
                                    </li>
                                    <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['permission/roles'];?>
">
                                        <a href="index.php?page=permission/roles"><i class="fa fa-key"></i> Role permissions</a>
                                    </li>

                                    <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['categories'];?>
">
                                        <a href="index.php?page=categories">
                                            <i class="fa fa-table"></i>
                                            <span>Categories</span>
                                        </a>
                                    </li>

                                    <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['config'];?>
">
                                        <a href="index.php?page=config">
                                            <i class="fa fa-wrench"></i>
                                            <span>Global Settings</span>
                                        </a>
                                    </li>
                                    <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['plugins/plugins'];?>
">
                                        <a href="index.php?page=plugins/plugins">
                                            <i class="fa fa-cogs"></i>
                                            <span>Plugins</span>
                                        </a>
                                    </li>


                                    <li class="treeview <?php echo $_smarty_tpl->tpl_vars['active']->value['moderation/ban_user'];?>
 <?php echo $_smarty_tpl->tpl_vars['active']->value['moderation/approve_users'];?>
">
                                        <a href="#">
                                            <i class="fa fa-shield"></i> <span>Moderation</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['moderation/approve_users'];?>
"> <a href="index.php?page=moderation/approve_users"><i class="fa fa-check"></i><span> Approve Users</span> </a> </li>                                              
                                            <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['moderation/ban_user'];?>
"> <a href="index.php?page=moderation/ban_user"><i class="fa fa-ban"></i><span> Ban User</span> </a> </li>  
                                        </ul>
                                    </li> 


                                    <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['pages/pages'];?>
">
                                        <a href="index.php?page=pages/pages">
                                            <i class="fa fa-file-powerpoint-o"></i>
                                            <span> Pages</span>
                                        </a>
                                    </li> 
                                    <li class="treeview <?php echo $_smarty_tpl->tpl_vars['active']->value['ui/themes'];?>
<?php echo $_smarty_tpl->tpl_vars['active']->value['ui/blocks'];?>
<?php echo $_smarty_tpl->tpl_vars['active']->value['ui/smileys'];?>
">
                                        <a href="#">
                                            <i class="fa fa-laptop"></i>
                                            <span>UI Elements</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['ui/themes'];?>
"><a href="index.php?page=ui/themes"><i class="fa fa-image"></i> Themes</a></li>
                                            <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['ui/blocks'];?>
"><a href="index.php?page=ui/blocks"><i class="fa fa-cubes"></i> Blocks</a></li>
                                            <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['ui/smileys'];?>
"><a href="index.php?page=ui/smileys"><i class="fa fa-smile-o"></i> Smileys</a></li>


                                        </ul>
                                    </li>
                                    <li class="treeview <?php echo $_smarty_tpl->tpl_vars['active']->value['reputation/settings'];?>
">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-tower"></i>
                                            <span>Reputation</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['reputation/settings'];?>
"><a href="index.php?page=reputation/settings"><i class="fa fa-wrench"></i> Settings</a></li>
                                            <li class="<?php echo $_smarty_tpl->tpl_vars['active']->value['reputation/promotions'];?>
"><a href="index.php?page=reputation/promotions"><i class="fa fa-level-up"></i> Promotions</a></li>
                                        </ul>
                                    </li>

                                    <li  class="treeview <?php echo $_smarty_tpl->tpl_vars['active']->value['mail/configuration'];?>
 <?php echo $_smarty_tpl->tpl_vars['active']->value['mail/templates'];?>
">
                                        <a href="#">
                                            <i class="fa fa-envelope"></i> <span>Mail Settings</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li  class="<?php echo $_smarty_tpl->tpl_vars['active']->value['mail/configuration'];?>
"><a href="index.php?page=mail/configuration"><i class="fa fa-gear"></i> Configuration</a></li>                  
                                            <li  class="<?php echo $_smarty_tpl->tpl_vars['active']->value['mail/templates'];?>
"><a href="index.php?page=mail/templates"><i class="fa fa-file"></i> Templates</a></li>

                                        </ul>                            
                                    </li>
                                    
                                    <li  class="treeview <?php echo $_smarty_tpl->tpl_vars['active']->value['spam/mldetect'];?>
 <?php echo $_smarty_tpl->tpl_vars['active']->value['spam/recaptcha'];?>
">
                                        <a href="#">
                                            <i class="fa fa-archive"></i> <span>Spam Control</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li  class="<?php echo $_smarty_tpl->tpl_vars['active']->value['spam/recaptcha'];?>
"><a href="index.php?page=spam/recaptcha"><i class="fa fa-puzzle-piece"></i> ReCaptcha</a></li>                  
                                            <li  class="<?php echo $_smarty_tpl->tpl_vars['active']->value['spam/mldetect'];?>
"><a href="index.php?page=spam/mldetect"><i class="fa fa-random"></i> Spam detector</a></li>

                                        </ul>                            
                                    </li>
                                    
                                    <li class="treeview <?php echo $_smarty_tpl->tpl_vars['active']->value['system/importer'];?>
 <?php echo $_smarty_tpl->tpl_vars['active']->value['system/cron'];?>
 <?php echo $_smarty_tpl->tpl_vars['active']->value['system/upgrade'];?>
 <?php echo $_smarty_tpl->tpl_vars['active']->value['system/massmail'];?>
">
                                        <a href="#">
                                            <i class="fa fa-desktop"></i> <span>System</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li  class="<?php echo $_smarty_tpl->tpl_vars['active']->value['system/massmail'];?>
"><a href="index.php?page=system/massmail"><i class="fa fa-envelope-square"></i> Mass mail</a></li>                  
                                            <li  class="<?php echo $_smarty_tpl->tpl_vars['active']->value['system/cron'];?>
"><a href="index.php?page=system/cron"><i class="fa fa-clock-o"></i> Cron</a></li>
                                            <li  class="<?php echo $_smarty_tpl->tpl_vars['active']->value['system/importer'];?>
"><a href="index.php?page=system/importer"><i class="fa fa-exclamation-circle"></i> Importer</a></li>                  
                                            <li  class="<?php echo $_smarty_tpl->tpl_vars['active']->value['system/upgrade'];?>
"><a href="index.php?page=system/upgrade"><i class="fa fa-level-up"></i> Upgrade</a></li>                  

                                        </ul>
                                    </li>                        
                                </ul>
                            </section>
                            <!-- /.sidebar -->
                        </aside>

                    <?php } else { ?>

                        <style type="text/css">
                            .right-side {

                                margin-left: 0 !important;
                            }
                        </style>
                    <?php }?>

                    <!-- Right side column. Contains the navbar and content of the page -->
                    <aside class="right-side">
                        <!-- Content Header (Page header) -->

                        <!-- Main content -->
                        <section class="content">
                            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>


                        </section><!-- /.content -->
                    </aside><!-- /.right-side -->
                </div><!-- ./wrapper -->


                <!-- Bootstrap -->
                <script src="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
js/bootstrap.min.js" type="text/javascript"></script>
                <!-- AdminLTE App -->
                <script src="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
js/AdminLTE/app.js" type="text/javascript"></script>

                <script src="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
js/Nestable/jquery.nestable.js"></script>

                <script>

                    $div = $('.content');
                    //to get the breadcrumb one element level up
                    $div.before($('#breadcrumb_forthistemplate_hack'));

                </script>
                <script src="<?php echo $_smarty_tpl->tpl_vars['A_RURI']->value;?>
js/bootstrap-toggle.min.js"></script>    

            </body>
        </html>
<?php }} ?>
