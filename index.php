<?php
$handle = opendir("./projects");

$escape = array('./projects/.', './projects/..');

$projects = array();

while (($file = readdir($handle))!==false) {
	$file = "./projects/{$file}";
	if (is_dir($file) && !in_array($file, $escape)) {
		if (strlen(glob("{$file}/artisan")[0]) != 0) {
			$project["name"] = $file;
			$project["type"] = "Laravel";
			array_push($projects, $project);
		}
		else {
			$project["name"] = $file;
			$project["type"] = "Default";
			array_push($projects, $project);
		}
	}
}
?>