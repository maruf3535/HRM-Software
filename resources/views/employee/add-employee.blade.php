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

    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
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

            {{-- Alert message --}}
            @if ($errors->has('set_department_name'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        @error('set_department_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            @endif
            {{-- Alert message --}}

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
                                        <label>Department
                                            <span class="required-star">
                                                <button class="btn btn-primary" id="department-set">Set</button>
                                            </span>
                                        </label>
                                        <select class="form-control select2" name="gender" required>
                                            <option value="-1">Please Select One</option>
                                            @foreach ($data['department_list'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control select2" name="gender" required>
                                            <option value="-1">Please Select One</option>
                                            @foreach ($data['employee_type_list'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->employee_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Position</label>
                                        <select class="form-control select2" name="gender" required>
                                            <option value="-1">Please Select One</option>
                                            @foreach ($data['employee_position_list'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->position_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Work Phone <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control work-phone number-input"
                                                name="work_phone_number" maxlength="15" required>
                                        </div>
                                        <span>Only number!</span>
                                    </div>

                                    <div class="form-group">
                                        <label>In Time <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="time" class="form-control" name="in_time" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Out Time <span class="required-star">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="time" class="form-control" name="out_time" required>
                                        </div>
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
    </div>





    {{-- Modal box when clisk 'set' beside the department section in form, start --}}
    <div class="main-content">
        <form action="{{ route('add.employee.set.department.name') }}" method="POST" class="modal-part"
            id="department-set-modal">
            @csrf
            <div class="form-group">
                <label>Department Name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa-solid fa-house-laptop"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Department Name" id="set_department_name"
                        name="set_department_name" required>
                </div>
                <div class="card-footer text-right" style="padding-right: 0rem;">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
    {{-- Modal box when clisk 'set' beside the department section in form, end --}}

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script>
        // Mobile & Phone number input format validate
        var numbers = document.querySelectorAll('.number-input');
        // console.log(numbers);
        numbers.forEach(elm => {
            elm.addEventListener('input', () => {
                value = parseInt(elm.value)
                if (!isNaN(value)) {
                    elm.value = parseInt(elm.value)
                } else {
                    elm.value = 0
                }
            })
        });
    </script>

    {{-- Set department modal js - form control --}}
    <script>
        $("#department-set").fireModal({
            title: 'Add Department',
            body: $("#department-set-modal"),
            // footerClass: 'bg-whitesmoke',
            // autoFocus: false,
            // onFormSubmit: function(modal, e, form) {
            //   // Form Data
            //   let form_data = $(e.target).serialize();
            //   console.log(form_data)

            //   // DO AJAX HERE
            //   let fake_ajax = setTimeout(function() {
            //     form.stopProgress();
            //     modal.find('.modal-body').prepend('<div class="alert alert-info">Please check your browser console</div>')

            //     clearInterval(fake_ajax);
            //   }, 1500);

            //   e.preventDefault();
            // },
            // shown: function(modal, form) {
            //   console.log(form)
            // },
            // buttons: [{
            //     text: 'Save',                
            //     submit: true,
            //     class: 'btn btn-primary btn-shadow',
            //     handler: function(modal) {}
            // }]
        });
    </script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
@endpush
