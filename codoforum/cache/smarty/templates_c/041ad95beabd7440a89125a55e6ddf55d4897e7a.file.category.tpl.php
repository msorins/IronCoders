<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:31:26
         compiled from "/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/forum/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27408965357753b4ec16b57-15150517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '041ad95beabd7440a89125a55e6ddf55d4897e7a' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/forum/category.tpl',
      1 => 1467300285,
      2 => 'file',
    ),
    '1b92821b1c43ce6ef1ba0caa94a43aa1e25a2a2f' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/layout.tpl',
      1 => 1467300283,
      2 => 'file',
    ),
    '8fa34b85236d730d29c1f9042dcd14a31ad644f3' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/forum/notification_level.tpl',
      1 => 1467300285,
      2 => 'file',
    ),
    '77d930a68dd9edd26954005a7cd7e08ee4cc0fe8' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/forum/editor.tpl',
      1 => 1467300285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27408965357753b4ec16b57-15150517',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sub_title' => 0,
    'site_title' => 0,
    'CSRF_token' => 0,
    'I' => 0,
    'php_time_now' => 0,
    'meta_robots' => 0,
    'canonical' => 0,
    'rel_prev' => 0,
    'rel_next' => 0,
    'google_plus_profile' => 0,
    'og' => 0,
    'article_published' => 0,
    'article_modified' => 0,
    'page' => 0,
    'profile_url' => 0,
    'unread_notifications' => 0,
    'canCreateTopicInAtleastOneCategory' => 0,
    'logout_url' => 0,
    'register_url' => 0,
    'login_url' => 0,
    'site_url' => 0,
    'can_moderate_posts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_57753b4f18c838_55844849',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753b4f18c838_55844849')) {function content_57753b4f18c838_55844849($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
