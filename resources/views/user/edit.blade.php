@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Edit User') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action=" {{ route('user.update', $user->id) }} ">
                        @csrf
                            <div>
                                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nama') }} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $user->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ message }} </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Alamat Email') }} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $user->email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ message }} </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Password') }} </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ $user->password }}" required autocomplete="new-passsword">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ message }} </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }} </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                    name="password_confirmation" value="{{ $user->password }}" required autocomplete="new-passsword">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ message }} </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="name" class="col-md-4 col-form-label text-md-left" name="level"></label>
                                <div class="col-md-6">
                                    <select style="background-color: #202940;" name="level" id="level" value="{{ $user->level }}" class="form-control">
                                        <option value="peserta" <?php if($user->level == "peserta") echo 'selected="selected"'; ?> >Peserta</option>
                                        <option value="admin" <?php if($user->level == "admin") echo 'selected="selected"'; ?>>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection            