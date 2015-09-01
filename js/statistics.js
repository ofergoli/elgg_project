
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