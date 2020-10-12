<?php
require_once ('../../private/initialize.php');
$id_terrain = $_GET['id_terrain'] ?? '';
require_client_login($id_terrain);

?>
<html>
<head>
    <link href="calendar.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php
include 'Calendar.php';
include 'Booking.php';
include 'BookableCell.php';
$_SESSION['id_terrain_reserv'] = $id_terrain;

$booking = new Booking(
    'localfoot',
    'localhost',
    'root',
    'dakar1996'
);

$bookableCell = new BookableCell($booking);

$calendar = new Calendar();

$calendar->attachObserver('showCell', $bookableCell);

$bookableCell->routeActions();

echo $calendar->show();
?>
<!-- Bootstrap core JavaScript-->


</body>
</html>