@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="w-100" src="{{ $account->display_picture_link }}"></img>
        </div>
        <div class="col-md-8">
            <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="row col-md-6">
                        <label for="firstName" class="col-md-4 col-form-label">{{ __('First Name') }}:</label>
                        <div class="col-md-8">
                            <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $account->first_name ?? old('firstName') ?? '' }}" required autocomplete="firstName" autofocus>

                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <label for="middleName" class="col-md-4 col-form-label">{{ __('Middle Name') }}:</label>
                        <div class="col-md-8">
                            <input id="middleName" type="text" class="form-control @error('middleName') is-invalid @enderror" name="middleName" value="{{ $account->middle_name ?? old('middleName') ?? '' }}" autocomplete="middleName" autofocus>

                            @error('middleName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="row col-md-6">
                        <label for="lastName" class="col-md-4 col-form-label">{{ __('Last Name') }}:</label>
                        <div class="col-md-8">
                            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $account->last_name ?? old('lastName') ?? '' }}" required autocomplete="lastName" autofocus>

                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}:</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $account->email ?? old('email') ?? '' }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="row col-md-6">
                        <label for="gender" class="col-md-4 col-form-label">{{ __('Gender') }}:</label>
                        <div class="col-md-8 d-flex flex-column justify-content-center">
                            <div class="d-flex flex-row align-items-center">
                                <div class="form-check">
                                    <input type="radio" id="male" name="gender" @if($account->gender_id == 1) checked @endif class="form-check-input @error('gender') is-invalid @enderror" value="1">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check ms-3">
                                    <input type="radio" id="female" name="gender" @if($account->gender_id == 2) checked @endif class="form-check-input @error('gender') is-invalid @enderror" value="2">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>

                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <label for="role" class="col-md-4 col-form-label">{{ __('Role') }}:</label>

                        <div class="col-md-8">
                            <select class="form-select" name="role" disabled aria-label="Default select example">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        @if ($role->id == $account->role_id ?? old('role'))
                                            selected="selected"
                                        @endif
                                        >{{ $role->role_desc }}
                                    </option>
                                @endforeach
                            </select>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="row col-md-6">
                        <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}:</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <label for="picture" class="col-md-4 col-form-label">{{ __('Display Picture') }}:</label>

                        <div class="col-md-8">
                            <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ old('picture') }}" autofocus>

                            @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="row col-md-6">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
