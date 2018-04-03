<nav class="sidebar navbar fixed-top float-left">
    <aside class="sidebar-sticky py-5">
        <ul class="nav flex-column" id="menus">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}"><span class="mr-2" data-feather="home"></span>Dashboard</a>
            </li>

            <!-- About Me -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill {{ Request::is('*about') ? 'active' : '' }}" href="{{ route('dashboard.about') }}"><span class="mr-2" data-feather="home"></span>About Me</a>
            </li>

            <!-- Resume -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill {{ Request::is('*resume*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-resume" aria-expanded="false" role="button"><span class="mr-2" data-feather="globe"></span>Resume<span class="float-right" data-feather="chevron-right"></span></a>
                <ul data-toggled="#menu-resume" id="menu-resume" class="ml-4 list-unstyled flex-column collapse" data-parent="#menus">
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*resume/skill') ? 'active' : '' }}" href="{{ route('dashboard.skill') }}"><span class="mr-2" data-feather="book"></span>Skill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*resume/experience') ? 'active' : '' }}" href="{{ route('dashboard.experience') }}"><span class="mr-2" data-feather="book"></span>Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*resume/education') ? 'active' : '' }}" href="{{ route('dashboard.education') }}"><span class="mr-2" data-feather="book"></span>Education</a>
                    </li>
                </ul>
            </li>

            <!-- Portfolio -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill {{ Request::is('*portfolio*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-portfolio" aria-expanded="false" role="button"><span class="mr-2" data-feather="globe"></span>Portfolio<span class="float-right" data-feather="chevron-right"></span></a>
                <ul data-toggled="#menu-portfolio" id="menu-portfolio" class="ml-4 list-unstyled flex-column collapse" data-parent="#menus">
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*portfolio') ? 'active' : '' }}" href="#"><span class="mr-2" data-feather="book"></span>All Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*portfolio/create') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.create') }}"><span class="mr-2" data-feather="book"></span>Add Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*portfolio/category') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.category') }}"><span class="mr-2" data-feather="book"></span>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*portfolio/tag') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.tag') }}"><span class="mr-2" data-feather="book"></span>Tags</a>
                    </li>
                </ul>
            </li>

            <!-- Article -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill {{ Request::is('*article*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-article" aria-expanded="false" role="button"><span class="mr-2" data-feather="globe"></span>Article<span class="float-right" data-feather="chevron-right"></span></a>
                <ul data-toggled="#menu-article" id="menu-article" class="ml-4 list-unstyled flex-column collapse" data-parent="#menus">
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*article') ? 'active' : '' }}" href="#"><span class="mr-2" data-feather="book"></span>All Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*article/create') ? 'active' : '' }}" href="{{ route('dashboard.article.create') }}"><span class="mr-2" data-feather="book"></span>Add Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*article/category') ? 'active' : '' }}" href="{{ route('dashboard.article.category') }}"><span class="mr-2" data-feather="book"></span>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill {{ Request::is('*article/tag') ? 'active' : '' }}" href="{{ route('dashboard.article.tag') }}"><span class="mr-2" data-feather="book"></span>Tags</a>
                    </li>
                </ul>
            </li>

            <!-- Testimonial -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill {{ Request::is('dashboard/testimonial') ? 'active' : '' }}" href="{{ route('dashboard.testimonial') }}"><span class="mr-2" data-feather="home"></span>Testimonial</a>
            </li>

            <!-- Setting -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill {{ Request::is('*setting') ? 'active' : '' }}" href="{{ route('dashboard.setting') }}"><span class="mr-2" data-feather="home"></span>Setting</a>
            </li>
        </ul>
    </aside>
</nav>