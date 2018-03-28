<nav class="sidebar navbar fixed-top float-left">
    <aside class="sidebar-sticky py-5">
        <ul class="nav flex-column" id="menus">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}"><span data-feather="home"></span>Dashboard</a>
            </li>

            <!-- About Me -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ route('dashboard.about') }}"><span data-feather="home"></span>About Me</a>
            </li>

            <!-- Resume -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*resume*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-resume" aria-expanded="false" role="button"><span data-feather="globe"></span>Resume<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#menu-resume" id="menu-resume" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#menus">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*resume/skill') ? 'active' : '' }}" href="{{ route('dashboard.skill') }}"><span data-feather="book"></span>Skill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*resume/experience') ? 'active' : '' }}" href="{{ route('dashboard.experience') }}"><span data-feather="book"></span>Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*resume/education') ? 'active' : '' }}" href="{{ route('dashboard.education') }}"><span data-feather="book"></span>Education</a>
                    </li>
                </ul>
            </li>

            <!-- Portfolio -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*portfolio*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-portfolio" aria-expanded="false" role="button"><span data-feather="globe"></span>Portfolio<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#menu-portfolio" id="menu-portfolio" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#menus">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*portfolio') ? 'active' : '' }}" href="#"><span data-feather="book"></span>All Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*portfolio/create') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.create') }}"><span data-feather="book"></span>Add Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*portfolio/category') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.category') }}"><span data-feather="book"></span>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*portfolio/tag') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.tag') }}"><span data-feather="book"></span>Tags</a>
                    </li>
                </ul>
            </li>

            <!-- Article -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*article*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-article" aria-expanded="false" role="button"><span data-feather="globe"></span>Article<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#menu-article" id="menu-article" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#menus">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*article') ? 'active' : '' }}" href="#"><span data-feather="book"></span>All Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*article/create') ? 'active' : '' }}" href="{{ route('dashboard.article.create') }}"><span data-feather="book"></span>Add Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*article/category') ? 'active' : '' }}" href="{{ route('dashboard.article.category') }}"><span data-feather="book"></span>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*article/tag') ? 'active' : '' }}" href="{{ route('dashboard.article.tag') }}"><span data-feather="book"></span>Tags</a>
                    </li>
                </ul>
            </li>

            <!-- Testimonial -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/testimonial') ? 'active' : '' }}" href="{{ route('dashboard.testimonial') }}"><span data-feather="home"></span>Testimonial</a>
            </li>

            <!-- Setting -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('setting') ? 'active' : '' }}" href="#"><span data-feather="home"></span>Setting</a>
            </li>
        </ul>
    </aside>
</nav>