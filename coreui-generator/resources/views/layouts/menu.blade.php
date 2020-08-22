<li class="nav-item {{ Request::is('foos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('foos.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Foos</span>
    </a>
</li>
