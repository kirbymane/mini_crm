@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{isset($company) ? "Edit " . $company->name : "Create New Company"}}</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => isset($company) ? url("edit/{$company->id}") : url("create"), 'method' => 'post', 'files' => true]) !!}
                        {{ Form::token() }}

                        <div class="form-group">
                            {{ Form::label('name', 'Company Name') }}
                            {{ Form::text('name', isset($company) ? $company->name : '', ['class' => 'form-control', 'required' => 'required']) }}

                            @error('name')
                            <p class="alert alert-danger">{{$errors->first('name')}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Company Email') }}
                            {{ Form::text('email', isset($company) ? $company->email : '', ['class' => 'form-control']) }}

                            @error('email')
                            <p class="alert alert-danger">{{$errors->first('email')}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('website', 'Company Website') }}
                            {{ Form::text('website', isset($company) ? $company->website : '', ['class' => 'form-control']) }}

                            @error('website')
                            <p class="alert alert-danger">{{$errors->first('website')}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::file('logo') }}

                            @error('logo')
                            <p class="alert alert-danger">{{$errors->first('logo')}}</p>
                            @enderror
                        </div>
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
