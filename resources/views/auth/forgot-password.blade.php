@extends('layouts.app', ['fullWidth' => true])

<x-ark-metadata page="password.reset"/>

@section('title')
    <x-data-bag key="fortify-content" resolver="name" view="ark-fortify::components.page-title"/>
@endsection

@section('breadcrumbs')
    <x-ark-breadcrumbs :crumbs="[
        ['route' => 'login', 'label' => trans('ui::menu.sign_in')],
        ['label' => trans('ui::menu.password_reset_email')],
    ]"/>
@endsection

@section('content')
    <x-data-bag key="fortify-content" resolver="name" view="ark-fortify::components.component-heading"/>

    <div class="py-8 mx-auto max-w-xl">
        <div class="px-8">
            <x-ark-flash/>
        </div>

        <div class="mt-5 lg:mt-8">
            <x:ark-fortify::form-wrapper :action="route('password.email')">
                <div class="mb-8">
                    <div class="flex flex-1">
                        <x-ark-input
                            type="email"
                            name="email"
                            label="Email"
                            autocomplete="email"
                            class="w-full"
                            :autofocus="true"
                            :required="true"
                        />
                    </div>
                </div>

                <div class="flex flex-col-reverse justify-between items-center space-y-4 md:flex-row md:space-y-0">
                    <div class="flex-1 mt-8 md:mt-0">
                        <a href="{{ route('login') }}" class="link">@lang('ui::actions.cancel')</a>
                    </div>

                    <button type="submit" class="w-full md:w-auto button-secondary">
                        @lang('ui::auth.forgot-password.reset_link')
                    </button>
                </div>
            </x:ark-fortify::form-wrapper>
        </div>
    </div>
@endsection
