@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row justify-content-center">
        <div class="circle d-flex flex-row justify-content-center align-items-center">
            <h3 class="text-center">{{ __($message) }}</h3>
        </div>
    </div>
</div>
@endsection
