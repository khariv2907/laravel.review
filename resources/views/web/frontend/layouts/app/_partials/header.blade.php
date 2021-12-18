<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <ul class="nav col-6 me-lg-auto mb-2 justify-content-start mb-md-0">
                <x-layouts.app.nav-item
                    route-name="home"
                    label="Home"
                />
            </ul>

            <ul class="nav col-6 me-lg-auto mb-2 justify-content-end mb-md-0">
                @auth
                    <x-layouts.app.nav-item
                        route-name="auth.logout"
                        label="Profile"
                    />

                    <x-layouts.app.nav-item
                        route-name="auth.logout"
                        label="Logout"
                    />
                @endauth

                @guest
                        <x-layouts.app.nav-item
                            route-name="auth.register"
                            label="Sign up"
                        />

                    <x-layouts.app.nav-item
                        route-name="auth.login"
                        label="Sign in"
                    />
                @endguest
            </ul>
        </div>
    </div>
</header>
