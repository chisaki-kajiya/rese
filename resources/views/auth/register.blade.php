@section('title', '会員登録')

<x-guest-layout>
    <h2 class="box__title">Registration</h2>
    <div class="box__contents">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb10" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="box__contents-item">
                <span class="box__contents-item--icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <x-input
                    id="name"
                    class=" box__contents-item--input"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    onfocus="if (this.value == 'Username') 
                        this.value = '';" 
                    onblur="if (this.value == '') 
                        this.value = 'Username';"
                    value="Username"
                />
            </div>

            <!-- Email Address -->
            <div class="box__contents-item">
                <span class="box__contents-item--icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                <x-input
                    id="email"
                    class="box__contents-item--input"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    onfocus="if (this.value == 'Email')
                        this.value = '';"
                    onblur="if (this.value == '')
                        this.value = 'Email';"
                    value="Email"
                />
            </div>

            <!-- Password -->
            <div class="box__contents-item">
                <span class="box__contents-item--icon">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                <x-input
                    id="password"
                    class="box__contents-item--input"
                    type="text"
                    name="password"
                    required
                    autocomplete="new-password"
                    onfocus="if (this.value == 'Password')
                        this.value = '', this.type = 'password';"
                    onblur="if (this.value == '')
                        this.value = 'Password', this.type = 'text';"
                    value="Password"
                />
            </div>
            <x-button class="blue-btn">登録</x-button>
        </form>
    </div>
</x-guest-layout>