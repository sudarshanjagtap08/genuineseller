@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">Information Edit</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="table-wrap">
                            <form action="{{ url('information/update/seller/'.$user[0]->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">PERSONAL DETAILS</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <input type="hidden" class="form-control" name="id"
                                                                        value="{{$user[0]->id}}" />
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Full
                                                                                Name <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="name" value="{{$user[0]->name}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="personal-Photo"
                                                                                class="fs-12 fw-bold">Upload
                                                                                Photo*</label>
                                                                            <input type="file" id="personal-Photo"
                                                                                class="form-control"
                                                                                name="personal_photo"
                                                                                placeholder="photo" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Email
                                                                                ID<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="email" name="email"
                                                                                class="form-control"
                                                                                placeholder="Email ID"
                                                                                value="{{$user[0]->email}}" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Mobile
                                                                                Number <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="tel" name="mobilenumber"
                                                                                class="form-control"
                                                                                value="{{$user[0]->sellers[0]->mobilenumber}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Landline
                                                                                (Home)</label>
                                                                            <input type="text" name="landlinehome"
                                                                                class="form-control"
                                                                                placeholder="Landline No. (Home)"
                                                                                value="{{$user[0]->sellers[0]->landlinehome}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Landline
                                                                                (Office)</label>
                                                                            <input type="text" name="landlineoffice"
                                                                                class="form-control"
                                                                                placeholder="Landline No. (Office)"
                                                                                value="{{$user[0]->sellers[0]->landlineoffice}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Mobile
                                                                                No. (Other)</label>
                                                                            <input type="tel" name="othermobile"
                                                                                class="form-control"
                                                                                placeholder="Mobile No. (Any Other)"
                                                                                value="{{$user[0]->sellers[0]->othermobile}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Address
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <textarea name="address"
                                                                                class="form-control"
                                                                                placeholder="Address"
                                                                                readonly>{{$user[0]->sellers[0]->address}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Address
                                                                            </label>
                                                                            <textarea name="addressnew"
                                                                                class="form-control"
                                                                                placeholder="Address"
                                                                                readonly>{{$user[0]->sellers[0]->addressnew}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Landmark
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="landmark" placeholder="Landmark"
                                                                                value="{{$user[0]->sellers[0]->landmark}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Area
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="area" placeholder="Area"
                                                                                value="{{$user[0]->sellers[0]->area}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">City
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="city_id" placeholder="City"
                                                                                value="{{$user[0]->sellers[0]->city_id}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">Country
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <select class="form-control"
                                                                                name="country_id"
                                                                                aria-label="Default select state"
                                                                                readonly>
                                                                                <option value="1" selected>India
                                                                                </option>
                                                                                <option value="2">US</option>
                                                                                <option value="3">Bangladesh</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="" class="fs-12 fw-bold">State
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <select class="form-control" name="state_id"
                                                                                aria-label="Default select state"
                                                                                readonly>
                                                                                <option selected>Select</option>
                                                                                <option value="1">Maharashtra</option>
                                                                                <option value="2">Gujarat</option>
                                                                                <option value="3">Rajastan</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">ATTACHMENTS</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="pan-card-upload"
                                                                                class="fs-12 fw-bold">Pan Card <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="panCardNo"
                                                                                placeholder="Pan card No*" readonly />
                                                                            <input type="file" class="form-control"
                                                                                id="pan_card_upload" class="p-0"
                                                                                name="pan_card_upload"
                                                                                placeholder="photo"
                                                                                value="{{$user[0]->sellers[0]->pan_card_upload}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="adhaar-card-upload"
                                                                                class="fs-12 fw-bold">Adhaar Card
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="adhaarCardNo"
                                                                                placeholder="Adhaar card No*"
                                                                                value="{{$user[0]->sellers[0]->adhaar_card_upload}}"
                                                                                readonly />
                                                                            <input type="file" class="form-control"
                                                                                id="adhaar_card_upload" class="p-0"
                                                                                name="adhaar_card_upload" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="passport-upload"
                                                                                class="fs-12 fw-bold">Passport <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="file" class="form-control"
                                                                                id="passport_upload" class="p-0"
                                                                                name="passport_upload" readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="mbl-ll-bill-upload"
                                                                                class="fs-12 fw-bold">Mobile Bill/LL
                                                                                Bill <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="file" class="form-control"
                                                                                id="mbl_ll_bill_upload" class="p-0"
                                                                                name="mbl_ll_bill_upload" readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">BANK DETAILS</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="bankAccNo"
                                                                                class="fs-12 fw-bold">Account No. <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                id="bankaccno" name="bankaccno"
                                                                                placeholder="Your Account No."
                                                                                value="{{$user[0]->sellers[0]->bankaccno}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="bankName"
                                                                                class="fs-12 fw-bold">Bank Name. <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                id="bankname" name="bankname"
                                                                                placeholder="Your Bank Name."
                                                                                value="{{$user[0]->sellers[0]->bankname}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="bankName"
                                                                                class="fs-12 fw-bold">IFSC Code. <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" id="buyer-bankIFSC"
                                                                                class="form-control" name="bankifsc"
                                                                                placeholder="IFSC Code"
                                                                                value="{{$user[0]->sellers[0]->bankifsc}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="bankAccHolderName"
                                                                                class="fs-12 fw-bold">Account Holder
                                                                                Name. <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                id="bankaccholdername"
                                                                                name="bankaccholdername"
                                                                                placeholder="Account Holder Name"
                                                                                value="{{$user[0]->sellers[0]->bankaccholdername}}"
                                                                                readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">MODE OF PAYMENTS</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input class="form-check-input w-auto me-2"
                                                                                type="checkbox"
                                                                                name="mode_of_payment_phonepe"
                                                                                class="form-control"
                                                                                id="mode_of_payment_phonepe" readonly
                                                                                value="phonepay"
                                                                                {{ ( $user[0]->sellers[0]->mode_of_payment_phonepe ) ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="Mode_of_payment_phonepe">
                                                                                <img src="{{asset('frontend/images/phonepe.png')}}"
                                                                                    class="modeOfPaymentIcon" alt="">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div
                                                                                class="form-check form-check-inline me-2 d-flex align-items-center">
                                                                                <input
                                                                                    class="form-check-input w-auto me-2"
                                                                                    type="checkbox"
                                                                                    name="mode_of_payment_gpay"
                                                                                    class="form-control"
                                                                                    id="mode_of_payment_gpay" readonly
                                                                                    value="googlepay"
                                                                                    {{ ( $user[0]->sellers[0]->googlepay ) ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="Mode_of_payment_gpay">
                                                                                    <img src="{{asset('frontend/images/gpay.jpg')}}"
                                                                                        class="modeOfPaymentIcon"
                                                                                        alt="">
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div
                                                                                class="form-check form-check-inline me-2 d-flex align-items-center">
                                                                                <input
                                                                                    class="form-check-input w-auto me-2"
                                                                                    type="checkbox"
                                                                                    name="mode_of_payment_bank"
                                                                                    id="mode_of_payment_bank"
                                                                                    value="banktransfer" readonly
                                                                                    class="form-control"
                                                                                    {{ ( $user[0]->sellers[0]->mode_of_payment_bank ) ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="Mode_of_payment_bank">
                                                                                    <img src="{{asset('frontend/images/bank_transfer.jpg')}}"
                                                                                        class="modeOfPaymentIcon"
                                                                                        alt="">
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <div
                                                                                class="form-check form-check-inline me-2 d-flex align-items-center">
                                                                                <input
                                                                                    class="form-check-input w-auto me-2"
                                                                                    type="checkbox"
                                                                                    name="mode_of_payment_card"
                                                                                    id="mode_of_payment_card" readonly
                                                                                    value="card"
                                                                                    {{ ( $user[0]->sellers[0]->mode_of_payment_card ) ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="Mode_of_payment_card">
                                                                                    <img src="{{asset('frontend/images/Debit-Card-Credit-Card.jpg')}}"
                                                                                        class="modeOfPaymentIcon" alt=""
                                                                                        class="form-control">
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">SOCIAL PROFILES</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div
                                                                                class="form-check form-check-inline me-2 d-flex align-items-center">
                                                                                <label for="whatsappno"
                                                                                    class="fs-12 fw-bold">Whatsapp No
                                                                                    <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="tel" class="form-control"
                                                                                    name="whatsappno" class=""
                                                                                    id="whatsapnumber" readonly
                                                                                    placeholder="Enter whatsapp no"
                                                                                    value="{{$user[0]->sellers[0]->whatsappno}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="fblink"
                                                                                class="fs-12 fw-bold">Facebook
                                                                                Link</label>
                                                                            <input type="text" class="form-control"
                                                                                name="fblink" class="mb-0" id="fblink"
                                                                                name="fblink" readonly
                                                                                placeholder="Facebook Profile"
                                                                                value="{{$user[0]->sellers[0]->fblink}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="instagramLink"
                                                                                class="fs-12 fw-bold">Instagram
                                                                                Link</label>
                                                                            <input type="text" class="form-control"
                                                                                name="instagramLink" class="mb-0"
                                                                                id="instagramlink" name="instagramlink"
                                                                                placeholder="Instagram Profile" readonly
                                                                                value="{{$user[0]->sellers[0]->instagramlink}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="instagramLink"
                                                                                class="fs-12 fw-bold">Snapchat
                                                                                Link</label>
                                                                            <input type="text" class="form-control"
                                                                                name="snapchatLink" class="mb-0"
                                                                                id="snapchatlink" name="snapchatlink"
                                                                                placeholder="Snapchat Profile" readonly
                                                                                value="{{$user[0]->sellers[0]->snapchatlink}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="PinterestLink"
                                                                                class="fs-12 fw-bold">Pinterest
                                                                                Link</label>
                                                                            <input type="text" class="form-control"
                                                                                name="pinterestLink" class="mb-0"
                                                                                id="pinterestlink" name="pinterestlink"
                                                                                placeholder="Pinterest Profile" readonly
                                                                                value="{{$user[0]->sellers[0]->pinterestlink}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="PinterestLink"
                                                                                class="fs-12 fw-bold">Website
                                                                                Link</label>
                                                                            <input type="text" class="form-control"
                                                                                name="websiteLink" class="mb-0"
                                                                                id="websitelink" name="websitelink"
                                                                                placeholder="Your Website" readonly
                                                                                value="{{$user[0]->sellers[0]->websitelink}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">SOCIAL PROFILES</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="pone mb-2">
                                                                                <input class="radio-btn me-1"
                                                                                    type="radio" name="sellerType"
                                                                                    id="sellerTypeReseller"
                                                                                    value="Reseller" checked>
                                                                                <label class=""
                                                                                    for="sellerTypeReseller">
                                                                                    Reseller
                                                                                </label>
                                                                            </div>
                                                                            <div class="ptwo mb-2">
                                                                                <input class="radio-btn me-1"
                                                                                    type="radio" name="sellerType"
                                                                                    id="sellerTypeManufacturer"
                                                                                    value="Manufacturer">
                                                                                <label class=""
                                                                                    for="sellerTypeManufacturer">
                                                                                    Manufacturer
                                                                                </label>
                                                                                <div class="madeTypeBox text-start">
                                                                                    <div class="d-sm-flex">
                                                                                        <div class="pone me-2 ps-4">
                                                                                            <input
                                                                                                class="radio-btn me-1"
                                                                                                type="radio"
                                                                                                name="manufacturerMadeType"
                                                                                                id="madeTypeHomemade"
                                                                                                value="Reseller" checked
                                                                                                readonly>
                                                                                            <label class=""
                                                                                                for="madeTypeHomemade">
                                                                                                Home Made
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="pone ps-4 ps-sm-0">
                                                                                            <input
                                                                                                class="radio-btn me-1"
                                                                                                type="radio"
                                                                                                name="manufacturerMadeType"
                                                                                                id="madeTypeHandmade"
                                                                                                value="Reseller"
                                                                                                readonly>
                                                                                            <label class=""
                                                                                                for="madeTypeHandmade">
                                                                                                Hand Made
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="pthree">
                                                                                <input class="radio-btn me-1"
                                                                                    type="radio" name="sellerType"
                                                                                    id="sellerTypeService"
                                                                                    value="Service" readonly>
                                                                                <label class="" for="sellerTypeService">
                                                                                    Service
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">Status</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Name"
                                                                                        class="input-label mb-1 fw-bold">Status
                                                                                        <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <select class="form-control"
                                                                                        name="status">
                                                                                        <option value="" <?php if($user[0]->status == "") echo "selected"; ?>>Not Verify</option>
                                                                                        <option value="1" <?php if($user[0]->status == "1") echo "selected"; ?>>Verify</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">FAMILY DETAILS</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading activestate" role="tab"
                                                                        id="heading_1">
                                                                        <a role="button" data-toggle="collapse"
                                                                            data-parent="#accordion_1"
                                                                            href="#collapse_1"
                                                                            aria-expanded="true">Member One</a>
                                                                    </div>
                                                                    <div id="collapse_1"
                                                                        class="panel-collapse collapse in"
                                                                        role="tabpanel">
                                                                        <div class="panel-body pa-15">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Name"
                                                                                        class="input-label mb-1 fw-bold">Name
                                                                                        <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="familyMember1Name"
                                                                                        name="familymembername[0]"
                                                                                        aria-label="familyMember1Name"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        readonly
                                                                                        placeholder="Enter the name"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[0]) ? $user[0]->sellers[0]->familysellers[0]->familymembername : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Number"
                                                                                        class="input-label mb-1 fw-bold">Contact
                                                                                        Number <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        id="familyMember1Number"
                                                                                        name="familymembernumber[0]"
                                                                                        aria-label="familyMember1Number"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        readonly
                                                                                        placeholder="Mobile Number"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[0]) ? $user[0]->sellers[0]->familysellers[0]->familymembernumber : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Email"
                                                                                        class="input-label mb-1 fw-bold">Email
                                                                                        ID <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="familyMember1Email"
                                                                                        name="familymemberemail[0]"
                                                                                        aria-label="familyMember1Email"
                                                                                        readonly
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Email ID"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[0]) ? $user[0]->sellers[0]->familysellers[0]->familymemberemail : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1FBLink"
                                                                                        class="input-label mb-1 fw-bold">Facebook
                                                                                        Link</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="familyMember1FBLink"
                                                                                        name="familymemberfblink[0]"
                                                                                        aria-label="familyMember1FBLink"
                                                                                        readonly
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Facebook Link"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[0]) ? $user[0]->sellers[0]->familysellers[0]->familymemberfblink : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab"
                                                                        id="heading_2">
                                                                        <a class="collapsed" role="button"
                                                                            data-toggle="collapse"
                                                                            data-parent="#accordion_1"
                                                                            href="#collapse_2"
                                                                            aria-expanded="false">Member two </a>
                                                                    </div>
                                                                    <div id="collapse_2" class="panel-collapse collapse"
                                                                        role="tabpanel">
                                                                        <div class="panel-body pa-15">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Name"
                                                                                        class="input-label mb-1 fw-bold">Name
                                                                                        <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="familyMember1Name"
                                                                                        name="familymembername[1]"
                                                                                        aria-label="familyMember1Name"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        readonly
                                                                                        placeholder="Enter the name"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[1]) ? $user[0]->sellers[0]->familysellers[1]->familymembername : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Number"
                                                                                        class="input-label mb-1 fw-bold">Contact
                                                                                        Number <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        id="familyMember1Number"
                                                                                        name="familymembernumber[1]"
                                                                                        aria-label="familyMember1Number"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        readonly
                                                                                        placeholder="Mobile Number"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[1]) ? $user[0]->sellers[0]->familysellers[1]->familymembernumber : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Email"
                                                                                        class="input-label mb-1 fw-bold">Email
                                                                                        ID <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="familyMember1Email"
                                                                                        name="familymemberemail[1]"
                                                                                        aria-label="familyMember1Email"
                                                                                        readonly
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Email ID"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[1]) ? $user[0]->sellers[0]->familysellers[1]->familymemberemail : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1FBLink"
                                                                                        class="input-label mb-1 fw-bold">Facebook
                                                                                        Link</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="familyMember1FBLink"
                                                                                        name="familymemberfblink[1]"
                                                                                        readonly
                                                                                        aria-label="familyMember1FBLink"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Facebook Link"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[1]) ? $user[0]->sellers[0]->familysellers[1]->familymemberfblink : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab"
                                                                        id="heading_3">
                                                                        <a class="collapsed" role="button"
                                                                            data-toggle="collapse"
                                                                            data-parent="#accordion_1"
                                                                            href="#collapse_3"
                                                                            aria-expanded="false">Member three</a>
                                                                    </div>
                                                                    <div id="collapse_3" class="panel-collapse collapse"
                                                                        role="tabpanel">
                                                                        <div class="panel-body pa-15">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Name"
                                                                                        class="input-label mb-1 fw-bold">Name
                                                                                        <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="familyMember1Name"
                                                                                        name="familymembername[2]"
                                                                                        aria-label="familyMember1Name"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        readonly
                                                                                        placeholder="Enter the name"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[2]) ? $user[0]->sellers[0]->familysellers[2]->familymembername : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Number"
                                                                                        class="input-label mb-1 fw-bold">Contact
                                                                                        Number <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        id="familyMember1Number"
                                                                                        name="familymembernumber[2]"
                                                                                        readonly
                                                                                        aria-label="familyMember1Number"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Mobile Number"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[2]) ? $user[0]->sellers[0]->familysellers[2]->familymembernumber : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1Email"
                                                                                        class="input-label mb-1 fw-bold">Email
                                                                                        ID <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="familyMember1Email"
                                                                                        name="familymemberemail[2]"
                                                                                        readonly
                                                                                        aria-label="familyMember1Email"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Email ID"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[2]) ? $user[0]->sellers[0]->familysellers[2]->familymemberemail : '' }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="familyMember1FBLink"
                                                                                        class="input-label mb-1 fw-bold">Facebook
                                                                                        Link</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="familyMember1FBLink"
                                                                                        name="familymemberfblink[2]"
                                                                                        readonly
                                                                                        aria-label="familyMember1FBLink"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Facebook Link"
                                                                                        value="{{ isset($user[0]->sellers[0]->familysellers[2]) ? $user[0]->sellers[0]->familysellers[2]->familymemberfblink : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="panel panel-inverse card-view">
                                                    <div class="panel-heading">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title">Friend DETAILS</h6>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="panel-group accordion-struct" id="accordion_1"
                                                                role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <!-- <div class="panel-heading activestate" role="tab"
                                                                        id="heading_1">
                                                                        <a role="button" data-toggle="collapse"
                                                                            data-parent="#accordion_1"
                                                                            href="#collapse_1"
                                                                            aria-expanded="true">Member One</a>
                                                                    </div> -->
                                                                    <div id="collapse_1"
                                                                        class="panel-collapse collapse in"
                                                                        role="tabpanel">
                                                                        <div class="panel-body pa-15">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="friendname"
                                                                                        class="input-label mb-1 fw-bold">Name
                                                                                        <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="friendname"
                                                                                        name="friendname" readonly
                                                                                        aria-label="friendname"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Enter the name"
                                                                                        value="{{$user[0]->sellers[0]->friendsellers[0]->friendname}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="friendnumber"
                                                                                        class="input-label mb-1 fw-bold">Contact
                                                                                        Number <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        id="friendnumber"
                                                                                        name="friendnumber"
                                                                                        aria-label="friendnumber"
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        readonly
                                                                                        placeholder="Mobile Number"
                                                                                        value="{{$user[0]->sellers[0]->friendsellers[0]->friendnumber}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="friendemail"
                                                                                        class="input-label mb-1 fw-bold">Email
                                                                                        ID <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="friendemail"
                                                                                        name="friendemail"
                                                                                        aria-label="friendemail"
                                                                                        readonly
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Email ID"
                                                                                        value="{{$user[0]->sellers[0]->friendsellers[0]->friendemail}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="friendfblink"
                                                                                        class="input-label mb-1 fw-bold">Facebook
                                                                                        Link</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="friendfblink"
                                                                                        name="friendfblink"
                                                                                        aria-label="friendfblink"
                                                                                        readonly
                                                                                        class="form-input w-auto flex-grow-1 mb-0 border-0 border-bottom"
                                                                                        placeholder="Facebook Link"
                                                                                        value="{{$user[0]->sellers[0]->friendsellers[0]->friendfblink}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection