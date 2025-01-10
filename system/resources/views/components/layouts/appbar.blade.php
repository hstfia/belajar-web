<nav class="appbar">
    <div class="appbar-brand">PANICBUTTON WEB</div>
    <div class="appbar-right">
        <ul class="menu">
            <li class="menu-item dropdown" >
                <a href="#" class="item" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="budge-notif pr-4">2</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a href="#">TExt</a>
                    </li>
                    <li>
                        <a href="#">TExt</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item relative">
                <a href="#" class="logout" data-bs-toggle="dropdown">
                    <i class="bi bi-person"></i>
                    <span>Wawa</span>
                    <i class="bi bi-chevron-down ml-2"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <form action="{{ url('login') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                </ul>
            </li>
            {{-- <li class="menu-item">
                <button class="navbar-navbigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </li> --}}
        </ul>
    </div>
</nav>
