<?php

$smarty = \CODOF\Smarty\Single::get_instance();

$db = \DB::getPDO();
$content = $smarty->fetch('spam/mldetect.tpl');
