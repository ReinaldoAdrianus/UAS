@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="POST" action="{{ route('update-role', $account->id) }}">
                @csrf
                <h4 class="text-decoration-underline skip-ink">
                    @if($account->last_name == '')
                        {{ $account->first_name." ".$account->last_name }}
                    @else
                        {{ $account->first_name." ".$account->middle_name." ".$account->last_name }}
                    @endif
                </h4>
                <div class="row mt-5">
                    <div class="col-md-2">Role:</div>
                    <div class="col-md-5">
                        <select class="form-select" name="role" aria-label="Default select example">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    @if ($role->id == $account->role_id)
                                        selected="selected"
                                    @endif
                                    >{{ $role->role_desc }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <button type="submit" class="btn btn-warning w-25">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
