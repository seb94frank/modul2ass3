<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client List</title>
</head>

<body>
<h2>Clients</h2>
<?php
require_once 'dbcon.php';
// Henter Client ID og Client Navn fra Client tabel
$sql = 'SELECT c.client_id, c.client_name FROM client c';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);
// Viser listen af Clients
while($stmt->fetch()) {
	// $cid = client_ID, $cnam = Client_name (eks. <a href="clientdetails.php?cid=1">client1<a/>
	echo '<li><a href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}


?>

</body>
</html>