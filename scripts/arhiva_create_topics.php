<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$query=mysql_query("SELECT * FROM `arhiva`");
while($k=mysql_fetch_array($query))
{
	//Creare topic
	$arhiva_nume=$k["arhiva_nume"];
	$arhiva_id=$k["arhiva_id"];
	
	mysql_select_db("ironcoders_forum");
	mysql_query("INSERT INTO `phpbb_topics` (`topic_id`, `forum_id`, `icon_id`, `topic_attachment`, `topic_approved`, `topic_reported`, `topic_title`, `topic_poster`, `topic_time`, `topic_time_limit`, `topic_views`, `topic_replies`, `topic_replies_real`, `topic_status`, `topic_type`, `topic_first_post_id`, `topic_first_poster_name`, `topic_first_poster_colour`, `topic_last_post_id`, `topic_last_poster_id`, `topic_last_poster_name`, `topic_last_poster_colour`, `topic_last_post_subject`, `topic_last_post_time`, `topic_last_view_time`, `topic_moved_id`, `topic_bumped`, `topic_bumper`, `poll_title`, `poll_start`, `poll_length`, `poll_max_options`, `poll_last_vote`, `poll_vote_change`) VALUES (NULL, '14', '0', '0', '1', '0', '$arhiva_nume', '2', '1410589375', '0', '0', '0', '0', '0', '0', '27', 'sorynsoo', 'AA0000', '27', '2', 'sorynsoo', 'AA0000', '$arhiva_nume', '1410589375', '1410589375', '0', '0', '0', '', '0', '0', '1', '0', '0')");

	$query2=mysql_query("SELECT * FROM `phpbb_topics` WHERE `topic_title` LIKE '$arhiva_nume'");
	$k2=mysql_fetch_array($query2);
	$topic_id=$k2["topic_id"];
	
	//updatez arhiva
	mysql_select_db("ironcoders");
	mysql_query("UPDATE `arhiva` SET `arhiva_topic_id` = '$topic_id' WHERE `arhiva`.`arhiva_id` = '$arhiva_id';");
	
	//creez posturi
	mysql_select_db("ironcoders_forum");
	$discutii="Discutii despre problema ".$arhiva_nume." .";
	mysql_query("INSERT INTO `phpbb_posts` (`post_id`, `topic_id`, `forum_id`, `poster_id`, `icon_id`, `poster_ip`, `post_time`, `post_approved`, `post_reported`, `enable_bbcode`, `enable_smilies`, `enable_magic_url`, `enable_sig`, `post_username`, `post_subject`, `post_text`, `post_checksum`, `post_attachment`, `bbcode_bitfield`, `bbcode_uid`, `post_postcount`, `post_edit_time`, `post_edit_reason`, `post_edit_user`, `post_edit_count`, `post_edit_locked`) VALUES (NULL, '$topic_id', '14', '2', '0', '188.24.156.40', '1410589375', '1', '0', '1', '1', '1', '1', '', '$arhiva_nume', '$discutii', '0cbc6611f5540bd0809a388dc95a615b', '0', '', '19dzij63', '1', '0', '', '0', '0', '0');");

	mysql_query("UPDATE `phpbb_forums` SET forum_posts = forum_posts+1, forum_topics_real = forum_topics_real+1 WHERE `phpbb_forums`.`forum_id` = 14;");
	
	}
?>