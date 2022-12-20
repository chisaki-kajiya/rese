@section('title', 'ログイン')

<x-guest-layout>
    <h2 class="box__title">Login</h2>
    <div class="box__contents">

        <!-- Session Status -->
        <x-auth-session-status class="mb10" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb10" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="box__contents-item">
                <span class="box__contents-item--icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                <x-input id="email" class="box__contents-item--input" type="email" name="email" :value="old('email')" required onfocus="if (this.value == 'Email') this.value = '';" onblur="if (this.value == '') this.value = 'Email';" value="Email" />
            </div>

            <!-- Password -->
            <div class="box__contents-item">
                <span class="box__contents-item--icon">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                <x-input id="password" class="box__contents-item--input" type="text" name="password" required autocomplete="current-password" onfocus="if (this.value == 'Password') this.value = '', this.type = 'password';" onblur="if (this.value == '') this.value = 'Password', this.type = 'text';" value="Password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="blue-btn">
                    ログイン
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>