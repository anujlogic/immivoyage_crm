<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ URL::asset('public/asset/image/logo.png')}}" alt="AdminLTE Logo" style="width: 220px; height: 139px;">
        </x-slot>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block" style="color:red;">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong> <i class="fas fa-thumbs-down"></i>
            </div>
        @endif
        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('user.forget-pswd') }}">
            @csrf
            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
