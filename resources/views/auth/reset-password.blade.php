@extends('layouts.app', ['fullWidth' => true])

<x-ark-metadata page="password.reset" />

@section('title')
    <x-data-bag key="fortify-content" resolver="name" view="ark-fortify::components.page-title" />
@endsection

@section('breadcrumbs')
    <x-ark-breadcrumbs :crumbs="[
        ['route' => 'login', 'label' => trans('ui::menu.sign_in')],
        ['label' => trans('ui::menu.reset_password')],
    ]" />
@endsection

@section('content')
    <x-data-bag key="fortify-content" resolver="name" view="ark-fortify::components.component-heading" />

    <div class="py-8 mx-auto max-w-xl">
        <livewire:auth.reset-password-form :token="request()->route('token')" :email="old('email', request()->email)" />
    </div>
@endsection
