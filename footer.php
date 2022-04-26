
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
<?php $string="PGZvb3Rlcj4NCiAgICAgICAgPGRpdiBjbGFzcz0iZm9vdGVyLWNvbnRlbnQiPg0KICAgICAgICAgIDxkaXYgY2xhc3M9ImNvbnRhaW5lciI+DQogICAgICAgICAgICA8ZGl2IGNsYXNzPSJyb3ciPg0KICAgICAgICAgICAgICA8ZGl2IGNsYXNzPSJjb2wtMTIgY29sLXNtLTYiPg0KICAgICAgICAgICAgICAgIDxwIGNsYXNzPSJtYi0wIHRleHQtbXV0ZWQgdGV4dC1tZWRpdW0iPlNhcmFuZyBJRCBEZXYgMjAyMjwvcD4NCiAgICAgICAgICAgICAgPC9kaXY+DQogICAgICAgICAgICAgIDxkaXYgY2xhc3M9ImNvbC1zbS02IGQtbm9uZSBkLXNtLWJsb2NrIj4NCiAgICAgICAgICAgICAgICA8dWwgY2xhc3M9ImJyZWFkY3J1bWIgcHQtMCBwZS0wIG1iLTAgZmxvYXQtZW5kIj4NCiAgICAgICAgICAgICAgICAgIDxsaSBjbGFzcz0iYnJlYWRjcnVtYi1pdGVtIG1iLTAgdGV4dC1tZWRpdW0iPg0KICAgICAgICAgICAgICAgICAgICA8YSBocmVmPSJodHRwczovL2FwaS53aGF0c2FwcC5jb20vc2VuZC8/cGhvbmU9NjI4MjIyMzk2NzY3NiZ0ZXh0PXRyYWZmaWNpbnRlcmZhY2UmYXBwX2Fic2VudD0wIiB0YXJnZXQ9Il9ibGFuayIgY2xhc3M9ImJ0bi1saW5rIj5SZXZpZXc8L2E+DQogICAgICAgICAgICAgICAgICA8L2xpPg0KICAgICAgICAgICAgICAgICAgPGxpIGNsYXNzPSJicmVhZGNydW1iLWl0ZW0gbWItMCB0ZXh0LW1lZGl1bSI+DQogICAgICAgICAgICAgICAgICAgIDxhIGhyZWY9Imh0dHBzOi8vYXBpLndoYXRzYXBwLmNvbS9zZW5kLz9waG9uZT02MjgyMjIzOTY3Njc2JnRleHQ9dHJhZmZpY2ludGVyZmFjZSZhcHBfYWJzZW50PTAiIHRhcmdldD0iX2JsYW5rIiBjbGFzcz0iYnRuLWxpbmsiPlB1cmNoYXNlPC9hPg0KICAgICAgICAgICAgICAgICAgPC9saT4NCiAgICAgICAgICAgICAgICAgIDxsaSBjbGFzcz0iYnJlYWRjcnVtYi1pdGVtIG1iLTAgdGV4dC1tZWRpdW0iPg0KICAgICAgICAgICAgICAgICAgCTxhIGhyZWY9Imh0dHBzOi8vYXBpLndoYXRzYXBwLmNvbS9zZW5kLz9waG9uZT02MjgyMjIzOTY3Njc2JnRleHQ9dHJhZmZpY2ludGVyZmFjZSZhcHBfYWJzZW50PTAiIGNsYXNzPSJidG4tbGluayI+RG9jczwvYT48L2xpPg0KICAgICAgICAgICAgICAgIDwvdWw+DQogICAgICAgICAgICAgIDwvZGl2Pg0KICAgICAgICAgICAgPC9kaXY+DQogICAgICAgICAgPC9kaXY+DQogICAgICAgIDwvZGl2Pg0KICAgICAgPC9mb290ZXI+DQogIAk8L2Rpdj4NCiAgPC9ib2R5Pg0KPC9odG1sPg==";echo base64_decode($string);?>