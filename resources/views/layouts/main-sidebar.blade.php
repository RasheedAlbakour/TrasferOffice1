<div class="main-sidebar-header">
    <a href="{{ route('offices.index') }}" class="header-logo">
        {{ __('layout-sidebar.main_logo') }}
    </a>
</div>
<div class="main-sidebar" id="sidebar-scroll">
    <nav class="main-menu-container nav nav-pills flex-column sub-open">
        <div class="slide-left" id="slide-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
            </svg>
        </div>
        <ul class="main-menu">
            @if (Auth::user()->hasRole('owner'))
                <li class="slide">
                    <a href="{{ route('offices.index') }}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z" />
                        </svg>
                        <span class="side-menu__label">{{ __('layout-sidebar.your_office') }}</span>
                    </a>
                </li>
            @elseif (Auth::user()->hasRole('admin'))
                <li class="slide">
                    <a href="{{ route('offices.index') }}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z" />
                        </svg>
                        <span class="side-menu__label">{{ __('layout-sidebar.all_offices') }}</span>
                    </a>
                </li>
            @endif
            <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z"/></svg>
                    <span class="side-menu__label">{{ __('layout-sidebar.transfers') }}</span>
                    <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                    <li class="slide side-menu__label1">
                        <a href="javascript:void(0);">{{ __('layout-sidebar.transfers') }}</a>
                    </li>
                    @can('transfer-index')
                        <li class="slide">
                            <a href="{{ route('transfers.index') }}" class="side-menu__item">
                                {{ __('layout-sidebar.all_transfers') }}
                            </a>
                        </li>
                    @endcan
                    @can('transfer-create')
                        <li class="slide">
                            <a href="{{ route('transfers.create') }}" class="side-menu__item">
                                {{ __('layout-sidebar.create_transfer') }}
                            </a>
                        </li>
                    @endcan
                    @can('transfer-office')
                        @if (isset(Auth::user()->HisOffice))
                            <li class="slide">
                                <a href="{{ route('offices.transfers', ['office' => Auth::user()->HisOffice->id]) }}"
                                    class="side-menu__item">
                                    {{ __('layout-sidebar.your_transfers') }}
                                </a>
                            </li>
                        @endif
                    @endcan
                </ul>
            </li>
            @if (Auth::user()->hasRole('admin'))
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="side-menu__icon">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z"/>
                        </svg>
                        <span class="side-menu__label">{{ __('layout-sidebar.manage_offices') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        @can('offices.index')
                            <li class="slide">
                                <a href="{{ route('offices.index') }}" class="side-menu__item">
                                    {{ __('layout-sidebar.all_offices') }}
                                </a>
                            </li>
                        @endcan
                        @can('office-create')
                            <li class="slide">
                                <a href="{{ route('offices.create') }}" class="side-menu__item">
                                    {{ __('layout-sidebar.office_details') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if (Auth::user()->hasRole('owner'))
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="side-menu__icon">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M0 48C0 21.5 21.5 0 48 0H336c26.5 0 48 21.5 48 48V207l-42.4 17H304 272c-8.8 0-16 7.2-16 16v32 24.2V304c0 .9 .1 1.7 .2 2.6c2.3 58.1 24.1 144.8 98.7 201.5c-5.8 2.5-12.2 3.9-18.9 3.9H240V432c0-26.5-21.5-48-48-48s-48 21.5-48 48v80H48c-26.5 0-48-21.5-48-48V48zM80 224c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H80zm80 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zM64 112v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zM176 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H176zm80 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H272c-8.8 0-16 7.2-16 16zM423.1 225.7c5.7-2.3 12.1-2.3 17.8 0l120 48C570 277.4 576 286.2 576 296c0 63.3-25.9 168.8-134.8 214.2c-5.9 2.5-12.6 2.5-18.5 0C313.9 464.8 288 359.3 288 296c0-9.8 6-18.6 15.1-22.3l120-48zM527.4 312L432 273.8V461.7c68.2-33 91.5-99 95.4-149.7z"/>
                        </svg>
                        <span class="side-menu__label">{{ __('layout-sidebar.your_office') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        @if (isset(Auth::user()->HisOffice))
                            <li>
                                <a href="{{ route('offices.show', ['office' => Auth::user()->HisOffice->id]) }}"
                                    class="side-menu__item">
                                    <span class="side-menu__label">{{ __('layout-sidebar.your_office') }}</span>
                                </a>
                            </li>
                            @endif

                    </ul>

            </li>
            </li>
            @endif
            <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 512 512" class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M470.7 9.4c3 3.1 5.3 6.6 6.9 10.3s2.4 7.8 2.4 12.2l0 .1v0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3L310.6 214.6c-11.8 11.8-30.8 12.6-43.5 1.7L176 138.1 84.8 216.3c-13.4 11.5-33.6 9.9-45.1-3.5s-9.9-33.6 3.5-45.1l112-96c12-10.3 29.7-10.3 41.7 0l89.5 76.7L370.7 64H352c-17.7 0-32-14.3-32-32s14.3-32 32-32h96 0c8.8 0 16.8 3.6 22.6 9.3l.1 .1zM0 304c0-26.5 21.5-48 48-48H464c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V304zM48 416v48H96c0-26.5-21.5-48-48-48zM96 304H48v48c26.5 0 48-21.5 48-48zM464 416c-26.5 0-48 21.5-48 48h48V416zM416 304c0 26.5 21.5 48 48 48V304H416zm-96 80a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/>
                       </svg>
                    <span class="side-menu__label">{{ __('layout-sidebar.exchange_rates') }}</span>
                    <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                    <li class="slide">
                        <a href="{{ route('currencies.index') }}" class="side-menu__item">
                            {{ __('layout-sidebar.exchange_rates') }}
                        </a>
                    </li>
                </ul>
            </li>
            @can('user-index')
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="side-menu__icon">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/>                        </svg>
                        <span class="side-menu__label">{{ __('layout-sidebar.manage_users') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="nav-item">
                            <a class="side-menu__item" href="{{ route('users.index') }}">
                                {{ __('layout-sidebar.users_list') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
        <div class="slide-right" id="slide-right">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
            </svg>
        </div>
    </nav>
</div>
