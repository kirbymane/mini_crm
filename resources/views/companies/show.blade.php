@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5>{{$company->name}}</h5>
                            </div>

                            <div class="col-md-4" style="text-align: center">
                                <div class="float-right">
                                    {{ Form::open(['url' => "view/{$company->id}", 'method' => 'POST']) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger navbar-btn ml-1']) }}
                                    {!! Form::close() !!}
                                </div>

                                <a href="{{ url("/edit/{$company->id}") }}"
                                   class="btn btn-primary navbar-btn float-right"
                                >
                                    Edit Info
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Company email: {{$company->email ? : 'NA'}}</p>
                        <p>Company website: {{$company->website ? : 'NA'}}</p>
                        <div class="d-flex justify-content-center">
                            <img src="{{$company->logo}}"
                                 alt="logo"
                                 height="100px"
                                 width="100px"
                                 class="rounded-circle m-2"
                            >
                        </div>

                        <br>
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-md-11">
                                        <h5>List of employees: </h5>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ url("/view/{$company->id}/add") }}"
                                           class="btn btn-primary float-right">Add</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @forelse($employees as $employee)

                                    <div class="card">
                                        <div class="card-header">

                                            <div class="row align-items-center">
                                                <div class="col-md-11">
                                                    <h5>{{$employee->firstName . " " . $employee->lastName}}</h5>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ url("employee/{$employee->id}") }}"
                                                       class="btn btn-secondary float-right">View</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <p>Works for: {{$company->name}}</p>
                                            <p>His email: {{$employee->email ?: 'NA'}}</p>
                                            <p>His phone: {{$employee->phone ?: 'NA'}}</p>
                                        </div>
                                    </div>
                                    <br>
                                @empty
                                    <div class="alert">
                                        <p>No employees found.</p>
                                    </div>
                                @endforelse
                                {{$employees->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
