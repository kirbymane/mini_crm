@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{isset($employee) ? "Edit " . $employee->firstName . " " . $employee->lastName : "Add New Employee"}}</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => isset($currentCompany) ? url("employee/{$employee->id}/edit") : url("/view/{$companyId}/add"), 'method' => 'post']) !!}

                        {{ Form::token() }}

                        <div class="form-group">
                            {{ Form::label('firstName', 'First Name') }}
                            {{ Form::text('firstName', isset($employee) ? $employee->firstName : '', ['class' => 'form-control', 'required' => 'required']) }}

                            @error('firstName')
                            <p class="alert alert-danger">{{$errors->first('firstName')}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('lastName', 'Last Name') }}
                            {{ Form::text('lastName', isset($employee) ? $employee->lastName : '', ['class' => 'form-control', 'required' => 'required']) }}

                            @error('lastName')
                            <p class="alert alert-danger">{{$errors->first('lastName')}}</p>
                            @enderror
                        </div>
                        @if(isset($currentCompany))
                            <div class="form-group">
                                {{ Form::label('currentCompany', 'Current Employer') }}
                                {{ Form::text('currentCompany', $currentCompany, ['class' => 'form-control']) }}

                                @error('currentCompany')
                                <p class="alert alert-danger">{{$errors->first('currentCompany')}}</p>
                                @enderror
                            </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', isset($employee) ? $employee->email : '', ['class' => 'form-control']) }}

                            @error('email')
                            <p class="alert alert-danger">{{$errors->first('email')}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone') }}
                            {{ Form::text('phone', isset($employee) ? $employee->phone : '', ['class' => 'form-control']) }}

                            @error('phone')
                            <p class="alert alert-danger">{{$errors->first('phone')}}</p>
                            @enderror
                        </div>
                        {{ Form::hidden('company_id', $companyId) }}
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
