<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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

                        {{-- <table class="table">
                            <tr>
                                <th>Student Name</th>
                                <th>NSU ID</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->nsu_id }}</td>
                                    <td><a href="" class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#myModal">Details</a></td>
                                    <td><img width="100px" height="100px" src="/images/{{ $user->advising_slip_img }}"></td>
                                    <td><a href="{{ route('admin.users.approve', $user->id) }}"
                                           class="btn btn-primary btn-sm">Approve</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endforelse
                        </table> --}}

                        
                        @forelse ($users as $user)
                        <div class="form-group row justify-content-center pt-4">
                            <button class="btn btn-warning" style="text-align: center">New User Request {{$loop->iteration}}</button>
                        </div>
                        <form method="POST" action="/xyz" enctype="multipart/form-data">
                            @csrf
        
                            <div class="form-group row justify-content-center">
        
                                <div class="col-md-6">
                                    <input class="form-control" value="{{$user->name}}">
                                </div>
                            </div>
        
                            <div class="form-group row justify-content-center">
        
                                <div class="col-md-6">
                                    <input class="form-control" value="{{$user->nsu_id}}">
                                </div>
                            </div>
                            {{-- clone start from here --}}  
                                <div class="parent">
                                    <div id="form-set">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option>Course</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select  class="form-control">
                                                        <option></option>
                                                    
                                                </select>
                                                <p>
                                                    <?php 
                                                        // $str_json =json_encode($user->course);
                                                        //     echo  $str_json;
                                                        ?>
                                                </p>
                                            </div>
                                        </div>
                
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select type="text" class="form-control" name="class_end[]" >
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                
                                    </div>
                                </div>
                           {{-- Clone end here --}}
        
                                <div class="form-group row justify-content-center">
        
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{$user->email}}">
                                    </div>
                                </div>
        
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <img width="50%" height="50px" src="/images/{{ $user->advising_slip_img }}">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.users.approve', $user->id) }}"
                                            class="btn btn-primary btn-sm">Approve</a>
                                    </div>
                                </div>
                            </form>
                        @empty
                            <p colspan="4">No users found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection