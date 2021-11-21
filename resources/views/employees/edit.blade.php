@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-flash/>
            <div class="card">
                <div class="card-header">{{ __("Edit Employee's info") }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                        @method('PATCH')
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control" placeholder="{{ __("Employee's name") }}" value="{{old('name', $employee->name)}}">
                            <x-form.error name="name"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Email') }}</label>
                            <input type="text" name="email" class="form-control" placeholder="{{ __("Employee's email") }}" value="{{old('email', $employee->email)}}">
                            <x-form.error name="email"/>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Phone number') }}</label>
                            <input type="text" name="number" class="form-control" placeholder="{{ __("Employee's phone number") }}" value="{{old('number', $employee->number)}}">
                            <x-form.error name="number"/>
                        </div>
                        @csrf
                        <div>
                            <button type="submit" style="background-color:#f1bb4e">{{ __("Update") }}</button>
                        </div>
                    </form>
                </div>

                <div class="card-header">{{ __("Employ") }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employments.store') }}">
                            @csrf
                            <input name="employee_id" type="hidden" value="{{$employee->id}}">
                            <label>{{ __('Select firm') }}</label>
                            <select class="form-group" name="firm_id" >
                                @foreach($firms as $firm)
                                    <option value="{{ $firm->id }}" 
                                        >
                                        {{ ucwords($firm->name )}}
                                    </option>
                                @endforeach                    
                            </select> 
                            <x-form.error name="firm_id"/>
                            <div>
                                <button type="submit" style="background-color:#f1bb4e">{{ __("Employ") }}</button>
                            </div>
                        </form>
                </div>
                
            
                <div class="card-header">{{ __("Currently working") }}</div>
                    <div class="card-body">
                        <table class="table" id="datatable2">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Website') }}</th>
                                    <th>{{ __('Logo') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee->firms as $firm)
                                    <tr>
                                        <td>{{$firm->name}}</td>
                                        <td>{{$firm->email}}</td>
                                        <td><a href="{{$firm->site}}">{{ __('Link to web site') }}</a></td>
                                        <td>
                                            @if ($firm->logo)
                                                <img src="{{ asset('logos/'.$firm->logo) }}" alt="firm logo" width="150" height="auto">
                                            @else
                                                {{ __('There is no logo') }}
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('employments.destroy', $firm->id) }}" method="POST">
                                                @method('DELETE')
                                                <input name="employee_id" type="hidden" value="{{$employee->id}}">
                                                @csrf
                                                <button class="dropdown-item" type="submit">{{ __("Delete") }}</button>
                                            </form>
                                        </td>                                     
                                    </tr>                                
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            
            
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')    
    <script>
        $(document).ready( function ()  {
            $('#datatable2').DataTable();
        });
    </script>
@endsection