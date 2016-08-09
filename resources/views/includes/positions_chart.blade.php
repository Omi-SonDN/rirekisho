<script type="text/javascript">
	$(function () {
	    $(document).ready(function () {
	    	var ox = <?php echo $ox; ?>;
            var cv_upload = <?php echo $cv_upload; ?>;
            var cv_pass = <?php echo $cv_pass; ?>;

		    var chart2 = new Highcharts.Chart({ 
	            chart: { 
	                renderTo: 'chart',
	                type: 'column'
	            },
	            title: {
	                text: '<?php echo $text; ?>',
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
	    });
	});
</script>
<div id="chart">
</div>