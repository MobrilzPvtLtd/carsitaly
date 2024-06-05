<?php
$notifications = optional(auth()->user())->unreadNotifications;
$notifications_count = optional($notifications)->count();
$notifications_latest = optional($notifications)->take(5);
?>

<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand d-sm-flex justify-content-center">
            <a href="{{ route('home') }}">
                <img class="sidebar-brand-full" src="{{ asset('img/logo-admin.png') }}" alt="{{ app_name() }}"
                    height="46">
            </a>
            <img class="sidebar-brand-narrow" src="{{ asset('img/logo-square.jpg') }}" alt="{{ app_name() }}"
                height="46">
        </div>
        <button class="btn-close d-lg-none" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" type="button"
            aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.dashboard') }}">
                <i class="nav-icon fa-solid fa-cubes"></i>&nbsp;@lang('Dashboard')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.notifications.index') }}">
                <i class="nav-icon fa-regular fa-bell"></i>&nbsp;@lang('Notifications')
                @if ($notifications_count)
                    &nbsp;<span class="badge badge-sm bg-info ms-auto">{{ $notifications_count }}</span>
                @endif
            </a>
        </li>

        {{-- @can('view_posts')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.posts.index') }}">
                    <i class="nav-icon fa-regular fa-file-lines"></i>&nbsp;@lang('Posts')
                </a>
            </li>
        @endcan
        @can('view_categories')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.categories.index') }}">
                    <i class="nav-icon fa-solid fa-diagram-project"></i>&nbsp;@lang('Categories')
                </a>
            </li>
        @endcan --}}

        @can('view_services')
            <li class="nav-group" aria-expanded="true">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="nav-icon fa-solid fa-wrench"></i>&nbsp;@lang('Services')
                </a>
                <ul class="nav-group-items compact" style="height: auto;">
                    @can('view_hotels')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.hotels.index') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Hotels
                        </a>
                    </li>
                    @endcan
                    @can('view_cars')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.cars.index') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Cars
                        </a>
                    </li>
                    @endcan
                    @can('view_tours')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.tours.index') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tours
                        </a>
                    </li>
                    @endcan
                    @can('view_cruises')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.cruises.index') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Cruises
                        </a>
                    </li>
                    @endcan
                    @can('view_villas')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.villas.index') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Villas
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('view_services')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.bookings') }}">
                    <i class="nav-icon fab fa-first-order"></i>&nbsp;@lang('Bookings')
                </a>
            </li>
        @endcan

        @can('view_services')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.flight-enquiry') }}">
                    <i class="nav-icon fa fa-plane"></i>&nbsp;@lang('Flight Enquiry')
                </a>
            </li>
        @endcan

        @can('edit_settings')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.settings') }}">
                    <i class="nav-icon fa-solid fa-gears"></i>&nbsp;@lang('Settings')
                </a>
            </li>
        @endcan

        @can('edit_settings')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.contact-message') }}">
                    <i class="nav-icon fa-solid fa-phone"></i>&nbsp;@lang('Contact')
                </a>
            </li>
        @endcan

        @can('view_backups')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.backups.index') }}">
                    <i class="nav-icon fa-solid fa-box-archive"></i>&nbsp;@lang('Backups')
                </a>
            </li>
        @endcan

        @can('view_users')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.users.index') }}">
                    <i class="nav-icon fa-solid fa-user-group"></i>&nbsp;@lang('Users')
                </a>
            </li>
        @endcan

        @can('view_roles')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.roles.index') }}">
                    <i class="nav-icon fa-solid fa-user-shield"></i>&nbsp;@lang('Roles')
                </a>
            </li>
        @endcan

        @can('view_logs')
            <li class="nav-group" aria-expanded="true">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="nav-icon fa-solid fa-list-ul"></i>&nbsp;@lang('Logs')
                </a>
                <ul class="nav-group-items compact" style="height: auto;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log-viewer::dashboard') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Log Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log-viewer::logs.list') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Daily Log
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

    </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" data-coreui-toggle="unfoldable" type="button"></button>
    </div>
</div>
