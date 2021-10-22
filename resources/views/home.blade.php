@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="successMessage" class="alert alert-success d-none" role="alert"></div>
        <h2>Clients Table</h2>
        <div class="row pb-3">
            <div class="col-6">
                <input class="form-control " id="myInput" type="text" placeholder="Search..">
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUserModal">+
                </button>
            </div>
        </div>
        <table id="userTable" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Address</th>
                <th>Birthday</th>
                @if( $isAdmin)
                    <th>Delete</th>
                @endif
                <th>Update</th>
            </tr>
            </thead>
            <tbody id="myTable">
            @foreach ($clients as $client)
                <tr>
                    <td class='name'>{{ $client->name }}</td>
                    <td class='gender'>{{ $client->gender }}</td>
                    <td class='email'>{{ $client->email }}</td>
                    <td class='address'>{{ $client->address }}</td>
                    <td class='dob'>{{ $client->dob }}</td>
                    @if($isAdmin)
                        <td align='center'><input type='button' value='Delete' class='btn btn-danger btn-xs delete'
                                                  data-id={{  $client->id  }}></td>
                    @endif
                    <td align='center'><input type='button' value='Update' class='btn btn-primary btn-xs update'
                                              data-id={{  $client->id  }}></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $clients->render() !!}
    </div>

@endsection

@section('javascripts')
    <script type='text/javascript'>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // A $( document ).ready() block.
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Add record
            $('#adduser').click(function (e) {
                e.preventDefault();

                //reset errors
                $('#nameError').empty();
                $('#emailError').empty();
                $('#addressError').empty();
                $('#phoneError').empty();
                $('#dobError').empty();
                $('#genderError').empty();

                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var dob = $('#dob').val();
                var address = $('#address').val();
                var gender = $('#gender').find(":selected").text();
                var phone = $('input[name^=phone]').map(function (idx, elem) {
                    return $(elem).val();
                }).get();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('home.addClient') }}",
                    data: {
                        _token: CSRF_TOKEN,
                        name: name,
                        email: email,
                        dob: dob,
                        address: address,
                        gender: gender,
                        phone: phone
                    },
                    dataType: 'json',
                    success: function (response) {
                        id = response.id
                        var tr_str = "<tr>" +
                            "<td class='name'>" + name + "</td>" +
                            "<td class='gender'>" + gender + "</td>" +
                            "<td class='email'>" + email + "</td>" +
                            "<td class='address'>" + address + "</td>" +
                            "<td class= 'dob'>" + dob + "</td>" +
                            @if($isAdmin)
                                "<td align='center'><input type='button' value='Delete' class='btn btn-danger btn-xs delete' data-id='" + id + "'></td>" +
                            @endif
                                "<td align='center'><input type='button' value='Update' class='btn btn-primary btn-xs update' data-id='" + id + "'></td>" +
                            "</tr>";

                        $("#userTable tbody").append(tr_str);
                        $("#successMessage").removeClass("d-none").text('Record Created')

                        // Empty the input fields
                        $('#name').val('');
                        $('#email').val('');
                        $("#address").val('');
                        $("#dob").val('');
                        $("#phone").val('');
                        $('.phone-input-extra').remove();
                        $('#validation-errors').html('');
                        //Close the modal after a successful addition
                        $("#addUserModal").modal('hide');
                    },
                    error: function (response) {
                        $.each(response.responseJSON.errors, function ($key, value) {
                            $('#validation-errors').html('');
                            $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
