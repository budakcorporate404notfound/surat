@extends('layouts.app')

@section('content')
<div class="login-logo">
    <a href="{{ url('/') }}"><b>Persuratan </b>Rokap</a>
</div>
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Buat Akun Baru</p>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input id="name" type="text" placeholder="nama" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input id="email" type="email" placeholder="email"
                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input id="nip" type="text" placeholder="nip" class="form-control @error('nip') is-invalid @enderror"
                    name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('nip')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <select class="form-control" name="id_unit_kerja">

                    <option>Pilih Unit Kerja</option>

                    @foreach ($items as $key => $value)
                    <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <select class="form-control" name="id_jabatan">

                    <option>Pilih Jabatan</option>

                    @foreach ($items2 as $key => $value)
                    <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <input id="password" type="password" placeholder="password"
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

            <div class="input-group mb-3">
                <input id="password-confirm" type="password" placeholder="konfirmasi password" class="form-control"
                    name="password_confirmation" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <button type="submit" class="btn btn-primary btn-block">Simpan Akun</button>
            </div>
        </form>

        <p class="mb-0">
            <a href="{{route('login')}}" class="text-center">Sudah Mempunyai Akun</a>
        </p>
    </div>
    <!-- /.Register-card-body -->
</div>

@endsection