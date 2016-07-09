<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$cursuri_nume=NULL; $cursuri_nume=secure($_POST["cursuri_nume"]);
$cursuri_descriere=NULL; $cursuri_descriere=secure($_POST["cursuri_descriere"]);
$cursuri_oficial=NULL; $cursuri_oficial=secure($_POST["cursuri_oficial"]);
$cursuri_adaugat_de=$user_name;

$path = $_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$file_name=$cursuri_nume.".".$ext;
if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="img")
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
	$cale= ROOT."img/cursuri/";
	// creez imaginea
    move_uploaded_file($_FILES["file"]["tmp_name"],$cale . $file_name);
   }
  }

  

mysql_query("INSERT INTO `cursuri` (`cursuri_id`, `cursuri_nume`, `cursuri_facut_de`, `cursuri_grupe_titlu`, `cursuri_lectii_grupe`, `cursuri_grupe_descriere`, `cursuri_lectii_titlu`, `cursuri_lectii_explicatii`, `cursuri_lectii_instructiuni`, `cursuri_descriere`, `cursuri_background`, `cursuri_oficial`, `cursuri_afiseaza`) VALUES ('', '$cursuri_nume', '$cursuri_adaugat_de', '', '', '', '', '', '', '$cursuri_descriere', '$file_name', '$cursuri_oficial', '')");
header('Location: /cursuri.php?type=edit&name='.$cursuri_nume);
?>