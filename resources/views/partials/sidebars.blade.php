<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image-sidebar">
                <img src="{{ asset('img/Logo2.png') }}" alt="house">
            </span>
            <div class="text header-text">
                <span class="nameydh">Your Dream House</span>
            </div>
        </div>
        
        <i class='bi bi-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a href='dashboard'>
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link {{ request()->is('ranking*') ? 'active' : '' }}">
                    <a href="/ranking">
                        <i class="bi bi-bar-chart-line icon"></i>
                        <span class="text nav-text">Peringkat</span>
                    </a>
                </li>
            </ul>
        </div>
    </div> 
    <div class="bottom-content">
        <li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                    <i class="bx bx-log-out icon"></i>
                    <span class="text nav-text">Keluar</span>
                </button>
            </form>
        </li>
    </div>
</nav>
<script>
    const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle");

    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>