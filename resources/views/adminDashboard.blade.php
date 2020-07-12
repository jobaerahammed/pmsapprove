@extends('layouts.app')

@section('content')
<div class="container"style="margin-top:; padding:60px">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card"  style="height: 350px">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-left">Admin Dashboard</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="/orderList" class="btn btn-info text-white">Order Request</a>
                            <a href="/users" class=" btn btn-danger">New User Request</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="bg-info p-4 text-white text-center">
                                    <p>Number of Student</p>
                                    <h2>10000</h2>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="bg-success p-4 text-white text-center">
                                    <p>Active Student Connection</p>
                                    <h2>700</h2> 
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="bg-primary p-4 text-white text-center">
                                    <p>Total Food Items</p><br>
                                    <h2>50</h2>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="bg-success p-4 text-white text-center">
                                    <p>Total Sells Staff</p><br>
                                    <h2>100</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
