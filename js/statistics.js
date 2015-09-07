$(function () {
	$.ajax({
		type: 'GET',
		url: 'get_groups_stats.php',
		data: {snKey: $('#sn-key').val()},
		success: function (response) {
			var groupStats = JSON.parse(response);
			var chartData = [];
			if(groupStats && groupStats.length > 0) {
				groupStats.forEach(function (groupStat) {
					chartData.push([groupStat.groupName, parseFloat(groupStat.postsCount)]);
				});
			}


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
					text: 'Posts made by group'
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
					name: 'Post percentage',
					data: chartData
				}]
			});
		}
	});
});


$(function () {
	$.ajax({
		type: 'GET',
		url: 'get_users_stats.php',
		data: {snKey: $('#sn-key').val()},
		success: function (response) {
			var stats = JSON.parse(response).reverse();
			if(stats && stats.length > 1) {
				var dates = [],
					counts = [];
				stats.forEach(function (stat) {
					dates.push(stat.date);
					counts.push(parseInt(stat.userCount));
				});

				debugger;
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
						categories: dates
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
							data: counts
						}
					]
				});
			}
		}
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