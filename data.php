
<?php require_once('routeros_api.class.php'); ?>

<?php
$ip_mik = "192.168.201.1";
$port_mik = "8828";
$username_mik = "read";
$password_mik = "read";
                        
$Interface = $_GET["interface"];
$Type = $_GET["type_interface"];
	$API = new RouterosAPI();
	$API->debug = false;
	if ($API->connect($ip_mik, $port_mik, $username_mik, $password_mik)) {
		   $rows = array();
		   $rows2 = array();
		   
		   if ($Type==0) { 
			   $API->write("/interface/monitor-traffic",false);
			   $API->write("=interface=".$Interface,false);  
			   $API->write("=once=",true);
			   $READ = $API->read(false);
			   $ARRAY = $API->parseResponse($READ);
				if(count($ARRAY)>0){  
					$rx = ($ARRAY[0]["rx-bits-per-second"]);
					$tx = ($ARRAY[0]["tx-bits-per-second"]);
					$rows['name'] = 'Tx';
					$rows['data'][] = $tx;
					$rows2['name'] = 'Rx';
					$rows2['data'][] = $rx;
				}
			}else if($Type==1){
			   $API->write("/queue/simple/print",false);
			   $API->write("=stats",false);
			   $API->write("?name=".$Interface,true);  
			   $READ = $API->read(false);
			   $ARRAY = $API->parseResponse($READ);
			   print_r($ARRAY[0]);
				if(count($ARRAY)>0){  
					$rx = explode("/",$ARRAY[0]["rate"])[1];
					$tx = explode("/",$ARRAY[0]["rate"])[1];
					$rows['name'] = 'Tx';
					$rows['data'][] = $tx;
					$rows2['name'] = 'Rx';
					$rows2['data'][] = $rx;
				}else{  
					echo $ARRAY['!trap'][0]['message'];	 
				} 
			}


			$ConnectedFlag = true;
	}else{
		echo "
	<script>
		Swal.fire({
		icon: 'error',
		showconfirmButton: true,
		title: 'Gagal Masuk',
		text: 'Periksa Kembali Username dan Password yang Anda Masukkan',
		confirmButtonText: 'Sensitif Huruf Besar Dan Huruf Kecil',
		showClass: {
			popup: 'animated bounceInLeft'},
		hideClass: {
			popup: 'animated fadeOutUp'}
		})
	</script>";
	}

	if ($ConnectedFlag) {
		$result = array();
		array_push($result,$rows);
		array_push($result,$rows2);
		print json_encode($result, JSON_NUMERIC_CHECK);
	}
	$API->disconnect();

?>