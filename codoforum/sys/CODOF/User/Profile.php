<?php

/*
 * @CODOLICENSE
 */

namespace CODOF\User;

class profile {

    public function get_uid($id) {

        $uid = $id;

        if (!isset($_SESSION[UID . 'USER']['id']) && !$id) {

            //not passed id and not logged in
            header('Location: ' . User::getLoginUrl());
            exit;
        } else if (isset($_SESSION[UID . 'USER']['id']) && !$id) {

            //not passed id but is logged in
            $uid = intval($_SESSION[UID . 'USER']['id']);
        } /*else {

            //passed id but not logged in
            //or passed id and logged in , yet preference given to passed id
            //$uid = $id; //already done in first statement
        }*/
        
        return $uid;
    }

    public function get_edit_view($passed_id, $uid) {

        $view = 'access_denied';
        
        if ($passed_id && isset($_SESSION[UID . 'USER']['id'])) {

            if ( ($passed_id == $_SESSION[UID . 'USER']['id'] && \CODOF\Access\Access::hasPermission('edit my profile') )
                    || \CODOF\Access\Access::hasPermission('edit all profiles')) {

                $view = 'user/profile/edit';
                \CODOF\Hook::call('before_profile_edit_load', array($uid));
            }
        }
        
        return $view;
    }

}
