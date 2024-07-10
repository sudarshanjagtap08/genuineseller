@extends('admin.master')
@section('content')
<div class="container-fluid">
    <div class="row heading-bg">
        <div class="col-lg-12">
            <h5 class="txt-dark">All Buyer Information</h5>
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
                            <div class="table-responsive">
                                <table id="example" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Buyer Id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Email Id</th>
                                            <th>Mobile Number</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user as $user)
                                        @foreach ($user->buyers as $buyer)
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="addMore" title="Edit Data">
                                                            <a  href="{{ url('buyer/information/edit/'.$user->id) }}" class="btn btn-primary btn-sm" style="padding: 2px 7px;"><i class="fa fa-pencil"></i></a>
                                                        </div>
                                                        <!-- <div class="addMore" title="View Data">
                                                            <a href="#" class="btn btn-danger btn-sm" style="padding: 2px 6px;"><i class="fa fa-eye"></i></a>
                                                        </div> -->
                                                    </div>
                                                </td>
                                                <td>{{$buyer->buyer_documentid}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$buyer->address}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$buyer->mobilenumber}}</td>
                                                @if($user->status == 1)
                                                <td>Verify</td>
                                                @else
                                                <td>UnVerify</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection