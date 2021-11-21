@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-flash/>
            <div class="card">
                <div class="card-header">{{ __("Edit firm's info") }}</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('firms.update', $firm->id) }}"  enctype="multipart/form-data">
                        @method('PATCH')
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control" placeholder="{{ __("Firm's name") }}" value="{{old('name', $firm->name)}}">
                            <x-form.error name="name"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Email') }}</label>
                            <input type="text" name="email" class="form-control" placeholder="{{ __("Firm's email") }}" value="{{old('email', $firm->email)}}">
                            <x-form.error name="email"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Website') }}</label>
                            <input type="text" name="site" class="form-control" placeholder="{{ __("Firm's website") }}" value="{{old('number', $firm->site)}}">
                            <x-form.error name="site"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __("Logo") }}</label>
                            <input type="file" name="logo" class="form-control" value="{{old('logo', $firm->logo)}}">
                            <x-form.error name="logo"/>
                        </div>
                        <img src="{{ asset('logos/'.$firm->logo) }}" alt="firm logo" width="150" height="auto">
                        @csrf
                        <div>
                            <button type="submit" style="background-color:#f1bb4e">{{ __("Update") }}</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection