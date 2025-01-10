<aside class="sidebar">
    <div class="sidebar-user">
        <img src="{{ asset('public\assets\img\user1.jpg') }}" alt="">
        <div class="user-captions">
            <span class="name">Hawa</span> <br>
            <span class="email">hawastfi@gmail.com</span>
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
            <a href="{{ url('admin/data-pengguna') }}" class="item">
                <i class="bi bi-person"></i>
                <span>Data Pengguna</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('admin/data-alat') }}" class="item">
                <i class="bi bi-inbox"></i>
                <span>Data Alat</span>
            </a>
        </li>

    </ul>
</aside>
