$(function () {





});


function cartorder_detail(id)
{   
    
    $.ajax({
        type: 'POST',
        url: "/rebootMultiDevice?now=" + rebootNowOrLast,
        data: JSON.stringify(deviceNeedReboot),
        success: function (AcsResponse) {
            buttonLoading("confirm-reboot-dialog-opener", "end");
            var successAlert = "";
            var inprogresAlert = "";
            var failedAlert = "";
            $.each(AcsResponse.mapResult, function (id, result) {
                console.log(result);
                if (result == 200) // success
                {
                    successAlert = successAlert + id + ", ";
                } else if (result == 202) {
                    inprogresAlert = inprogresAlert + id + ", ";
                } // in progress
                else { // failed
                    failedAlert = failedAlert + id + ", ";
                }
            });
            if (successAlert !== "") {
                successAlert += "reboot success!";
                $('#alert_success span.text-semibold').text(successAlert);
                $('#alert_success').show();
            }
            if (inprogresAlert !== "") {
                inprogresAlert += "Reboot in queue!";
                $('#alert_danger span.text-semibold').text(inprogresAlert);
                $('#alert_danger').show();
            }
            if (failedAlert !== "") {
                failedAlert += "Reboot Failed!";
                $('#alert_primary span.text-semibold').text(failedAlert);
                $('#alert_primary').show();
            }
        },
        async: true
    });


}