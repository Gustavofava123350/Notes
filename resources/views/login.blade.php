@extends('layouts.main_layout');
@section('content');
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <!-- logo -->
                <div class="text-center p-3">
                    <img src="asset/images/logo.png"   alt="logo">
                </div>
                <!-- Form -->
                <div class="card-body">
                    <form method="POST" action="/logiSubmit" novalidate>
                        @csrf
                        <!-- Campo Email -->
                        <div class="mb-3">
                            <input type="email" class="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Campo Senha -->
                        <div class="mb-3">
                            <input type="password" class="password" name="password" placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Botão -->
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </div>
                    </form>
                    {{-- invalid Login --}}
                    @if (session('loginError'))
                        <div class="alert alert-danger text-center">
                            {{ session('loginError') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection