<script type="text/javascript">
	$(function () {
	    $(document).ready(function () {
	    	var ox = <?php echo $ox; ?>;
            var cv_upload = <?php echo $cv_upload; ?>;
            var cv_pass = <?php echo $cv_pass; ?>;
            var text = '<?php echo $text; ?>';
            if(cv_upload == '0' || cv_upload == ''){
            	$('#error').show();
            	$('#error').text('Không có dữ liệu!');
            } else {
            	$('#error').hide();
            	var chart2 = new Highcharts.Chart({ 
		            chart: { 
		                renderTo: 'chart',
		                type: 'column'
		            },
		            title: {
		                text: text,
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
	    });
	});
</script>
<div id="error" style="height: 300px;text-align: center; display: none;"></div>
<div id="chart">
</div>