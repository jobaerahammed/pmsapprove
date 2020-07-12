@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-left">Users List to Approve</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="/adminDashboard" class=" btn btn-info">Back</a>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('NSU ID') }}
                                </th>
                                <th>
                                    {{ trans('Student Name') }}
                                </th>
                                <th>
                                    {{ trans('Email') }}
                                </th>
                                <th>
                                    {{ trans('Course Details') }}
                                </th>
                                <th>
                                    {{ trans('Advising Slip') }}
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($xyz as $user)
                                <tr data-entry-id="{{ $user->nsu_id }}">
                                    <td>
                                        {{ $user->nsu_id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td>
                                        <ul style="list-style-type: none">
                                                <li><table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                                                      <thead>
                                                          <tr>
                                                              <th>Course</th>
                                                              <th>Section</th>
                                                              <th>Class Start</th>
                                                              <th>Class End</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach($user->course as $item)
                                                          <tr>
                                                              <td>{{ $item->course }}</td>
                                                              <td>{{ $item->section }}</td>
                                                              <td>{{ $item->class_start }}</td>
                                                              <td>{{ $item->class_end }}</td>
                                                          </tr>
                                                          @endforeach
                                                      </tbody>
                                                    </table>
                                                </li>
                                        </ul>
                                    </td>
                                    <td><img data-toggle="modal"  data-target="#myModal" width="100px" height="50px" src="/images/{{ $user->advising_slip_img }}"></td>
                                    <td><a href="{{ route('admin.users.approve', $user->id) }}"
                                           class="btn btn-primary btn-sm">Approve</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <a href="" class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#myModal">Details</a> --}}
<div class="container">
    <div class="row">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        @foreach ($xyz as $item)
                            
                        <img style="cursor: pointer" width="100%" height="200px" src="/images/{{ $item->advising_slip_img ?? ''}}">
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection