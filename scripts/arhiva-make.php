<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$arhiva_nume=NULL; $arhiva_nume=secure($_POST["arhiva_nume"]);
$arhiva_autor=NULL; $arhiva_autor=secure($_POST["arhiva_autor"]);
$arhiva_cerinta=NULL; $arhiva_cerinta=secure_just_mysql($_POST["arhiva_cerinta"]);
$arhiva_timp=NULL; $arhiva_timp=secure($_POST["arhiva_timp"]);
$arhiva_memorie=NULL; $arhiva_memorie=secure($_POST["arhiva_memorie"]);
$arhiva_grupa=NULL; $arhiva_grupa=secure($_POST["arhiva_grupa"]);

if($arhiva_grupa=="Mica" || $arhiva_grupa=="Mică")
	$arhiva_grupa_nr=1;
if($arhiva_grupa=="Medie")
	$arhiva_grupa_nr=2;
if($arhiva_grupa=="Mare")
	$arhiva_grupa_nr=3;
if($arhiva_grupa=="Toate")
	$arhiva_grupa_nr=4;
		
$arhiva_sursa=NULL; $arhiva_sursa=secure($_POST["arhiva_sursa"]);
$arhiva_autor=NULL; $arhiva_autor=secure($_POST["arhiva_autor"]);
$arhiva_afiseaza=NULL; $arhiva_afiseaza=secure($_POST["arhiva_afiseaza2"]);
$arhiva_categorii2=NULL; $arhiva_categorii2=$_POST["arhiva_categorii"]; $arhiva_categorii=NULL;
for($i=0; $i<count($arhiva_categorii2); $i++)
	$arhiva_categorii=$arhiva_categorii.",".secure($arhiva_categorii2[$i]);
	
$arhiva_adaugat_de=$user_name;
echo $arhiva_afiseaza;

$arhiva_numar_teste=count($_FILES['upload']['name']);


if($arhiva_nume!=NULL)
{

$cale= ROOT."evaluator/arhiva/";
mkdir($cale.$arhiva_nume, 0777, true);
mkdir($cale.$arhiva_nume.'/tests', 0777, true);
mkdir($cale.$arhiva_nume.'/sources', 0777, true);
mkdir($cale.$arhiva_nume.'/outputs', 0777, true);
mkdir($cale.$arhiva_nume.'/errors', 0777, true);


for($i=0; $i<$arhiva_numar_teste; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = $cale.$arhiva_nume."/tests/". $_FILES['upload']['name'][$i];

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      //Handle other code here

    }
  }
}

$arhiva_numar_teste/=2;


//CREARE TOPIC & POST pe forum
mysql_select_db("ironcoders_forum");
mysql_query("INSERT INTO `phpbb_topics` (`topic_id`, `forum_id`, `icon_id`, `topic_attachment`, `topic_approved`, `topic_reported`, `topic_title`, `topic_poster`, `topic_time`, `topic_time_limit`, `topic_views`, `topic_replies`, `topic_replies_real`, `topic_status`, `topic_type`, `topic_first_post_id`, `topic_first_poster_name`, `topic_first_poster_colour`, `topic_last_post_id`, `topic_last_poster_id`, `topic_last_poster_name`, `topic_last_poster_colour`, `topic_last_post_subject`, `topic_last_post_time`, `topic_last_view_time`, `topic_moved_id`, `topic_bumped`, `topic_bumper`, `poll_title`, `poll_start`, `poll_length`, `poll_max_options`, `poll_last_vote`, `poll_vote_change`) VALUES (NULL, '14', '0', '0', '1', '0', '$arhiva_nume', '2', '1410589375', '0', '0', '0', '0', '0', '0', '27', 'sorynsoo', 'AA0000', '27', '2', 'sorynsoo', 'AA0000', '$arhiva_nume', '1410589375', '1410589375', '0', '0', '0', '', '0', '0', '1', '0', '0')");

$query=mysql_query("SELECT * FROM `phpbb_topics` WHERE `topic_title` LIKE '$arhiva_nume'");
$k=mysql_fetch_array($query);
$topic_id=$k["topic_id"];

mysql_select_db("ironcoders");
mysql_query("INSERT INTO `arhiva` (`arhiva_id`, `arhiva_nume`, `arhiva_adaugat_de`,`arhiva_sursa`,`arhiva_autor`, `arhiva_cerinta`, `arhiva_timp`, `arhiva_memorie`, `arhiva_grupa`, `arhiva_numar_teste`, `arhiva_categorii`, `arhiva_afiseaza`,`arhiva_topic_id`, `arhiva_grupa_nr`) VALUES (NULL, '$arhiva_nume', '$arhiva_adaugat_de','$arhiva_sursa','$arhiva_autor', '$arhiva_cerinta', '$arhiva_timp', '$arhiva_memorie', '$arhiva_grupa', '$arhiva_numar_teste', '$arhiva_categorii', '$arhiva_afiseaza','$topic_id', '$arhiva_grupa_nr');") or die(mysql_error());

mysql_select_db("ironcoders_forum");
$discutii="Discutii despre problema ".$arhiva_nume." .";
mysql_query("INSERT INTO `phpbb_posts` (`post_id`, `topic_id`, `forum_id`, `poster_id`, `icon_id`, `poster_ip`, `post_time`, `post_approved`, `post_reported`, `enable_bbcode`, `enable_smilies`, `enable_magic_url`, `enable_sig`, `post_username`, `post_subject`, `post_text`, `post_checksum`, `post_attachment`, `bbcode_bitfield`, `bbcode_uid`, `post_postcount`, `post_edit_time`, `post_edit_reason`, `post_edit_user`, `post_edit_count`, `post_edit_locked`) VALUES (NULL, '$topic_id', '14', '2', '0', '188.24.156.40', '1410589375', '1', '0', '1', '1', '1', '1', '', '$arhiva_nume', '$discutii', '0cbc6611f5540bd0809a388dc95a615b', '0', '', '19dzij63', '1', '0', '', '0', '0', '0');");

mysql_query("UPDATE `phpbb_forums` SET forum_posts = forum_posts+1, forum_topics_real = forum_topics_real+1 WHERE `phpbb_forums`.`forum_id` = 14;");
}

header('Location: /arhiva.php?type=view&name='.$arhiva_nume);

?>

