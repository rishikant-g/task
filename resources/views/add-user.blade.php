@extends('layouts.app')
@section('title','Create new user');
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">{{ __('Enter Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email">{{ __('Enter email') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                              <!-- select -->
                              <div class="form-group">
                              <label>{{ __('Role') }}</label>
                                <select class="custom-select" name="role_id" required>
                                  <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                      <option value={{$role->id}}>{{$role->role_name}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection