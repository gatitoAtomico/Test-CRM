<!-- The Modal -->
<div class="modal" id="addUserModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Add client</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name" placeholder="Enter full name"
                               autofocus>
                        <small id="clientName" class="form-text text-muted">Please add new clients full name.</small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email"
                               autofocus>
                        <small id="emailHelp" class="form-text text-muted">Please add new clients email.</small>
                    </div>


                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input id="dob" type="date"
                               class="form-control @error('dob') is-invalid @enderror" name="dob"
                               value="{{ old('dob') }}" required autocomplete="address" autofocus>
                        <small id="dobHelp" class="form-text text-muted">Please add new clients date of birth.</small>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" type="text"
                               class="form-control @error('address') is-invalid @enderror" name="address"
                               value="{{ old('address') }}" placeholder="Enter address" required autocomplete="address"
                               autofocus>
                        <small id="addressHelp" class="form-text text-muted">Please add new clients address.</small>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <div class="phone-list">
                            <div class="input-group phone-input">
                                <input type="text" id="phone" name="phone[1][number]" class="form-control" required
                                       placeholder="99123456"/>
                            </div>
                        </div>
                        <small id="phoneHelp" class="form-text text-muted">Please add new clients phone
                            number(s). 8 digits</small>
                        <button type="button" class="btn btn-success btn-sm btn-add-phone">+ Add Phone</button>
                    </div>


                    <div class="form-group row">
                        <label for="gender"
                               class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                        <div class="col-md-6">
                            <select id="gender" class="form-control" name="gender">
                                <option value="male" @if (old('gender') == 'male') selected="selected" @endif>male
                                </option>
                                <option value="female" @if (old('gender') == 'female') selected="selected" @endif>
                                    female
                                </option>
                            </select>
                        </div>
                    </div>
                    <div id="validation-errors"></div>
                        <button id="adduser" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<script>
    $(function () {
        $(document.body).on('click', '.changeType', function () {
            $(this).closest('.phone-input').find('.type-text').text($(this).text());
            $(this).closest('.phone-input').find('.type-input').val($(this).data('type-value'));
        });

        $(document.body).on('click', '.btn-remove-phone', function () {
            $(this).closest('.phone-input-extra').remove();
        });


        $('.btn-add-phone').click(function () {
            var index = $('.phone-input').length + 1;
            $('.phone-list').append('' +
                '<div class="input-group phone-input-extra">' +
                '<input type="text"  name="phone[' + index + '][number]" class="form-control" placeholder="99123456" />' +
                // '<input type="hidden" name="phone['+index+'][type]" class="type-input" value="" />'+
                '<span class="input-group-btn">' +
                '<button class="btn btn-danger btn-remove-phone" type="button">x</button>' +
                '</span>' +
                '</div>'
            );
        });

    });
</script>
