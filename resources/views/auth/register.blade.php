<!DOCTYPE html>
<html>
<head>
    <title>Add a user</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .alert {
            width: 100%;
            z-index: 9999;
            margin: auto;
            margin-bottom: 1vh;
        }
    </style>
</head>
<body>

@extends('layouts.app')
@section('content')

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="" selected disabled>{{ __('Choisir un rôle') }}</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="support" {{ old('role') == 'support' ? 'selected' : '' }}>Support</option>
                <option value="commercial" {{ old('role') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                <option value="financier" {{ old('role') == 'financier' ? 'selected' : '' }}>Finance</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    @if (session('success'))
    <br>
        <div class="alert alert-success" id="customAlert">
            {{ session('success') }}
        </div>
        <script>
            $(document).ready(function() {
                setTimeout(function() {$('#customAlert').fadeOut();}, 7000);
            });
        </script>
    @endif
    @if (session('failed'))
    <br>
        <div class="alert alert-danger" id="customAlert">
            {{ session('failed') }}
        </div>
        <script>
            $(document).ready(function() {
                setTimeout(function() {$('#customAlert').fadeOut();}, 7000);
            });
        </script>
    @endif
</x-guest-layout>

@endsection 
</body>
</html>
