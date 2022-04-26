
	<script> 
		function formatBytes(a,b){if(0==a)return"0 Bytes";var c=1024,d=b||2,e=["Bytes","KB","MB","GB","TB","PB","EB","ZB","YB"],f=Math.floor(Math.log(a)/Math.log(c));return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]}

		var chart;
		function requestDatta(interface,type_interface) {
			$.ajax({
				url: 'data.php?interface='+interface+'&type_interface='+type_interface,
				datatype: "json",
				success: function(data) {
					var midata = JSON.parse(data);
					if( midata.length > 0 ) {
						var TX=parseInt(midata[0].data);
						var RX=parseInt(midata[1].data);
						var x = (new Date()).getTime(); 
						shift=chart.series[0].data.length > 19;
						chart.series[0].addPoint([x, TX], true, shift);
						chart.series[1].addPoint([x, RX], true, shift);
						document.getElementById("trafik").innerHTML=formatBytes(TX) + " / " + formatBytes(RX);
					}else{
						document.getElementById("trafik").innerHTML="- / -";
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) { 
					console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
				}       
			});
		}	

		$(document).ready(function() {
				Highcharts.setOptions({
					global: {
						useUTC: false
					},
				    colors: ['#40d30e', '#8085e9', '#8d4654', '#7798BF', '#aaeeee',
				        '#ff0066', '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
				    chart: {
				        backgroundColor: null,
				    },
				    title: {
				        style: {
				            color: 'black',
				            fontSize: '16px',
				            fontWeight: 'bold'
				        }
				    },
				    subtitle: {
				        style: {
				            color: 'black'
				        }
				    },
				    tooltip: {
				        borderWidth: 5
				    },
				    legend: {
				        itemStyle: {
				            fontWeight: 'bold',
				            fontSize: '13px'
				        }
				    },
				    xAxis: {
						gridLineWidth: 1,
				        labels: {
				            style: {
				                color: '#6e6e70'
				            }
				        }
				    },
				    yAxis: {
				    	gridLineWidth: 1,
				        labels: {
				            style: {
				                color: '#6e6e70'
				            }
				        }
				    },
				    navigator: {
				        xAxis: {
				            gridLineColor: '#D0D0D8'
				        }
				    },
				    scrollbar: {
				        trackBorderColor: '#C0C0C8'
				    },
				});
		

	           chart = new Highcharts.Chart({
				   chart: {
					plotOptions: {
				        line: {
				            fillOpacity: 0.5
				        }
				    },
	        		type: 'spline',
					renderTo: 'container',
					animation: Highcharts.svg,
					events: {
						load: function () {
							setInterval(function () {
								var e = document.getElementById("type_interface");
								var type_interface = e.options[e.selectedIndex].value;
								requestDatta(document.getElementById("interface").value,type_interface);
							}, 1000);
						}				
				}
			 },
			 title: {
				text: 'بارك الله لك'
			 },
			 xAxis: {
				type: 'datetime',
					tickPixelInterval: 60,
					maxZoom: 10 * 2000
			 },
			yAxis: {
				title: {
					text: '',
					margin: 0
				},
				labels: {
	              formatter: function () {
	                var bytes = this.value;
	                var sizes = ['b', 'kb', 'Mb', 'Gb', 'Tb'];
	                if (bytes == 0) return '0 bps';
	                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
	              },
	            },
			},
			tooltip: {
	            formatter: function() {
	                var bytes = this.y;                          
	                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
	                if (bytes == 0) return '0 bps';
	                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	                return '<b>'+ this.series.name +'</b>'+': '+parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i]+'<br>';
	            }
	        },
	            series: [{
	                name: '(TX)',
	                data: [],
	                dashStyle: 'dash'
	            }, {
	                name: '(RX)',
	                data: [],
	                dashStyle: 'dash'
	            }]
		  });
	  });
	</script>
<?php $string = "Cgo8Zm9vdGVyPgogICAgICAgIDxkaXYgY2xhc3M9ImZvb3Rlci1jb250ZW50Ij4KICAgICAgICAgIDxkaXYgY2xhc3M9ImNvbnRhaW5lciI+CiAgICAgICAgICAgIDxkaXYgY2xhc3M9InJvdyI+CiAgICAgICAgICAgICAgPGRpdiBjbGFzcz0iY29sLTEyIGNvbC1zbS02Ij4KICAgICAgICAgICAgICAgIDxwIGNsYXNzPSJtYi0wIHRleHQtbXV0ZWQgdGV4dC1tZWRpdW0iPlNhcmFuZyBJRCBEZXYgMjAyMjwvcD4KICAgICAgICAgICAgICA8L2Rpdj4KICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJjb2wtc20tNiBkLW5vbmUgZC1zbS1ibG9jayI+CiAgICAgICAgICAgICAgICA8dWwgY2xhc3M9ImJyZWFkY3J1bWIgcHQtMCBwZS0wIG1iLTAgZmxvYXQtZW5kIj4KICAgICAgICAgICAgICAgICAgPGxpIGNsYXNzPSJicmVhZGNydW1iLWl0ZW0gbWItMCB0ZXh0LW1lZGl1bSI+CiAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj0iaHR0cHM6Ly9hcGkud2hhdHNhcHAuY29tL3NlbmQvP3Bob25lPTYyODIyMjM5Njc2NzYmdGV4dD10cmFmZmljaW50ZXJmYWNlJmFwcF9hYnNlbnQ9MCIgdGFyZ2V0PSJfYmxhbmsiIGNsYXNzPSJidG4tbGluayI+UmV2aWV3PC9hPgogICAgICAgICAgICAgICAgICA8L2xpPgogICAgICAgICAgICAgICAgICA8bGkgY2xhc3M9ImJyZWFkY3J1bWItaXRlbSBtYi0wIHRleHQtbWVkaXVtIj4KICAgICAgICAgICAgICAgICAgICA8YSBocmVmPSJodHRwczovL2FwaS53aGF0c2FwcC5jb20vc2VuZC8/cGhvbmU9NjI4MjIyMzk2NzY3NiZ0ZXh0PXRyYWZmaWNpbnRlcmZhY2UmYXBwX2Fic2VudD0wIiB0YXJnZXQ9Il9ibGFuayIgY2xhc3M9ImJ0bi1saW5rIj5QdXJjaGFzZTwvYT4KICAgICAgICAgICAgICAgICAgPC9saT4KICAgICAgICAgICAgICAgICAgPGxpIGNsYXNzPSJicmVhZGNydW1iLWl0ZW0gbWItMCB0ZXh0LW1lZGl1bSI+CiAgICAgICAgICAgICAgICAgIAk8YSBocmVmPSJodHRwczovL2FwaS53aGF0c2FwcC5jb20vc2VuZC8/cGhvbmU9NjI4MjIyMzk2NzY3NiZ0ZXh0PXRyYWZmaWNpbnRlcmZhY2UmYXBwX2Fic2VudD0wIiBjbGFzcz0iYnRuLWxpbmsiPkRvY3M8L2E+PC9saT4KICAgICAgICAgICAgICAgIDwvdWw+CiAgICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgICAgIDwvZGl2PgogICAgICAgICAgPC9kaXY+CiAgICAgICAgPC9kaXY+CiAgICAgIDwvZm9vdGVyPgogIAk8L2Rpdj4KICA8L2JvZHk+CjwvaHRtbD4=";echo base64_decode($string);?>