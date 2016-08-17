<script type="text/javascript">
	$(function () {
	    $(document).ready(function () {
	    	$('g.highcharts-button').css('display', 'none');
	    	var ox = <?php echo $ox; ?>;
            var cv_upload = <?php echo $cv_upload; ?>;
            var cv_pass = <?php echo $cv_pass; ?>;
            var status = $('#status_statistic li.active').attr('id');
            
			var text = '<?php echo $text; ?>';
            if(cv_upload == '0' || cv_upload == ''){
            	$('#error_').show();
            	$('#error_').text('Không có dữ liệu!');
            } else {
            	$('#error_').hide();
            	if(status != 'position'){
            		$('#hightchart_1').show();
            		var chart2 = new Highcharts.Chart({ 
			            chart: { 
			                renderTo: 'chart',
			                type: 'column',
			                style: {
					            fontFamily: 'verdana, DejaVu Sans, sans-serif'
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
			                categories: ox
			            },
			            yAxis: {
			                title: {
			                    text: 'Số CV'
			                }
			            },
			            series:[
			            	<?php
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
		            title: {
		                text: 'Thống kê số lượng CV theo '+ text,
		                style: {
		                	
		                	fontSize: '15px',
		                	fontWeight : 'bold',
		                }
		            },
		            xAxis: {
		                categories: ox
		            },
		            yAxis: {
		                title: {
		                    text: 'Số CV'
		                }
		            },
		            series: [{
		                name: 'CV upload',
		                data: cv_upload
		            },{
		                name: 'CV pass',
		                data: cv_pass
		            }]
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
<div id="error_" style="height: 300px;text-align: center; display: none;"></div>
<div class="button_print" id="hightchart_1" style="width: 27px; height: 27px;float: right">
    <div class="printCV">
        
        <ul class="reaction-box2">
            <li class="reaction-icon" export-type='pdf' data-type="application/pdf">  
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                DownLoad PDF
            </li>
            <li class="reaction-icon" export-type='xlsx' data-type="application/vnd.ms-excel">
                Download Excel
                <i class="fa fa-file-excel-o" aria-hidden="true"></i>
            </li>
            <li class="reaction-icon" export-type='' data-type="image/jpeg">  
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                DownLoad PNG
            </li>
            <li class="reaction-icon" export-type='' data-type="image/png">
                Download JPEG
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
            </li>
        </ul>
        
    </div>
</div>
<div id="chart">
</div>

<div class="button_print" style="width: 25px; height: 25px; float: right">
    <div class="printCV">
        
        <ul class="reaction-box1" data-toggle="dropdown">
            <li class="reaction-icon" export-type='pdf' data-type="application/pdf">  
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                DownLoad PDF
            </li>
            <li class="reaction-icon" export-type='xlsx' data-type="application/vnd.ms-excel">
                Download Excel
                <i class="fa fa-file-excel-o" aria-hidden="true"></i>
            </li>
            <li class="reaction-icon" export-type='' data-type="image/jpeg">  
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                DownLoad PNG
            </li>
            <li class="reaction-icon" export-type='' data-type="image/png">
                Download JPEG
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
            </li>
        </ul>
        
    </div>
</div>
<div id="chart1" style="padding-top: 30px">
</div>