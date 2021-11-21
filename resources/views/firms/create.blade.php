@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <x-flash/>
                <div class="card-header">{{ __('Add firm to the list') }}</div>
                <div class="card-body">
                <form method="POST" action="{{ route('firms.store') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{ __("Firm's name") }}" value="{{old('name')}}">
                        <x-form.error name="name"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input type="text" name="email" class="form-control" placeholder="{{ __("Firm's email") }}" value="{{old('email')}}">
                        <x-form.error name="email"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Website') }}</label>
                        <input type="text" name="site" class="form-control" placeholder="{{ __("Firm's website") }}" value="{{old('site')}}">
                        <x-form.error name="site"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Logo') }}</label>
                        <input type="file" name="logo" class="form-control" value="{{old('logo')}}">
                        <x-form.error name="logo"/>
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