@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div>
                        {{-- <h1 class="text-left">
                            <a type="button" class="btn btn-primary" href="/home"><b>Home</b></a>
                        </h1> --}}
                            <h1 class="text-right">
                                <a type="button" class="btn btn-primary" href="/pdashboard"><b>Priority Dashboard</b></a>
                            </h1>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 textbody">
                                    <h3 class="text-center p-2 text-info" style="font-size: 23px;">Your Order is Successfully placed and Please Check Priority Dashboard</h3>
                                </div>
                            </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
