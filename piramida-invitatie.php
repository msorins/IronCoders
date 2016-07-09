<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$piramida_nume=NULL; $piramida_nume=secure($_POST["piramida_nume"]);
$piramida_mail=NULL; $piramida_mail=secure($_POST["piramida_mail"]);
$piramida_nr_carti=NULL; $piramida_nr_carti=secure($_POST["piramida_nr_carti"]);
$piramida_tip_actiune=NULL; $piramida_tip_actiune=secure($_POST["piramida_tip_actiune"]);
$piramida_stare_carti=NULL; $piramida_stare_carti=secure($_POST["piramida_stare_carti"]);
$piramida_oferta_voluntar=NULL; $piramida_oferta_voluntar=secure($_POST["piramida_oferta_voluntar"]);
$piramida_alte_proiecte=NULL; $piramida_alte_proiecte=secure($_POST["piramida_alte_proiecte"]);

mysql_query("INSERT INTO `piramida` (`piramida_id`, `piramida_nume`, `piramida_mail`, `piramida_nr_carti`, `piramida_tip_actiune`, `piramida_stare_carti`, `piramida_oferta_voluntar`, `piramida_alte_proiecte`) VALUES (NULL, '$piramida_nume', '$piramida_mail', '$piramida_nr_carti', '$piramida_tip_actiune', '$piramida_stare_carti', '$piramida_oferta_voluntar', '$piramida_alte_proiecte');");


$to      = $piramida_mail;
$subject = 'Ai carte ... ai piramida';
$message = '
<h1>Bună!</h1>
<p> 
<br>Îți mulțumim mult pentru implicarea în proiectul nostru. Daca vrei sa ne ajuti, te invitam in ziua data la ora in locatia să ne cunoaștem, să discutăm și să vedem ce putem îmbunătăți la noi și la acest proiect. 
<br>Te invităm să vii cu propuneri pentru alte proiecte la care vrei să iei parte sau pe care vrei să le demarezi și noi vom veni în ajutorul tău. 

<br><br>“Adunarea generală” va avea loc în ziua de Y, -.03.2015 în Tea Spot/Ceai et caetera de la ora X. 
<br>
<br>Cu prietenie, 
<br>Echipa Piramida Cartilor
</p>
';
$headers = "From: piramida.cartilor@ironcoders.com";

mail($to, $subject, strip_tags($message), $headers);


header('Location: /piramida.php?type=success');

?>

