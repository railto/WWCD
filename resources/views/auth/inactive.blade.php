<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Your account is currently inactive as it needs to be be activated by an administrator, you will receive an email when your account has been activated.') }}
        </div>
    </x-auth-card>
</x-guest-layout>
