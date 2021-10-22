// Update record
$(document).on("click", ".update", function (e) {
    e.preventDefault();

    var update_id = $(this).data('id');
    var name = $(this).parent().siblings('.name').text();
    var gender = $(this).parent().siblings('.gender').text();
    var email = $(this).parent().siblings('.email').text();
    var address = $(this).parent().siblings('.address').text();
    var dob = $(this).parent().siblings('.dob').text();

    $('#updateName').val(name);
    $('#updateEmail').val(email);
    $('#updateAddress').val(address);
    $('#updateDob').val(dob);
    $('#updateGender').val(gender)
    $('#updateModal').modal('show');


    $('#updateClient').click(function (e) {

        let updatedName = $('#updateName').val();
        let updatedEmail = $('#updateEmail').val();
        let updatedAddress = $('#updateAddress').val();
        let updatedDob = $('#updateDob').val();
        let updatedGender = $('#updateGender').val();

        e.preventDefault();
        $.ajax({
            url: 'home/' + update_id,
            type: 'PUT',
            data: {
                "id": update_id,
                "_token": CSRF_TOKEN,
                "name": updatedName,
                "email": updatedEmail,
                "address": updatedAddress,
                "dob": updatedDob,
                "gender": updatedGender
            },
            success: function (result) {
                $("input[data-id=" + update_id + "]").parent().siblings('.dob').text(updatedDob).siblings('.name').text(updatedName).siblings('.gender').text(updatedGender).siblings('.email').text(updatedEmail).siblings('.address').text(updatedAddress);
                ;
                $("#successMessage").removeClass("d-none").text('Record Updated')

            },
            error: function (response) {
                $('#nameUpdateError').text(response.responseJSON.errors.name);
                $('#emailUpdateError').text(response.responseJSON.errors.email);
                $('#addressUpdateError').text(response.responseJSON.errors.address);
                $('#dobUpdateError').text(response.responseJSON.errors.dob);
                $('#genderUpdateError').text(response.responseJSON.errors.gender);
            }
        });
    });
});
