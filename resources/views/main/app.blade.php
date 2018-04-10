<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blckgold') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body data-spy="scroll" data-target="#scroll-sidebar" data-offset="1">
        <section class="container-flexible p-0">
            <aside id="scroll-sidebar" class="sidebar navbar navbar-light fixed-top float-left p-5 text-gold">
                <div class="avatar text-center mb-5">
                    <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <div class="mt-3">
                        <h1 class="h3 text-uppercase">{{ $setting->getName() }}</h1>
                        <span class="h6 d-block mt-2"><span>@</span>{{ $setting->getOccupation() }}</span>
                    </div>
                    <ul class="list-unstyled d-inline-flex">
                        @if($setting->getFacebookUrl())
                        <li><a class="social" href="{{ $setting->getFacebookUrl() }}"><i data-feather="facebook"></i></a></li>
                        @endif
                        @if($setting->getTwitterUrl())
                        <li><a class="social" href="{{ $setting->getTwitterUrl() }}"><i data-feather="twitter"></i></a></li>
                        @endif
                        @if($setting->getInstagramUrl())
                        <li><a class="social" href="{{ $setting->getInstagramUrl() }}"><i data-feather="instagram"></i></a></li>
                        @endif
                        @if($setting->getLinkedinUrl())
                        <li><a class="social" href="{{ $setting->getLinkedinUrl() }}"><i data-feather="linkedin"></i></a></li>
                        @endif
                        @if($setting->getGithubUrl())
                        <li><a class="social" href="{{ $setting->getGithubUrl() }}"><i data-feather="github"></i></a></li>
                        @endif
                        @if($setting->getYoutubeUrl())
                        <li><a class="social" href="{{ $setting->getYoutubeUrl() }}"><i data-feather="youtube"></i></a></li>
                        @endif
                    </ul>
                </div>
                <nav class="nav nav-pills flex-column font-weight-bold">
                    <a class="nav-link rounded-0" href="{{ Request::is('/') ? '' : url('/')  }}#welcome">Welcome</a>
                    <a class="nav-link rounded-0" href="{{ Request::is('/') ? '' : url('/')  }}#about">About Me</a>
                    <a class="nav-link rounded-0" href="{{ Request::is('/') ? '' : url('/')  }}#skills">Skills</a>
                    <a class="nav-link rounded-0" href="{{ Request::is('/') ? '' : url('/')  }}#experience">Experience</a>
                    <a class="nav-link rounded-0" href="{{ Request::is('/') ? '' : url('/')  }}#education">Education</a>
                    <a class="nav-link rounded-0 {{ Request::is('*portfolio*') ? 'active' : ''  }}" href="{{ Request::is('/') ? '' : url('/')  }}#portfolio">Portfolio</a>
                    <a class="nav-link rounded-0 {{ Request::is('*article*') ? 'active' : ''  }}" href="{{ Request::is('/') ? '' : url('/')  }}#article">Article</a>
                    <a class="nav-link rounded-0" href="{{ Request::is('/') ? '' : url('/')  }}#contact">Get in Touch</a>
                </nav>
                <footer>
                    <span class="text-muted">© Copyright 2016 Karen Iwata</span>
                </footer>
            </aside>

            <main role="main" class="content-wrapper bg-light">
                @yield('main.content')
            </main>

        </section>

    <!-- Scripts -->
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @if($setting->getGoogleAnalytics())
        {!! $setting->getGoogleAnalytics() !!}
    @endif

    </body>
</html>
