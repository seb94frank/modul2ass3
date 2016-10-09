<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Project List</title>
</head>

<body>
<h1>Projects</h1>
<ul>
<?php
require_once 'dbcon.php';
// Henter projekt ID og projekt Navn fra Projekt tabel
$sql = 'SELECT p.project_id, p.project_name FROM project p';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($pid, $pnam);
// Viser listen af projekter
while($stmt->fetch()) {
	// $pid = projekt_ID, $pnam = Project_name (eks. <a href="projectdetails.php?pid=1">Projekt1<a/>
	echo '<li><a href="projectdetails.php?pid='.$pid.'">'.$pnam.'</a></li>'.PHP_EOL;
}
?>
</ul>

</body>
</html>