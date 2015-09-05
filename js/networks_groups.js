$(document).ready(function(){
	var NetworksGroups;
	$.ajax({
		url: "GetNetworksAndGroups.php",
		type: "GET"
	}).then(function(results){
		NetworksGroups = JSON.parse(results);
		var network_name = Object.keys(NetworksGroups);
		for(var i=0 ; i<network_name.length ; i++){
			$("#network").append("<option value='" + NetworksGroups[network_name[i]][network_name[i]] +"'>" + network_name[i] + "</option>");
		}
		debugger;
		var init_groups = NetworksGroups[$("#network")[0][0].innerHTML].groups;
		$("#groups").empty();
		for(var i=0 ; i<init_groups.length ; i++){
				$("#groups").append("<option value='" + init_groups[i].guid +"'>" + init_groups[i].name + "</option>");		
		}
		$("#network").change(function(){
			var network_hash = $(this).val();
			var network_name = $(this)[0][$(this)[0].selectedIndex].innerHTML;
			$("#groups").empty();
			var groups = NetworksGroups[network_name].groups;
			for(var i=0 ; i<groups.length ; i++){
				$("#groups").append("<option value='" + groups[i].guid +"'>" + groups[i].name + "</option>");		
			}
		});
	});
});