if (!is_callable('smarty_modifier_load_block')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.load_block.php';
if (!is_callable('smarty_modifier_get_preference')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_preference.php';
if (!is_callable('smarty_modifier_abbrev_no')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.abbrev_no.php';
if (!is_callable('smarty_function_get_children')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/function.get_children.php';
if (!is_callable('smarty_function_print_children')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/function.print_children.php';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="<?php echo smarty_modifier_get_opt("site_description");?>
">

        <meta name="author" content="BABA">
        <title><?php echo $_smarty_tpl->tpl_vars['sub_title']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
</title>
        <!--[if lte IE 8]>
         <script src="//cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.min.js"></script>
        <![endif]-->

        <?php echo smarty_modifier_load_block("block_head");?>



        <script type="text/javascript">

            var on_codo_loaded = function () {
            };
            var codo_defs = {
                url: "<?php echo @constant('RURI');?>
",
                duri: "<?php echo @constant('DURI');?>
",
                def_theme: "<?php echo @constant('DEF_THEME_PATH');?>
",
                reluri: "<?php echo @constant('DATA_REL_PATH');?>
",
                token: "<?php echo $_smarty_tpl->tpl_vars['CSRF_token']->value;?>
",
                smiley_path: "<?php echo @constant('SMILEY_PATH');?>
",
                logged_in: "<?php echo $_smarty_tpl->tpl_vars['I']->value->loggedIn() ? 'yes' : 'no';?>
",
                uid: "<?php echo $_smarty_tpl->tpl_vars['I']->value->id;?>
",
                time: "<?php echo $_smarty_tpl->tpl_vars['php_time_now']->value;?>
",
                trans: {
                    embed_no_preview: "<?php echo _t('preview not available inside editor');?>
",
                    notify: {
                        mention: "<?php echo _t("New mention");?>
",
                        mention_action: "<?php echo _t("mentioned you in");?>
",
                        rolled_up_trans: "<?php echo _t(" for same topic");?>
",
                        caught_up: "<?php echo _t("No new notifications");?>
"
                    }
                },
                preferences: {
                    drafts: {
                        autosave: 'yes'
                    },
                    notify: {
                        real_time: "<?php echo smarty_modifier_get_preference("real_time_notifications");?>
",
                        desktop: "<?php echo smarty_modifier_get_preference("desktop_notifications");?>
"
                    }
                }

            };

            var CODOF = {
                hook: {
                    hooks: [],
                    add: function (myhook, func, weight, args) {

                        var i = 0;
                        if (typeof weight === "undefined") {

                            weight = 0;
                        }
                        if (typeof args === "undefined") {

                            args = {
                            };
                        }

                        if (typeof CODOF.hook.hooks[myhook] !== "undefined") {

                            i = CODOF.hook.hooks[myhook].length;
                        } else {

                            CODOF.hook.hooks[myhook] = [];
                        }

                        CODOF.hook.hooks[myhook][i] = {
                            func: func,
                            args: args,
                            weight: weight
                        };
                    }
                }
            }


        </script>


        <link rel="shortcut icon" type="image/x-icon" href="<?php echo @constant('DURI');?>
assets/img/general/img/favicon.ico?v=1">
        <link rel="apple-touch-icon" sizes="57x57" href="http://codoforum.com/img/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="http://codoforum.com/img/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="http://codoforum.com/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="http://codoforum.com/img/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="http://codoforum.com/img/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="http://codoforum.com/img/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="http://codoforum.com/img/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="http://codoforum.com/img/apple-touch-icon-152x152.png">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-196x196.png" sizes="196x196">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="http://codoforum.com/img/favicon-32x32.png" sizes="32x32">


        <!-- Some SEO stuff -->

        <?php if (isset($_smarty_tpl->tpl_vars['meta_robots']->value)) {?>

            <meta name="robots" content="<?php echo $_smarty_tpl->tpl_vars['meta_robots']->value;?>
">
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['canonical']->value)) {?>

            <link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['canonical']->value;?>
" />
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['rel_prev']->value)) {?>

            <link rel="prev" href="<?php echo $_smarty_tpl->tpl_vars['rel_prev']->value;?>
" />
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['rel_next']->value)) {?>

            <link rel="next" href="<?php echo $_smarty_tpl->tpl_vars['rel_next']->value;?>
" />
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['google_plus_profile']->value)) {?>
            <link rel="author" href="https://plus.google.com/<?php echo $_smarty_tpl->tpl_vars['google_plus_profile']->value;?>
"/>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['og']->value)) {?>    <!-- Twitter Card data -->
            <meta name="twitter:card" content="summary">

            <!-- Open Graph data -->
            <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['title'];?>
" />
            <meta property="og:type" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['type'];?>
" />
            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['url'])) {?><meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['url'];?>
" /><?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['image'])) {?><meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['image'];?>
" /><?php }?>             
            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['desc'])) {?><meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['desc'];?>
" /><?php }?>

            <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
" />

            <!-- Schema.org markup for Google+ -->
            <meta itemprop="name" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['title'];?>
">
            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['desc'])) {?><meta itemprop="description" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['desc'];?>
"><?php }?>

            <?php if (isset($_smarty_tpl->tpl_vars['og']->value['image'])) {?><meta itemprop="image" content="<?php echo $_smarty_tpl->tpl_vars['og']->value['image'];?>
"><?php }?>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['article_published']->value)) {?><meta property="article:published_time" content="<?php echo $_smarty_tpl->tpl_vars['article_published']->value;?>
" /><?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['article_modified']->value)) {?><meta property="article:modified_time" content="<?php echo $_smarty_tpl->tpl_vars['article_modified']->value;?>
" /><?php }?>

        <!-- SEO stuff ends -->


        <?php echo $_smarty_tpl->tpl_vars['page']->value['head']['css'];?>
        
        <?php echo $_smarty_tpl->tpl_vars['page']->value['head']['js'];?>


        <style type="text/css">

            .navbar {

                border-radius: 0;

            }


            .nav .open > a, .nav .open > a:hover, .nav .open > a:focus {

                background: white;
            }

            .navbar-clean .container-fluid {

                padding-left: 20px;
                padding-right: 30px;
            }


            .codo_forum_title:hover {
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }

            .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {

                color: white;
                background: #3794db;
            }

            .container{
               // margin-top: 60px;
            }

            .CODOFORUM{

                position:relative !important;
                top:0;

            }

            .mm-page {

                height: 100%;
            }
        </style>

    </head>

    <body>

        <?php echo smarty_modifier_load_block("block_body_start");?>




        <div class="CODOFORUM">


            <nav id="mmenu" style="display: none">
                <ul>



                    <?php if ($_smarty_tpl->tpl_vars['I']->value->loggedIn()) {?>

                        <li style="text-align:center">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
"><img  src="<?php echo $_smarty_tpl->tpl_vars['I']->value->avatar;?>
" style="width: 50px;border-radius: 30px;border: 3px solid"/></a>
                            <span style="padding: 10px 0px;font-weight:bold"><?php echo $_smarty_tpl->tpl_vars['I']->value->name;?>
</span>
                        </li>
                        <li title="<?php echo _t('Notifications');?>
" class="codo_inline_notifications_show_all">

                            <a class="glyphicon glyphicon-bell">
                                <span><?php echo _t('Notifications');?>
</span>
                                <?php if ($_smarty_tpl->tpl_vars['unread_notifications']->value) {?>
                                    <span class="codo_inline_notifications_unread_no codo_inline_notifications_unread_no_mobile"><?php echo $_smarty_tpl->tpl_vars['unread_notifications']->value;?>
</span>
                                <?php }?>

                            </a>

                        </li>

                        <?php if ($_smarty_tpl->tpl_vars['canCreateTopicInAtleastOneCategory']->value) {?>
                            <li class="" onclick="codo_create_topic()">


                                <a class="glyphicon glyphicon-pencil" >  <span><?php echo _t('New topic');?>
</span></a>

                            </li>
                        <?php }?>

                        <li class="">

                            <span  class="glyphicon glyphicon-user" > <?php echo _t('Profile');?>
</span>
                            <ul>


                                <li><a class="glyphicon glyphicon-user" href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
">  <span><?php echo _t("View Profile");?>
</span></a></li>
                                <li><a class="glyphicon glyphicon-pencil" href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['I']->value->id;?>
/edit">  <span><?php echo _t("Edit");?>
</span></a></li>
                                <li><a class="glyphicon glyphicon-log-out" href="<?php echo $_smarty_tpl->tpl_vars['logout_url']->value;?>
">  <span><?php echo _t("Logout");?>
</span></a></li>

                            </ul>
                        </li>

                        

                    <?php } else { ?>

                        <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['register_url']->value;?>
"><?php echo _t("Register");?>
</a></li>
                        <li><a id="codo_login_link" href="<?php echo $_smarty_tpl->tpl_vars['login_url']->value;?>
"><?php echo _t("Login");?>
</a></li>
                        <?php }?>

                    <?php echo smarty_modifier_load_block("block_main_menu");?>



                </ul>
            </nav>
            <nav id="nav" class="navbar navbar-clean navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle pull-left"  onclick='$("#mmenu").trigger("open.mm");' >
                            <span class="sr-only"><?php echo _t("Toggle navigation");?>
</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        


                        <img src="<?php echo @constant('DURI');?>
assets/img/general/brand.png" alt="codoforum logo" class="navbar-header-img">
                        <a href="<?php echo @constant('RURI');?>
<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
" class="navbar-brand codo_forum_title" ><?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
</a>

                        

                    </div>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="codo_navbar_content">




                        <ul class="nav navbar-nav navbar-right">


                            <?php echo smarty_modifier_load_block("block_main_menu");?>


                            <?php if ($_smarty_tpl->tpl_vars['I']->value->loggedIn()) {?>

                                <?php if ($_smarty_tpl->tpl_vars['canCreateTopicInAtleastOneCategory']->value) {?>
                                    <li class="codo_topics_new_topic hidden-xs codo_tooltip" data-placement="bottom" data-toggle="tooltip" title="<?php echo _t('Add new Topic');?>
">
                                        <a class="codo_nav_icon" href="#" onclick="codo_create_topic()">
                                            <i class="icon-new-topic"></i>
                                        </a>
                                    </li>
                                <?php }?>

                                <li class="dropdown hidden-xs codo_tooltip" data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('Notifications');?>
">
                                    <a data-toggle="dropdown" class="codo_nav_icon codo_inline_notifications" id="codo_inline_notifications">
                                        <i class="icon-bell"></i>
                                        <?php if ($_smarty_tpl->tpl_vars['unread_notifications']->value) {?>
                                            <span class="codo_inline_notifications_unread_no"><?php echo $_smarty_tpl->tpl_vars['unread_notifications']->value;?>
</span>
                                        <?php }?>
                                    </a>
                                    <ul class="dropdown-menu codo_inline_notifications_list" id="codo_inline_notifications_list" role="menu" aria-labelledby="dLabel">

                                        <div class="codo_inline_notification_header">
                                            <div class="codo_load_more_bar_black_gif" ></div>
                                            <div class="codo_inline_notification_header_content" id="codo_inline_notification_header_content">

                                                <span><?php echo _t("Notifications");?>
</span>
                                                <div>
                                                    
                                                    <span id="codo_inline_notifications_preferences" class="glyphicon glyphicon-tasks"  data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('preferences');?>
"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="codo_inline_notification_body" id="codo_inline_notification_body">

                                            
                                        </div>
                                        <div class="codo_inline_notification_footer codo_inline_notifications_show_all">
                                            <span><?php echo _t("show all");?>
</span><i class="glyphicon glyphicon-time"></i>
                                        </div>
                                    </ul>
                                </li>

                                <li class="codo_xs_li visible-xs-block">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['I']->value->id;?>
/edit#notifications">
                                        <i class="icon-bell"></i>
                                        <span class="visible-xs-inline"> <?php echo _t("Notifications");?>
</span>
                                    </a>
                                </li>

                                <?php if ($_smarty_tpl->tpl_vars['can_moderate_posts']->value) {?>
                                    <li class="" role="presentation">
                                        <a class="codo_nav_icon codo_tooltip" data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('Moderation');?>
" 
                                           href="<?php echo @constant('RURI');?>
moderation"><i class="icon-spam"></i></a>
                                    </li>
                                <?php }?>

                                <li class="codo_menu_user dropdown">

                                    <a class="codo_menu_user_img" data-toggle="dropdown"><img  src="<?php echo $_smarty_tpl->tpl_vars['I']->value->avatar;?>
" />
                                        <span class="visible-xs-inline"><?php echo $_smarty_tpl->tpl_vars['I']->value->name;?>
</span>
                                    </a>
                                    <ul class="dropdown-menu codo_menu_user_container" role="menu" aria-labelledby="dLabel">


                                        <li><a class="glyphicon glyphicon-user" href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
">  <span><?php echo _t("Profile");?>
</span></a></li>
                                        <li><a class="glyphicon glyphicon-pencil" href="<?php echo $_smarty_tpl->tpl_vars['profile_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['I']->value->id;?>
/edit">  <span><?php echo _t("Edit");?>
</span></a></li>
                                        <li><a class="glyphicon glyphicon-log-out" href="<?php echo $_smarty_tpl->tpl_vars['logout_url']->value;?>
">  <span><?php echo _t("Logout");?>
</span></a></li>

                                    </ul>
                                </li>

                                

                            <?php } else { ?>

                                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['register_url']->value;?>
"><?php echo _t("Register");?>
</a></li>
                                <li><a id="codo_login_link" href="<?php echo $_smarty_tpl->tpl_vars['login_url']->value;?>
"><?php echo _t("Login");?>
</a></li>
                                <?php }?>

                            <li class="codo_back_to_top"><a class="codo_back_to_top_arrow"><i class="icon-arrow-top"></i></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>




            <div class='codo_modal_bg'></div>

        

    <?php echo smarty_modifier_load_block("block_breadcrumbs_before");?>

    <div id="breadcrumb" class="col-md-12">
        <?php echo smarty_modifier_load_block("block_breadcrumbs_before");?>


        <div class="codo_breadcrumb_list btn-breadcrumb hidden-xs">
            <a href="<?php echo @constant('RURI');?>
<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"><div><i class="glyphicon glyphicon-home"></i></div></a>

            <?php  $_smarty_tpl->tpl_vars['crumb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['crumb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['parents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['crumb']->key => $_smarty_tpl->tpl_vars['crumb']->value) {
$_smarty_tpl->tpl_vars['crumb']->_loop = true;
?>
                <a title="<?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
" data-toggle="tooltip" href="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['crumb']->value['alias'];?>
"><div><?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
</div></a>                    
                    <?php } ?>
        </div>

        <select id="codo_breadcrumb_select" class="form-control hidden-sm hidden-md hidden-lg">
            <option selected="selected" value=""><?php echo _t("Where am I ?");?>
</option>
            <?php $_smarty_tpl->tpl_vars['space'] = new Smarty_variable("&nbsp;&nbsp;&nbsp;", null, 0);?>
            <?php $_smarty_tpl->tpl_vars['indent'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['space']->value), null, 0);?>

            <option value="<?php echo @constant('RURI');?>
<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['indent']->value;?>
<?php echo $_smarty_tpl->tpl_vars['home_title']->value;?>
</option>

            <?php  $_smarty_tpl->tpl_vars['crumb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['crumb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['parents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['crumb']->key => $_smarty_tpl->tpl_vars['crumb']->value) {
$_smarty_tpl->tpl_vars['crumb']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['indent'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['indent']->value).((string)$_smarty_tpl->tpl_vars['space']->value), null, 0);?>
                <option value="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['crumb']->value['alias'];?>
"><?php echo $_smarty_tpl->tpl_vars['indent']->value;?>
<?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
</option>                   
            <?php } ?>

        </select>    
        <?php echo smarty_modifier_load_block("block_breadcrumbs_after");?>
                
    </div>

    <?php echo smarty_modifier_load_block("block_breadcrumbs_after");?>


    <div class="container" id="codo_category_topics">
        <div class="row">

            <?php echo smarty_modifier_load_block("block_category_create_topic_before");?>

            <?php if ($_smarty_tpl->tpl_vars['can_create_topic']->value) {?>
                <div class="codo_topics col-md-8 col-xs-12 clearfix">
                    <div id="codo_topics_create" class="codo_topics_create">

                        <div class="codo_widget">
                            <div class="codo_widget-header codo_topics_on_focus_show" id="codo_create_new_topic">
                                <?php echo _t("Create Topic");?>

                            </div>

                            <div class="codo_widget-content">
                                <form id="codo_new_topic_form" method="POST" class="" role="form">

                                    <div class="form-group codo_topics_on_focus_show">
                                        <div>
                                            <input id="codo_topic_title" type="text" class="codo_input" placeholder="<?php echo _t("Give a title for your topic");?>
" required>
                                        </div>
                                    </div>

                                    <?php if ($_smarty_tpl->tpl_vars['can_add_tags']->value) {?>   

                                        <div class="form-group codo_tags codo_topics_on_focus_show">

                                            <div>
                                                <input id="codo_tags" data-role="tagsinput" type="text" placeholder="tags" />                               
                                            </div>

                                        </div> 
                                    <?php }?>
                                    <div class="form-group no-margin-bottom">
                                        <div id="codo_topic_desc_div" class="form-control"><?php echo _t("Create new topic");?>
</div>
                                        


                                        <div id="codo_new_reply" class="codo_new_reply">
                                            <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['can_make_sticky']->value) {?><?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
                
                                            <div class="sticky_container">
                                                <div class="codo_tooltip form-group codo_sticky">
                                                    <input  type="checkbox" name="sticky"> 
                                                    <label><?php echo _t("Is sticky ?");?>
</label>
                                                </div>                                                
                                                <div id="show_frontpage" class="codo_tooltip form-group codo_sticky" data-placement="bottom" data-title="<?php echo _t("if unchecked, will show topic only in category page");?>
">                        
                                                    <input type="checkbox" name="frontpage"> 
                                                    <label><?php echo _t("Show in front page ?");?>
</label>                            
                                                </div>                                    
                                            </div>
                                            <?php ob_start();?><?php }?><?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>


                                            <!--<div class="codo_reply_resize_handle"></div>-->

                                            <div class="codo_reply_box" id="codo_reply_box">
                                                <textarea placeholder="<?php echo _t('Describe your topic . You can use BBcode or Markdown');?>
" id="codo_new_reply_textarea" name="input_text"></textarea>
                                                <div class="codo_new_reply_preview" id="codo_new_reply_preview_container">
                                                    <div class="codo_editor_preview_placeholder"><?php echo _t("live preview");?>
</div>
                                                    <div id="codo_new_reply_preview"></div>
                                                </div>
                                                <div class="codo_reply_min_chars"><?php echo _t("enter atleast ");?>
<span id="codo_reply_min_chars_left"><?php echo $_smarty_tpl->tpl_vars['reply_min_chars']->value;?>
</span><?php echo _t(" characters");?>
</div>
                                            </div>

                                            <div id="codo_non_mentionable" class="codo_non_mentionable"><b><?php echo _t("WARNING:");?>
 </b><?php echo _t("You mentioned %MENTIONS%, but they cannot see this message and will not be notified");?>
 
                                            </div>

                                            <div class="codo_new_reply_action">
                                                <button class="codo_btn" id="codo_new_topic_btn"><i class="icon-check"></i><span class="codo_action_button_txt"><?php echo _t("Post");?>
</span></button>
                                                <button class="codo_btn codo_btn_def" id="codo_cancel_topic_btn"><i class="icon-times"></i><span class="codo_action_button_txt"><?php echo _t("Cancel");?>
</span></button>

                                                <img id="codo_new_reply_loading" src="<?php echo @constant('DEF_THEME_PATH');?>
img/ajax-loader.gif" />
                                                <button class="codo_btn codo_btn_def codo_post_preview_bg" id="codo_post_preview_btn">&nbsp;</button>
                                            </div>
                                            <input type="text" class="end-of-line" name="end_of_line" />

                                        </div>

                                    </div>

                                    <div class="codo_topics_on_focus_show">

                                        <input type="text" class="end-of-line" name="end_of_line" />
                                        <input id="codo_topic_cat" name="codo_topic_cat" type="hidden" />
                                        <input id="codo_topic_cat_alias" name="codo_topic_cat_alias" type="hidden" />
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            <?php }?>
            <?php echo smarty_modifier_load_block("block_category_create_topic_after");?>


            <div class="codo_categories col-md-4" id="codo_categories">

                <?php echo smarty_modifier_load_block("block_category_desc_before");?>

                <div class="codo_categories_container">
                    <a href="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['cat_alias']->value;?>
"><div class="codo_cat_title"><?php echo $_smarty_tpl->tpl_vars['cat_info']->value['cat_name'];?>
</div></a>

                    <div class="row codo_multi_column">
                        <div class="col-sm-6 col-md-12">
                            <div class="codo_cat_imgs">
                                <div class="codo_cat_img" style="background-image:url('<?php echo @constant('DURI');?>
<?php echo @constant('CAT_IMGS');?>
<?php echo $_smarty_tpl->tpl_vars['cat_info']->value['cat_img'];?>
')">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <?php if ($_smarty_tpl->tpl_vars['can_search']->value) {?>
                                <div class="codo_sidebar_search">
                                    <input type="text" placeholder="<?php echo _t('Search');?>
" class="form-control codo_topics_search_input" />
                                    <i class="glyphicon glyphicon-search codo_topics_search_icon" title="Advanced search" ></i>
                                </div>
                            <?php }?>

                            <div class="codo_cat_desc"><?php echo $_smarty_tpl->tpl_vars['cat_info']->value['cat_description'];?>
