<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('show-profile') }}">
            @csrf

            <div>
            <b>Name:</b> <div>{{ Auth::user()->name }}</div><br/>
            <b>Email:</b> <div>{{ Auth::user()->email }}</div><br/>
            <b>Phone:</b> <div>{{ Auth::user()->phone }}</div> <br/>
            <b>Account type:</b> <div>{{ Auth::user()->account_type }}</div><br/>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
