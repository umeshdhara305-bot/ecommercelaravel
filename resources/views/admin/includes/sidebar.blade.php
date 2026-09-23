```blade
<div class="main-sidebar sidebar-style-2">

    <aside id="sidebar-wrapper">

        {{-- ================= LOGO ================= --}}
        <div class="sidebar-brand">

            <a href="{{ route('admin.dashboard') }}">

                <img
                    alt="logo"
                    src="{{ asset('assets/img/logo.png') }}"
                    class="header-logo"
                >

                <span class="logo-name">Otika</span>

            </a>

        </div>


        {{-- ================= SIDEBAR MENU ================= --}}
        <ul class="sidebar-menu">


            {{-- ================= MAIN ================= --}}
            <li class="menu-header">Main</li>

            <li class="dropdown active">

                <a href="{{ route('admin.dashboard') }}" class="nav-link">

                    <i data-feather="monitor"></i>

                    <span>Dashboard</span>

                </a>

            </li>


            {{-- ================= CATALOG ================= --}}
            <li class="menu-header">Catalog</li>


            {{-- Categories --}}
            <li class="dropdown">

                <a href="#" class="menu-toggle nav-link has-dropdown">

                    <i data-feather="grid"></i>

                    <span>Categories</span>

                </a>

                <ul class="dropdown-menu">

                    <li>
                        <a class="nav-link"
                           href="{{ route('category.create') }}">

                            Add Category

                        </a>
                    </li>

                    <li>
                        <a class="nav-link"
                           href="{{ route('category.view') }}">

                            View Categories

                        </a>
                    </li>

                </ul>

            </li>


            {{-- Brands --}}
            <li class="dropdown">

                <a href="#" class="menu-toggle nav-link has-dropdown">

                    <i data-feather="tag"></i>

                    <span>Brands</span>

                </a>

                <ul class="dropdown-menu">

                    <li>
                        <a class="nav-link"
                           href="{{ route('brand.create') }}">

                            Add Brand

                        </a>
                    </li>

                    <li>
                        <a class="nav-link"
                           href="{{ route('brand.index') }}">

                            View Brands

                        </a>
                    </li>

                </ul>

            </li>


            {{-- Products --}}
            <li class="dropdown">

                <a href="#" class="menu-toggle nav-link has-dropdown">

                    <i data-feather="shopping-bag"></i>

                    <span>Products</span>

                </a>

                <ul class="dropdown-menu">

                    <li>
                        <a class="nav-link"
                           href="{{ route('product.create') }}">

                            Add Product

                        </a>
                    </li>

                    <li>
                        <a class="nav-link"
                           href="{{ route('product.index') }}">

                            View Products

                        </a>
                    </li>

                </ul>

            </li>


            {{-- ================= SALES ================= --}}
            <li class="menu-header">Sales</li>


            {{-- Orders --}}
            <li>

                <a href="{{ route('admin.orders.index') }}"
                   class="nav-link">

                    <i data-feather="shopping-cart"></i>

                    <span>Orders</span>

                </a>

            </li>


            {{-- Customers --}}
            <li>

                <a href="{{ route('admin.customers.index') }}"
                   class="nav-link">

                    <i data-feather="users"></i>

                    <span>Customers</span>

                </a>

            </li>


            {{-- ================= BLOG ================= --}}
            <li class="menu-header">Content</li>


            {{-- Blog --}}
            <li class="dropdown">

                <a href="#" class="menu-toggle nav-link has-dropdown">

                    <i data-feather="edit-3"></i>

                    <span>Blog</span>

                </a>

                <ul class="dropdown-menu">

                    <li>
                        <a class="nav-link"
                           href="{{ route('blog.create') }}">

                            Add Blog

                        </a>
                    </li>

                    <li>
                        <a class="nav-link"
                           href="{{ route('blog.index') }}">

                            View Blogs

                        </a>
                    </li>

                    <li>
                        <a class="nav-link"
                           href="{{ route('admin.comments.index') }}">

                            Blog Comments

                        </a>
                    </li>

                </ul>

            </li>


            {{-- Contact --}}
            <li>

                <a href="{{ route('admin.contacts') }}"
                   class="nav-link">

                    <i data-feather="mail"></i>

                    <span>Contact Messages</span>

                </a>

            </li>


            {{-- ================= SETTINGS ================= --}}
            <li class="menu-header">System</li>


            {{-- Settings --}}
            <li>

                <a href="{{ route('settings.index') }}"
                   class="nav-link">

                    <i data-feather="settings"></i>

                    <span>Settings</span>

                </a>

            </li>


        </ul>

    </aside>

</div>
```
