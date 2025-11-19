<nav class="col-md-2 bg-dark sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('member') ? 'active' : '' }}" href="{{ route('member') }}">
                                <span data-feather="users"></span>
                                Manage Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('buku') ? 'active' : '' }}" href="{{ route('buku') }}">
                                <span data-feather="book"></span>
                                Manage Books
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('pinjam') ? 'active' : '' }}" href="{{route('pinjam')}}">
                                <span data-feather="file"></span>
                                Manage Loans
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('kembali') ? 'active' : '' }}" href="{{ route('kembali') }}">
                                <span data-feather="check-circle"></span>
                                Manage Returns
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('kategori') ? 'active' : '' }}" href="{{ route('kategori') }}">
                                <span data-feather="tag"></span>
                                Manage Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('user') ? 'active' : '' }}" href="{{ route('user') }}">
                                <span data-feather="user"></span>
                                Manage Staff
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>