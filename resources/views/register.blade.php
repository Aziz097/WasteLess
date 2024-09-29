@extends('layouts.app')

@section('title', 'Daftar Akun')

@section('content')

<div class="box">
    <h1>Daftar Sebagai</h1>
    <p>Pilih jenis akun Anda untuk melanjutkan</p>

    <div class="row">
        <!-- Supermarket -->
        <div class="col-6">
            <a href="{{ route('signup.supermarket') }}" class="text-decoration-none">
                <div class="icon-container">
                    <img src="images/iconsupermarket.png" alt="Supermarket">
                </div>
                <button class="btn btn-success btn-custom">Supermarket</button>
            </a>
        </div>

        <!-- Customer -->
        <div class="col-6">
            <a href="{{ route('signup.customer') }}" class="text-decoration-none">
                <div class="icon-container">
                    <img src="images/iconcustomer.png" alt="Customer">
                </div>
                <button class="btn btn-success btn-custom">Customer</button>
            </a>
        </div>
    </div>
</div>
@endsection
