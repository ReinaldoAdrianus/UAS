@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4 class="text-decoration-underline skip-ink">{{ __('E-Book Detail') }}</h4>
            <div class="row mt-5">
                <div class="col-md-2">{{ __('Title') }}:</div>
                <div class="col-md-10">{{ $ebook->title }}</div>
            </div>
            <div class="row mt-4">
                <div class="col-md-2">{{ __('Author') }}:</div>
                <div class="col-md-10">{{ $ebook->author }}</div>
            </div>
            <div class="row mt-4">
                <div class="col-md-2">{{ __('Description') }}:</div>
                <div class="col-md-10">{{ $ebook->description }}</div>
            </div>

            <form method="POST" action="{{ route('ebook-rent', $ebook->id) }}">
                @csrf
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-warning w-25">
                        {{ __('Rent') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