</div>
                            <?php if (isset($_smarty_tpl->tpl_vars['new_topics']->value)&&count($_smarty_tpl->tpl_vars['new_topics']->value)) {?>
                                <div class='codo_category_options'>
                                    <div id='mark_all_read' class='codo_btn codo_btn_def codo_mark_all_read'><?php echo _t('Mark all as read');?>
</div>
                                </div>
                            <?php }?>

                            <div class="codo_cat_info row clearfix">

                                <div class="codo_cat_num col-xs-4">
                                    <div><?php echo $_smarty_tpl->tpl_vars['no_topics']->value;?>
</div>
                                    <?php echo _t("Topics");?>

                                </div>

                                <div class="codo_cat_num col-xs-4">
                                    <div><?php echo $_smarty_tpl->tpl_vars['no_posts']->value;?>
</div>
                                    <?php echo _t("Posts");?>

                                </div>
                                <div class="codo_cat_num col-xs-4">
                                    <div><?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['no_followers']->value);?>
</div>
                                    <?php echo _t("Followers");?>

                                </div>

                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['logged_in']->value) {?>
                                <?php /*  Call merged included template "forum/notification_level.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('forum/notification_level.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '27408965357753b4ec16b57-15150517');
content_57753b4eee9eb4_71351345($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "forum/notification_level.tpl" */?>
                            <?php }?>
                        </div>
                    </div>
                    <?php if (!empty($_smarty_tpl->tpl_vars['sub_cats']->value)) {?>
                        <div class="codo_sub_categories">


                            <div class="codo_sub_categories_txt"><?php echo _t("sub-categories");?>
</div>
                            <ul id="codo_categories_ul">

                                <?php $_smarty_tpl->tpl_vars['total_topics'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub_cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
                                    <li>
                                        <div class="row">

                                            <div class="codo_category_img col-md-2 col-xs-2">
                                                <img draggable="false" src="<?php echo @constant('DURI');?>
<?php echo @constant('CAT_ICON_IMGS');?>
<?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_img;?>
" />
                                            </div>

                                            <div class="codo_categories_category col-md-10">
                                                <a href="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_alias;?>
">
                                                    <div class="codo_category_title"><?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_name;?>
</div>
                                                </a>
                                                <span data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('No. of topics');?>
" class="codo_category_num_topics codo_bs_tooltip">
                                                    <?php if ($_smarty_tpl->tpl_vars['cat']->value->granted==1) {?>
                                                        <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['cat']->value->no_topics);?>

                                                    <?php } else { ?> --
                                                    <?php }?>
                                                </span>

                                                <?php if (isset($_smarty_tpl->tpl_vars['new_topics']->value)&&isset($_smarty_tpl->tpl_vars['new_topics']->value[$_smarty_tpl->tpl_vars['cat']->value->cat_id])) {?>                                     
                                                    <a title="<?php echo _t('new topics');?>
"><span class="codo_new_topics_count"><?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['new_topics']->value[$_smarty_tpl->tpl_vars['cat']->value->cat_id]);?>
</span></a>
                                                    <?php }?>
                                            </div>
                                        </div>
                                        <?php echo smarty_function_get_children(array('cat'=>$_smarty_tpl->tpl_vars['cat']->value,'new_topics'=>$_smarty_tpl->tpl_vars['new_topics']->value),$_smarty_tpl);?>

                                    </li>
                                <?php } ?>
                            </ul>

                        </div>
                    <?php }?>
                </div>
                <?php echo smarty_modifier_load_block("block_category_desc_after");?>

                <div class="codo_categories_container">
                    <div class="codo_sidebar_fixed">

                        <?php if ($_smarty_tpl->tpl_vars['can_search']->value) {?>
                            <div id="codo_sidebar_fixed_search" class="codo_sidebar_search codo_sidebar_fixed_els">
                                <input type="text" placeholder="<?php echo _t('Search');?>
" class="form-control codo_topics_search_input" />
                                <i class="glyphicon glyphicon-search codo_topics_search_icon" title="Advanced search" ></i>
                            </div>
                        <?php }?>

                        <div class="dropdown codo_sidebar_navigation codo_sidebar_fixed_els" id="codo_category_select">
                            <button value="" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                <span><?php echo _t("All topics");?>
