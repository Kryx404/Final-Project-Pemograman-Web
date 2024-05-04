<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container-fluid p-0">
        <!-- Logo or brand on the left -->
        <a class="navbar-brand" href="/admin/tagihan">
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
                <li class="nav-item">
                    <a class="button nav-link {{ $title === 'login' ? 'active' : '' }}" href="/login">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
