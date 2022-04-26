
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	    <title>Gtlo Interface Graph</title>
	    <meta name="description" content="Traffic Interface for Gtlo." />
	    <link rel="shortcut icon" href=favicon.png>
	    <link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="bs-min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.0.0/highcharts.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.0.0/modules/exporting.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	</head>
  	<body>
  		<div class="container pt-2">



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
	if($API->connect($ip_mik, $port_mik, $username_mik, $password_mik)){		
		$API->write('/interface/print');
		$ARRAY = $API->read();
		$data = $ARRAY; 
		echo "<script>
				Swal.fire({
				  icon: 'success',
				  title: 'Terhubung',
				  text: 'Berhasil Terhubung ke Mikrotik',
				  footer: 'Selamat Menikati Realtime Mikrotik'
				})
			  </script>";
		$ConnectedFlag = true;
	}
	else{
		echo "<script>
				Swal.fire({
				  icon: 'error',
				  title: 'Disconnect',
				  text: 'Tidak Dapat Terhubung ke Mikrotik',
				  footer: 'Periksa IP Port Username dan Password'
				})
			  </script>";
	}
 ?>

