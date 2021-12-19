<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <ul class="nav col-6 me-lg-auto mb-2 justify-content-start mb-md-0">
                <x-layouts.app.nav-item
                    route-name="home"
                    label="{{ __('view.pages.home.label') }}"
                />
            </ul>

            <ul class="nav col-6 me-lg-auto mb-2 justify-content-end mb-md-0">
                @auth
                    <x-layouts.app.nav-item
                        route-name="account.articles.index"
                        label="{{ __('view.account.articles.label') }}"
                    />

                    <x-layouts.app.nav-item
                        route-name="account.profile.index"
                        label="{{ __('view.account.profile.label') }}"
                    />

                    <x-layouts.app.nav-item
                        route-name="auth.logout"
                        label="{{ __('view.auth.logout') }}"
                    />
                @endauth

                @guest
                    <x-layouts.app.nav-item
                        route-name="auth.register"
                        label="{{ __('view.auth.sign_up') }}"
                    />

                    <x-layouts.app.nav-item
                        route-name="auth.login"
                        label="{{ __('view.auth.sign_in') }}"
                    />
                @endguest
            </ul>
        </div>
    </div>
</header>
