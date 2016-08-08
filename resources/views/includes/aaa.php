 $(function () {
                            $(document).ready(function () {
                                var cv_upload = <?php echo $cv_upload; ?>;
                                var month = <?php  echo $month; ?>;
                                var quarter = <?php echo $quarter; ?>;
                                var count_cv = <?php echo $count_cv; ?>;
                                var year = <?php echo $year; ?>;
                                var count_year = <?php echo $count_year; ?>;
                                // var positions = <?php //echo $positions; ?>;
                                // var count_positions = <?php //echo $count_positions; ?>;

                                var chart = new Highcharts.Chart({ 
                                    chart: { 
                                        renderTo: 'container',
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Thống kê số lượng CV upload trong các tháng'
                                    },
                                    xAxis: {
                                        categories: month
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Số lượng CV'
                                        }
                                    },
                                    series: [{
                                        name: 'CV upload',
                                        data: cv_upload
                                    }]
                                });

                                var chart1 = new Highcharts.Chart({ 
                                    chart: { 
                                        renderTo: 'container1',
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Thống kê số lượng CV upload theo quý'
                                    },
                                    xAxis: {
                                        categories: quarter
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Số lượng CV'
                                        }
                                    },
                                    series: [{
                                        name: 'CV upload',
                                        data: count_cv
                                    }]
                                });

                                var chart3 = new Highcharts.Chart({ 
                                    chart: { 
                                        renderTo: 'container3',
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Thống kê số lượng CV upload theo năm'
                                    },
                                    xAxis: {
                                        categories: year
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Số lượng CV'
                                        }
                                    },
                                    series: [{
                                        name: 'CV upload',
                                        data: count_year
                                    }]
                                });
                            });
                        });
                        </script>