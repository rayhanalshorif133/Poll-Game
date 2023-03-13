$(document).on("change", ".start_date", function () {
    var startDate = new Date($(this).val());
    var endDate = new Date($("#end_date").val());
    if (startDate > endDate) {
        $("#end_date").val($(this).val());
        Toast.fire({
            icon: 'error',
            title: 'End date cannot be less than start date'
        });
    }
});

$(document).on("change", ".end_date", function () {
    var startDate = new Date($("#start_date").val());
    var endDate = new Date($(this).val());
    if (startDate > endDate) {
        $("#start_date").val($(this).val());
        Toast.fire({
            icon: 'error',
            title: 'Start date cannot be greater than end date'
        });
    }
});

