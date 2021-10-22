// Delete record
$(document).on("click", ".delete", function (e) {
    e.preventDefault();
    var delete_id = $(this).data('id');
    var el = this;
    $.ajax({
        url: 'home/' + delete_id,
        type: 'DELETE',
        data: {
            "id": delete_id,
            "_token": CSRF_TOKEN,
        },
        success: function (response) {
            $(el).closest("tr").remove();
            $("#successMessage").removeClass("d-none").text(response.msg)
        }
    });
});
