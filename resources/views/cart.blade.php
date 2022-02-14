@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($carts) == 0)
                <h3>{{ __('No data') }}</h3>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Title') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>{{ $cart->book->title }}</td>
                                <td>
                                    <a href="{{ route('cart-delete', $cart->id) }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('delete-cart-form').submit();">
                                        {{ __('Delete') }}
                                    </a>

                                    <form id="delete-cart-form" action="{{ route('cart-delete', $cart->id) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if(count($carts) != 0)
                    <form method="POST" action="{{ route('submit-order') }}">
                        @csrf
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-warning w-25">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
