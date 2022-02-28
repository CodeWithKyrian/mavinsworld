<x-app-layout title="Edit Account Details">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb light">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span>
                My Account <span></span>
                Account Details

            </div>
        </div>
    </div>
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            @include('frontend.partials._dashboard-menu')
                        </div>
                        <div class="col-md-9">
                            <div class="account dashboard-content lg-pl-50">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('account.details.update') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>First Name <span class="required">*</span></label>
                                                    <input required class="form-control" name="firstname" type="text"
                                                        value="{{ $user->firstname }}" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Last Name <span class="required">*</span></label>
                                                    <input required class="form-control" name="lastname" type="text"
                                                        value="{{ $user->lastname }}" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input required class="form-control" name="email" type="email"
                                                        value="{{ $user->email }}" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Phone Number <span class="required">*</span></label>
                                                    <input required class="form-control" name="phone" type="text"
                                                        value="{{ $user->phone }}" />
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit"
                                                        class="btn btn-fill-out submit font-weight-bold" name="submit"
                                                        value="Submit">Save Change</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Change Password</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('account.password.update')}}">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Current Password <span
                                                            class="required">*</span></label>
                                                    <input required class="form-control" name="old_password"
                                                        type="password" />
                                                    @error('old_password')
                                                        <p class="font-sm text-red">{{ $message }}</p>
                                                    @enderror

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>New Password <span class="required">*</span></label>
                                                    <input required class="form-control" name="new_password"
                                                        type="password" />
                                                    @error('new_password')
                                                        <p class="font-sm text-red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Confirm Password <span
                                                            class="required">*</span></label>
                                                    <input required class="form-control" name="new_password_confirmation"
                                                        type="password" />
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit"
                                                        class="btn btn-fill-out submit font-weight-bold" name="submit"
                                                        value="Submit">Change Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
