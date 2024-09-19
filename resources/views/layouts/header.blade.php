<header class="app-header header sticky">
    <div class="main-header-container container-fluid">
        <div class="header-content-left align-items-center">
            <div class="header-element">
                <a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                    <span class="open-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 24 24">
                            <path d="M24 0v24H0V0h24z" fill="none" opacity=".87" />
                            <path d="M18.41 16.59L13.82 12l4.59-4.59L17 6l-6 6 6 6 1.41-1.41zM6 6h2v12H6V6z" />
                        </svg>
                    </span>
                    <span class="close-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 24 24"
                            fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
        <div class="header-element">
            <a class="header-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <span class="hidden-md-down">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>
        @if (Auth::user()->hasRole('owner'))
@if (isset(Auth::user()->HisOffice))
        <div id="notification-data" class="badge bg-secondary-transparent">0 حوالات معلقة</div>
        @endif
        @endif
        <div class="header-content-right">
            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
            </button>
            <div class="navbar navbar-collapse responsive-navbar p-0">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex align-items-center">
                        <div class="header-element header-search">
                            <a href="javascript:void(0);" class="header-link d-lg-none d-block"
                                data-bs-toggle="modal" data-bs-target="#searchModal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 24 24"
                                    width="24px">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                </svg>
                            </a>
                        </div>

                        <div class="header-element main-profile-user">
                            <a href="javascript:void(0);"
                                class="header-link dropdown-toggle d-flex align-items-center" id="mainHeaderProfile"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2">
                                    <img src="{{ asset ('/assets/images/users/21.jpg')}}" alt="img" width="30"
                                        height="30" class="rounded-circle">
                                </span>
                                <div class="d-xl-block d-none lh-1">
                                    <h6 class="fs-13 font-weight-semibold mb-0">{{ Auth::user()->name }}</h6>
                                    <span class="op-8 fs-10">{{ __('layout-header.your_role_is') }} {{ Auth::user()->roles_name }}</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu pt-0 overflow-hidden dropdown-menu-end mt-1"
                                aria-labelledby="mainHeaderProfile">
                                <li><a class="dropdown-item"
                                        href="{{ route('users.profile', ['id' => Auth::user()->id]) }}"><i
                                            class="ti ti-user-circle fs-18 me-2 op-7"></i>{{ __('layout-header.profile') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}"><i
                                            class="ti ti-user-plus fs-18 me-2 op-7"></i>{{ __('layout-header.add_another_account') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ti ti-power fs-18 me-2 op-7"></i>{{ __('layout-header.sign_out') }}
                                    </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <li>
                                    <hr class="dropdown-divider my-0">
                                </li>
                                <li class="d-flex justify-content-center p-2">
                                    <span><a class="fs-12 px-2 border-end" href="javascript:void(0);">{{ __('layout-header.privacy_policy') }}</a></span>
                                    <span><a class="fs-12 px-2 border-end" href="javascript:void(0);">{{ __('layout-header.terms') }}</a></span>
                                    <span><a class="fs-12 px-2" href="javascript:void(0);">{{ __('layout-header.cookies') }}</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
