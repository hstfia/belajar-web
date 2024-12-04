<aside class="sidebar">
    <div class="sidebar-user">
        <img src="{{ asset('public/assets/img/user1.jpg') }}" alt="">
        <div class="user-captions">
            <span class="name">Hawa Jak Lah</span>
            <span class="email">hawajaklah@gmail.com</span>
        </div>
    </div>
    <ul class="menu">
        <li class="menu-title">NAVIGATION</li>
        <li class="menu-item">
            <a href="{{ url('admin/dashboard') }}" class="item">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('admin/user') }}" class="item">
                <i class="bi bi-person"></i>
                <span>Data User</span>
            </a>
        </li>

    </ul>
</aside>
