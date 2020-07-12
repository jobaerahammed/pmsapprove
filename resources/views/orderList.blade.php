@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Dashboard</div>
                        <div class="col-md-6 text-right">
                            <a style="color:#fff" href="/adminDashboard" type="button" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 textbody">
                                    <h3 class="text-center p-2 text-info" style="font-size: 23px;">Students Order Request</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Priority No.</th>
                                                        <th>NSU ID</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($courses as $course)
                                                        <tr>
                                                           <td>{{ $loop->iteration }}</td>
                                                           <td>{{$course->nsu_id}}</td>
                                                           <td>{{$course->class_start}}</td>
                                                           <td>
                                                                    <a href="delete/{{ $course->nsu_id }}">
                                                                        <button class="btn btn-xs" onclick="return confirm('Are you sure?');">
                                                                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                                        </button>
                                                                    </a>
                                                            </td>
                                                        </tr>
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
    </div>
</div>

@endsection
