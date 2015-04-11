$(document).ready(function(){
    $(".btn-danger").click(function(){
        var md5_social_hash = $(this).parent().children(".hidden_input").val();
        bootbox.dialog({
            title: "Enter BGU.NET credentials :",
            message: '<div class="row">  ' +
            '<div class="col-md-12"> ' +
            '<form class="form-horizontal"> ' +
            '<div class="form-group"> ' +
            '<label class="col-md-4 control-label" for="name">Username :</label> ' +
            '<div class="col-md-4"> ' +
            '<input id="username" name="name" type="text" placeholder="username" class="form-control input-md"> ' +
            '</div> ' +
            '</div> '+
            '<div class="form-group"> ' +
            '<label class="col-md-4 control-label" for="name">Password :</label> ' +
            '<div class="col-md-4"> ' +
            '<input id="password" name="name" type="password" placeholder="password" class="form-control input-md"> ' +
            '</div> ' +
            '</div> </div>' +
            '</form> </div>  </div>',
            buttons: {
                fail:{
                    label:"Cancel",
                    className:"btn btn-primary"
                },
                success: {
                    label: "Delete Social Network",
                    className: "btn btn-danger",
                    callback: function () {
                        $("#spinner").show();
                        var username = $('#username').val();
                        var password = $('#password').val();
                        var data = {
                            username:username,
                            password:password,
                            hash:md5_social_hash
                        };
                        $.ajax({
                            url:"http://localhost/sites/elgg_project/delete_social_network.php",
                            type:"POST",
                            data:data,
                            success : function(result){
                                $("#spinner").hide();
                                if(result.status=="success")
                                    window.location.replace("http://localhost/sites/elgg_project/my_social_networks.php");
                                else{
                                    alert("invalid password");
                                }
                            }
                        });
                    }
                }
            }
        }
        );
    });
});

