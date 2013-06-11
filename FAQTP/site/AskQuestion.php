<?php
session_start();
if ( $_SESSION['angemeldet'] == true ) {
	echo("juhu");
} else {
	echo("hmpf");
}
?>