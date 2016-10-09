<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Client Details</title>
</head>

<body>

<?php
// Skal hente parameter (cid), så den kan definere cid længere nede (skal altid være = bind_param)
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';
// SELECT-linjen: Vælger hvilke kollonner der skal benyttes
// FROM-linjen: hvilke tabeller bliver brugt?
// WHERE-linjen: når client_id er "x"
// AND-linjen: dækker over forbindelsen mellem tabellerne
$sql = 'SELECT c.client_name, c.client_adress, z.Zipcode_id, z.city, c.client_contact_person, c. client_contact_phone
FROM project p, client c, Zipcode z
WHERE client_id=?
AND c.client_id = p.client_client_id
AND c.Zipcode_id = z.Zipcode_id';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($cnam, $cadd, $zip, $zcity, $ccp, $cph);
?>
<ul>
<?php 
// Når statement er sat, skal den fetche (køre nedenstående)
while($stmt->fetch()) {
echo '<h1>Name: '.$cnam.'</h1>';
echo '<li>Adress: '.$cadd.'</li>';
echo '<li>Zipcode.: '.$zip.'</li>';
echo '<li>City: '.$zcity.'</li>';
echo '<li>Client-contactperson: '.$ccp.'</li>';
echo '<li>Client-contactnumber: '.$cph.'</li>';
}
?>
<a href="clientlist.php">See all clients</a>
</ul>

<?php 
// Skal hente parameter (cid), så den kan definere cid længere nede (skal altid være = bind_param)
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die ('Missing/illegal parameter');

require_once 'dbcon.php';
// SELECT-linjen: Vælger hvilke kollonner der skal benyttes
// FROM-linjen: hvilke tabeller bliver brugt?
// WHERE-linjen: når client_id er "x"
// AND-linjen: dækker over forbindelsen mellem tabellerne
$sql = 'SELECT p.project_id, p.project_name, p.project_startdate, p.project_enddate, p.project_detail
FROM project p
WHERE p.project_id=?';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $cid);
$stmt->execute();
$stmt->bind_result($pid, $pnam, $psd, $ped, $det);

while($stmt->fetch()) {}
?>
<h1>Project</h1>
<h3><?=$pnam?></h3>
<p>
Startdate: <?=$psd?><br>
Enddate: <?=$ped?>
</p>
<p>Comment to Project: <?=$pdet?></p>
<a href="projectlist.php">Back to Projectlist</a>

</body>
</html>