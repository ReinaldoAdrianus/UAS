@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($accounts) == 0)
                <h3>{{ __('No account') }}</h3>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('Account') }}</th>
                            <th class="text-center" colspan="2">{{ __('Aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td>
                                    @if($account->last_name == '')
                                        {{ $account->first_name." ".$account->last_name." - ".$account->role->role_desc }}
                                    @else
                                        {{ $account->first_name." ".$account->middle_name." ".$account->last_name." - ".$account->role->role_desc }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('show-role', $account->id) }}">
                                        {{ __('Update Role') }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('delete-account', $account->id) }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('delete-account-form').submit();">
                                        {{ __('Delete') }}
                                    </a>

                                    <form id="delete-account-form" action="{{ route('delete-account', $account->id) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
