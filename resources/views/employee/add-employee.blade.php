@extends('layouts.app')

@section('title', 'Add Employee')

@push('style')
    <style>
        h4 {
            font-size: 20px !important;
        }

        label {
            font-size: 14px !important;
        }

        .required-star {
            color: red;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Employee</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">HRM & Payroll</div>
                    <div class="breadcrumb-item">Employee</div>
                    <div class="breadcrumb-item">Add Employee</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form action="{{ route('employee.basic.information.submit') }}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>Basic Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>First Name <span class="required-star">*</span> </label>
                                        <input type="text" class="form-control" name="first_name" maxlength="35"
                                            required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" maxlength="35">
                                    </div>

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" maxlength="35">
                                    </div>

                                    <div class="form-group">
                                        <label>Nick Name</label>
                                        <input type="text" class="form-control" name="nickname" maxlength="35">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" maxlength="255">
                                    </div>

                                    <div class="form-group">
                                        <label>Alternative Email</label>
                                        <input type="email" class="form-control" name="alternative_email" maxlength="255">
                                    </div>

                                    <div class="form-group">
                                        <label>Gender <span class="required-star">*</span></label>
                                        <select class="form-control select2" name="gender" required>
                                            <option value="-1">Please Select One</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="9">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth <span class="required-star">*</span></label>
                                        <input type="date" class="form-control" name="date_of_birth" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile Number <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control mobile-number number-input"
                                                name="mobile_number" maxlength="15" required>
                                        </div>
                                        <span>Only number!</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control phone-number number-input"
                                                name="phone_number" maxlength="15">
                                        </div>
                                        <span>Only number!</span>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form action="{{ route('employee.basic.information.submit') }}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>Employee Information</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Department <span class="required-star"><button id="modal-login-part" class="badge badge-primary" style="cursor: pointer;">Set</button></span></label>
                                        <select class="form-control select2" name="gender" required>
                                            <option value="-1">Please Select One</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="9">Other</option>
                                        </select>
                                    </div>

                                    {{-- <button class="btn btn-primary" id="modal-login-part">Login</button> --}}

                        



                                    <div class="form-group">
                                        <label>First Name <span class="required-star">*</span> </label>
                                        <input type="text" class="form-control" name="first_name" maxlength="35"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" maxlength="35">
                                    </div>

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" maxlength="35">
                                    </div>

                                    <div class="form-group">
                                        <label>Nick Name</label>
                                        <input type="text" class="form-control" name="nickname" maxlength="35">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" maxlength="255">
                                    </div>

                                    <div class="form-group">
                                        <label>Alternative Email</label>
                                        <input type="email" class="form-control" name="alternative_email" maxlength="255">
                                    </div>

                                    

                                    <div class="form-group">
                                        <label>Date of Birth <span class="required-star">*</span></label>
                                        <input type="date" class="form-control" name="date_of_birth" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile Number <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control mobile-number number-input"
                                                name="mobile_number" maxlength="15" required>
                                        </div>
                                        <span>Only number!</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control phone-number number-input"
                                                name="phone_number" maxlength="15">
                                        </div>
                                        <span>Only number!</span>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </section>
        <form class="modal-part" id="modal-login-part">
            <p>This login form is taken from elements with <code>#modal-login-part</code> id.</p>
            <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-group mb-0">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script>
        // Mobile & Phone number input format validate
        var numbers = document.querySelectorAll('.number-input');
        // console.log(numbers);
        numbers.forEach(elm => {
            elm.addEventListener('input', () => {
                elm.value = parseInt(elm.value)
            })
        });
    </script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>

@endpush
