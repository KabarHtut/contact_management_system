<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center align-content-center" style="height: 100vh;">
            <div class="col-md-6">
                <x-user.card-wapper name="CMS Login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <x-user.input name="email" type="email" />
                        <x-user.input name="password" type="password" />

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                        <div class="mt-2 col-md-6 offset-md-5">
                            <a href="{{ route('register') }}">User Register</a>
                        </div>
                    </form>
                </x-user.card-wapper>
            </div>
        </div>
    </div>
</x-layouts.app>
