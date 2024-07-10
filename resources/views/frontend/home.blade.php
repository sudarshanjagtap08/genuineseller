<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genuine Seller</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/stepform.css')}}">


    <script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: 'YOUR_APP_ID',
            cookie: true,
            xfbml: true,
            version: 'v13.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

</head>

<body>
    <div class="btn-box-top pt-2 pe-2">
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn_theme bg-primary text-white rounded-5 hover-secondary py-1 px-3 fs-12"
                data-bs-toggle="modal" data-bs-target="#modalLogin">Login</button>
            <button type="submit" class="btn_theme bg-primary text-white rounded-5 hover-secondary py-1 px-3 fs-12"
                data-bs-toggle="modal" data-bs-target="#modalSellerBuyer">Register</button>
        </div>
    </div>
    <section class="d-flex flex-column align-items-center justify-content-center mt-200px">
        <div class="container">
            <div class="searchBox">
                <div class="brand-logo text-center">
                    <!-- <img src="{{asset('frontend/images/gs-logo-new.png')}}" alt=""> -->
                    <h2 class="h1 heading_big"><span class="color-primary">G</span>enuine <span
                            class="color-secondary">S</span>eller</h2>
                </div>
                <form id="search-form" action="{{ route('search')}}" method="post" class="col-md-6 mx-auto">
                    @csrf
                    <div class="form-group position-relative mb-3">
                        <div class="search icon position-absolute top-50 start-0 translate-middle-y ms-3 z-1">
                            <i class="bi bi-search color-primary"></i>
                        </div>
                        <!-- <input type="search" class="search-input rounded-5" placeholder="Seller or Buyer ID, Name"> -->
                        <input type="search" name="searchTerm" class="search-input rounded-5" placeholder="Seller or Buyer ID, Name">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="searchType" value="Seller" class="btn_theme hover-primary">Seller</button>
                        <button type="submit" name="searchType" value="Buyer" class="btn_theme hover-secondary">Buyer</button>
                    </div>
                </form>
            </div>
        </div>
        
        @if(isset($seller))       
            <div class="container mt-100px">
                <div class="d-flex mb-5">
                    <div class="display-box position-relative col-md-8 col-lg-6 p-5 mx-auto bg-white shadow-sm">
                        <div class="group-title">Seller Details</div>
                        <div class="d-flex mb-2">
                            <div class="col-6">
                                <h6 class="m-0">Seller Name</h6>
                            </div>
                            <div class="col-6">
                                <p class="m-0">: {{ $seller->name }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="col-6">
                                <h6 class="m-0">Seller ID</h6>
                            </div>
                            <div class="col-6">
                                <p class="m-0">: {{ $seller->sellers->first()->seller_documentid }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="col-6">
                                <h6 class="m-0">Verification Status</h6>
                            </div>
                            <div class="col-6">
                                @if($seller->status == "")
                                    <p class="m-0">: UnVerify </p>
                                @elseif($seller->status == "1")
                                    <p class="m-0">: Verify </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($buyer))       
            <div class="container mt-100px">
                <div class="d-flex mb-5">
                    <div class="display-box position-relative col-md-8 col-lg-6 p-5 mx-auto bg-white shadow-sm">
                        <div class="group-title">Buyer Details</div>
                        <div class="d-flex mb-2">
                            <div class="col-6">
                                <h6 class="m-0">Buyer Name</h6>
                            </div>
                            <div class="col-6">
                                <p class="m-0">: {{ $buyer->name }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="col-6">
                                <h6 class="m-0">Buyer ID</h6>
                            </div>
                            <div class="col-6">
                                <p class="m-0">: {{ $buyer->buyers->first()->buyer_documentid }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="col-6">
                                <h6 class="m-0">Verification Status</h6>
                            </div>
                            <div class="col-6">
                            @if($buyer->status == "")
                                    <p class="m-0">: UnVerify </p>
                                @elseif($buyer->status == "1")
                                    <p class="m-0">: Verify </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>


    <!-- Modal Login -->
    <div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-sm">
            <div class="modal-content">
                <div class="modal-body position-relative p-4">
                    <button type="button"
                        class="position-absolute top-0 start-100 bg-primary translate-middle ms-auto px-2 py-0 hover-secondary rounded-circle border-0 text-white"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center mb-4">
                        <h2 class="fw-bolder color-primary">Login</h2>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- <form action="#" class="login-form"> -->
                        <div class="">
                            <label for="username" class="input-label mb-1">Username</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="username-icon">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <!-- <input type="text" id="username" name="username" aria-label="Username" class="form-control form-input" placeholder="Type your username"> -->
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label for="password" class="input-label mb-1">Password</label>
                            <div class="input-group mb-0">
                                <span class="input-group-text" id="password-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <!-- <input type="password" id="password" name="password" aria-label="Password" class="form-control form-input" placeholder="Type your password"> -->
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-end mb-3">
                            <a role="button" class="link-default input-label" data-bs-toggle="modal"
                                data-bs-target="#modalForgotPassSendOTP">Forgot password?</a>
                        </div>
                        <button type="submit"
                            class="btn_theme bg-primary w-100 rounded-5 text-white hover-secondary">Login</button>
                    </form>
                    <div class="my-3 text-center fs-12">Or</div>
                    <div class="icon-box text-center">
                        <a href="#" class="link-default">
                            <img src="{{asset('frontend/images/facebook.png')}}" class="icon-img drop-shadow"
                                alt="Facebook">
                        </a>
                        <a href="#" class="link-default">
                            <img src="{{asset('frontend/images/google.png')}}" class="icon-img drop-shadow"
                                alt="Google">
                        </a>
                        <a href="#" class="link-default">
                            <img src="{{asset('frontend/images/email.png')}}" class="icon-img drop-shadow" alt="Email">
                        </a>
                    </div>
                    <div class="my-3 text-center fs-12">
                        Don't have an account? <a role="button" class="link-default" data-bs-toggle="modal"
                            data-bs-target="#modalSellerBuyer">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal send OTP -->
    <div class="modal fade" id="modalForgotPassSendOTP" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body position-relative p-4">
                    <button type="button"
                        class="position-absolute top-0 start-100 bg-primary translate-middle ms-auto px-2 py-0 hover-secondary rounded-circle border-0 text-white"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center mb-4">
                        <h5 class="fw-bolder color-primary">Forgot Password?</h5>
                    </div>
                    <form id="forgotPassEmailform" class="login-form">
                        <div class="mb-3">
                            <label for="emailforgotpass" class="input-label mb-1">Enter Registered Email </label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="username-icon">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" id="emailforgotpass" name="emailforgotpass"
                                    aria-label="emailforgotpass" class="form-control form-input"
                                    placeholder="Type your email" required>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="submit" id="forgotPassEmail"
                                class="btn_theme mx-auto bg-primary w- rounded-5 text-white hover-secondary">Continue</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal send OTP -->
    <div class="modal fade" id="modalForgotPassVerifyOTP" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body position-relative p-4">
                    <button type="button"
                        class="position-absolute top-0 start-100 bg-primary translate-middle ms-auto px-2 py-0 hover-secondary rounded-circle border-0 text-white"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center mb-4">
                        <h2 class="fw-bolder color-primary">Verify OTP</h2>
                    </div>
                    <form action="#" class="login-form">
                        <div class="mb-3">
                            <label for="" class="input-label mb-1">OTP has been sent on registered email
                                abc@email.com</label>
                            <div class="input-group mb-2">
                                <!-- <span class="input-group-text" id="username-icon">
                        <i class="bi bi-envelope"></i>
                    </span> -->
                                <input type="text" id="verifyOTP" name="verifyOTP" aria-label="verifyOTP"
                                    class="form-control form-input" placeholder="Enter OTP">
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="button" id="btnverifyOTP"
                                class="btn_theme mx-auto bg-primary w- rounded-5 text-white hover-secondary">Verify
                                OTP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="modalResetPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-sm">
            <div class="modal-content">
                <div class="modal-body position-relative p-4">
                    <button type="button"
                        class="position-absolute top-0 start-100 bg-primary translate-middle ms-auto px-2 py-0 hover-secondary rounded-circle border-0 text-white"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center">
                        <h3 class="fs-title mb-4">Reset Password</h3>
                        <h3 class="fs-subtitle"></h3>
                        <form class="mb-4" id="resetPasswordForm">
                            <div class=" text-start mb-3">
                                <label for="new_password" class="input-label mb-1">New Password <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-0">
                                    <span class="input-group-text" id="password-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </span>
                                    <input type="password" id="new_password" name="password" aria-label="Password"
                                        class="form-control form-input" placeholder="Type your password">
                                </div>
                            </div>
                            <div class=" text-start mb-3">
                                <label for="confirm_password" class="input-label mb-1">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-0">
                                    <span class="input-group-text" id="password-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </span>
                                    <input type="password" id="confirm_password" name="password" aria-label="Password"
                                        class="form-control form-input" placeholder="Type your password">
                                </div>
                            </div>
                        </form>
                        <input type="button" name="next" id="btn_updatePassword"
                            class="btn_theme bg-primary text-white hover-secondary" value="Update Password" />
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="modalSellerBuyer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-sm">
            <div class="modal-content">
                <div class="modal-body position-relative p-4">
                    <button type="button"
                        class="position-absolute top-0 start-100 bg-primary translate-middle ms-auto px-2 py-0 hover-secondary rounded-circle border-0 text-white"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center">
                        <h3 class="fs-title mb-4">Are you a</h3>
                        <h3 class="fs-subtitle"></h3>
                        <form class="mb-4" id="radioSellerBuyer">
                            <input type="radio" class="btn-check" name="buyer-or-seller" value="Seller" id="seller"
                                autocomplete="off" checked>
                            <label class="btn btn-outline-success" for="seller">Seller</label>

                            <input type="radio" class="btn-check" name="buyer-or-seller" value="Buyer" id="buyer"
                                autocomplete="off">
                            <label class="btn btn-outline-success" for="buyer">Buyer</label>
                        </form>
                        <input type="button" name="next" id="btn_buyer_seller"
                            class="btn_theme bg-primary text-white hover-secondary" value="Next" />
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Register (Multi-Step Form) -->
    <div class="modal fade" id="modalRegisterSeller" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body position-relative p-0">
                    <button type="button"
                        class="position-absolute top-0 start-100 bg-primary translate-middle ms-auto px-2 py-0 hover-secondary rounded-circle border-0 text-white"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center my-3">
                        <h2 class="fw-bolder color-primary mb-0">Register as Seller</h2>
                    </div>
                    <!-- ========= -->
                    <!-- multistep form -->
                    <form id="multistepsform" action="{{ route('seller.register')}}" method="post">
                        @csrf
                        <ul id="progressbar" class="ps-0 d-flex justify-content-center">
                            <li class="active">Step 1</li>
                            <li>Step 2</li>
                            <li>Step 3</li>
                            <li>Step 4</li>
                            <li>Step 5</li>
                            <li>Step 6</li>
                            <li>Step 7</li>
                            <li>Step 8</li>
                            <li>Step 9</li>
                        </ul>
                        <fieldset>
                            <h2 class="fs-title fw-bold">Personal Details</h2>
                            <h3 class="fs-subtitle">We will never sell it</h3>
                            <div class="d-flex flex-wrap">
                                <div class="col-12 pe-sm-1">
                                    <div class="text-start">
                                        <label for="" class="fs-12 fw-bold">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder="Full Name*" />
                                    </div>
                                </div>
                            </div>
                            <div class="text-start">
                                <label for="personal-Photo" class="fs-12 fw-bold">Upload Photo*</label>
                                <input type="file" id="personal-Photo" class="p-0" name="personal_photo"
                                    placeholder="photo" />
                            </div>
                            <div class="text-start">
                                <label for="" class="fs-12 fw-bold">Email ID<span class="text-danger">*</span></label>
                                <input type="email" name="email" placeholder="Email ID" />
                            </div>
                            <div class="text-start">
                                <label for="" class="fs-12 fw-bold">Password<span class="text-danger">*</span></label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                            </div>
                            <div class="d-flex flex-wrap text-start">
                                <div class="col-sm-6 col-12 pe-sm-1">
                                    <label for="" class="fs-12 fw-bold">Mobile Number <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" name="mobilenumber" placeholder="Mobile No. (Personal)" />
                                </div>
                                <div class="col-sm-6 col-12 ps-sm-1">
                                    <label for="" class="fs-12 fw-bold">Landline (Home)</label>
                                    <input type="text" name="landlinehome" placeholder="Landline No. (Home)" />
                                </div>
                                <div class="col-sm-6 col-12 pe-sm-1">
                                    <label for="" class="fs-12 fw-bold">Landline (Office)</label>
                                    <input type="text" name="landlineoffice" placeholder="Landline No. (Office)" />
                                </div>
                                <div class="col-sm-6 col-12 ps-sm-1">
                                    <label for="" class="fs-12 fw-bold">Mobile No. (Other)</label>
                                    <input type="tel" name="othermobile" placeholder="Mobile No. (Any Other)" />
                                </div>
                            </div>
                            <div class="text-start">
                                <label for="" class="fs-12 fw-bold">Address <span class="text-danger">*</span></label>
                                <textarea name="address" placeholder="Address"></textarea>
                            </div>
                            <div class="text-start">
                                <label for="" class="fs-12 fw-bold">Address (line 2)</label>
                                <textarea name="address2" placeholder="Address (line 2)*"></textarea>
                            </div>
                            <div class="d-flex flex-wrap text-start">
                                <div class="col-12">
                                    <label for="" class="fs-12 fw-bold">Landmark <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="landmark" placeholder="Landmark" />
                                </div>
                                <div class="col-sm-6 col-12 pe-sm-1">
                                    <label for="" class="fs-12 fw-bold">Area <span class="text-danger">*</span></label>
                                    <input type="text" name="area" placeholder="Area" />
                                </div>
                                <div class="col-sm-6 col-12 ps-sm-1">
                                    <label for="" class="fs-12 fw-bold">City <span class="text-danger">*</span></label>
                                    <input type="text" name="city_id" placeholder="City" />
                                </div>
                                <div class="col-sm-6 col-12 pe-sm-1">
                                    <label for="" class="fs-12 fw-bold">Country <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="country_id" aria-label="Default select state">
                                        <option value="1" selected>India</option>
                                        <option value="2">US</option>
                                        <option value="3">Bangladesh</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12 ps-sm-1">
                                    <label for="" class="fs-12 fw-bold">State <span class="text-danger">*</span></label>
                                    <select class="form-select" name="state_id" aria-label="Default select state">
                                        <option selected>Select</option>
                                        <option value="1">Maharashtra</option>
                                        <option value="2">Gujarat</option>
                                        <option value="3">Rajastan</option>
                                    </select>
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Attachments</h2>
                            <h3 class="fs-subtitle">Upload Your Documents</h3>

                            <div class="text-start">
                                <label for="pan-card-upload" class="fs-12 fw-bold">Pan Card <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="panCardNo" placeholder="Pan card No*" />
                                <input type="file" id="pan_card_upload" class="p-0" name="pan_card_upload"
                                    placeholder="photo" />
                            </div>
                            <div class="text-start">
                                <label for="adhaar-card-upload" class="fs-12 fw-bold">Adhaar Card <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="adhaarCardNo" placeholder="Adhaar card No*" />
                                <input type="file" id="adhaar_card_upload" class="p-0" name="adhaar_card_upload" />
                            </div>
                            <div class="text-start">
                                <label for="passport-upload" class="fs-12 fw-bold">Passport <span
                                        class="text-danger">*</span></label>
                                <input type="file" id="passport_upload" class="p-0" name="passport_upload" />
                            </div>
                            <div class="text-start">
                                <label for="mbl-ll-bill-upload" class="fs-12 fw-bold">Mobile Bill/LL Bill <span
                                        class="text-danger">*</span></label>
                                <input type="file" id="mbl_ll_bill_upload" class="p-0" name="mbl_ll_bill_upload" />
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Bank Details</h2>
                            <h3 class="fs-subtitle"></h3>
                            <div class="text-start">
                                <label for="bankAccNo" class="fs-12 fw-bold">Account No. <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="bankaccno" name="bankaccno" placeholder="Your Account No." />
                            </div>
                            <div class="text-start">
                                <label for="bankName" class="fs-12 fw-bold">Bank Name. <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="bankname" name="bankname" placeholder="Your Bank Name." />
                            </div>
                            <div class="text-start">
                                <label for="bankIFSC" class="fs-12 fw-bold">IFSC Code. <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="bankifsc" name="bankifsc" placeholder="IFSC Code" />
                            </div>
                            <div class="text-start">
                                <label for="bankAccHolderName" class="fs-12 fw-bold">Account Holder Name. <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="bankaccholdername" name="bankaccholdername"
                                    placeholder="Account Holder Name" />
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title mb-4">Mode of Payments</h2>
                            <div class="d-flex justify-content-center mb-3">
                                <div class="">
                                    <div class="d-flex mb-3">
                                        <div class="form-check form-check-inline me-2 d-flex align-items-center me-5">
                                            <input class="form-check-input w-auto me-2" type="checkbox"
                                                name="mode_of_payment_phonepe" id="mode_of_payment_phonepe"
                                                value="phonepay">
                                            <label class="form-check-label" for="Mode_of_payment_phonepe">
                                                <img src="{{asset('frontend/images/phonepe.png')}}"
                                                    class="modeOfPaymentIcon" alt="">
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                            <input class="form-check-input w-auto me-2" type="checkbox"
                                                name="mode_of_payment_gpay" id="mode_of_payment_gpay" value="googlepay">
                                            <label class="form-check-label" for="Mode_of_payment_gpay">
                                                <img src="{{asset('frontend/images/gpay.jpg')}}"
                                                    class="modeOfPaymentIcon" alt="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="form-check form-check-inline me-2 d-flex align-items-center me-5">
                                            <input class="form-check-input w-auto me-2" type="checkbox"
                                                name="mode_of_payment_bank" id="mode_of_payment_bank" value="banktransfer">
                                            <label class="form-check-label" for="Mode_of_payment_bank">
                                                <img src="{{asset('frontend/images/bank_transfer.jpg')}}"
                                                    class="modeOfPaymentIcon" alt="">
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                            <input class="form-check-input w-auto me-2" type="checkbox"
                                                name="mode_of_payment_card" id="mode_of_payment_card" value="card">
                                            <label class="form-check-label" for="Mode_of_payment_card">
                                                <img src="{{asset('frontend/images/Debit-Card-Credit-Card.jpg')}}"
                                                    class="modeOfPaymentIcon" alt="">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title ">Social Profiles</h2>
                            <h3 class="fs-subtitle mb-4">Your social network</h3>

                            <div class="text-start fs-12">
                                <label for="whatsappno" class="fs-12 fw-bold">Whatsapp No <span
                                        class="text-danger">*</span></label>
                                <input type="tel" name="whatsapnumber" class="" id="whatsapnumber"
                                    placeholder="Enter whatsapp no">
                            </div>
                            <div class="text-start fs-12">
                                <label for="fblink" class="fs-12 fw-bold">Facebook Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="fblink" class="mb-0" id="fblink" name="fblink"
                                        placeholder="Facebook Profile">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>
                            <div class="text-start fs-12">
                                <label for="instagramLink" class="fs-12 fw-bold">Instagram Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="instagramLink" class="mb-0" id="instagramlink"
                                        name="instagramlink" placeholder="Instagram Profile">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>
                            <div class="text-start fs-12">
                                <label for="snapchatLink" class="fs-12 fw-bold">Snapchat Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="snapchatLink" class="mb-0" id="snapchatlink"
                                        name="snapchatlink" placeholder="Snapchat Profile">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>
                            <div class="text-start fs-12">
                                <label for="pinterestLink" class="fs-12 fw-bold">Pinterest Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="pinterestLink" class="mb-0" id="pinterestlink"
                                        name="pinterestlink" placeholder="Pinterest Profile">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>
                            <div class="text-start fs-12">
                                <label for="websiteLink" class="fs-12 fw-bold">Website Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="websiteLink" class="mb-0" id="websitelink"
                                        name="websitelink" placeholder="Your Website">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title mb-4">Family Details</h2>
                            <!-- <h3 class="fs-subtitle">Your padvadvav davdv social network</h3> -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link fs-12 p-1 p-sm-2 active" id="nav-familyMember1-tab" data-bs-toggle="tab" data-bs-target="#nav-familyMember1" type="button" role="tab" aria-controls="nav-familyMember1" aria-selected="true">Mem-1 <span class="text-danger">*</span></button>
                                    <button class="nav-link fs-12 p-1 p-sm-2" id="nav-member2-tab" data-bs-toggle="tab" data-bs-target="#nav-member2" type="button" role="tab" aria-controls="nav-member2" aria-selected="false">Mem-2</button>
                                    <button class="nav-link fs-12 p-1 p-sm-2" id="nav-member3-tab" data-bs-toggle="tab" data-bs-target="#nav-member3" type="button" role="tab" aria-controls="nav-member3" aria-selected="false">Mem-3</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-familyMember1" role="tabpanel" aria-labelledby="nav-familyMember1-tab" tabindex="0">

                                    <div class="text-start mt-3">
                                        <label for="familyMember1Name" class="input-label mb-1 fw-bold">Name <span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" id="familyMember1Name" name="familymembername[1]" aria-label="familyMember1Name" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" required placeholder="Enter the name">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember1Number" class="input-label mb-1 fw-bold">Contact Number <span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel" id="familyMember1Number" name="familymembernumber[1]" aria-label="familyMember1Number" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" required placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember1Email" class="input-label mb-1 fw-bold">Email ID <span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-envelope-at"></i>
                                            </span>
                                            <input type="email" id="familyMember1Email" name="familymemberemail[1]" aria-label="familyMember1Email" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" required placeholder="Email ID">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember1FBLink" class="input-label mb-1 fw-bold">Facebook Link</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-facebook"></i>
                                            </span>
                                            <input type="text" id="familyMember1FBLink" name="familymemberfblink[1]" aria-label="familyMember1FBLink" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" placeholder="Facebook Link">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-member2" role="tabpanel" aria-labelledby="nav-member2-tab" tabindex="0">
                                    <div class="text-start mt-3">
                                        <label for="familyMember2Name" class="input-label mb-1 fw-bold">Name</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" id="familyMember2Name" name="familymembername[2]" aria-label="familyMember2Name" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Enter the name">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember2Number" class="input-label mb-1 fw-bold">Contact Number</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel" id="familyMember2Number" name="familymembernumber[2]" aria-label="familyMember2Number" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember2Email" class="input-label mb-1 fw-bold">Email ID </label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-envelope-at"></i>
                                            </span>
                                            <input type="email" id="familyMember2Email" name="familyMemberemail[2]" aria-label="familyMember2Email" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Email ID">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember2FBLink" class="input-label mb-1 fw-bold">Facebook Link</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-facebook"></i>
                                            </span>
                                            <input type="text" id="familyMember2FBLink" name="familymemberfblink[2]" aria-label="familyMember2FBLink" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" placeholder="Facebook Link">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-member3" role="tabpanel" aria-labelledby="nav-member3-tab" tabindex="0">
                                    <div class="text-start mt-3">
                                        <label for="familyMember3Name" class="input-label mb-1 fw-bold">Name</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" id="familyMember3Name" name="familymembername[3]" aria-label="familyMember3Name" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Enter the name">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember3Number" class="input-label mb-1 fw-bold">Contact Number</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel" id="familyMember3Number" name="familymembernumber[3]" aria-label="familyMember3Number" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember3Email" class="input-label mb-1 fw-bold">Email ID</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-envelope-at"></i>
                                            </span>
                                            <input type="email" id="familyMember3Email" name="familymemberemail[3]" aria-label="familyMember3Email" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Email ID">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember3FBLink" class="input-label mb-1 fw-bold">Facebook Link</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-facebook"></i>
                                            </span>
                                            <input type="text" id="familyMember3FBLink" name="familymemberfblink[3]" aria-label="familyMember3FBLink" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" placeholder="Facebook Link">
                                        </div>
                                    </div>

                                </div>
                            </div>                          
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Friend Details</h2>
                            <div class="text-start mt-3">
                                <label for="friendName" class="input-label mb-1 fw-bold">Name <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text input-icon-common" id="">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" id="friendName" name="friendname" aria-label="friendName"
                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                        placeholder="Enter the name">
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <label for="friendNumber" class="input-label mb-1 fw-bold">Contact Number <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text input-icon-common" id="">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input type="text" id="friendNumber" name="friendnumber" aria-label="friendNumber"
                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                        placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <label for="friendEmail" class="input-label mb-1 fw-bold">Email ID <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text input-icon-common" id="">
                                        <i class="bi bi-envelope-at"></i>
                                    </span>
                                    <input type="text" id="friendEmail" name="friendemail" aria-label="friendEmail"
                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                        placeholder="Email ID">
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <label for="friendFBLink" class="input-label mb-1 fw-bold">Facebook Link</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text input-icon-common" id="">
                                        <i class="bi bi-facebook"></i>
                                    </span>
                                    <input type="text" id="friendFBLink" name="friendfblink" aria-label="friendFBLink"
                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                        placeholder="Facebook Link">
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Seller Type</h2>
                            <div class="text-start">
                                <div class="pone mb-2">
                                    <input class="radio-btn me-1" type="radio" name="sellerType" id="sellerTypeReseller"
                                        value="Reseller" checked>
                                    <label class="" for="sellerTypeReseller">
                                        Reseller
                                    </label>
                                </div>
                                <div class="ptwo mb-2">
                                    <input class="radio-btn me-1" type="radio" name="sellerType"
                                        id="sellerTypeManufacturer" value="Manufacturer">
                                    <label class="" for="sellerTypeManufacturer">
                                        Manufacturer
                                    </label>
                                    <div class="madeTypeBox text-start">
                                        <div class="d-sm-flex">
                                            <div class="pone me-2 ps-4">
                                                <input class="radio-btn me-1" type="radio" name="manufacturerMadeType"
                                                    id="madeTypeHomemade" value="Reseller" checked>
                                                <label class="" for="madeTypeHomemade">
                                                    Home Made
                                                </label>
                                            </div>
                                            <div class="pone ps-4 ps-sm-0">
                                                <input class="radio-btn me-1" type="radio" name="manufacturerMadeType"
                                                    id="madeTypeHandmade" value="Reseller">
                                                <label class="" for="madeTypeHandmade">
                                                    Hand Made
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pthree">
                                    <input class="radio-btn me-1" type="radio" name="sellerType" id="sellerTypeService"
                                        value="Service">
                                    <label class="" for="sellerTypeService">
                                        Service
                                    </label>
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />

                            <button type="submit" class="btn btn-success">Submit</button>
                            <!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
                        </fieldset>
                    </form>
                    <!-- ========= -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalRegisterBuyer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body position-relative p-0">
                    <button type="button"
                        class="position-absolute top-0 start-100 bg-primary translate-middle ms-auto px-2 py-0 hover-secondary rounded-circle border-0 text-white"
                        data-bs-dismiss="modal" aria-label="Close">X</button>
                    <div class="text-center my-3">
                        <h2 class="fw-bolder color-primary">Register as Buyer</h2>
                    </div>
                    <!-- ========= -->
                    <!-- multistep form -->
                    <form id="multistepsform-buyer" action="{{ route('buyer.register')}}" method="post">
                        @csrf
                        <!-- <form id="multistepsform-buyer"> -->
                        <ul id="progressbar" class="ps-0 d-flex justify-content-center">
                            <li class="active">Step 1</li>
                            <li>Step 2</li>
                            <li>Step 3</li>
                            <li>Step 4</li>
                            <li>Step 5</li>
                            <li>Step 6</li>
                            <li>Step 7</li>
                        </ul>

                        <fieldset>
                            <h2 class="fs-title fw-bold">Personal Details</h2>
                            <h3 class="fs-subtitle">We will never sell it</h3>
                            <div class="d-flex flex-wrap">
                                <div class="col-12 pe-sm-1">
                                    <div class="text-start">
                                        <label for="" class="fs-12 fw-bold">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder="Full Name*" />
                                    </div>
                                </div>
                            </div>
                            <div class="text-start">
                                <label for="buyerpersonal-Photo" class="fs-12 fw-bold">Upload Photo*</label>
                                <input type="file" id="buyerpersonal-Photo" class="p-0" name="personal-Photo"
                                    placeholder="photo" />
                            </div>
                            <div class="text-start">
                                <label for="" class="fs-12 fw-bold">Email ID <span class="text-danger">*</span></label>
                                <input type="email" name="email" placeholder="Email ID (Personal)" />
                            </div>
                            <div class="text-start">
                                <label for="" class="fs-12 fw-bold">Password<span class="text-danger">*</span></label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password">
                            </div>
                            <div class="d-flex flex-wrap text-start">
                                <div class="col-sm-6 col-12 pe-sm-1">
                                    <label for="" class="fs-12 fw-bold">Mobile Number <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" name="mobilenumber" placeholder="Mobile No. (Personal)" />
                                </div>
                                <div class="col-sm-6 col-12 ps-sm-1">
                                    <label for="" class="fs-12 fw-bold">Landline (Home)</label>
                                    <input type="text" name="landlinehome" placeholder="Landline No. (Home)" />
                                </div>
                                <div class="col-sm-6 col-12 pe-sm-1">
                                    <label for="" class="fs-12 fw-bold">Landline (Office)</label>
                                    <input type="text" name="landlineoffice" placeholder="Landline No. (Office)" />
                                </div>
                                <div class="col-sm-6 col-12 ps-sm-1">
                                    <label for="" class="fs-12 fw-bold">Mobile No. (Other)</label>
                                    <input type="tel" name="othermobile" placeholder="Mobile No. (Any Other)" />
                                </div>
                            </div>

                            <div class="text-start">
                                <label for="" class="fs-12 fw-bold">Address <span class="text-danger">*</span></label>
                                <textarea name="address" placeholder="Address"></textarea>
                            </div>
                            <div class="text-start">
                                <label for="" class="fs-12 fw-bold">Address (line 2)</label>
                                <textarea name="address" placeholder="Address (line 2)*"></textarea>
                            </div>

                            <div class="d-flex flex-wrap text-start">
                                <div class="col-12">
                                    <label for="" class="fs-12 fw-bold">Landmark <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="landmark" placeholder="Landmark" />
                                </div>
                                <div class="col-sm-6 col-12 pe-sm-1">
                                    <label for="" class="fs-12 fw-bold">Area <span class="text-danger">*</span></label>
                                    <input type="text" name="area" placeholder="Area" />
                                </div>
                                <div class="col-sm-6 col-12 ps-sm-1">
                                    <label for="" class="fs-12 fw-bold">City <span class="text-danger">*</span></label>
                                    <input type="text" name="city_id" placeholder="City" />
                                </div>
                                <div class="col-sm-6 col-12 pe-sm-1">
                                    <label for="" class="fs-12 fw-bold">Country <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="country_id" aria-label="Default select state"
                                        >
                                        <option value="1" selected>India</option>
                                        <option value="2">US</option>
                                        <option value="3">Bangladesh</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12 ps-sm-1">
                                    <label for="" class="fs-12 fw-bold">State <span class="text-danger">*</span></label>
                                    <select class="form-select" name="state_id" aria-label="Default select state"
                                        >
                                        <option selected>Select</option>
                                        <option value="1">Maharashtra</option>
                                        <option value="2">Gujarat</option>
                                        <option value="3">Rajastan</option>
                                    </select>
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Attachments</h2>
                            <h3 class="fs-subtitle">Upload Your Documents</h3>

                            <div class="text-start">
                                <label for="buyer-pan-card-upload" class="fs-12 fw-bold">Pan Card <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="panCardno" placeholder="Pan card No*" />
                                <input type="file" id="buyer-pan-card-upload" class="p-0" name="pan-card-upload"
                                    placeholder="photo" />
                            </div>
                            <div class="text-start">
                                <label for="buyer-adhaar-card-upload" class="fs-12 fw-bold">Adhaar Card <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="adhaarcardno" placeholder="Adhaar card No*" />
                                <input type="file" id="buyer-adhaar-card-upload" class="p-0"
                                    name="adhaar_card_upload" />
                            </div>
                            <div class="text-start">
                                <label for="buyer-passport-upload" class="fs-12 fw-bold">Passport <span
                                        class="text-danger">*</span></label>
                                <input type="file" id="buyer-passport-upload" class="p-0" name="passport_upload" />
                            </div>
                            <div class="text-start">
                                <label for="buyer-mbl-ll-bill-upload" class="fs-12 fw-bold">Mobile Bill/LL Bill <span
                                        class="text-danger">*</span></label>
                                <input type="file" id="buyer-mbl-ll-bill-upload" class="p-0"
                                    name="mbl_ll_bill_upload" />
                            </div>

                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Bank Details</h2>
                            <h3 class="fs-subtitle"></h3>
                            <div class="text-start">
                                <label for="buyer-bankAccNo" class="fs-12 fw-bold">Account No. <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="buyer-bankAccNo" name="bankaccno"
                                    placeholder="Your Account No." />
                            </div>
                            <div class="text-start">
                                <label for="buyer-bankName" class="fs-12 fw-bold">Bank Name. <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="buyer-bankName" name="bankname" placeholder="Your Bank Name." />
                            </div>
                            <div class="text-start">
                                <label for="buyer-bankIFSC" class="fs-12 fw-bold">IFSC Code. <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="buyer-bankIFSC" name="bankifsc" placeholder="IFSC Code" />
                            </div>
                            <div class="text-start">
                                <label for="buyer-bankAccHolderName" class="fs-12 fw-bold">Account Holder Name. <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="buyer-bankAccHolderName" name="bankaccholdername"
                                    placeholder="Account Holder Name" />
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title mb-4">Mode of Payments</h2>
                            <div class="d-flex justify-content-center mb-3">
                                <div class="">
                                    <div class="d-flex mb-3">
                                        <div class="form-check form-check-inline me-2 d-flex align-items-center me-5">
                                            <input class="form-check-input w-auto me-2" type="checkbox"
                                                name="mode_of_payment_phonepe" id="buyer_Mode_of_payment_phonepe"
                                                value="phonepay">
                                            <label class="form-check-label" for="buyer_Mode_of_payment_phonepe">
                                                <img src="{{asset('frontend/images/phonepe.png')}}"
                                                    class="modeOfPaymentIcon" alt="">
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                            <input class="form-check-input w-auto me-2" type="checkbox"
                                                name="mode_of_payment_gpay" id="buyer_Mode_of_payment_gpay"
                                                value="googlepay">
                                            <label class="form-check-label" for="buyer_Mode_of_payment_gpay">
                                                <img src="{{asset('frontend/images/gpay.jpg')}}"
                                                    class="modeOfPaymentIcon" alt="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="form-check form-check-inline me-2 d-flex align-items-center me-5">
                                            <input class="form-check-input w-auto me-2" type="checkbox"
                                                name="mode_of_payment_bank" id="buyer_Mode_of_payment_bank"
                                                value="banktransfer">
                                            <label class="form-check-label" for="buyer_Mode_of_payment_bank">
                                                <img src="{{asset('frontend/images/bank_transfer.jpg')}}"
                                                    class="modeOfPaymentIcon" alt="">
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline me-2 d-flex align-items-center">
                                            <input class="form-check-input w-auto me-2" type="checkbox"
                                                name="mode_of_payment_card" id="buyer_Mode_of_payment_card"
                                                value="card">
                                            <label class="form-check-label" for="buyer_Mode_of_payment_card">
                                                <img src="{{asset('frontend/images/Debit-Card-Credit-Card.jpg')}}"
                                                    class="modeOfPaymentIcon" alt="">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title ">Social Profiles</h2>
                            <h3 class="fs-subtitle mb-4">Your social network</h3>
                            <div class="text-start fs-12">
                                <label for="buyer-whatsappNo" class="fs-12 fw-bold">Whatsapp No <span
                                        class="text-danger">*</span></label>
                                <input type="tel" name="whatsappnumber" class="" id="buyer-whatsappNo"
                                    placeholder="Enter whatsapp no">
                            </div>
                            <div class="text-start fs-12">
                                <label for="buyer-FBLink" class="fs-12 fw-bold">Facebook Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="fblink" class="flex-grow-1 m-0" id="buyer-FBLink"
                                        placeholder="Facebook Profile">
                                    <button type="button" onclick="checkLoginState()"
                                        class="p-1 bg-primary text-white px-2 border-0"> + </button>
                                </div>
                            </div>
                            <div class="text-start fs-12">
                                <label for="buyer-instagramLink" class="fs-12 fw-bold">Instagram Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="instagramlink" class="mb-0" id="buyer-instagramLink"
                                        placeholder="Instagram Profile">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>
                            <div class="text-start fs-12">
                                <label for="buyer-snapchatLink" class="fs-12 fw-bold">Snapchat Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="snapchatlink" class="mb-0" id="buyer-snapchatLink"
                                        placeholder="Snapchat Profile">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>
                            <div class="text-start fs-12">
                                <label for="buyer-pinterestLink" class="fs-12 fw-bold">Pinterest Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="pinterestlink" class="mb-0" id="buyer-pinterestLink"
                                        placeholder="Pinterest Profile">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>
                            <div class="text-start fs-12">
                                <label for="buyer-websiteLink" class="fs-12 fw-bold">Website Link</label>
                                <div class="d-flex mb-2">
                                    <input type="text" name="websitelink" class="mb-0" id="buyer-websiteLink"
                                        placeholder="Your Website">
                                    <button type="button" onclick="" class="p-1 bg-primary text-white px-2 border-0"> +
                                    </button>
                                </div>
                            </div>

                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title mb-4">Family Details</h2>
                            <!-- <h3 class="fs-subtitle">Your padvadvav davdv social network</h3> -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link fs-12 p-1 p-sm-2 active" id="buyer_nav-familyMember1-tab" data-bs-toggle="tab" data-bs-target="#buyer_nav-familyMember1" type="button" role="tab" aria-controls="nav-familyMember1" aria-selected="true">Mem-1 <span class="text-danger">*</span></button>
                                    <button class="nav-link fs-12 p-1 p-sm-2" id="buyer_nav-member2-tab" data-bs-toggle="tab" data-bs-target="#buyer_nav-member2" type="button" role="tab" aria-controls="nav-member2" aria-selected="false">Mem-2</button>
                                    <button class="nav-link fs-12 p-1 p-sm-2" id="buyer_nav-member3-tab" data-bs-toggle="tab" data-bs-target="#buyer_nav-member3" type="button" role="tab" aria-controls="nav-member3" aria-selected="false">Mem-3</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="buyer_nav-familyMember1" role="tabpanel" aria-labelledby="nav-familyMember1-tab" tabindex="0">

                                    <div class="text-start mt-3">
                                        <label for="familyMember1Name" class="input-label mb-1 fw-bold">Name <span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" id="familyMember1Name" name="familymembername[1]" aria-label="familyMember1Name" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" required placeholder="Enter the name">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember1Number" class="input-label mb-1 fw-bold">Contact Number <span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel" id="familyMember1Number" name="familymembernumber[1]" aria-label="familyMember1Number" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" required placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember1Email" class="input-label mb-1 fw-bold">Email ID <span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-envelope-at"></i>
                                            </span>
                                            <input type="email" id="familyMember1Email" name="familymemberemail[1]" aria-label="familyMember1Email" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" required placeholder="Email ID">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember1FBLink" class="input-label mb-1 fw-bold">Facebook Link</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-facebook"></i>
                                            </span>
                                            <input type="text" id="familyMember1FBLink" name="familymemberfblink[1]" aria-label="familyMember1FBLink" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" placeholder="Facebook Link">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="buyer_nav-member2" role="tabpanel" aria-labelledby="nav-member2-tab" tabindex="0">
                                    <div class="text-start mt-3">
                                        <label for="familyMember2Name" class="input-label mb-1 fw-bold">Name</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" id="familyMember2Name" name="familymembername[2]" aria-label="familyMember2Name" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Enter the name">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember2Number" class="input-label mb-1 fw-bold">Contact Number</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel"  id="familyMember2Number" name="familymembernumber[2]" aria-label="familyMember2Number" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember2Email" class="input-label mb-1 fw-bold">Email ID </label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-envelope-at"></i>
                                            </span>
                                            <input type="email" id="familyMember2Email" name="familyMemberemail[2]" aria-label="familyMember2Email" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Email ID">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember2FBLink" class="input-label mb-1 fw-bold">Facebook Link</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-facebook"></i>
                                            </span>
                                            <input type="text" id="familyMember2FBLink" name="familymemberfblink[2]" aria-label="familyMember2FBLink" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" placeholder="Facebook Link">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="buyer_nav-member3" role="tabpanel" aria-labelledby="nav-member3-tab" tabindex="0">
                                    <div class="text-start mt-3">
                                        <label for="familyMember3Name" class="input-label mb-1 fw-bold">Name</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-person"></i>
                                            </span>
                                            <input type="text" id="familyMember3Name" name="familymembername[3]" aria-label="familyMember3Name" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Enter the name">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember3Number" class="input-label mb-1 fw-bold">Contact Number</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel"  id="familyMember3Number" name="familymembernumber[3]" aria-label="familyMember3Number" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Mobile Number">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember3Email" class="input-label mb-1 fw-bold">Email ID</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-envelope-at"></i>
                                            </span>
                                            <input type="email" id="familyMember3Email" name="familymemberemail[3]" aria-label="familyMember3Email" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"  placeholder="Email ID">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="familyMember3FBLink" class="input-label mb-1 fw-bold">Facebook Link</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text input-icon-common" id="">
                                                <i class="bi bi-facebook"></i>
                                            </span>
                                            <input type="text" id="familyMember3FBLink" name="familymemberfblink[3]" aria-label="familyMember3FBLink" class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" placeholder="Facebook Link">
                                        </div>
                                    </div>

                                </div>
                            </div>                          
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Friend Details</h2>
                            <!-- <h3 class="fs-subtitle"></h3> -->
                            <div class="text-start mt-3">
                                <label for="buyer-friendName" class="input-label mb-1 fw-bold">Name <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text input-icon-common" id="">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" id="buyer-friendName" name="friendname"
                                        aria-label="buyer-friendName"
                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" 
                                        placeholder="Enter the name">
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <label for="buyer-friendNumber" class="input-label mb-1 fw-bold">Contact Number <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text input-icon-common" id="">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input type="text" id="buyer-friendNumber" name="friendnumber"
                                        aria-label="buyer-friendNumber"
                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" 
                                        placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <label for="buyer-friendEmail" class="input-label mb-1 fw-bold">Email ID <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text input-icon-common" id="">
                                        <i class="bi bi-envelope-at"></i>
                                    </span>
                                    <input type="text" id="buyer-friendEmail" name="friendemail"
                                        aria-label="buyer-friendEmail"
                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom" 
                                        placeholder="Email ID">
                                </div>
                            </div>
                            <div class="text-start mt-3">
                                <label for="buyer-friendFBLink" class="input-label mb-1 fw-bold">Facebook Link</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text input-icon-common" id="">
                                        <i class="bi bi-facebook"></i>
                                    </span>
                                    <input type="text" id="buyer-friendFBLink" name="friendfblink"
                                        aria-label="buyer-friendFBLink"
                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                        placeholder="Facebook Link">
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <!-- <input type="submit" id="submitFormBuyer" name="submit" class="submit action-button"
                                value="Submit" /> -->
                            <button type="submit" class="btn btn-success">Submit</button>
                        </fieldset>
                    </form>
                    <!-- ========= -->
                </div>
            </div>
        </div>
    </div>


    <div id="liveAlertPlaceholder"></div>
    <!-- <button type="button" class="btn btn-primary" id="liveAlertBtn"></button> -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <link rel="stylesheet" href="{{asset('frontend/js/script.js')}}">
    <link rel="stylesheet" href="{{asset('frontend/js/stepform.js')}}">

    <script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const appendAlert = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert mb-1 alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')

        alertPlaceholder.append(wrapper)
    }

    // const alertTrigger = document.getElementById('liveAlertBtn')
    // if (alertTrigger) {
    // alertTrigger.addEventListener('click', () => {
    //     appendAlert('Nice, you triggered this alert message!', 'success')
    // })
    // }
    </script>

    <script>
    $(document).ready(function() {
        // const OTP;

        var forgotPassEmailform = $("#forgotPassEmailform");
        forgotPassEmailform.submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/forgotpass/sendOPTon',
                type: 'GET',
                data: forgotPassEmailform.serialize(),
                success: function(data) {
                    // console.log(data.data);
                    // OTP = data.data;
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                }
            });
            $("#modalForgotPassSendOTP").modal("hide");
            $("#modalForgotPassVerifyOTP").modal("show");
        })

        $("#btnverifyOTP").click(function() {
            // Verify the otp
            $("#modalForgotPassVerifyOTP").modal("hide");
            $("#modalResetPassword").modal("show");
        })

        $("#btn_updatePassword").click(function() {
            appendAlert(`PasswordUpdated Successfully.`, 'success');
            $("#resetPasswordForm").submit();
        })

        $('#btn_buyer_seller').click(function() {
            var selectedValue = $("input[name='buyer-or-seller']:checked").val();
            $("#modalSellerBuyer").modal('hide');

            if (selectedValue == "Seller") {
                $("#modalRegisterSeller").modal('show');
            } else if (selectedValue == "Buyer") {
                $("#modalRegisterBuyer").modal('show');
            }

        })

        $("input[name='sellerType']").change(function() {
            if ($(this).val() == "Manufacturer") {
                $(".madeTypeBox").css("display", "block");
            } else {
                $(".madeTypeBox").css("display", "none");
            }
        })


        $("#submitFormSeller").click(function() {
            let formSeller = $("#multistepsform");
            alert(formSeller);
            var inputreq = formSeller.find('input[required]');

            // validateData(formSeller);
            let val = validate(inputreq)
            // alert("submit button click")

            // alert("Black Fields count = " + blankField)
            if (val) {
                appendAlert(`Great. Form submitted successfully!.`, 'success');
                formSeller.submit();
            } else {
                alert("form not submitted")
                appendAlert(`Something went wrong! Please check.`, 'danger');
            }

            // console.log(formSeller.serialize())

        });

        $("#submitFormBuyer").click(function() {
            let formBuyer = $("#multistepsform-buyer");
            var inputreq = formBuyer.find('input[required]');

            // validateData(formBuyer);
            let val = validate(inputreq)
            if (val) {
                appendAlert(`Great. Form submitted successfully!.`, 'success');
                formBuyer.submit();
            } else {
                alert("form not submitted")
                appendAlert(`Opps... Something is missing! Please check.`, 'danger');
            }
        });

        const validate = function(inputreq) {
            $(inputreq).attr("name")
            let blankField = 0;
            inputreq.each(function(elm) {
                if ($(this).val() == "") {
                    appendAlert(`Opps... ${$(this).attr('name')} missing! Please check.`, 'danger');
                    blankField++;
                }
                if (($(this).attr("name") === "adhaarCardNo") && ($(this).val().length != 12) && $(
                        this).val() != "") {
                    appendAlert(`Please enter valid Adhaar Number!`, 'danger');
                    blankField++;
                }
                if (($(this).attr("type") === "tel") && ($(this).val().length != 10) && $(this)
                    .val() != "") {
                    appendAlert(`Please enter valid mobile number.`, 'danger');
                    blankField++;
                }
            })

            if (blankField == 0) return true;
            else return false

        }
        const validateData = function(form) {
            // if( (form.find("input[name='adhaarCardNo']").val().length != 12) && () );
            var inputValue = form.find("input[name='adhaarCardNo']").val();

            if (!/^[0-9]{12}$/.test(inputValue)) {
                $("#error").text("Please enter a 12-digit number.");

            } else {
                $("#error").text(""); // Clear any previous error message
            }
        }

        // appendAlert('page loaded successfully!', 'success')
        // inputreq.each(function(elm){
        //     console.log($(this))
        // })
        // alert(inputreq.length);
    })
    </script>

    <script>
    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;
    $(".next").click(function() {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        next_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = now * 50 + "%";
                opacity = 1 - now;
                current_fs.css({
                    transform: "scale(" + scale + ")",
                    position: "relative"
                });
                next_fs.css({
                    left: left,
                    opacity: opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: "easeInOutBack"
        });
    });

    $(".previous").click(function() {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        $("#progressbar li")
            .eq($("fieldset").index(current_fs))
            .removeClass("active");

        previous_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 0.8 + (1 - now) * 0.2;
                left = (1 - now) * 50 + "%";
                opacity = 1 - now;
                current_fs.css({
                    left: left
                });
                previous_fs.css({
                    transform: "scale(" + scale + ")",
                    opacity: opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: "easeInOutBack"
        });
    });

    $(".submit").click(function() {
        return false;
    });
    </script>

    <!-- <script>
        </script> -->
    <script>
    function checkLoginState() {
        alert("fb")
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                // User is logged into your app and Facebook.
                var accessToken = response.authResponse.accessToken;
                // You can use this access token to make API requests on behalf of the user.
                console.log('Logged in and authorized with token: ' + accessToken);
            } else {
                // User is not logged into your app or Facebook.
                console.log('Not logged in.');
            }
        });
    }
    </script>
</body>

</html>