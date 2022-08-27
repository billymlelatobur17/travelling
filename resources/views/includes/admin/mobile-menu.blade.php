<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="{{asset('backend/dist/images/logo.svg')}}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                                                            class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-white/[0.08] py-5 hidden">
        <li>
            <a href="{{route('dashboard')}}" class="menu {{ (request()->is('admin')) ? 'menu--active' : ''}}">
                <div class="menu__icon"><i data-feather="home"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>

        <li>
            <a href="{{route('travel-package.index')}}"
               class="menu {{ (request()->is('admin')) ? 'menu--active' : ''}}">
                <div class="menu__icon"><i data-feather="book"></i></div>
                <div class="menu__title"> Paket Travel</div>
            </a>
        </li>
        <li>
            <a href="{{route('gallery.index')}}"
               class="menu {{ (request()->is('admin')) ? 'menu--active' : ''}}">
                <div class="menu__icon"><i data-feather="image"></i></div>
                <div class="menu__title"> Gallery Travel</div>
            </a>
        </li>
        <li>
            <a href="{{route('transaction.index')}}" class="menu {{ (request()->is('admin')) ? 'menu--active' : ''}}">
                <div class="menu__icon"><i data-feather="dollar-sign"></i></div>
                <div class="menu__title"> Transaction</div>
            </a>
        </li>
    </ul>
</div>
