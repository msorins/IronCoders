<?php /* Smarty version Smarty-3.1.16, created on 2016-07-01 11:30:06
         compiled from "/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/user/profile/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10990081455776462eb14726-88235650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01846f2301a1b9f836b7c4d80b6d02e17f642194' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/user/profile/view.tpl',
      1 => 1467300288,
      2 => 'file',
    ),
    '1b92821b1c43ce6ef1ba0caa94a43aa1e25a2a2f' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/layout.tpl',
      1 => 1467300283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10990081455776462eb14726-88235650',
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
  'unifunc' => 'content_5776462f13f908_35860024',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5776462f13f908_35860024')) {function content_5776462f13f908_35860024($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
if (!is_callable('smarty_modifier_load_block')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.load_block.php';
if (!is_callable('smarty_modifier_get_preference')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_preference.php';
if (!is_callable('smarty_modifier_abbrev_no')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.abbrev_no.php';
if (!is_callable('smarty_modifier_get_pretty_time')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_pretty_time.php';
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

        

    <style>

        .container {

            padding-top: 60px;
        }


    </style>

    <div class="container" style="padding-top: 60px">
        <?php echo smarty_modifier_load_block("block_profile_view_before");?>

        <div style="display:none" class="codo_notification codo_notification_error" id="codo_resend_mail_failed"></div>

        <div style="display:none" id="codo_mail_resent" class="codo_notification codo_notification_success">
            <?php echo _t("A confirmation email has been sent to your email address!");?>

        </div>


        <?php if ($_smarty_tpl->tpl_vars['user_not_confirmed']->value) {?>

            <div class="codo_notification codo_notification_warning">
                <?php echo _t("You have not yet confirmed your email address.");?>

                <a id="codo_resend_mail" href="#"><?php echo _t("Resend email");?>
</a>
                <img id="codo_email_sending_img" src="<?php echo @constant('DEF_THEME_PATH');?>
img/ajax-loader-orange.gif" />
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['user_not_approved']->value) {?>

            <div class="codo_notification codo_notification_warning">
                <?php echo _t("Your account is awaiting approval.");?>

            </div>
        <?php }?>

        <div class="row">

            <div class="col-md-4">

                <div class="codo_profile" id="">

                    <div class="codo_user">

                        <div class="codo_user_header">

                            <span><?php echo _t("Profile");?>
</span>
                            <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>

                                <i id="codo_edit_profile" class="icon-edit"></i>
                            <?php }?>

                        </div>

                        <div class="codo_user_body">
                            <div>
                                <img draggable="false" src="<?php echo $_smarty_tpl->tpl_vars['user']->value->avatar;?>
" />
                                <div class="codo_username"><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</div>

                            </div>
                        </div>
                    </div>

                    <div class="codo_user_statistics">


                        <div class="codo_info_block">
                            <div class="codo_blue_dot">

                            </div>
                            <div class="codo_user_info_label">
                                <?php echo _t("views");?>

                            </div>

                            <div class="codo_user_info_num">
                                <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['user']->value->profile_views);?>

                            </div>
                        </div>
                        <div class="codo_info_block">
                            <div class="codo_red_dot">

                            </div>
                            <div class="codo_user_info_label">
                                <?php echo _t("posts");?>

                            </div>

                            <div class="codo_user_info_num">
                                <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['user']->value->no_posts);?>

                            </div>
                        </div>
                        <div class="codo_info_block">
                            <div class="codo_green_dot">

                            </div>
                            <div class="codo_user_info_label">
                                <?php echo _t("reputation");?>

                            </div>

                            <div class="codo_user_info_num">
                                <?php echo $_smarty_tpl->tpl_vars['user']->value->reputation;?>

                            </div>
                        </div>

                    </div>
                    <div class="codo_user_details">

                        <div> <b>Joined</b> <?php echo smarty_modifier_get_pretty_time($_smarty_tpl->tpl_vars['user']->value->created);?>

                        </div>
                        <div>
                            <b>Last login</b> <?php if ($_smarty_tpl->tpl_vars['user']->value->last_access==0) {?><?php echo _t('never');?>
<?php } else { ?><?php echo smarty_modifier_get_pretty_time($_smarty_tpl->tpl_vars['user']->value->last_access);?>
<?php }?>
                        </div> 
                    </div>

                </div>
            </div>

            <div class="col-md-8">

                <div class="codo_tabs">

                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a data-toggle="tab" href="#recent_posts">Recent posts</a></li>
                    </ul>

                    <div class="codo_tabs_content tab-content">

                        <div id="recent_posts" class="tab-pane fade in active codo_topics_body">

                            
                                <div class='codo_load_more_gif'></div>

                                <script style="display: none" id="codo_template" type="text/html">


                                    {{#each topics}}
                                    <article class="clearfix">

                                        <div class="codo_topics_topic_img">
                                            <a href="{{../RURI}}category/{{cat_alias}}">
                                                <img draggable="false" src="{{../DURI}}{{../CAT_IMGS}}{{cat_img}}" />
                                            </a>
                                        </div>

                                        <div class="codo_topics_topic_content">
                                            <div class="codo_topics_topic_avatar">
                                                <a href="{{../RURI}}user/profile/{{id}}">

                                                    {{#if avatar}}
                                                    <img draggable="false" src="{{avatar}}" />
                                                    {{else}}
                                                    <img draggable="false" src="{{../../DURI}}{{../../DEF_AVATAR}}" />
                                                    {{/if}}

                                                </a>
                                            </div>
                                            <div class="codo_topics_topic_name">
                                                <a href="{{../RURI}}user/profile/{{id}}">{{name}}</a>
                                                <span>{{../created}} {{topic_created}}</span>
                                            </div>

                                            <div class="codo_topics_topic_title"><a href="{{../RURI}}topic/{{topic_id}}/{{safe_title}}">{{title}}</a></div>

                                        </div>

                                        {{#each contents}}
                                        <div class='codo_topics_topic_contents'>
                                            <div class="codo_topics_topic_message">{{{message}}}
                                            </div>
                                            <div class='codo_virtual_space'></div>    
                                            <div class="codo_topics_last_post">
                                                <a href="{{../../RURI}}topic/{{../topic_id}}/{{../safe_title}}/post-{{post_id}}#post-{{post_id}}">{{post_created}}</a>
                                            </div>
                                        </div>
                                        {{/each}}

                                        <div class="codo_topics_topic_foot clearfix">

                                            <div class="codo_topics_no_replies"><span>{{no_replies}}</span>{{../reply_txt}}</div>
                                            <div class="codo_topics_no_replies"><span>{{no_views}}</span>{{../views_txt}}</div>

                                        </div>


                                    </article>
                                    {{else}}

                                    <div class="codo_no_posts">
                                        {{no_topics}}
                                        {{#if can_create}}
                                        <br/><br/>
                                        <button class="codo_btn codo_btn_primary" onclick="codo_create_topic()" href="#" >{{new_topic}}</button> 
                                        {{/if}}
                                    </div>
                                    {{/each}}
                                    </script>

                                
                            </div>

                            <?php echo smarty_modifier_load_block("block_profile_view_tabs_after");?>


                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">

                                                CODOFVAR = {
                                                userid: <?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>

                                                }
            </script>
        

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