</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>

                                    <li role="presentation"><a data-alias="<?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_alias;?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_name;?>
</a></li>

                                    <?php echo smarty_function_print_children(array('cat'=>$_smarty_tpl->tpl_vars['cat']->value),$_smarty_tpl);?>

                                <?php } ?>
                            </ul>
                        </div>


                        <div class="codo_sidebar_settings">

                            <div>
                                <div id="codo_sidebar_hide_msg_switch" class="codo_switch codo_switch_off">
                                    <div class="codo_switch_toggle"></div>
                                    <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                    <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                </div>
                                <span><?php echo _t("Hide topic messages");?>
</span>                            
                            </div>

                            <div>                           
                                <div id="codo_sidebar_inf_scroll_switch" class="codo_switch codo_switch_off">
                                    <div class="codo_switch_toggle"></div>
                                    <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                    <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                </div>
                                <span><?php echo _t("Enable infinite scrolling");?>
</span>                             
                            </div>

                        </div>    

                    </div>
                </div>
            </div>
            <div style="display:none" id="codo_no_topics_display" class="codo_no_topics"><?php echo _t("No posts to display");?>
</div>

            <div class="codo_topics col-md-8 col-xs-12">

                <div id="codo_topics_list">
                    <?php if ($_smarty_tpl->tpl_vars['cat_info']->value['no_topics']>0) {?>
                        <?php echo $_smarty_tpl->tpl_vars['topics']->value;?>

                    <?php } else { ?>
                        <div class="codo_zero_topics">
                            <?php echo _t("No topics created yet!");?>
<br/><br/>
                            <?php echo _t("Be the first to");?>
 <a href="#" id="codo_zero_topics"><?php echo _t("create");?>
</a> <?php echo _t("a topic");?>

                        </div>
                    <?php }?>
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['load_more_hidden']->value) {?>
                    <a href="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['cat_alias']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['curr_page']->value+1;?>
"
                       class="codo_topics_load_more codo_btn codo_btn_def"
                       id="codo_topics_load_more">
                        <?php echo _t("Load more");?>

                    </a>
                <?php }?>
                <span style="display: none">
                    
                    <div id="codo_topic_page_info">
                        <span id="codo_page_info_time_spent" data-toggle="tooltip" title="<?php echo _t("time spent reading previous page");?>
