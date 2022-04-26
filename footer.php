
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


<footer>
        <div class="footer-content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-sm-6">
                <p class="mb-0 text-muted text-medium">Sarang ID Dev 2022</p>
              </div>
              <div class="col-sm-6 d-none d-sm-block">
                <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://api.whatsapp.com/send/?phone=6282223967676&text=trafficinterface&app_absent=0" target="_blank" class="btn-link">Review</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://api.whatsapp.com/send/?phone=6282223967676&text=trafficinterface&app_absent=0" target="_blank" class="btn-link">Purchase</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                  	<a href="https://api.whatsapp.com/send/?phone=6282223967676&text=trafficinterface&app_absent=0" class="btn-link">Docs</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
  	</div>
  </body>
</html>