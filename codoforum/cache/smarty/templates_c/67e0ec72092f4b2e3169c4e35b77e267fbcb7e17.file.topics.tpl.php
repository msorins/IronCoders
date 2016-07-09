<?php /* Smarty version Smarty-3.1.16, created on 2016-06-30 16:31:16
         compiled from "/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/forum/topics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160015985657753b44420ec2-48333777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67e0ec72092f4b2e3169c4e35b77e267fbcb7e17' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/forum/topics.tpl',
      1 => 1467300286,
      2 => 'file',
    ),
    '1b92821b1c43ce6ef1ba0caa94a43aa1e25a2a2f' => 
    array (
      0 => '/home/ironcoders/public_html/codoforum/sites/default/themes/default/templates/layout.tpl',
      1 => 1467300283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160015985657753b44420ec2-48333777',
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
  'unifunc' => 'content_57753b447bcd00_71612616',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57753b447bcd00_71612616')) {function content_57753b447bcd00_71612616($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/home/ironcoders/public_html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
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

        
    <div class="container" id="codo_topics_row">

        <div class="row">

            <div>
                <?php echo smarty_modifier_load_block("block_catgory_list_before");?>

                <div class="codo_categories col-md-4" id="codo_categories_sidebar">

                    <div class="row active" id="codo_category_all_topics">

                        <div class="codo_categories_category col-md-12">
                            <i class="icon-arrow-up"></i>
                            <div class="codo_category_title"><?php echo _t("All topics");?>
</div>
                            <?php if (isset($_smarty_tpl->tpl_vars['new_topics']->value)&&count($_smarty_tpl->tpl_vars['new_topics']->value)) {?>
                                <div id="codo_mark_all_read" class="codo_btn codo_mark_all_read"><?php echo _t('Mark all as read');?>
</div>
                            <?php }?>
                            <span class="codo_category_num_topics"><?php echo $_smarty_tpl->tpl_vars['total_num_topics']->value;?>
</span>
                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['can_search']->value) {?>    
                        <div class="codo_sidebar_search">
                            <input type="text" placeholder="<?php echo _t('Search');?>
" class="form-control codo_topics_search_input" />
                            <i class="glyphicon glyphicon-search codo_topics_search_icon" title="Advanced search" ></i>
                        </div>
                    <?php }?>

                    <ul id="codo_categories_ul">

                        <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

                                    <div class="codo_categories_category col-md-10 col-xs-10">
                                        <a href="<?php echo @constant('RURI');?>
category/<?php echo rawurlencode($_smarty_tpl->tpl_vars['cat']->value->cat_alias);?>
">
                                            <div class="codo_category_title"><?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_name;?>
</div>
                                        </a>
                                        <span data-toggle="tooltip" data-placement="bottom" title="<?php echo _t('No. of topics');?>
" class="codo_category_num_topics codo_bs_tooltip">
                                            <?php if ($_smarty_tpl->tpl_vars['cat']->value->granted==1) {?>
                                                <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['cat']->value->no_topics);?>

                                            <?php } else { ?> - 
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
                    <?php echo smarty_modifier_load_block("block_catgory_list_after");?>
 

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

                <div class="codo_topics col-md-8 clearfix">

                    <?php echo smarty_modifier_load_block("block_all_topics_before");?>


                    <div class="codo_topics_head">

                        <div class="codo_topics_head_item"><a href="#"><?php echo _t('Topics');?>
</a></li></div>

                    </div>
                    <div class="codo_topics_body" id="codo_topics_body">

                        <?php if ($_smarty_tpl->tpl_vars['total_num_topics']->value>0) {?>
                            <?php echo $_smarty_tpl->tpl_vars['topics']->value;?>

                        <?php } else { ?>
                            <div class="codo_zero_topics">
                                <?php echo _t("No topics created yet!");?>
<br/><br/>
                                <?php echo _t("Be the first to");?>
 <a href="<?php echo @constant('RURI');?>
new_topic"><?php echo _t("create");?>
</a> <?php echo _t("a topic");?>

                            </div>
                        <?php }?>
                    </div>
                    <?php if (!$_smarty_tpl->tpl_vars['load_more_hidden']->value) {?>
                        <a href="<?php echo @constant('RURI');?>
topics/<?php echo $_smarty_tpl->tpl_vars['curr_page']->value+1;?>
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

            </div>
        </div>

        <div id="codo_topics_multiselect" class="codo_topics_multiselect">

            <?php ob_start();?><?php echo _t("With");?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
 <span id="codo_number_selected"></span> <?php ob_start();?><?php echo _t("selected");?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
 
            <span class="codo_multiselect_deselect codo_btn codo_btn_sm codo_btn_def" id="codo_multiselect_deselect"><?php ob_start();?><?php echo _t("deselect topics");?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
</span>
            <select class="form-control" id="codo_topics_multiselect_select">
                <option value="nothing"><?php ob_start();?><?php echo _t("Select action");?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
</option>
                <optgroup label="<?php ob_start();?><?php echo _t("Actions");?>
<?php $_tmp5=ob_get_clean();?><?php echo $_tmp5;?>
">
                    <?php if ($_smarty_tpl->tpl_vars['can_delete']->value) {?>
                        <option value="delete"><?php ob_start();?><?php echo _t("Delete topics");?>
<?php $_tmp6=ob_get_clean();?><?php echo $_tmp6;?>
</option>    
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['can_merge']->value) {?>
                        <option disabled value="merge"><?php ob_start();?><?php echo _t("Merge topics");?>
<?php $_tmp7=ob_get_clean();?><?php echo $_tmp7;?>
</option>    
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['can_move']->value) {?>
                        <option value="move"><?php ob_start();?><?php echo _t("Move topics");?>
<?php $_tmp8=ob_get_clean();?><?php echo $_tmp8;?>
</option>    
                    <?php }?>
                </optgroup>

            </select>
        </div>
        <div class="modal fade" id='codo_multiselect_delete'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"><?php echo _t("Delete topics");?>
</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo _t("Are you sure you want to delete the following topics including its replies ?");?>
</p>

                        <p>
                        <div id="codo_multiselect_delete_links"></div>
                        </p>

                    </div>
                    <div class="modal-footer">
                        <div class="codo_loading"></div>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                        <button onclick="multiselect.delete_topics()" type="button" class="btn btn-primary"><?php echo _t("Delete");?>
</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id='codo_multiselect_merge'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"><?php echo _t("Merge topics");?>
</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo _t("Are you sure you want to merge the following topics ?");?>
</p>

                        <p>
                        <div id="codo_multiselect_merge_links"></div>
                        </p>

                        <p class=""><?php echo _t("Select the destination topic from above, where all topics will be merged");?>
</p>

                    </div>
                    <div class="modal-footer">
                        <div class="codo_loading"></div>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                        <button onclick="multiselect.merge_topics()" type="button" class="btn btn-primary"><?php echo _t("Merge");?>
</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id='codo_multiselect_move'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"><?php echo _t("Move topics");?>
</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo _t("The selected topics will be moved to");?>
</p>

                        <p>

                            <select class="form-control" id="codo_multiselect_move_category_select"> 
                                <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>

                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_id;?>
" role="presentation"><?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_name;?>
</option>

                                    <?php echo smarty_function_print_children(array('cat'=>$_smarty_tpl->tpl_vars['cat']->value,'el'=>'option'),$_smarty_tpl);?>

                                <?php } ?>

                            </select>
                        </p>


                    </div>
                    <div class="modal-footer">
                        <div class="codo_loading"></div>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Cancel");?>
</button>
                        <button onclick="multiselect.move_topics()" type="button" class="btn btn-primary"><?php echo _t("Move");?>
</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script type="text/javascript">

            CODOFVAR = {
                no_more_posts: '<?php echo _t("No more topics to display!");?>
',
                no_posts: '<?php echo _t("No topics found matching your criteria!");?>
',
                subcategory_dropdown: '<?php echo $_smarty_tpl->tpl_vars['subcategory_dropdown']->value;?>
',
                num_posts_per_page: '<?php echo $_smarty_tpl->tpl_vars['num_posts_per_page']->value;?>
',
                total: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['total_num_topics']->value)===null||$tmp==='' ? 0 : $tmp);?>
,
                last_page: '<?php echo _t("last page");?>
'
            };

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
