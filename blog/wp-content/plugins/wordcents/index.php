<?php
/*
Plugin Name: ELI's WordCents adSense Widget with Analytics
Plugin URI: http://wordpress.ieonly.com/category/my-plugins/wordcents-adsense-widget/
Author: Eli Scheetz
Author URI: http://wordpress.ieonly.com/category/my-plugins/
Contributors: scheeeli
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8VWNB5QEJ55TJ
Description: Monetize your site with this adSense widget in your sidebar and track the results with Google Analytics.
Version: 1.3.03.27
*/
$WordCents_Version='1.3.03.27';
$WordCents_Exceptions = array();
if (headers_sent($filename, $linenum)) {
	if (!$filename)
		$filename = 'an unknown file';
	if (!is_numeric($linenum))
		$linenum = 'unknown';
    $WordCents_Exceptions[] = "Headers already sent in $filename on line $linenum.<br />This is a bad sign, it may just be a poorly written plugin but Headers should not have been sent at this point.<br />Check the code in the above mentioned file to fix this problem.";
} elseif (!session_id()) @session_start();
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) die('You are not allowed to call this page directly.<p>You could try starting <a href="http://'.$_SERVER['SERVER_NAME'].'">here</a>.');
$_SESSION['eli_debug_microtime']['include(WordCents)'] = microtime(true);
$WordCents_plugin_dir='WordCents';
/**
 * WordCents Main Plugin File
 * @package WordCents
*/
/*  Copyright 2012 Eli Scheetz (email: wordpress@ieonly.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

function WordCents_admin_notices() {
	global $WordCents_Exceptions;
	foreach ($WordCents_Exceptions as $WordCents_Exception)
		echo "<div class=\"error\">$WordCents_Exception</div>";
}
add_action('admin_notices', 'WordCents_admin_notices');
function WordCents_install() {
	global $wp_version;
$_SESSION['eli_debug_microtime']['WordCents_install_start'] = microtime(true);
	if (version_compare($wp_version, "2.6", "<"))
		die(__("This Plugin requires WordPress version 2.6 or higher"));
$_SESSION['eli_debug_microtime']['WordCents_install_end'] = microtime(true);
}
$WordCents_align_types = array("fixed", "relative", "absolute", "static");
$WordCents_align_x = array("right", "left", "top", "bottom");
$WordCents_align_y = array("top", "bottom", "right", "left");
class WordCents_Widget_Class extends WP_Widget {
	function WordCents_Widget_Class() {
		global $WordCents_plugin_dir;
$_SESSION['eli_debug_microtime']['WordCents_Widget_Class_Widget_Class_start'] = microtime(true);
		$this->WP_Widget($WordCents_plugin_dir.'-Widget', __('WordCents adSense'), array('classname' => 'widget_'.$WordCents_plugin_dir, 'description' => __('A Google adSense Widget to display ads and make money.')));
		$this->alt_option_name = 'widget_'.$WordCents_plugin_dir;
$_SESSION['eli_debug_microtime']['WordCents_Widget_Class_Widget_Class_end'] = microtime(true);
	}
	function widget($args, $instance) {
		global $WordCents_all_category, $WordCents_plugin_dir, $WordCents_images_path, $WordCents_align_x, $WordCents_align_y, $WordCents_align_types, $current_user, $post;
$_SESSION['eli_debug_microtime']['WordCents_Widget_Class_widget_start'] = microtime(true);
		wp_get_current_user();
		$default_code = 'Enter your ad code in the Widget Admin to display your ads here';
		extract($args);
		if (!$instance['title'])
			$instance['title'] = "";
		if (!(isset($instance['code']) && strlen(trim($instance['code'])) > 4))
			$instance['code'] = $default_code;
//		elseif (get_option('WordCents_oauth_token'.$current_user->ID))
	//	 	$instance['code'] = '<a href="javascript:alert(\'Google will not pay you for clicks you invoke yourself. \');" title="You are seeing this because you are logged in as the admin">Admin Notice!</b><br />'.$default_code;
		if (!$instance['popout'])
			$instance['popout'] = "no";
		if (!$instance['usecat'])
			$instance['usecat'] = "no";
		if (!is_numeric($instance['x-position']))
			$instance['x-position'] = 10;
		if (!is_numeric($instance['y-position']))
			$instance['y-position'] = 30;
		if (!is_numeric($instance['x-align']))
			$instance['x-align'] = 0;
		if (!is_numeric($instance['y-align']))
			$instance['y-align'] = 0;
		if (!is_numeric($instance['x-type']))
			$instance['x-type'] = 0;
		if (!is_numeric($instance['y-type']))
			$instance['y-type'] = 0;
		echo $before_widget;
		if (strlen($instance["title"]) > 0)
			echo $before_title.$instance["title"].$after_title;
		if ($instance['popout'] == "yes") {
			echo '<div id="WordCents_DIV_0" style="position: relative;"><div id="WordCents_DIV_1" style="position: '.$WordCents_align_types[$instance['y-type']].'; '.$WordCents_align_y[$instance['y-align']].': '.$instance['y-position'].'px;"><div id="WordCents_DIV_2" style="position: '.$WordCents_align_types[$instance['x-type']].'; '.$WordCents_align_x[$instance['x-align']].': '.$instance['x-position'].'px;">';
			$after_widget = '</div></div></div>'.$after_widget;
		}
		if ($instance['usecat'] == "yes") {
			$global_post = $post;
			$WordCents_all_category = array();
			$wordcents_codes = get_option("wordcents_codes", array());
			if (!have_posts())
				rewind_posts();
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					if ($tags = get_the_category()) {
						foreach ($tags as $tag) {
							if (isset($WordCents_all_category[''.$tag->term_id]))
								$WordCents_all_category[''.$tag->term_id]++;
							else
								$WordCents_all_category[''.$tag->term_id] = 1;
						}
					}
				}
				rewind_posts();
			}
			$post = $global_post;
			asort($WordCents_all_category);
			foreach ($WordCents_all_category as $cat_id => $count)
				if (isset($wordcents_codes["cat_$cat_id"]) && strlen($wordcents_codes["cat_$cat_id"]))
					$instance['code'] = $wordcents_codes["cat_$cat_id"];
		}
		echo do_shortcode($instance['code']).$after_widget;
$_SESSION['eli_debug_microtime']['WordCents_Widget_Class_widget_end'] = microtime(true);
	}
	function flush_widget_cache() {
		global $WordCents_plugin_dir;
		wp_cache_delete('widget_'.$WordCents_plugin_dir, 'widget');
	}
	function update($new, $old) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
		$instance['code'] = ($new['code']);
		$instance['popout'] = strip_tags($new['popout']);
		$instance['x-position'] = (int) $new['x-position'];
		$instance['y-position'] = (int) $new['y-position'];
		$instance['x-type'] = (int) $new['x-type'];
		$instance['y-type'] = (int) $new['y-type'];
		$instance['x-align'] = (int) $new['x-align'];
		$instance['y-align'] = (int) $new['y-align'];
		$instance['usecat'] = strip_tags($new['usecat']);
		return $instance;
	}
	function form( $instance ) {
		global $WordCents_plugin_dir, $WordCents_align_x, $WordCents_align_y, $WordCents_align_types;
$_SESSION['eli_debug_microtime']['WordCents_Widget_Class_form_start'] = microtime(true);
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$code = isset($instance['code']) ? esc_attr($instance['code']) : '';
		$popout = isset($instance['popout']) ? esc_attr($instance['popout']) : 'yes';
		$x_position = isset($instance['x-position']) ? (int) ($instance['x-position']) : 10;
		$y_position = isset($instance['y-position']) ? (int) ($instance['y-position']) : 30;
		$x_align = isset($instance['x-align']) ? absint($instance['x-align']) : 0;
		$y_align = isset($instance['y-align']) ? absint($instance['y-align']) : 0;
		$x_type = isset($instance['x-type']) ? absint($instance['x-type']) : 0;
		$y_type = isset($instance['y-type']) ? absint($instance['y-type']) : 0;
		$usecat = isset($instance['usecat']) ? esc_attr($instance['usecat']) : 'no';
		$type_opts = '';
		for ($o=0; $o<count($WordCents_align_types); $o++)
			$type_opts .= '<option value="'.$o.'">'.$WordCents_align_types[$o].'</option>';
		$x_opts = '<select name="'.$this->get_field_name('x-type').'" id="'.$this->get_field_id('x-type').'">'.str_replace('value="'.$instance['x-type'].'"', 'value="'.$instance['x-type'].'" selected', $type_opts).'</select><select name="'.$this->get_field_name('x-align').'" id="'.$this->get_field_id('x-align').'">';
		for ($o=0; $o<count($WordCents_align_x); $o++)
			$x_opts .= '<option value="'.$o.'"'.($x_align==$o?" selected":"").'>'.$WordCents_align_x[$o].'</option>';
		$y_opts = '<select name="'.$this->get_field_name('y-type').'" id="'.$this->get_field_id('y-type').'">'.str_replace('value="'.$instance['y-type'].'"', 'value="'.$instance['y-type'].'" selected', $type_opts).'</select><select name="'.$this->get_field_name('y-align').'" id="'.$this->get_field_id('y-align').'">';
		for ($o=0; $o<count($WordCents_align_y); $o++)
			$y_opts .= '<option value="'.$o.'"'.($y_align==$o?" selected":"").'>'.$WordCents_align_y[$o].'</option>';
		echo '<p><label for="'.$this->get_field_id('title').'">'.__('Optional Widget Title').':</label>
		<input type="text" name="'.$this->get_field_name('title').'" id="'.$this->get_field_id('title').'" value="'.$title.'" /></p>
		<p><label for="'.$this->get_field_id('popout').'">'.__('Use custom positioned DIVs').':</label>
		<input type="checkbox" name="'.$this->get_field_name('popout').'" id="'.$this->get_field_id('popout').'" value="yes"'.($popout=="yes"?" checked":"").' />yes</p>
		<p><label for="'.$this->get_field_id('y-position').'">DIV_1 Alignment and Position:</label><br />
		'.$y_opts.'</select><input type="text" size="2" name="'.$this->get_field_name('y-position').'" id="'.$this->get_field_id('y-position').'" value="'.$y_position.'" />px</p>
		<p><label for="'.$this->get_field_id('x-position').'">DIV_2 Alignment and Position:</label><br />
		'.$x_opts.'</select><input type="text" size="2" name="'.$this->get_field_name('x-position').'" id="'.$this->get_field_id('x-position').'" value="'.$x_position.'" />px</p>
		<p><label for="'.$this->get_field_id('code').'">'.__('adSense (or any HTML) Code').':</label><br />
		<textarea name="'.$this->get_field_name('code').'" id="'.$this->get_field_id('code').'" rows="5">'.$code.'</textarea></p>
		<p><label for="'.$this->get_field_id('usecat').'">'.__('Use category specific codes if entered').':</label>
		<input type="checkbox" name="'.$this->get_field_name('usecat').'" id="'.$this->get_field_id('usecat').'" value="yes"'.($usecat=="yes"?" checked":"").' />yes<br /><a href="edit-tags.php?action=edit&taxonomy=category" target="_blank">Enter category specific code here</a></p>';
$_SESSION['eli_debug_microtime']['WordCents_Widget_Class_form_end'] = microtime(true);
	}
}
// Max results per page.
define('AD_MAX_PAGE_SIZE', 50);
// This is the maximum number of obtainable rows for paged reports.
define('AD_ROW_LIMIT', 5000);
require_once "AdSenseAuth.php";
require_once "BaseExample.php";
require_once "htmlHelper.php";
function callSupportedAction($action = null) {
	global $current_user;
	wp_get_current_user();
	$actions = getSupportedActions();
	$auth = new AdSenseAuth();
	$auth->authenticate($current_user->ID);
	if (isset($_GET['code']) && isset($_GET['auth_plugin']) && $_GET['auth_plugin'] == 'wordcents')
		header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);//REQUEST_URI (without code)
	if (isset($action)) {
		if (!in_array($action, $actions)) {
		  	die('<li>Unsupported action:' . $action . "\n");
		} else {
			// Render the required action.
			require_once 'functions/' . $action . '.php';
			$class = ucfirst($action);
			$function = new $class($auth->getAdSenseService());
			return $function->render($current_user->ID);
		}
	} else {
		return ($actions);
	}
}
function getSupportedActions() {
  $actions = array();
  $dirHandler = opendir(dirname(__FILE__).'/functions');
  while ($actionFile = readdir($dirHandler)) {
    if (preg_match('/\.php$/', $actionFile)) {
      $action = preg_replace('/\.php$/', '', $actionFile);
      $actions[] = $action;
    }
  }
  closedir($dirHandler);
  return $actions;
}
function WordCents_dashboard_setup() {
    wp_add_dashboard_widget('WordCents_dashboard_widget', 'Eli\'s WordCents adSense Analytics Dashboard Widget', 'WordCents_dashboard_content', array('width' => 'full', 'height' => 'single'));
}
$Acounts = array('WordCents_forget_token'=>'Forget OAuth Token');
function WordCents_admin_init() {
	global $apiAuthCredentials, $apiCredentials, $current_user, $Acounts, $auth;
	wp_get_current_user();
	$apiAuthCredentialTypes = array_keys($apiAuthCredentials);
	if (isset($_POST['WordCents_account_id'])) {
		if (isset($_POST['WordCents_Metrics']) && is_array($_POST['WordCents_Metrics']))
			update_option('WordCents_Metrics'.$current_user->ID, $_POST['WordCents_Metrics']);
		if (isset($_POST['WordCents_GroupBy']))
			update_option('WordCents_GroupBy'.$current_user->ID, $_POST['WordCents_GroupBy']);
		if (isset($_POST['WordCents_DateRange']) && is_numeric($_POST['WordCents_DateRange']))
			update_option('WordCents_DateRange'.$current_user->ID, $_POST['WordCents_DateRange']);
		delete_option('WordCents_account_id'.$current_user->ID);
		if ($_POST['WordCents_account_id']=='WordCents_forget_token')
			delete_option('WordCents_oauth_token'.$current_user->ID);
		elseif (isset($apiAuthCredentials[$apiAuthCredentialTypes[$_POST['WordCents_account_id']]])) {
			update_option('WordCents_oauth_type'.$current_user->ID, $_POST['WordCents_account_id']);
			delete_option('WordCents_oauth_token'.$current_user->ID);
		} else
			update_option('WordCents_account_id'.$current_user->ID, $_POST['WordCents_account_id']);
	}
	if (isset($apiAuthCredentials[$apiAuthCredentialTypes[get_option('WordCents_oauth_type'.$current_user->ID)]]))
		$apiCredentials = $apiAuthCredentials[$apiAuthCredentialTypes[get_option('WordCents_oauth_type'.$current_user->ID)]];
    if ($token = get_option('WordCents_oauth_token'.$current_user->ID) || (isset($_GET['code']) && isset($_GET['auth_plugin']) && $_GET['auth_plugin'] == 'wordcents') || isset($apiAuthCredentials[$apiAuthCredentialTypes[$_POST['WordCents_account_id']]])) {
		$auth = new AdSenseAuth();
		$auth->authenticate($current_user->ID);
 		if (isset($_GET['code']) && isset($_GET['auth_plugin']) && $_GET['auth_plugin'] == 'wordcents') header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);//REQUEST_URI (without code)
	}
	add_action('category_add_form_fields', 'WordCents_category_add_form_fields', 10, 1);
	add_action('category_edit_form_fields', 'WordCents_category_edit_form_fields', 10, 1);
	add_action('created_category', 'WordCents_update_category', 10, 1);
	add_action('edited_category', 'WordCents_update_category', 10, 1);
}
function WordCents_category_add_form_fields($tag) {
	echo '<div class="form-field">
	<label for="cat_wordcents_code">Category Specific ad/HTML Code</label><br />
	<textarea name="cat_wordcents_code" rows="5"></textarea>
</div>';
}
function WordCents_category_edit_form_fields($tag) {
	$wordcents_codes = get_option("wordcents_codes", array());
	echo '<tr class="form-field">
	<th scope="row" valign="top">
		<label for="cat_wordcents_code">Category Specific ad/HTML Code</label>
	</th>
	<td>
		<textarea name="cat_wordcents_code" rows="5">'.(isset($wordcents_codes["cat_".$tag->term_id])?htmlspecialchars($wordcents_codes["cat_".$tag->term_id]):"").'</textarea>
	</td>
</tr>';
}
function WordCents_update_category($term_id) {
	$wordcents_codes = get_option("wordcents_codes", array());
	$wordcents_codes["cat_$term_id"] = stripslashes($_POST['cat_wordcents_code']);
	update_option("wordcents_codes", $wordcents_codes);
}
$selColumns = array(
'PAGE_VIEWS',
'PAGE_VIEWS_CTR',
'PAGE_VIEWS_RPM',
'AD_REQUESTS',
'AD_REQUESTS_COVERAGE',
'AD_REQUESTS_CTR',
'AD_REQUESTS_RPM',
'MATCHED_AD_REQUESTS',
'MATCHED_AD_REQUESTS_CTR',
'MATCHED_AD_REQUESTS_RPM',
'INDIVIDUAL_AD_IMPRESSIONS',
'INDIVIDUAL_AD_IMPRESSIONS_CTR',
'INDIVIDUAL_AD_IMPRESSIONS_RPM',
'CLICKS',
'EARNINGS',
'TOTAL_EARNINGS',
'COST_PER_CLICK');
$selGroups = array(
'DATE'=>'Day',
'WEEK'=>'Week',
'MONTH'=>'Month',
'DOMAIN_NAME'=>'Domain',
'COUNTRY_CODE'=>'Country');
function WordCents_dashboard_content() {
	global $selGroups, $apiAuthCredentials, $current_user, $Acounts, $auth, $selColumns;
	wp_get_current_user();
	$apiAuthCredentialTypes = array_keys($apiAuthCredentials);
	echo '<form action="" method="post" id="WordCents_auth_form" name="WordCents_auth_form"><input type="hidden" name="WordCents_account_id" value="WordCents_forget_token" /><input type="submit" class="button-primary" style="float: right; background-color: #FF0000 important;" value="Forget Token" /></form>
	<script>
	function hideNseek(hide, seek) {
		document.getElementById(hide).style.display=\'none\';
		document.getElementById(seek).style.display=\'block\';
		return false;
	}
	</script>
    <form action="" method="post" name="WordCents_account_form">';
    if (!is_active_widget(false, false, 'wordcents-widget', true))
        WordCents_message('The WordCents adSense Widget is not active yet! Please go to <a href="widgets.php">Widgets</a> and placed it on your sidebar.');
    if (isset($_GET['error']))
		WordCents_message($_GET['error'], 'error');
    if ($token = get_option('WordCents_oauth_token'.$current_user->ID)) {
    	echo '<div style="float: left; padding: 4px;">';
    	$Acounts = callSupportedAction('GetAllAccounts');
	    WordCents_account_options($Acounts,get_option('WordCents_account_id'.$current_user->ID));
	    $metricAr = get_option('WordCents_Metrics'.$current_user->ID);
		if (!(isset($metricAr) && is_array($metricAr)))
			$metricAr = array('AD_REQUESTS','INDIVIDUAL_AD_IMPRESSIONS');
	    $metricDr = get_option('WordCents_DateRange'.$current_user->ID);
		if (!(isset($metricDr) && is_numeric($metricDr)))
			$metricDr = 6;
	    $metricGr = get_option('WordCents_GroupBy'.$current_user->ID);
		if (!isset($metricGr))
			$metricGr = 'DATE';
	    $metricHTML = '<a style="float: right; border: solid 2px #C00; color: #C00; padding: 0 2px; margin: 2px;" href="#selColumns" onclick="javascript:return hideNseek(\'selColumns\',\'GooRaph\');">X</a><br><div style="float: right; padding: 0 2px; margin: 2px;">Date Range:<br><select name="WordCents_DateRange">';
	    for ($r=1;$r<13;$r++)
	    	$metricHTML .= '<option value="'.$r.'"'.($r==$metricDr?' selected':'').'>'.$r.' Months</option>';
        $metricHTML .= '</select><br><br>Group By:<br><select name="WordCents_GroupBy">';
	    foreach ($selGroups as $metric=>$gName)
	    	$metricHTML .= '<option value="'.$metric.'"'.($metric==$metricGr?' selected':'').'>'.$gName.'</option>';
        $metricHTML .= '</select></div>';
	    foreach ($selColumns as $metric)
	    	$metricHTML .= '<input type="checkbox" name="WordCents_Metrics[]" value="'.$metric.'"'.(in_array($metric,$metricAr)?' checked':'').'>'.str_replace('_',' ',$metric).'<br />';
        echo '</div><div style="float: left; padding: 4px;"><input type="button" class="button-primary" value="Selected metrics" onclick="hideNseek(\'GooRaph\',\'selColumns\');"></div><div style="float: left; padding: 4px;"><input type="submit" class="button-primary" style="background-color: #F00;" value="Update" /></div><br style="clear: left;"><div style="background-color: #CCC; display: none;" id="selColumns">'.$metricHTML.'</div><div id="GooRaph">';
        if (get_option('WordCents_account_id'.$current_user->ID))
			callSupportedAction('GenerateLineChart');
		else
			echo 'Choose an account and Click Update to see stats';
    	echo '</div>';
    } else {
        echo '<h4>Authenticate using Google\'s OAuth system to access your Analytics.</h4>';
		WordCents_account_options($apiAuthCredentialTypes,get_option('WordCents_oauth_type'.$current_user->ID));
        echo '<p><input type="submit" class="button-primary" value="Get OAuth Token from Google &raquo;" /></p><script>document.getElementById("WordCents_auth_form").style.display="none";</script>';
	}
    echo '</form>';
}
function WordCents_account_options($options, $value = '') {
	if(is_array($options) && count($options)) {
		echo '<select id="WordCents_account_id" name="WordCents_account_id">';
		foreach($options as $option_id => $option_name)
			echo '<option value="'.$option_id.'" '.($value==$option_id?'selected':'').'>'.$option_name.'</option>';
		echo '</select>';
	} elseif(strlen($options))
		echo $options;
	else
		echo 'No accounts available.';
}
function WordCents_message($message, $error="updated") {
     echo '<div id="message" class="'.$error.' fade"><p><strong>'.$message.'</strong></p></div>';
}
// Visit https://code.google.com/apis/console?api=adsense to generate your own oauth2_client_id, oauth2_client_secret, and register your oauth2_redirect_uri.
$apiCredentials = array(
		'ClientId'=>'351818883759.apps.googleusercontent.com',
		'ClientSecret'=>'m5w2PkzngTLi0YSOUEeDk66j',
		'RedirectUri'=>'http://wordpress.ieonly.com/wp-content/plugins/update/images/');
$apiAuthCredentials = array(
	'Return OAuth Token and Automatically Save to WordPress'=>$apiCredentials,
    'Display OAuth Token and Manually Copy and Paste to Save'=>array(
    	'ClientId'=>'351818883759-amof99hh4e69fgd04hbr00t7pe06j1h0.apps.googleusercontent.com',
		'ClientSecret'=>'d0xVJWZ4Xj31-FpZSsnhHL0J',
		'RedirectUri'=>'urn:ietf:wg:oauth:2.0:oob'));
$WordCents_images_path = plugins_url('/images/', __FILE__);
add_action('wp_dashboard_setup', 'WordCents_dashboard_setup'); 
add_action('admin_init', 'WordCents_admin_init'); 
register_activation_hook(__FILE__,$WordCents_plugin_dir.'_install');
add_action('widgets_init', create_function('', 'return register_widget("WordCents_Widget_Class");'));
$_SESSION['eli_debug_microtime']['end_include(WordCents)'] = microtime(true);
?>
