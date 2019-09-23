@extends('layouts.app')

@section('content')

<div class="container-fluid">
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

                   <h1>Welcome <strong>{{auth()->user()->name}}</strong></h1>

                   Member Since: {{ auth()->user()->created_at->format('m/d/Y') }}

                   <hr />
                   <h3>Actions</h3>

                   <nav class="navbar navbar-light bg-light">
                        <a class="btn btn-outline-danger" href="forum/create">Create Forum (temporary)</a>
                        <a class="btn btn-outline-secondary" href="#">Create Topic</a>
                        <a class="btn btn-outline-info" href="#">Upload To Gallery</a>
                        <a class="btn btn-outline-success" href="message">Send a Message</a>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
