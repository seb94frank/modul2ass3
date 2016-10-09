<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Resource List</title>
</head>

<body>

<h1>Change resource by clicking</h1>

<ul>
<!--Lister resourcerne, så man kan se alle de resourcerne der findes i databasen-->
<?php
require_once 'dbcon.php';
$sql = 'SELECT r.resources_id, r.resources_name, rt.resource_type_name
FROM resources r, resource_type rt
where r.resource_type_resource_type_id=rt.resource_type_id';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($rid, $rnam, $rtnam);

while($stmt->fetch()) {
	echo '<li><a href="editresform.php?rid='.$rid.'">'.$rnam.' ('.$rtnam.')</a></li>'.PHP_EOL;
}


?>
</ul>
<br><br><br>
<a href="projectlist.php">Back to Projectlist</a><br>
</body>
</html>