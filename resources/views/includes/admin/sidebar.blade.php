<nav class="side-nav">
    <ul>
        <li>
            <a href="{{route('dashboard')}}"
               class="side-menu {{ (request()->is('admin')) ? 'side-menu--active' : ''}} ">
                <div class="side-menu__icon"><i data-feather="home"></i></div>
                <div class="side-menu__title"> Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{route('travel-package.index')}}"
               class="side-menu {{ (request()->is('admin/travel-package')) ? 'side-menu--active' : ''}}  ">
                <div class="side-menu__icon"><i data-feather="book"></i></div>
                <div class="side-menu__title">Paket Travel</div>
            </a>
        </li>
        <li>
            <a href="{{route('gallery.index')}}"
               class="side-menu {{ (request()->is('admin/gallery')) ? 'side-menu--active' : ''}} ">
                <div class="side-menu__icon"><i data-feather="image"></i></div>
                <div class="side-menu__title"> Gallery Travel</div>
            </a>
        </li>
        <li>
            <a href="{{route('transaction.index')}}"
               class="side-menu {{ (request()->is('admin/transaction')) ? 'side-menu--active' : ''}} ">
                <div class="side-menu__icon"><i data-feather="dollar-sign"></i></div>
                <div class="side-menu__title"> Transaksi</div>
            </a>
        </li>
    </ul>
</nav>
