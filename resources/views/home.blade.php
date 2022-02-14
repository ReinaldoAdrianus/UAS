@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Author') }}</th>
                        <th scope="col">{{ __('Title') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ebooks as $book)
                        <tr>
                            <td>{{ $book->author }}</td>
                            <td>
                                <a href="{{ route('ebook-detail', $book->id) }}">
                                    {{ $book->title }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
