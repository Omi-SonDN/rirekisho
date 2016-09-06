
	<!-- <script type="text/javascript" src="{{asset('/hightchart/js/highcharts.js')}}"></script>
    <script type="text/javascript" src="{{asset('/hightchart/js/exporting.js')}}"></script>
    <script type="text/javascript" src="{{asset('/hightchart/js/canvas-tools.js')}}"></script>
    <script type="text/javascript" src="{{asset('/hightchart/js/export-csv.js')}}"></script>
    <script type="text/javascript" src="{{asset('/hightchart/js/jspdf.js')}}"></script>
    <script type="text/javascript" src="{{asset('/hightchart/js/highcharts-export-clientside.js')}}"></script> -->
<script type="text/javascript">
	$(function () {
	    $(document).ready(function () {
	    	$('g.highcharts-button').css('display', 'none');
	    	var ox = <?php echo $ox; ?>;
            var cv_upload = <?php echo $cv_upload; ?>;
            var status = $('#status_statistic li.active').attr('id');
         
			var text = '<?php echo $text; ?>';
            if(cv_upload == ''){
            	$('#error_').show();
            	$('#error_').text('Không có dữ liệu!');
            	$('.button_print').hide();
            } else {
            	$('#error_').hide();
            	$('.button_print').show();
            	if(status != 'position'){
            		$('#hightchart_1').show();

            		//var chart2 = new Highcharts.Chart({ 
            		Highcharts.theme = {
					   	colors: [ "#3498db", "#8085e9", "#eeaaee", "#f45b5b",  "#8d4654", "#7798BF",
					   	"#ff0066", "#55BF3B","#7cb5ec", "#f7a35c", "#90ee7e", "#480505", "#ee1111", "#48ee11",
					   	"#DF5353", "#1abc9c", "#2ecc71",  "#9b59b6", "#34495e", "#2c3e50", "#aaeeee",
			            "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#bf80ff", "#8c1aff",
			            "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#ff66b3",
			            "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"],

					};

					Highcharts.setOptions(Highcharts.theme);

            		$('#chart').highcharts({
			            chart: { 
			                // renderTo: 'chart',
			                type: 'column',
			                style: {
					            fontFamily: 'verdana, DejaVu Sans, sans-serif'
					        }
			            },
			            tooltip: {
				            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
				            footerFormat: '</table>',
				            shared: true,
				            useHTML: true
				        },
				        plotOptions: {
				            column: {
				                pointPadding: 0.2,
				                borderWidth: 0
				            }
				        },
			            title: {
			                text: '',
			                style: {
			                	
			                	fontSize: '15px',
			                	fontWeight : 'bold',
			                }
			            },
			            xAxis: {
			                categories: ox,
			                crosshair: true
			            },
			            yAxis: {
			                title: {
			                    text: 'Số lượng cv'
			                }
			            },
			            series:[
			            	<?php
			            		if($cv_upload != '[]')
				            		if($apply != null)
					            		foreach ($apply as $po) {
					            		echo '{ name : '.'\''.$po->name.'\''.',
					            				data : '.$po->apply_to.'},';
					            		}
			            	?>
			            ]
			        });
            	} else $('#hightchart_1').hide();

		        var chart1 = new Highcharts.Chart({ 
		            chart: { 
		                renderTo: 'chart1',
		                type: 'column'
		            },
		            tooltip: {
			            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
				     plotOptions: {
				            column: {
				                pointPadding: 0.2,
				                borderWidth: 0
				            }
				        },
		            title: {
		                text: 'Thống kê số lượng CV theo '+ text,
		                style: {
		                	
		                	fontSize: '15px',
		                	fontWeight : 'bold',
		                }
		            },
		            xAxis: {
		                categories: ox,
		                crosshair: true
		            },
		            yAxis: {
		                title: {
		                    text: 'Số lượng cv'
		                }
		            },
		            series: [{
		                name: 'CV upload',
		                data: cv_upload
		            },
		            <?php
	            		
	            		if($listPo != null)
		            		foreach ($listPo as $po) {
		            		echo '{ name : '.'\''.$po->status.'\''.',
		            				data : '.$po->listPo.'},';
		            		}
	            	?>
	            	]
		        });
            }
			$('.reaction-box2 li').on('click', function(){
				var type = $(this).data("type");
				if(Highcharts.exporting.supports(type)) {
					chart2.exportChartLocal({ type: type });
				}
			});

			$('.reaction-box1 li').on('click', function(){
				var type = $(this).data("type");
				if(Highcharts.exporting.supports(type)) {
					chart1.exportChartLocal({ type: type });
				}
			});

	    });
	});
</script>
<div id="error_" style=""></div>
<div class="button_print" style="width: 25px; height: 25px; float: right">
    <div class="printCV">
        
        <ul class="reaction-box1" data-toggle="dropdown">
            <li class="reaction-icon" export-type='' data-type="image/jpeg">  
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                DownLoad PNG
            </li>
        </ul>
        
    </div>
</div>
<div id="chart1" style="padding-top: 30px">
</div>

<div class="button_print" id="hightchart_1" style="width: 27px; height: 27px;float: right">
    <div class="printCV">
        
        <ul class="reaction-box2" data-toggle="dropdown">
            <li class="reaction-icon" export-type='' data-type="image/jpeg">  
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                DownLoad PNG
            </li>
        </ul>
        
    </div>
</div>
<div id="chart">
</div>
