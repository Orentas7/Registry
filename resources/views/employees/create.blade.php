@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-flash/>
            <div class="card">
                <div class="card-header">{{ __('Add employee to the list') }}</div>
                <div class="card-body">
                <form method="POST" action="{{ route('employees.store') }}">
                    <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{ __("Employee's name") }}" value="{{old('name')}}">
                        <x-form.error name="name"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input type="text" name="email" class="form-control" placeholder="{{ __("Employee's email") }}" value="{{old('email')}}">
                        <x-form.error name="email"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Phone number') }}</label>
                        <input type="text" name="number" class="form-control" placeholder="{{ __("Employee's phone number") }}" value="{{old('number')}}">
                        <x-form.error name="number"/>
                    </div>
                    @csrf
                    <div>
                        <button type="submit" style="background-color:#f1bb4e">{{ __("Add") }}</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection