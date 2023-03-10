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
            color: rgb(197, 77, 77);
        }
    </style>

    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

{{-- Null variable declare --}}
@php
    $emp_id_no = "";
    $bi_f_n = old('first_name');
    $bi_m_n = old('middle_name');
    $bi_l_n = old('last_name');
    $bi_n_n = old('nickname');
    $bi_g = old('gender');
    $bi_dob = old('date_of_birth');
    $bi_e = old('email');
    $bi_a_e = old('alternative_email');
    $bi_m_no = old('mobile_number');
    $bi_p_no = old('phone_number');
    $bi_j_dt = old('joining_date');
    $bi_b_s_dt = old('billing_start_date');
@endphp

@if (array_key_exists('basic_information', $data))
    {{-- {{ $data['basic_information']->id }}
    {{ $data['basic_information']->first_name }}
    {{ $data['basic_information']->last_name }} --}}

    @php
        $emp_id_no = $data['basic_information']->id;
        $bi_f_n = $data['basic_information']->first_name;
        $bi_m_n = $data['basic_information']->middle_name;
        $bi_l_n = $data['basic_information']->last_name;
        $bi_n_n = $data['basic_information']->nickname;
        $bi_g = $data['basic_information']->gender;
        $bi_dob = $data['basic_information']->dob;
        $bi_e = $data['basic_information']->email;
        $bi_a_e = $data['basic_information']->alter_email;
        $bi_m_no = $data['basic_information']->mobile_no;
        $bi_p_no = $data['basic_information']->phone_no;
        $bi_j_dt = substr($data['basic_information']->joining_date, 0, 10);
        $bi_b_s_dt = substr($data['basic_information']->billing_start_date, 0, 10);
    @endphp
@endif


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
                            <form action="{{ route('employee.basic.information.submit', ['emp_id' => $emp_id_no]) }}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>Basic Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>First Name <span class="required-star">*</span> </label>
                                        <input type="text" class="form-control" name="first_name" maxlength="35"
                                            value="{{ $bi_f_n }}" required>
                                        <span class="required-star">
                                            @error('first_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name"
                                            maxlength="35"value="{{ $bi_m_n }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" maxlength="35"
                                            value="{{ $bi_l_n }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Nick Name</label>
                                        <input type="text" class="form-control" name="nickname" maxlength="35"
                                            value="{{ $bi_n_n }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" maxlength="255"
                                            value="{{ $bi_e }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Alternative Email</label>
                                        <input type="email" class="form-control" name="alternative_email" maxlength="255"
                                            value="{{ $bi_a_e }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Gender <span class="required-star">*</span></label>
                                        <select class="form-control" name="gender" required>
                                            <option value="-1">Please Select One</option>
                                            <option value="1" @php echo ($bi_g == '1' ) ? 'selected' : '' @endphp>Male
                                            </option>
                                            <option value="2" @php echo ($bi_g == '2' ) ? 'selected' : '' @endphp>
                                                Female</option>
                                            <option value="9" @php echo ($bi_g == '3' ) ? 'selected' : '' @endphp>Other
                                            </option>
                                        </select>
                                        <span class="required-star">
                                            @error('gender')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth <span class="required-star">*</span></label>
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ $bi_dob }}" required>
                                        <span class="required-star">
                                            @error('date_of_birth')
                                                {{ $message }}
                                            @enderror
                                        </span>
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
                                                name="mobile_number" maxlength="15" value="{{ $bi_m_no }}" required>
                                        </div>
                                        <span>Only number!</span>
                                        <span class="required-star">
                                            @error('mobile_number')
                                                {{ $message }}
                                            @enderror
                                        </span>
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
                                                name="phone_number" maxlength="15" value="{{ $bi_p_no }}">
                                        </div>
                                        <span>Only number!</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Joining Date <span class="required-star">*</span></label>
                                        <input type="date" class="form-control" name="joining_date"
                                            value="{{ $bi_j_dt }}" required>
                                        <span class="required-star">
                                            @error('joining_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label>Billing Start Date <span class="required-star">*</span></label>
                                        <input type="date" class="form-control" name="billing_start_date"
                                            value="{{ $bi_b_s_dt }}" required>
                                        <span class="required-star">
                                            @error('billing_start_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
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
                            <form action="{{ route('employee.information.submit') }}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>Employee Information</h4>
                                    <span class="required-star">(Fill the basic information first)</span>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Id Number <span class="required-star">*</span> </label>
                                        <input type="text" class="form-control" name="emp_id_no" maxlength="35"
                                            value="{{ $emp_id_no }}" readonly>
                                    </div>


                                    {{-- ???How to add prefix in a primary key??? --}}



                                    <div class="form-group">
                                        <label>
                                            Department<span class="required-star">*</span>
                                            <span class="required-star">
                                                <button class="btn btn-primary" id="department-set">Set</button>
                                            </span>
                                        </label>
                                        <select class="form-control" name="employee_department" required>
                                            <option value="-1">Please Select One</option>
                                            @foreach ($data['department_list'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Type<span class="required-star">*</span></label>
                                        <select class="form-control" name="employee_type" required>
                                            <option value="-1">Please Select One</option>
                                            @foreach ($data['employee_type_list'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->employee_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Position<span class="required-star">*</span></label>
                                        <select class="form-control" name="employee_position" required>
                                            <option value="-1">Please Select One</option>
                                            @foreach ($data['employee_position_list'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->position_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Work Phone</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control work-phone number-input"
                                                name="work_phone_number" maxlength="15">
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
