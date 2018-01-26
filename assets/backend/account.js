$(document).ready(function () {
    $('#datatable-responsive').DataTable();
    $(".active-user").click(function () {
        $id = $(this).data("id");
        $email = $(this).data("email");
        $active = "yes";

        if ($(this).html() == "No") {
            $active = "no";
        }
        $data = {active: $active, id: $id, email: $email, table: "customer"}

        $.ajax({
            url: baseurl + 'admin/updateStatus',
            method: 'POST',
            dataType: 'json',
            data: $data,
            error: function () {
                alert("An error occoured!");
            },
            success: function (response) {
                // update status [success|failure]
                var update_status = response.update_status;
                // If login is invalid, we store the
                if (update_status == 'failure') {
                    var $error_msg = response.error_msg
                    // show the error msg
                }
                if (update_status == 'success') {
                    alert("Status has been successfully updated");
                }
            }
        });
    });
});
