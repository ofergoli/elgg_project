$(document).ready(function(){
    $("#exampleCsv").click(function(){
        bootbox.dialog({
            title: "CSV Example",
            message: '<div class="row text-center"><div class="col-md-12">' +
                     "<img src=\'http://" + document.location.hostname + "/sites/elgg_project/img/csv.PNG\' />" +
                     '</div></div>',
            buttons: {
                success: {
                    label: "OK",
                    className: "btn btn-primary",
                    callback: function () {

                    }
                }
            }
        });
    });
});