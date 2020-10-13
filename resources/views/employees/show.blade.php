@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5>{{$employee->firstName . " " . $employee->lastName . " information"}}</h5>
                            </div>
                            <div class="col-md-4" style="text-align: center">
                                <div class="float-right">
                                    {{ Form::open(['url' => "employee/{$employee->id}", 'method' => 'POST']) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger navbar-btn ml-1']) }}
                                    {!! Form::close() !!}
                                </div>

                                <a href="{{ url("employee/{$employee->id}/edit") }}"
                                   class="btn btn-primary navbar-btn float-right"
                                >
                                    Edit Info
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Current Employer: {{$company->name}}</p>
                        <p>Employee email: {{$employee->email}}</p>
                        <p>Employee phone: {{$employee->phone}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
