<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container-fluid p-0">
        <!-- Logo or brand on the left -->
        <a class="navbar-brand" href="/admin">
            <h3 class="fw-bold fst-italic">Trash-P</h3>
        </a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links on the right -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item pe-3">
                    <a class="nav-link {{ $title === 'admin' ? 'active' : '' }}" href="/admin">Data Warga</a>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link {{ $title === 'tagihan' ? 'active' : '' }}" href="/admin/tagihan">Tagihan</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="bg-transparent border-0">
                            <a class="nav-link button"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
