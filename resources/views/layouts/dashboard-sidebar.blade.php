<nav class="sidebar navbar fixed-top float-left">
    <aside class="sidebar-sticky py-5">
        <ul class="nav flex-column" id="menus">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill collapsed {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}"><span class="mr-2" data-feather="home"></span>Dashboard</a>
            </li>

            <!-- About Me -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*about') ? 'active' : '' }}" href="{{ route('dashboard.about') }}"><span class="mr-2" data-feather="user"></span>About Me</a>
            </li>

            <!-- Resume -->
            @if($setting->setting['showSkill'] && $setting->setting['showExperience'] && $setting->setting['showEducation'])
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*resume*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-resume" aria-expanded="false" role="button"><span class="mr-2" data-feather="book-open"></span>Resume<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#menu-resume" id="menu-resume" class="ml-4 list-unstyled flex-column collapse" data-parent="#menus">
                    @if($setting->setting['showSkill'])
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*resume/skill') ? 'active' : '' }}" href="{{ route('dashboard.skill') }}"><span class="mr-2" data-feather="pie-chart"></span>Skill</a>
                    </li>
                    @endif
                    @if($setting->setting['showExperience'])
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*resume/experience') ? 'active' : '' }}" href="{{ route('dashboard.experience') }}"><span class="mr-2" data-feather="star"></span>Experience</a>
                    </li>
                    @endif
                    @if($setting->setting['showEducation'])
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*resume/education') ? 'active' : '' }}" href="{{ route('dashboard.education') }}"><span class="mr-2" data-feather="briefcase"></span>Education</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            <!-- Portfolio -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*portfolio*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-portfolio" aria-expanded="false" role="button"><span class="mr-2" data-feather="paperclip"></span>Portfolio<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#menu-portfolio" id="menu-portfolio" class="ml-4 list-unstyled flex-column collapse" data-parent="#menus">
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*portfolio') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.index') }}"><span class="mr-2" data-feather="list"></span>All Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*portfolio/create') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.create') }}"><span class="mr-2" data-feather="file-plus"></span>Add Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*portfolio/category') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.category') }}"><span class="mr-2" data-feather="layers"></span>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*portfolio/tag') ? 'active' : '' }}" href="{{ route('dashboard.portfolio.tag') }}"><span class="mr-2" data-feather="tag"></span>Tags</a>
                    </li>
                </ul>
            </li>

            <!-- Article -->
            @if($setting->setting['showArticle'])
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*article*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#menu-article" aria-expanded="false" role="button"><span class="mr-2" data-feather="edit-3"></span>Article<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#menu-article" id="menu-article" class="ml-4 list-unstyled flex-column collapse" data-parent="#menus">
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*article') ? 'active' : '' }}" href="{{ route('dashboard.article.index') }}"><span class="mr-2" data-feather="list"></span>All Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*article/create') ? 'active' : '' }}" href="{{ route('dashboard.article.create') }}"><span class="mr-2" data-feather="file-plus"></span>Add Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*article/category') ? 'active' : '' }}" href="{{ route('dashboard.article.category') }}"><span class="mr-2" data-feather="layers"></span>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*article/tag') ? 'active' : '' }}" href="{{ route('dashboard.article.tag') }}"><span class="mr-2" data-feather="tag"></span>Tags</a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Testimonial -->
            @if($setting->setting['showTestimonial'])
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill collapsed {{ Request::is('dashboard/testimonial') ? 'active' : '' }}" href="{{ route('dashboard.testimonial') }}"><span class="mr-2" data-feather="heart"></span>Testimonial</a>
            </li>
            @endif

            <!-- Setting -->
            <li class="nav-item">
                <a class="nav-link mb-2 border-pill collapsed {{ Request::is('*setting') ? 'active' : '' }}" href="{{ route('dashboard.setting') }}"><span class="mr-2" data-feather="settings"></span>Setting</a>
            </li>
        </ul>
    </aside>
</nav>