"></span>
                        <span id="codo_page_info_page_no" data-toggle="tooltip" title="<?php echo _t("page no.");?>
"></span>
                        <span id="codo_page_info_pages_to_go" data-toggle="tooltip" title="<?php echo _t("pages to go");?>
"></span>
                    </div>
                </span>
            </div>

        </div>


    </div>
    <div id='codo_delete_topic_confirm_html'>
        <div class='codo_posts_topic_delete'>
            <div class='codo_content'>
                <?php echo _t("All posts under this topic will be ");?>
<b><?php echo _t("deleted");?>
</b> ?
                <br/>

                <div class="codo_consider_as_spam codo_spam_checkbox">
                    <input id="codo_spam_checkbox" name="spam" type="checkbox" checked="">
                    <label class="codo_spam_checkbox" for="spam"><?php echo _t('Mark as spam');?>
</label>
                </div>

            </div>
            <div class="codo_modal_footer">
                <div class="codo_btn codo_btn_def codo_modal_delete_topic_cancel"><?php echo _t("Cancel");?>
</div>
                <div class="codo_btn codo_btn_primary codo_modal_delete_topic_submit"><?php echo _t("Delete");?>
</div>
            </div>
            <div class="codo_spinner"></div>
        </div>
    </div>


    <?php /*  Call merged included template "forum/editor.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('forum/editor.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '27408965357753b4ec16b57-15150517');
content_57753b4f0cd5c0_90279861($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "forum/editor.tpl" */?>

    <script type="text/javascript">

        CODOFVAR = {
            cid: '<?php echo $_smarty_tpl->tpl_vars['cat_info']->value['cat_id'];?>
',
            cat_alias: '<?php echo $_smarty_tpl->tpl_vars['cat_alias']->value;?>
',
            curr_page: parseInt('<?php echo $_smarty_tpl->tpl_vars['curr_page']->value;?>
'),
            total: <?php echo $_smarty_tpl->tpl_vars['cat_info']->value['no_topics'];?>
,
            num_posts_per_page: <?php echo $_smarty_tpl->tpl_vars['num_posts_per_page']->value;?>
,
            smileys: JSON.parse('<?php echo $_smarty_tpl->tpl_vars['forum_smileys']->value;?>
'),
            reply_min_chars: parseInt(<?php echo $_smarty_tpl->tpl_vars['reply_min_chars']->value;?>
),
            dropzone: {
                dictDefaultMessage: '<?php echo _t("Drop files to upload &nbsp;&nbsp;(or click)");?>
',
                max_file_size: parseInt('<?php echo $_smarty_tpl->tpl_vars['max_file_size']->value;?>
'),
                allowed_file_mimetypes: '<?php echo $_smarty_tpl->tpl_vars['allowed_file_mimetypes']->value;?>
',
                forum_attachments_multiple: <?php echo $_smarty_tpl->tpl_vars['forum_attachments_multiple']->value;?>
,
                forum_attachments_parallel: parseInt('<?php echo $_smarty_tpl->tpl_vars['forum_attachments_parallel']->value;?>
'),
                forum_attachments_max: parseInt('<?php echo $_smarty_tpl->tpl_vars['forum_attachments_max']->value;?>
')

            },
            trans: {
                continue_mesg: '<?php echo _t("Continue");?>
'
            },
            login_url: '<?php echo $_smarty_tpl->tpl_vars['login_url']->value;?>
',
            search_data: '<?php echo $_smarty_tpl->tpl_vars['search_data']->value;?>
',
            last_page: '<?php echo _t("last page");?>
',
            no_more_posts: '<?php echo _t("No more topics to display!");?>
',
            no_posts: '<?php echo _t("No topics found matching your criteria!");?>
'

        };

    </script>


    <link rel="stylesheet" type="text/css" href="<?php echo @constant('DURI');?>
assets/dropzone/css/basic.css" />


        <div class="codo_footer">

            <?php echo $_smarty_tpl->tpl_vars['page']->value['body']['js'];?>

            <?php echo smarty_modifier_load_block("block_footer");?>



            <footer class="footer">
                <div class="container" style="padding:0px;">
                    <div class="row" style="padding: 5px !important">
                        <div class="col-sm-4">&copy; 2015 <?php echo $_smarty_tpl->tpl_vars['site_title']->value;?>
<br>


                            <small><?php echo _t("Powered by");?>
 <a href="http://codoforum.com" target="_blank">Codoforum</a></small>
                        </div>

                        <div class="col-sm-4 pull-right" style="text-align: center">


                            <?php echo smarty_modifier_load_block("block_footer_right");?>




                            <span class=''></span>

                        </div>

                    </div>
                </div>
            </footer>        


            <div style="display: none" id="codo_js_php_defs"></div>
        </div>
        <div class='notifications bottom-right'></div>


    </div>


    <?php echo smarty_modifier_load_block("block_body_end");?>


    
    
        <script style="display: none" id="codo_inline_notifications_template" type="text/html">

            {{#each objects}}
            <a target="_blank" href="{{../url}}topic/{{tid}}/post-{{pid}}/#post-{{pid}}" class="codo_inline_notification_el">

                <div class="codo_inline_notification_el_img">

                    {{#isRemote actor.avatar}}
                    <img src="{{../actor.avatar}}" />                    
                    {{else}}
                    <img src="{{../../duri}}assets/img/profiles/icons/{{../actor.avatar}}" />                    
                    {{/isRemote}}
                </div>
                <div class="codo_inline_notification_el_body">
                    <div class="codo_inline_notification_el_head">
                        <span class="codo_inline_notification_el_title">{{title}}</span>
                        {{#if rolledX}}
                        <span data-toggle="tooltip" data-placement="bottom" title="{{../rolledX}}{{../../rolled_up_trans}}" class="codo_inline_notification_el_rolled">{{rolledX}}</span>
                        {{/if}}
                        <div class="codo_inline_notification_el_created">{{created}}</div>
                    </div>
                    <div class="codo_inline_notification_el_text">
                        <span>{{{body}}}</b></span>
                    </div>
                </div>
            </a>
            {{else}}
            <div class="codo_inline_notification_caught_up">{{../caught_up}}</div>
            {{/each}}
        </script>
    

    <div class="codo_editor_draft">
        <div>
            <div id="codo_pending_text" class="codo_pending_text"><?php echo _t("Pending draft ...");?>
 <?php echo _t("Click to resume editing");?>
</div>
            <div class="codo_delete_draft"><i class="icon-trash"></i> <?php echo _t(" Discard draft");?>
 </div>
        </div>
    </div>

    <div id="codo_is_xs" class="hidden-xs"></div>    
    <div id="codo_is_sm" class="hidden-sm"></div>

    <script type="text/javascript">
                                        /** Lets optimize to the MAX **/
                                        function downloadJSAtOnload() {

                                        var files = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['page']->value['defer'];?>
');
                                                var len = files.length;
                                                var i = 0;
                                                var element = document.createElement("script");
                                                element.src = files[i];
                                                element.async = false;
                                                document.body.appendChild(element);
                                                if (element.readyState) {  //IE
                                        element.onreadystatechange = function() {
                                        if (element.readyState === "loaded" || element.readyState === "complete") {
                                        element.onreadystatechange = null;
                                                on_codo_loaded();
                                                codo_load_js();
                                        }
                                        };
                                        } else {  //Others
                                        element.onload = function() {
                                        on_codo_loaded();
                                                CODOF.hook.call('on_cf_loaded');
                                                codo_load_js();
                                        };
                                        }

                                        function codo_load_js() {
                                        var element;
                                                for (var i = 1; i < len; i++) {
                                        element = document.createElement("script");
                                                element.src = files[i];
                                                element.async = false;
                                                document.body.appendChild(element);
                                                if (i === len - 1) {
                                        element.onload = function() {
                                        CODOF.hook.call('on_scripts_loaded');
                                        }
                                        }
                                        }
                                        }
                                        }
                                        if (window.addEventListener)
                                                window.addEventListener("load", downloadJSAtOnload, false);
                                                else if (window.attachEvent)
                                                window.attachEvent("onload", downloadJSAtOnload);
                                                else window.onload = downloadJSAtOnload;
    </script>    
</body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:31:26
         compiled from "/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/forum/notification_level.tpl" */ ?>
<?php if ($_valid && !is_callable('content_57753b4eee9eb4_71351345')) {function content_57753b4eee9eb4_71351345($_smarty_tpl) {?>

<div class="codo_notification_block">

    <div class="codo_notification_block_type"><?php echo _t("Notification level");?>
</div>
    <div class="codo_notification_block_slider">
        <input type="text" id="codo_notification_selector<?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {?><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
<?php }?>" class="codo_notification_selector col-md-12 col-xs-12" value="" 
               data-slider-min="1" data-slider-handle="square"
               data-slider-max="4" data-slider-step="1" data-slider-value="<?php echo $_smarty_tpl->tpl_vars['my_subscription_type']->value;?>
" 
               data-slider-orientation="horizontal" data-slider-selection="before" 
               data-slider-tooltip="hide"
               
               <?php if (isset($_smarty_tpl->tpl_vars['is_category']->value)) {?>
                   
                   data-iscategory="<?php echo $_smarty_tpl->tpl_vars['is_category']->value;?>
" 
                   
                   <?php if ($_smarty_tpl->tpl_vars['is_category']->value=='no') {?>
                       data-cid='<?php echo $_smarty_tpl->tpl_vars['topic']->value['cid'];?>
'
                       data-tid='<?php echo $_smarty_tpl->tpl_vars['topic']->value['tid'];?>
'
                   
                   <?php } else { ?>
                       data-cid='<?php echo $_smarty_tpl->tpl_vars['cat']->value['cid'];?>
'
                       data-tid='<?php echo $_smarty_tpl->tpl_vars['cat']->value['tid'];?>
'
                                              
                   <?php }?>   
                       
               <?php }?>
               
               >
    </div>

    <div class="codo_notification_block_desc">
        <span id="codo_notification_block_text<?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {?><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
<?php }?>"></span>
        <span class="codo_notification_block_muted hide">
            <ul>
                <li>
                    <?php echo _t("No notifications");?>

                </li>
            </ul>
        </span>
        <span class="codo_notification_block_default hide">
            <ul>
                <li>
                    <b><?php echo _t("Only");?>
</b><?php echo _t(" mentions.");?>

                </li>
            </ul>
        </span>
        <span class="codo_notification_block_following hide">
            <ul>
                <li>
                    <?php echo _t("New replies/topics/mentions");?>
        
                </li>
                <li>
                    <?php echo _t("unread count next to topic");?>

                </li>
            </ul>
        </span>
        <span class="codo_notification_block_notified hide">
            <ul>
                <li>
                    <?php echo _t("New replies/topics/mentions");?>
        
                </li>
                <li>
                    <?php echo _t("Unread count next to topic");?>

                </li>
                <li>
                    <?php echo _t("Email notifications");?>

                </li>
            </ul>
        </span>

    </div>

</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:31:27
         compiled from "/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/forum/editor.tpl" */ ?>
<?php if ($_valid && !is_callable('content_57753b4f0cd5c0_90279861')) {function content_57753b4f0cd5c0_90279861($_smarty_tpl) {?>



<div class="modal fade" id='codo_draft_pending'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><?php echo _t("Pending draft");?>
</h4>
            </div>
            <div class="modal-body">
                <p><?php echo _t("Your previous draft for topic ");?>
<span id="codo_draft_topic_title"></span> <?php echo _t("is pending");?>
</p>
                <p><?php echo _t("If you continue, ");?>
<?php echo _t("your previous draft will be discarded.");?>
 </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                <button onclick="CODOF.autoDraft.recycle();" type="button" class="btn btn-primary"><?php echo _t("Continue");?>
</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Modal -->
<div class="modal animated bounceInDown" id="codo_modal_link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo _t("Add link");?>
</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <input id="codo_modal_link_url" name="element_1" type="text" class="form-control" placeholder="<?php echo _t("link url");?>
" required=""/>
                    <hr/>

                    <input id="codo_modal_link_text" name="element_2" type="text" class="form-control" placeholder="<?php echo _t("link text");?>
 - <?php echo _t("optional");?>
"/>
                    <hr/>

                    <input id="codo_modal_link_title" name="element_3" type="text" class="form-control" placeholder="<?php echo _t("link title");?>
 - <?php echo _t("optional");?>
"/>
                </form>

            </div>
            <div class="modal-footer">
                <div class="codo_modal_link_cancel codo_btn codo_btn_def" data-dismiss="modal"><?php echo _t("Cancel");?>
</div>
                <div id="codo_modal_link_submit" class="codo_btn codo_btn_primary"><?php echo _t("Add");?>
</div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="modal animated bounceInDown" id="codo_modal_upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><?php echo _t("Upload");?>
</h4>
            </div>
            <div class="modal-body">
                <form class="dropzone"
                      id="codomyawesomedropzone">

                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <input name="token" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['CSRF_token']->value;?>
" />
                </form>

            </div>
            <div class="modal-footer">
                <div class="codo_modal_upload_cancel codo_btn codo_btn_def" data-dismiss="modal"><?php echo _t("Cancel");?>
</div>
                <div id="codo_modal_upload_submit" class="codo_btn"><?php echo _t("Upload");?>
</div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<a id="jquery-oembed-me"></a>
<?php }} ?>
