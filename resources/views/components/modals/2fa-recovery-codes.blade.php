<x-ark-modal title-class="header-2">
    @slot('title')
        @lang('ui::pages.user-settings.2fa_reset_code_title')
    @endslot

    @slot('description')
        <div class="flex flex-col mt-8 space-y-4">
            <x-ark-alert type="warning">
                <x-slot name="message">
                    @lang('ui::pages.user-settings.2fa_warning_text')
                </x-slot>
            </x-ark-alert>
            <div class="grid grid-cols-1 grid-flow-row gap-x-4 gap-y-4 sm:grid-cols-2">
                @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                    <div class="flex items-center h-12 font-medium rounded border border-theme-secondary-300 text-theme-secondary-900">
                        <span class="flex justify-center items-center w-8 h-full rounded-l bg-theme-secondary-100">
                            {{ $loop->index + 1 }}
                        </span>
                        <input
                            type="text"
                            id="resetCode_{{ $loop->index }}"
                            class="ml-4 w-full"
                            value="{{ $code }}"
                            readonly
                        />
                    </div>
                @endforeach
                {{-- TODO: check if we need this or not --}}
                {{-- <div class="mt-6">
                    <x-ark-clipboard :value="$this->resetCode"/>
                </div> --}}
            </div>
        </div>
    @endslot

    @slot('buttons')
        <div class="flex flex-col-reverse w-full sm:flex-row sm:justify-between">
            <div class="flex justify-center mt-3 w-full sm:justify-start sm:mt-0">
                <x-ark-file-download
                    :filename="'2fa_recovery_code_' . $this->user->name"
                    :content="implode('\n', json_decode(decrypt($this->user->two_factor_recovery_codes)))"
                    :title="trans('ui::actions.download')"
                    wrapper-class="w-full sm:w-auto"
                    class="justify-center w-full"
                />
            </div>
            <div class="flex justify-center">
                <button type="button" class="items-center w-full whitespace-nowrap sm:w-auto button-primary" wire:click="hideRecoveryCodes" dusk="recovery-codes-understand">
                    @lang('ui::actions.understand')
                </button>
            </div>
        </div>
    @endslot
</x-ark-modal>
