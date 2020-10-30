<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
		<a class="desktop-logo logo-light active" href="{{ route('home') }}">
			<img src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo">
		</a>
		<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}">
			<img src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo">
		</a>
		<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}">
			<img src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo">
		</a>
		<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}">
			<img src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme" alt="logo">
		</a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
					<img alt="user-img" class="avatar avatar-xl brround" src="{{ URL::asset('assets/img/faces/6.jpg') }}">
					<span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name ?? '' }}</h4>
                    <span class="mb-0 text-muted">{{ __('admin.premium') }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{ __('admin.main') }}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('invoices.index') }}">
                    <i class="side-menu__icon fa fa-receipt"></i>
					<span class="side-menu__label">الفواتير</span>
				</a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fa fa-cogs"></i>
					<span class="side-menu__label">الإعدادات</span><i class="angle fe fe-chevron-down"></i>
				</a>
                <ul class="slide-menu">
                    <li>
						<a class="slide-item" href="{{ route('sections.index') }}">الأقسام</a>
                    </li>
                    <li>
						<a class="slide-item" href="{{ route('products.index') }}">المنتجات</a>
					</li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
