





<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default" style="height: 485px;">
			<div class=" panel-heading">
				<i class="glyphicon glyphicon-stats"></i> Users Usage
			</div>
			<div id="users_amount_line" style="padding-top: 23px">
			</div>

		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-bell"></i> Notifications Panel
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<i class="fa fa-user fa-fw"></i> New User Was Added
                        <span class="pull-right text-muted small">
                            <em>4 minutes ago</em>
                        </span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-group fa-fw"></i> 3 New Groups Were Added
                        <span class="pull-right text-muted small">
                            <em>12 minutes ago</em>
                        </span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-user fa-fw"></i> 2 New Users Were Added
                        <span class="pull-right text-muted small">
                            <em>27 minutes ago</em>
                        </span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-rss fa-fw"></i> New Blogpost Was Added
                        <span class="pull-right text-muted small">
                            <em>43 minutes ago</em>
                        </span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-file fa-fw"></i> 3 New Files Uploaded
                        <span class="pull-right text-muted small">
                            <em>11:13 AM</em>
                        </span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-user fa-fw"></i> New User Was Added
                        <span class="pull-right text-muted small">
                            <em>10:57 AM</em>
                        </span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-group fa-fw"></i> 3 New Groups Were Added
                        <span class="pull-right text-muted small">
                            <em>Yesterday</em>
                        </span>
					</a>
				</div>
				<!-- /.list-group -->
			</div>
			<!-- /.panel-body -->
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-7">
		<div class="panel panel-default">
			<div class="panel-heading">
				Groups Usage
			</div>
			<div id="profiles_use">
			</div>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				Files Usage
			</div>
			<div id="file_type_pie">

			</div>
		</div>
	</div>
</div>



<script type="application/javascript">

	$(function () {
		$('#file_type_pie').css({ height: '400px' });
		$('#file_type_pie').highcharts({
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45,
					beta: 0
				}
			},
			title: {
				text: 'File filtering by type, last 7 days'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					depth: 35,
					dataLabels: {
						enabled: true,
						format: '{point.name}'
					}
				}
			},
			series: [{
				type: 'pie',
				name: 'Browser share',
				data: [
					['Microsoft Word', 40.0],
					['Adobe', 31.8],
					{
						name: 'Microsoft Excel',
						y: 12.8,
						sliced: true,
						selected: true
					},
					['Picutres', 8.5],
					['Others', 6.2],
					['txt', 0.7]
				]
			}]
		});
	});



	$(function () {
		$('#users_amount_line').highcharts({
			chart: {
				type: 'line'
			},
			title: {
				text: ''
			},
			subtitle: {
				text: 'Number Of Users Usage'
			},
			xAxis: {
				categories: ['25/8', '26/8', '27/8', '28/8', '29/8', '30/8', '31/8', '1/9', '2/9', '3/9', '4/9', '5/9']
			},
			yAxis: {
				title: {
					text: 'Users'
				}
			},
			plotOptions: {
				line: {
					dataLabels: {
						enabled: true
					},
					enableMouseTracking: false
				}
			},
			series: [{
				name: 'Users',
				data: [7, 6, 9, 14, 18, 21, 25, 26, 23, 18, 13, 9]
			}, {
				name: 'Admin',
				data: [3, 4, 5, 8, 11, 15, 17, 16, 14, 10, 6, 4]
			},
				{
					name: 'Total',
					data: [10, 10, 14, 22, 29, 36, 42, 42, 37, 28, 38, 41]
				}]
		});
	});


	$(function () {
		$('#profiles_use').css({ height: '400px' });
		$('#profiles_use').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'Top profile in use'
			},
			xAxis: {
				categories: ['LightOn', 'Adobe_amir', 'Office', 'Renewer', 'DocFinder']
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Number profile use'
				},
				stackLabels: {
					enabled: true,
					style: {
						fontWeight: 'bold',
						color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
					}
				}
			},
			legend: {
				align: 'right',
				x: -70,
				verticalAlign: 'top',
				y: 20,
				floating: true,
				backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
				borderColor: '#CCC',
				borderWidth: 1,
				shadow: false
			},
			tooltip: {
				formatter: function () {
					return '<b>' + this.x + '</b><br/>' +
						this.series.name + ': ' + this.y + '<br/>' +
						'Total: ' + this.point.stackTotal;
				}
			},
			plotOptions: {
				column: {
					stacking: 'normal',
					dataLabels: {
						enabled: true,
						color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
						style: {
							textShadow: '0 0 3px black, 0 0 3px black'
						}
					}
				}
			},
			series: [{
				name: 'Users',
				data: [5, 3, 4, 7, 2]
			}, {
				name: 'Admins',
				data: [2, 2, 3, 2, 1]
			}]
		});
	});
</script>