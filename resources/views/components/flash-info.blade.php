@if (session()->has('info_message'))
        <div class="alert alert-info">
            {{ session('info_message')}}
        </div>
@endif