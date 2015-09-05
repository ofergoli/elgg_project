$(function () {
	$('#file_type_pie').css({height: '400px'});
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
			text: 'Posts made by group (last 7 days)'
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
				['Linear Algebra', 13.0],
				['Advanced Programming', 31.0],
				['Operating Systems', 36.0],
				['Introduction to Databases', 15.0],
				['Calculus', 5.0]
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
		series: [
			{
				name: 'Students',
				data: [7, 6, 9, 14, 18, 21, 25, 26, 23, 18, 13, 9]
			},
			{
				name: 'Professors',
				data: [3, 4, 5, 8, 11, 15, 17, 16, 14, 10, 6, 4]
			},
			{
				name: 'Total',
				data: [10, 10, 14, 22, 29, 36, 42, 42, 37, 28, 19, 13]
			}]
	});
});


$(function () {
	$('#profiles_use').css({height: '400px'});
	$('#profiles_use').highcharts({
		chart: {
			type: 'column'
		},
		title: {
			text: 'File transfer by groups'
		},
		xAxis: {
			categories: ['BI', 'Physics', 'C Programming', 'Visual Programming', 'Introduction to Information Systems']
		},
		yAxis: {
			min: 0,
			title: {
				text: 'File Transfers'
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
			name: 'Download',
			data: [5, 3, 4, 7, 2]
		}, {
			name: 'Upload',
			data: [2, 2, 3, 2, 1]
		}]
	});
});