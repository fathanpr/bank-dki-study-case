<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand mx-3" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="50" height="50">
        </a>
        <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                @if (Auth::user()->role == 'cs')
                    <li class="nav-item">
                        <a class="nav-link {{ $page == 'pembukaan-rekening' ? 'text-danger fw-bold' : '' }}"
                            href="{{ route('pembukaan-rekening') }}">Pembukaan Rekening</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ $page == 'approval-pembukaan-rekening' ? 'text-danger fw-bold' : '' }}"
                        href="{{ route('approval-pembukaan-rekening') }}">Approval Pembukaan
                        Rekening</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
