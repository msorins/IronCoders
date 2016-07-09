<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$query=mysql_query("SELECT * FROM `competitii`");
while($k=mysql_fetch_array($query))
{
		$date1 = strtotime($k["competitii_data_incepere"]);
		$date2 = time();
		$subTime = $date1 - $date2;
		$m = ($subTime/60);
	if($k["competitii_status"]=="In asteptare")
	{
		if($m<=0)
		{
			$id=$k["competitii_id"];
			mysql_query("UPDATE `competitii` SET `competitii_status` = 'In desfasurare' WHERE `competitii`.`competitii_id` = '$id'");
		}
	}
	if($k["competitii_status"]=="In desfasurare")
	{
		if($m<0)
			$m=-$m;
		if($m>=$k["competitii_durata"])
		{
			$id=$k["competitii_id"];
			mysql_query("UPDATE `competitii` SET `competitii_status` = 'Terminat' WHERE `competitii`.`competitii_id` = '$id'");
			
		if($k["competitii_oficial"]==1)
		{
			$name=$k["competitii_nume"];
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_contest` LIKE '$name'");
			//populez userii si numarul de puncte luate la fiecare problema & nr de puncte total
			$puncte_total_aux=NULL; $puncte_total=NULL; $puncte=NULL; $user=NULL; $nr_user=0;
			while($k2=mysql_fetch_array($query2))
			{
				$ok=true;
				for($i=0; $i<$nr_user; $i++)
					if($user[$i]==$k2["job_owner"])
					{
						$ok=false;
						$id=$i;
						break;
					}
				if($ok==true)
				{
					$user[$nr_user]=$k2["job_owner"];
					$id=$nr_user;
					$nr_user++;
				}
				for($i=0; $i<count($probleme); $i++)
					if($probleme[$i]==$k2["job_problem_name"])
						{
							$id_problem=$i;
							break;
						}
				//if($k2["job_total_points"]>=$puncte[$id][$id_problem])
				//{
				$puncte_total[$id]=$puncte_total[$id]-$puncte[$id][$id_problem]+$k2["job_total_points"];
				$puncte_total_aux[$id]=$puncte_total[$id];
				$puncte[$id][$id_problem]=$k2["job_total_points"];
				//}
			}
			//sortez userii dupa punctajul total;
			$sort=NULL;
			for($i=0; $i<$nr_user; $i++)
				$sort[$i]=$i;
			for($i=0; $i<$nr_user; $i++)
			{
				for($j=$i+1; $j<$nr_user; $j++)
				{
					if($puncte_total_aux[$i]<$puncte_total_aux[$j])
					{
						$aux=$puncte_total_aux[$i];
						$puncte_total_aux[$i]=$puncte_total_aux[$j];
						$puncte_total_aux[$j]=$aux;
						
						$aux=$sort[$i];
						$sort[$i]=$sort[$j];
						$sort[$j]=$aux;
					}
				}
			}
			 $us=$user[$sort[0]];
			 mysql_query("UPDATE `phpbb_users` SET `user_puncte_competitii` = `user_puncte_competitii`+30 WHERE `phpbb_users`.`username_clean` = '$us';");
			 
			 if($nr_user>=2)
			 {
			  $us=$user[$sort[1]];
			 mysql_query("UPDATE `phpbb_users` SET `user_puncte_competitii` = `user_puncte_competitii`+20 WHERE `phpbb_users`.`username_clean` = '$us';");
			 }
			 
			 if($nr_user>=3)
			 {
			  $us=$user[$sort[2]];
			 mysql_query("UPDATE `phpbb_users` SET `user_puncte_competitii` = `user_puncte_competitii`+10 WHERE `phpbb_users`.`username_clean` = '$us';");
			 }
		}
		}
	
	}
}
//header('Location: /competitii.php');
?>

