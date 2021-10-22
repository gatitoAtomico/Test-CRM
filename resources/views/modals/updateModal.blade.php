<!-- The Modal -->
<div class="modal" id="updateModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Update client</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input id="updateName" type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name" placeholder="Enter full name"
                               autofocus>
                        <small id="clientName" class="form-text text-muted">Please add new clients full name.</small>
                        <span class="text-danger" id="nameUpdateError"></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="updateEmail" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email"
                               autofocus>
                        <small id="emailHelp" class="form-text text-muted">Please add new clients email.</small>
                        <span class="text-danger" id="emailUpdateError"></span>
                    </div>


                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input id="updateDob" type="date"
                               class="form-control @error('dob') is-invalid @enderror" name="dob"
                               value="{{ old('dob') }}" required autocomplete="address" autofocus>
                        <small id="dobHelp" class="form-text text-muted">Please add new clients date of birth.</small>
                        <span class="text-danger" id="dobUpdateError"></span>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="updateAddress" type="text"
                               class="form-control @error('address') is-invalid @enderror" name="address"
                               value="{{ old('address') }}" placeholder="Enter address" required autocomplete="address"
                               autofocus>
                        <small id="addressHelp" class="form-text text-muted">Please add new clients address.</small>
                        <span class="text-danger" id="addressUpdateError"></span>
                    </div>

                    <div class="form-group row">
                        <label for="gender"
                               class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                        <div class="col-md-6">
                            <select id="updateGender" class="form-control" name="gender">
                                <option value="male" @if (old('gender') == 'male') selected="selected" @endif>male
                                </option>
                                <option value="female" @if (old('gender') == 'female') selected="selected" @endif>
                                    female
                                </option>
                            </select>
                            <span class="text-danger" id="genderUpdateError"></span>
                        </div>
                    </div>
                    <button id="updateClient" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

