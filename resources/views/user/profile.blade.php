<x-layouts.admin>
    <x-card-wapper>
        <div class="col-md-12">
            <h5 class="text-center" style="color: #4e73df">Profile</h5>
            <div class="row mt-3 p-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5 text-center">
                            <label for="">အမည်</label>
                        </div>
                        <div class="col-md-2 text-center">
                            :
                        </div>
                        <div class="col-md-5 text-center">
                           {{ auth()->user()->name}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row mt-3 p-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5 text-center">
                            <label for="">အီး‌မေးလ်</label>
                        </div>
                        <div class="col-md-2 text-center">
                            :
                        </div>
                        <div class="col-md-5 text-center">
                           {{ auth()->user()->email}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row mt-3 p-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5 text-center">
                            <label for="">ဖုန်းနံပတ်</label>
                        </div>
                        <div class="col-md-2 text-center">
                            :
                        </div>
                        <div class="col-md-5 text-center">
                           {{ auth()->user()->phone}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row mt-3">
                <div class="col-md-7">

                </div>
                <div class="col-md-5">
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    <a class="nav-link" style="color: #4e73df; float:right" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </x-card-wapper>

    <x-slot name='script'>

    </x-slot>
</x-layouts.admin>
