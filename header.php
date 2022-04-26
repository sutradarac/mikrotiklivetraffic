
<?php require_once('routeros_api.class.php'); ?>

<?php
	$ip_mik = "192.168.201.1";
	$port_mik = "8828";
	$username_mik = "read";
	$password_mik = "read";
?> 

<?php
	$API = new RouterosAPI();
	$API->debug = false;
	$API->connect($ip_mik, $port_mik, $username_mik, $password_mik);
 ?>


<!DOCTYPE html>
<html lang="en">
<?php $string="PGhlYWQ+DQoJICAgIDxtZXRhIGNoYXJzZXQ9IlVURi04IiAvPg0KCSAgICA8bWV0YSBuYW1lPSJ2aWV3cG9ydCIgY29udGVudD0id2lkdGg9ZGV2aWNlLXdpZHRoLCBpbml0aWFsLXNjYWxlPTEsIG1heGltdW0tc2NhbGU9MSIgLz4NCgkgICAgPHRpdGxlPkd0bG8gSW50ZXJmYWNlIEdyYXBoPC90aXRsZT4NCgkgICAgPG1ldGEgbmFtZT0iZGVzY3JpcHRpb24iIGNvbnRlbnQ9IlRyYWZmaWMgSW50ZXJmYWNlIGZvciBHdGxvLiIgLz4gICAgDQoJCTxsaW5rIHJlbD0ic3R5bGVzaGVldCIgaHJlZj0ic3R5bGUuY3NzIiAvPg0KCQk8bGluayByZWw9InN0eWxlc2hlZXQiIGhyZWY9ImJzLW1pbi5jc3MiIC8+DQoJCTxsaW5rIHJlbD0ic3R5bGVzaGVldCIgaHJlZj0iaHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS9hamF4L2xpYnMvZm9udC1hd2Vzb21lLzYuMS4xL2Nzcy9hbGwubWluLmNzcyIgLz4NCgkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vY2RuanMuY2xvdWRmbGFyZS5jb20vYWpheC9saWJzL2pxdWVyeS8zLjYuMC9qcXVlcnkubWluLmpzIj48L3NjcmlwdD4NCgkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vY2RuanMuY2xvdWRmbGFyZS5jb20vYWpheC9saWJzL2hpZ2hjaGFydHMvMTAuMC4wL2hpZ2hjaGFydHMubWluLmpzIj48L3NjcmlwdD4NCgkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vY2RuanMuY2xvdWRmbGFyZS5jb20vYWpheC9saWJzL2hpZ2hjaGFydHMvMTAuMC4wL21vZHVsZXMvZXhwb3J0aW5nLm1pbi5qcyI+PC9zY3JpcHQ+DQoJPC9oZWFkPg0KICAJPGJvZHk+DQogIAkJPGRpdiBjbGFzcz0iY29udGFpbmVyIHB0LTIiPg==";echo base64_decode($string);?>