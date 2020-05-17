<div class="sidebar">
    <nav class="sidebar-nav">
        @if(Auth::user()->level == 0)
        <ul class="nav">
            <li class="nav-title">Menu Utama</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-title">Article</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.category_article.index') }}">
                    <i class="nav-icon icon-folder-alt"></i> Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.article.index') }}">
                    <i class="nav-icon icon-feed"></i> List Article</a>
            </li>

            <li class="nav-title">Settings</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.setting.index') }}">
                    <i class="nav-icon icon-globe-alt"></i> About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.banner.index') }}">
                    <i class="nav-icon icon-picture"></i> Banner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.contact.index') }}">
                    <i class="nav-icon icon-phone"></i> Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.social_media.index') }}">
                    <i class="nav-icon icon-share"></i> Social Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="nav-icon fa fa-puzzle-piece"></i> Service</a>
            </li>

            <li class="nav-title">Galleries</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.category_gallery.index') }}">
                    <i class="nav-icon icon-camera"></i> Category Image</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.gallery.index') }}">
                    <i class="nav-icon fas fa-file-image"></i> Image</a>
            </li>

            <li class="nav-title">Inboxes</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.inbox.index') }}">
                    <i class="nav-icon icon-envelope"></i> Inbox</a>
            </li>
        </ul>
        @endif
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
