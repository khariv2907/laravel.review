<x-layouts.app
    :title="$pageTitle"
>
    <div class="card">
        <div class="card-header">
            Home Page
        </div>

        <div class="card-body">
            <h5 class="card-title">Welcome to the Laravel Demonstration Project</h5>

            @auth
                <hr>

                <div class="mb-3 row">
                    <div class="col-sm-2">Name</div>

                    <div class="col-sm-10">{{ $user->name }}</div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-2">Email</div>

                    <div class="col-sm-10">{{ $user->email }}</div>
                </div>

                <hr>

                <a href="{{ route('auth.logout') }}" class="btn btn-primary">Log out</a>
            @endauth

            @guest
                <a href="{{ route('auth.login') }}" class="btn btn-primary">Sign in</a>
            @endguest
        </div>
    </div>
</x-layouts.app>
