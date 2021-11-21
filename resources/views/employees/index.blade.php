@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-flash/>
            <div class="card">
                <div class="card-header">{{ __('Employee list') }}</div>

                <div class="card-body">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone number') }}</th>
                                <th>{{ __('Employed at') }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->number}}</td>
                                    <td>
                                        <ul>
                                            @forelse($employee->firms as $firm)
                                                <li>{{ $firm->name }}
                                                @empty <li>{{ __('Not employed') }}
                                            @endforelse
                                        </ul>
                                    </td>
                                    <td>
                                        <div>                                        
                                            <a class="dropdown-item" href="{{ route('employees.edit', $employee->id) }}">
                                                {{ __("Edit") }}
                                            </a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
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
@endsection

@section('javascripts')    
    <script>
        $(document).ready( function ()  {
            $('#datatable').DataTable();
        });
</script>
@endsection