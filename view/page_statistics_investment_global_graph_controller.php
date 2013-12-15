<?php
include '../security/security_manager.php';

function __autoload($class_name)
{
	$file = '../controller/'.$class_name . '.php';
	if (!file_exists($file))
		$file = '../model/'.$class_name . '.php';
	include $file;
}

$accounts = '';
$i = $_POST['maximumIndex'];
for (--$i; $i >= 0; $i--)
{
	if (isset($_POST['account'.$i]))
	{
		$accounts = $accounts.$_POST['account'.$i].',';
	}
}

if (strlen($accounts) > 0)
	$accounts = rtrim($accounts, ",");

?>

<img src='page_statistics_investment_global_graph_yield.php?guid=<?= md5(uniqid(rand(),true)) ?>&accounts=<?= $accounts ?>' />
