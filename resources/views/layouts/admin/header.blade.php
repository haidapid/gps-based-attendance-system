<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none bg-white shadow-sm">
    <div class="container-xl">
        <!-- Tombol Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Sapaan -->
        <div class="d-none d-md-flex align-items-center me-4">
            <span id="sapaan" class="fs-2 fw-semibold text-primary"></span>
        </div>

        <!-- Kanan: Jam, Notif, Search, User -->
        <div class="d-flex align-items-center ms-auto gap-3">

         <!-- Jam Digital -->
        <div class="d-none d-md-flex align-items-center me-3">
            <span id="jam-digital" class="fw-bold text-dark" style="font-family: 'Gotham', monospace; font-size: 1.2rem;">
        </span>
        </div>

            <!-- Notifikasi -->
            <div class="nav-item dropdown position-relative me-3">
                <a href="#" class="nav-link px-2" data-bs-toggle="dropdown" aria-label="Show notifications">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 17h14l-1 -2v-5a6 6 0 1 0 -12 0v5z" />
                        <path d="M10 21h4" />
                    </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                          style="font-size: 0.65rem; padding: 3px 6px;">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Notifikasi</h3>
                        </div>
                        <div class="list-group list-group-flush list-group-hoverable">
                            <!-- Notifikasi List -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search -->
            <form action="/cari" method="GET" class="d-none d-md-flex align-items-center">
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="10" cy="10" r="7" />
                            <line x1="21" y1="21" x2="15" y2="15" />
                        </svg>
                    </span>
                    <input type="text" name="q" class="form-control form-control-sm" placeholder="Cari..." autocomplete="off"
                        style="height: 32px; min-height: 32px;" />
                </div>
            </form>

            <!-- User Dropdown -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex align-items-center text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm rounded" style="background-image: url('{{ asset('assets/img/admin.png' . Auth::guard('user')->user()->foto) }}')"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::guard('user')->user()->name }}</div>
                        <div class="small text-secondary">Supervisor</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="/proseslogoutadmin" class="dropdown-item d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-danger" width="20" height="20"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
@push('myscript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const name = "{{ Auth::guard('user')->user()->name }}";

        function getSapaan(hour) {
            if (hour >= 4 && hour < 11) return "Selamat Pagi";
            if (hour >= 11 && hour < 15) return "Selamat Siang";
            if (hour >= 15 && hour < 18) return "Selamat Sore";
            return "Selamat Malam";
        }

        function updateJamDigital() {
            const now = new Date();
            const h = now.getHours().toString().padStart(2, '0');
            const m = now.getMinutes().toString().padStart(2, '0');
            const s = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('jam-digital').textContent = `${h}:${m}:${s}`;
        }

        const now = new Date();
        document.getElementById('sapaan').textContent = `${getSapaan(now.getHours())}, ${name}!`;

        updateJamDigital();
        setInterval(updateJamDigital, 1000);
    });
</script>
@endpush
