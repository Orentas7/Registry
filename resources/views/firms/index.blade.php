@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-flash/>
            <x-flash-info/>
            <div class="card">
                <div class="card-header">{{ __('Firm list') }}</div>

                <div class="card-body">
                    <div>
                        <table class="table" id="datatable1">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Website') }}</th>
                                    <th>{{ __('Logo') }}</th>
                                    <th>{{ __('Employees') }}</th>
                                    <th>{{ __("Actions") }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($firms as $firm)
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
                                            <ul>
                                                @forelse($firm->employees as $employee)
                                                    <li>{{ $employee->name }}
                                                @empty <li>{{ __('No employees') }}
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td>
                                            <div>                                        
                                                <a class="dropdown-item" href="{{ route('firms.edit', $firm->id) }}">
                                                    {{ __("Edit") }}
                                                </a>
                                                <form action="{{ route('firms.destroy', $firm->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item" type="submit">{{ __("Delete") }}</button>
                                                </form>
                                        </div>
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
            $('#datatable1').DataTable();
        });
    </script>
@endsection