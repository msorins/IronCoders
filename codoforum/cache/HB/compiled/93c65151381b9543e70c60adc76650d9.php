<?php return function ($in, $debugopt = 1) {
    $cx = array(
        'flags' => array(
            'jstrue' => false,
            'jsobj' => false,
            'spvar' => true,
            'prop' => false,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'debug' => $debugopt,
        ),
        'helpers' => array(            'const' => function($args) {
                                //single argument call
                                return constant($args[0]);
                            },
            'i18n' => function($args) {

                                return _t($args[0]);
                            },
            'hide' => function($args) {
                                return "";
                            },
),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array(),
'funcs' => array(
    'sec' => function ($cx, $v, $in, $each, $cb, $inv = null) {
        $isAry = is_array($v);
        $isTrav = $v instanceof Traversable;
        $loop = $each;
        $keys = null;
        $last = null;
        $isObj = false;

        if ($isAry && $inv !== null && count($v) === 0) {
            return $inv($cx, $in);
        }

        // #var, detect input type is object or not
        if (!$loop && $isAry) {
            $keys = array_keys($v);
            $loop = (count(array_diff_key($v, array_keys($keys))) == 0);
            $isObj = !$loop;
        }

        if (($loop && $isAry) || $isTrav) {
            if ($each && !$isTrav) {
                // Detect input type is object or not when never done once
                if ($keys == null) {
                    $keys = array_keys($v);
                    $isObj = (count(array_diff_key($v, array_keys($keys))) > 0);
                }
            }
            $ret = array();
            $cx['scopes'][] = $in;
            $i = 0;
            if ($cx['flags']['spvar'] && !$isTrav) {
                $last = count($keys) - 1;
            }
            foreach ($v as $index => $raw) {
                if ($cx['flags']['spvar']) {
                    $cx['sp_vars']['first'] = ($i === 0);
                    if ($isObj || $isTrav) {
                        $cx['sp_vars']['key'] = $index;
                        $cx['sp_vars']['index'] = $i;
                    } else {
                        $cx['sp_vars']['last'] = ($i == $last);
                        $cx['sp_vars']['index'] = $index;
                    }
                    $i++;
                }
                $ret[] = $cb($cx, $raw);
            }
            if ($cx['flags']['spvar']) {
                if ($isObj) {
                    unset($cx['sp_vars']['key']);
                } else {
                    unset($cx['sp_vars']['last']);
                }
                unset($cx['sp_vars']['index']);
                unset($cx['sp_vars']['first']);
            }
            array_pop($cx['scopes']);
            return join('', $ret);
        }
        if ($each) {
            if ($inv !== null) {
                $cx['scopes'][] = $in;
                $ret = $inv($cx, $v);
                array_pop($cx['scopes']);
                return $ret;
            }
            return '';
        }
        if ($isAry) {
            if ($cx['flags']['mustsec']) {
                $cx['scopes'][] = $v;
            }
            $ret = $cb($cx, $v);
            if ($cx['flags']['mustsec']) {
                array_pop($cx['scopes']);
            }
            return $ret;
        }

        if ($v === true) {
            return $cb($cx, $in);
        }

        if (!is_null($v) && ($v !== false)) {
            return $cb($cx, $v);
        }

        if ($inv !== null) {
            return $inv($cx, $in);
        }

        return '';
    },
    'ch' => function ($cx, $ch, $vars, $op) {
        return $cx['funcs']['chret'](call_user_func_array($cx['helpers'][$ch], $vars), $op);
    },
    'ifvar' => function ($cx, $v) {
        return !is_null($v) && ($v !== false) && ($v !== 0) && ($v !== '') && (is_array($v) ? (count($v) > 0) : true);
    },
    'chret' => function ($ret, $op) {
        if (is_array($ret)) {
            if (isset($ret[1]) && $ret[1]) {
                $op = $ret[1];
            }
            $ret = $ret[0];
        }

        switch ($op) {
            case 'enc':
                return htmlentities($ret, ENT_QUOTES, 'UTF-8');
            case 'encq':
                return preg_replace('/&#039;/', '&#x27;', htmlentities($ret, ENT_QUOTES, 'UTF-8'));
        }
        return $ret;
    },
)

    );
    return '<div class="codo_page_'.((isset($in['page_no']) && is_array($in)) ? $in['page_no'] : null).'">
'.$cx['funcs']['sec']($cx, ((isset($in['topics']) && is_array($in)) ? $in['topics'] : null), $in, true, function($cx, $in) {return '    <article class="'.$cx['funcs']['ch']($cx, 'hide', array(array('hmm'),array()), 'raw').'">
        <div class="codo_topics_topic_content">

            <div class="codo_posts_post_moderation">

'.(($cx['funcs']['ifvar']($cx, ((isset($in['can_manage_topic']) && is_array($in)) ? $in['can_manage_topic'] : null))) ? '                <div class="dropdown codo_manage_topic">
                    <div class="codo_manage_button dropdown-toggle" data-toggle="dropdown"  id="codo_manage_options_menu">
                        <i class="icon-more-vert"></i>
                    </div>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="codo_manage_options_menu">
'.(($cx['funcs']['ifvar']($cx, ((isset($in['can_edit_topic']) && is_array($in)) ? $in['can_edit_topic'] : null))) ? '                        <li id="codo_posts_edit_'.((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null).'" class="codo_posts_edit_post codo_post_this_is_topic"
                            role="presentation"><a role="menuitem" tabindex="-1">
                                <i class="icon-edit"></i> '.$cx['funcs']['ch']($cx, 'i18n', array(array('Edit'),array()), 'raw').'
                            </a></li>
' : '').''.(($cx['funcs']['ifvar']($cx, ((isset($in['can_delete_topic']) && is_array($in)) ? $in['can_delete_topic'] : null))) ? '                        <li id="codo_posts_trash_'.((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null).'" class="codo_posts_trash_post codo_post_this_is_topic"
                            role="presentation"><a role="menuitem" tabindex="-1">
                                <i class="icon-trash"></i> '.$cx['funcs']['ch']($cx, 'i18n', array(array('Delete'),array()), 'raw').'
                            </a></li>
' : '').'                    </ul>
                </div>
' : '').'
            </div>

            <div class=\'codo_badges\'>

'.(($cx['funcs']['ifvar']($cx, ((isset($in['sticky']) && is_array($in)) ? $in['sticky'] : null))) ? '                <i title="sticky" data-placement="bottom" data-toggle="tooltip" class="codo_tooltip glyphicon glyphicon-pushpin"></i>
' : '').''.(($cx['funcs']['ifvar']($cx, ((isset($in['new_topic']) && is_array($in)) ? $in['new_topic'] : null))) ? '                <a class="codo_tooltip" title="'.$cx['funcs']['ch']($cx, 'i18n', array(array('new topic'),array()), 'raw').'" data-placement="bottom" data-toggle="tooltip" href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'topic/'.htmlentities((string)((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null), ENT_QUOTES, 'UTF-8').'/'.htmlentities((string)((isset($in['safe_title']) && is_array($in)) ? $in['safe_title'] : null), ENT_QUOTES, 'UTF-8').'"><div class=\'\'><i class="glyphicon glyphicon-asterisk"></i></div></a>    
' : '').'
'.(($cx['funcs']['ifvar']($cx, ((isset($in['new_replies']) && is_array($in)) ? $in['new_replies'] : null))) ? '                <a class="codo_tooltip" title="'.$cx['funcs']['ch']($cx, 'i18n', array(array('new replies'),array()), 'raw').'" data-placement="bottom" data-toggle="tooltip" href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'topic/'.((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null).'/'.htmlentities((string)((isset($in['safe_title']) && is_array($in)) ? $in['safe_title'] : null), ENT_QUOTES, 'UTF-8').'/post-'.((isset($in['last_reply_id']) && is_array($in)) ? $in['last_reply_id'] : null).'#post-'.((isset($in['last_reply_id']) && is_array($in)) ? $in['last_reply_id'] : null).'"><div class=\'codo_unread_replies\'>'.((isset($in['new_replies']) && is_array($in)) ? $in['new_replies'] : null).'</div></a>
' : '').'
            </div>
            <div class="codo_topics_topic_avatar">
                <a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'user/profile/'.((isset($in['id']) && is_array($in)) ? $in['id'] : null).'">
                    <img draggable="false" src="'.htmlentities((string)((isset($in['avatar']) && is_array($in)) ? $in['avatar'] : null), ENT_QUOTES, 'UTF-8').'" />
                </a>
            </div>
            <div class="codo_topics_topic_name">
                <a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'encq').'user/profile/'.((isset($in['id']) && is_array($in)) ? $in['id'] : null).'">'.htmlentities((string)((isset($in['name']) && is_array($in)) ? $in['name'] : null), ENT_QUOTES, 'UTF-8').'</a>
                <span>'.$cx['funcs']['ch']($cx, 'i18n', array(array('posted'),array()), 'raw').' '.htmlentities((string)((isset($in['post_created']) && is_array($in)) ? $in['post_created'] : null), ENT_QUOTES, 'UTF-8').'</span>
            </div>
'.(($cx['funcs']['ifvar']($cx, ((isset($in['in_search']) && is_array($in)) ? $in['in_search'] : null))) ? '
            <div class="codo_topics_topic_title"><a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'topic/'.((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null).'/'.htmlentities((string)((isset($in['safe_title']) && is_array($in)) ? $in['safe_title'] : null), ENT_QUOTES, 'UTF-8').'/post-'.((isset($in['post_id']) && is_array($in)) ? $in['post_id'] : null).'#post-'.((isset($in['post_id']) && is_array($in)) ? $in['post_id'] : null).'">'.((isset($in['title']) && is_array($in)) ? $in['title'] : null).'</a></div>
' : '
'.(($cx['funcs']['ifvar']($cx, ((isset($in['new_replies']) && is_array($in)) ? $in['new_replies'] : null))) ? '            <div class="codo_topics_topic_title"><a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'topic/'.((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null).'/'.htmlentities((string)((isset($in['safe_title']) && is_array($in)) ? $in['safe_title'] : null), ENT_QUOTES, 'UTF-8').'/post-'.((isset($in['first_new_reply']) && is_array($in)) ? $in['first_new_reply'] : null).'#post-'.((isset($in['first_new_reply']) && is_array($in)) ? $in['first_new_reply'] : null).'">'.((isset($in['title']) && is_array($in)) ? $in['title'] : null).'</a></div>
' : '            <div class="codo_topics_topic_title"><a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'encq').'topic/'.((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null).'/'.htmlentities((string)((isset($in['safe_title']) && is_array($in)) ? $in['safe_title'] : null), ENT_QUOTES, 'UTF-8').'">'.((isset($in['title']) && is_array($in)) ? $in['title'] : null).'</a></div>
').'').'        </div>
        <div class="codo_topics_topic_message '.$cx['funcs']['ch']($cx, 'hide', array(array('hide_msg'),array()), 'raw').'">
            '.((isset($in['message']) && is_array($in)) ? $in['message'] : null).'
        </div>
        <div class="row">
            <div class=" col-md-2 col-xs-12 codo_readmore_container">

'.(($cx['funcs']['ifvar']($cx, ((isset($in['overflow']) && is_array($in)) ? $in['overflow'] : null))) ? '
                <a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'topic/'.htmlentities((string)((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null), ENT_QUOTES, 'UTF-8').'/'.htmlentities((string)((isset($in['safe_title']) && is_array($in)) ? $in['safe_title'] : null), ENT_QUOTES, 'UTF-8').'" class="codo_readmore">'.$cx['funcs']['ch']($cx, 'i18n', array(array('read more'),array()), 'encq').'</a>
' : '').'            </div>
            <div class="col-md-10 col-xs-12 codo_readmore_container">
'.(($cx['funcs']['ifvar']($cx, ((isset($in['tags']) && is_array($in)) ? $in['tags'] : null))) ? '                <div class="codo_tag_list">
                    <div class="codo_tags_all">
                        <i class="icon-tags icon-light"></i>
'.$cx['funcs']['sec']($cx, ((isset($in['tags']) && is_array($in)) ? $in['tags'] : null), $in, true, function($cx, $in) {return '                        <a title="'.$cx['funcs']['ch']($cx, 'i18n', array(array('find topics tagged'),array()), 'raw').' \''.htmlentities((string)((isset($in['tag']) && is_array($in)) ? $in['tag'] : null), ENT_QUOTES, 'UTF-8').'\'" href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'tags/'.htmlentities((string)((isset($in['tag']) && is_array($in)) ? $in['tag'] : null), ENT_QUOTES, 'UTF-8').'" title="">'.htmlentities((string)((isset($in['tag']) && is_array($in)) ? $in['tag'] : null), ENT_QUOTES, 'UTF-8').'</a>
';}).'                    </div>
                </div>
' : '').'            </div>
        </div>

        <div class="codo_topics_topic_readmore">
            <a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'topic/'.((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null).'/'.htmlentities((string)((isset($in['safe_title']) && is_array($in)) ? $in['safe_title'] : null), ENT_QUOTES, 'UTF-8').'">
                '.$cx['funcs']['ch']($cx, 'i18n', array(array('read more'),array()), 'raw').'
            </a>
        </div>

        <div class="codo_topics_topic_foot clearfix">

            <div class="codo_topics_no_replies"><span>'.htmlentities((string)((isset($in['no_replies']) && is_array($in)) ? $in['no_replies'] : null), ENT_QUOTES, 'UTF-8').'</span>'.$cx['funcs']['ch']($cx, 'i18n', array(array('replies'),array()), 'raw').'</div>
            <div class="codo_topics_no_replies"><span>'.htmlentities((string)((isset($in['no_views']) && is_array($in)) ? $in['no_views'] : null), ENT_QUOTES, 'UTF-8').'</span>'.$cx['funcs']['ch']($cx, 'i18n', array(array('views'),array()), 'raw').'</div>

'.(($cx['funcs']['ifvar']($cx, ((isset($in['last_post_time']) && is_array($in)) ? $in['last_post_time'] : null))) ? '            <div class="codo_topics_last_post">
                '.$cx['funcs']['ch']($cx, 'i18n', array(array('recent by'),array()), 'raw').' <a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'user/profile/'.htmlentities((string)((isset($in['last_post_uid']) && is_array($in)) ? $in['last_post_uid'] : null), ENT_QUOTES, 'UTF-8').'">'.htmlentities((string)((isset($in['last_post_name']) && is_array($in)) ? $in['last_post_name'] : null), ENT_QUOTES, 'UTF-8').'</a>
                &nbsp;&middot;&nbsp; <span class=\'codo_topics_last_post_time\'><a href="'.$cx['funcs']['ch']($cx, 'const', array(array('RURI'),array()), 'raw').'topic/'.((isset($in['topic_id']) && is_array($in)) ? $in['topic_id'] : null).'/'.htmlentities((string)((isset($in['safe_title']) && is_array($in)) ? $in['safe_title'] : null), ENT_QUOTES, 'UTF-8').'/post-'.((isset($in['last_post_id']) && is_array($in)) ? $in['last_post_id'] : null).'#post-'.((isset($in['last_post_id']) && is_array($in)) ? $in['last_post_id'] : null).'">'.htmlentities((string)((isset($in['last_post_time']) && is_array($in)) ? $in['last_post_time'] : null), ENT_QUOTES, 'UTF-8').'</a></span>
            </div>
' : '').'        </div>

    </article>
';}).'</div>';
}
?>