@section('title', '会員登録')

<x-guest-layout>
    <h2 class="box__title">Registration</h2>
    <div class="box__contents">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="box__contents-item">
                <span class="box__contents-item--icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <x-input id="name" class=" box__contents-item--input" type="text" name="name" :value="old('name')" required autofocus onfocus="if (this.value == 'Username') this.value = '';" onblur="if (this.value == '') this.value = 'Username';" value="Username" />
            </div>

            <!-- Email Address -->
            <div class="box__contents-item">
                <span class="box__contents-item--icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                <x-input id="email" class="box__contents-item--input" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="box__contents-item">
                <span class="box__contents-item--icon">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                <x-input id="password" class="box__contents-item--input" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="box__contents-item">
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="box__contents-btn">
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>