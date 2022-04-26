<?php $string = "CjwhRE9DVFlQRSBodG1sPgo8aHRtbCBsYW5nPSJlbiI+Cgk8aGVhZD4KCSAgICA8bWV0YSBjaGFyc2V0PSJVVEYtOCIgLz4KCSAgICA8bWV0YSBuYW1lPSJ2aWV3cG9ydCIgY29udGVudD0id2lkdGg9ZGV2aWNlLXdpZHRoLCBpbml0aWFsLXNjYWxlPTEsIG1heGltdW0tc2NhbGU9MSIgLz4KCSAgICA8dGl0bGU+R3RsbyBJbnRlcmZhY2UgR3JhcGg8L3RpdGxlPgoJICAgIDxtZXRhIG5hbWU9ImRlc2NyaXB0aW9uIiBjb250ZW50PSJUcmFmZmljIEludGVyZmFjZSBmb3IgR3Rsby4iIC8+CgkgICAgPGxpbmsgcmVsPSJzaG9ydGN1dCBpY29uIiBocmVmPWZhdmljb24ucG5nPgoJICAgIDxsaW5rIHJlbD0ic3R5bGVzaGVldCIgaHJlZj0ic3R5bGUuY3NzIiAvPgoJCTxsaW5rIHJlbD0ic3R5bGVzaGVldCIgaHJlZj0iYnMtbWluLmNzcyIgLz4KCQk8bGluayByZWw9InN0eWxlc2hlZXQiIGhyZWY9Imh0dHBzOi8vY2RuanMuY2xvdWRmbGFyZS5jb20vYWpheC9saWJzL2ZvbnQtYXdlc29tZS82LjEuMS9jc3MvYWxsLm1pbi5jc3MiIC8+CgkJPHNjcmlwdCBzcmM9Imh0dHBzOi8vY2RuanMuY2xvdWRmbGFyZS5jb20vYWpheC9saWJzL2pxdWVyeS8zLjYuMC9qcXVlcnkubWluLmpzIj48L3NjcmlwdD4KCQk8c2NyaXB0IHNyYz0iaHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS9hamF4L2xpYnMvaGlnaGNoYXJ0cy8xMC4wLjAvaGlnaGNoYXJ0cy5taW4uanMiPjwvc2NyaXB0PgoJCTxzY3JpcHQgc3JjPSJodHRwczovL2NkbmpzLmNsb3VkZmxhcmUuY29tL2FqYXgvbGlicy9oaWdoY2hhcnRzLzEwLjAuMC9tb2R1bGVzL2V4cG9ydGluZy5taW4uanMiPjwvc2NyaXB0PgoJCTxzY3JpcHQgc3JjPSIvL2Nkbi5qc2RlbGl2ci5uZXQvbnBtL3N3ZWV0YWxlcnQyQDExIj48L3NjcmlwdD4KCgk8L2hlYWQ+CiAgCTxib2R5PgogIAkJPGRpdiBjbGFzcz0iY29udGFpbmVyIHB0LTIiPgoKCg==";echo base64_decode($string);
?>
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

