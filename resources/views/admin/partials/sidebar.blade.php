<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.index') }}">
                <img alt="image" src="{{ auth()->user()->image->sm }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
        </div>
        
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.index') }}">AM</a>
        </div>
        <ul class="sidebar-menu">
            @if(auth()->user()->hasAnyPermission(['users read']) or auth()->user()->hasRole('superadmin'))
            <li class="menu-header" style="border-bottom: 3px solid #a1a8ae;"></li>
            @endif

            @can('settings')
            <li class="nav-item nav-dropdown @if (@$menuActive === 'settings') active @endif">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-cog"></i>
                    <span>Setting</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="@if (@$subMenuActive === 'basic-info') active @endif">
                        <a class="nav-link" href="{{ route('admin.settings.basic-info.edit') }}">
                            Basic Info
                        </a>
                    </li>
                    <li class="@if (@$subMenuActive === 'logo') active @endif">
                        <a class="nav-link" href="{{ route('admin.settings.logo.edit') }}">
                            Logo
                        </a>
                    </li>
                    <li class="@if (@$subMenuActive === 'social-media') active @endif">
                        <a class="nav-link" href="{{ route('admin.social.index') }}">
                            Social Media
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            
            @if(auth()->user()->hasAnyPermission(['blog categories read', 'blog posts read']) or auth()->user()->hasRole('superadmin'))
            <li class="nav-item dropdown @if (@$menuActive === 'blog') active @endif">
                <a class="nav-link has-dropdown" href="#">
                    <i class="far fa-clone"></i>
                    <span>Blog</span>
                </a>
                <ul class="dropdown-menu">
                    @can('blog tags read')
                    <li class="@if (@$subMenuActive === 'blog-tags') active @endif">
                        <a class="nav-link" href="{{ route('admin.blog.tags.index') }}">
                            Tags
                        </a>
                    </li>
                    @endcan
                    @can('blog categories read')
                    <li class="@if (@$subMenuActive === 'blog-categories') active @endif">
                        <a class="nav-link" href="{{ route('admin.blog.categories.index') }}">
                            Category
                        </a>
                    </li>
                    @endcan
                    @can('blog posts read')
                    <li class="@if (@$subMenuActive === 'blog-posts') active @endif">
                        <a class="nav-link" href="{{ route('admin.blog.posts.index') }}">
                            Posts
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

            <li class="menu-header"></li>

            @if(auth()->user()->hasAnyPermission('inboxes read', 'subscribes read') or auth()->user()->hasRole('superadmin'))
            <li class="nav-item dropdown @if (@$menuActive === 'inboxes') active @endif">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-envelope"></i>
                    <span>Inbox</span>
                </a>
                <ul class="dropdown-menu">
                    @can('subscribes read')
                    <li class="nav-item @if (@$subMenuActive === 'subscribes') active @endif">
                        <a class="nav-link" href="{{ route('admin.subscribes.index') }}">
                            <span>Subscribe</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif

            @can('users read')
            <li class="nav-item dropdown @if (@$menuActive === 'users') active @endif">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="@if (@$subMenuActive === 'users') active @endif">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Users Data</a>
                    </li>
                    @if (auth()->user()->hasRole('superadmin'))
                    <li class="@if (@$subMenuActive === 'roleAndPermissions') active @endif">
                        <a class="nav-link" href="{{ route('admin.roles.index') }}">Role & Permissions</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endcan            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.auth.logout') }}">
                    <i class="fas fa-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</div>