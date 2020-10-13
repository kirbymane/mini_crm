@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-11">
                                <h4>List of companies: </h4>
                            </div>
                            <div class="col-md-1">
                                <a href="{{ url('/create') }}" class="btn btn-primary float-right">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($companies as $company)

                            <div class="card">
                                <div class="card-header">

                                <div class="row align-items-center">
                                    <div class="col-md-11">
                                        <h5>{{$company->name}}</h5>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{ url("/view/{$company->id}") }}" class="btn btn-secondary float-right">View</a>
                                    </div>
                                </div>
                                </div>

                                <div class="card-body">
                                    <p>Company email: {{$company->email ? : 'NA'}}</p>
                                    <p>Company website: {{$company->website ? : 'NA'}}</p>
                                </div>
                            </div>
                            <br>
                        @empty
                            <div class="alert">
                                <p>No companies found.</p>
                            </div>
                        @endforelse
                            {{ $companies->links('') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
