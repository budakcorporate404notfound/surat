@extends('layouts.app')

@section('content')
<div class="login-logo">
    <a href=""><b>Persuratan </b>Rokap</a>
</div>
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">masukan email / nip dan password</p>

        <form action="{{ route('login') }}" method="post">
            @csrf

            @if ($message = Session::get('msg'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
            </div>
            @endif

            <div class="input-group mb-3">
                <input id="username" type="username" placeholder="masukan email / nip anda"
                    class="form-control @error('username') is-invalid @enderror" name="username"
                    value="{{ old('username') }}" required autocomplete="username" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" placeholder="masukan password anda"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row" style="margin-left: 10px;">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Ingatkan saya
                        </label>
                    </div>
                </div>

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        {{-- <p class="mb-0">
            <a href="{{route('register')}}" class="text-center">Buat Akun Baru</a>
        </p> --}}

    </div>
    <!-- /.login-card-body -->
</div>
<style>
    body {
        background: #00f260;
    }

    /* fallback for old browsers */
    body {
        background: -webkit-linear-gradient(to right, #0575e6, #00f260);
    }

    /* Chrome 10-25, Safari 5.1-6 */
    body {
        background: linear-gradient(to right, #0575e6, #00f260);
    }

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
</style>
@endsection