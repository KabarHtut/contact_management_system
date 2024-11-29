<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 100vh;">
            <div class="col-md-6">
                <x-user.card-wapper name="CMS Register">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <x-user.input name="name" />
                        <x-user.input name="email" type="email" />
                        <x-user.input name="phone" type="number" />
                        <x-user.input name="password" type="password" />

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="mt-2 col-md-6 offset-md-5">
                            <a href="{{ route('login') }}">Return Login</a>
                        </div>
                    </form>
                </x-user.card-wapper>
            </div>
        </div>
    </div>
</x-layouts.app>
