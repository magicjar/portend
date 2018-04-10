@extends('main.app')

@section('main.content')
<header id="welcome" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 h-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16210743329%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16210743329%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22277%22%20y%3D%22217.7%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <blockquote class="blockquote carousel-caption">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
            </blockquote>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16210743329%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16210743329%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22277%22%20y%3D%22217.7%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <blockquote class="blockquote carousel-caption">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
            </blockquote>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16210743329%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16210743329%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22277%22%20y%3D%22217.7%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <blockquote class="blockquote carousel-caption">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
            </blockquote>
        </div>
    </div>
</header>
<section id="about" class="p-5">
    <h2>About Me</h2>
    <p>{{ $setting->getAboutMe() }}</p>
    <ul class="list-unstyled">
        <li>{{ $setting->getBirthplace() }}, {{ $setting->getBirthdate() }}</li>
        <li>{{ $setting->getAddress() }}</li>
        <li>{{ $setting->getEmail() }}</li>
        <li>{{ $setting->getPhone() }}</li>
    </ul>
</section>

<section id="skills" class="p-5 bg-gray-dark">
    <h2>Skills</h2>
    <div class="row">
        @forelse($resumes->where('resume_type', 'skill') as $skill)
        <div class="col-6">
            {{ $skill->name }}
            {{ $skill->institution }}
        </div>
        @empty
        <div class="col-12 text-center">
            No skill
        </div>
        @endforelse
    </div>
</section>
<section id="experience" class="p-5">
    <h2>Experience</h2>
    <div class="row">
        @foreach($resumes->where('resume_type', 'experience') as $experience)
        <div class="col-6 my-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="h5 card-text text-muted">{{ $experience->name }}</h3>
                    <h4 class="h4 card-title">{{ $experience->institution }}</h4>
                    <p class="card-text">{{ $experience->description }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $experience->date }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section id="education" class="p-5">
    <h2>Education</h2>
    <div class="row">
        @foreach($resumes->where('resume_type', 'education') as $education)
        <div class="col-6 my-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="h5 card-text text-muted">{{ $education->name }}</h3>
                    <h4 class="h4 card-title">{{ $education->institution }}</h4>
                    <p class="card-text">{{ $education->description }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $education->date }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section id="portfolio" class="p-5">
    <h2>Portfolio</h2>
    <div class="row">
        @forelse($portfolios as $portfolio)
        <div class="col-sm-6 my-3">
            <a href="{{ route('portfolio.show', $portfolio->id) }}">
                <img class="d-block w-100" src="{{ $portfolio->thumb->thumbnail }}" title="{{ $portfolio->title }}" alt="{{ $portfolio->title }}">
            </a>
        </div>
        @empty
        <div class="col-12 my-3 text-center">
            You dont have portfolio
        </div>
        @endforelse
    </div>
</section>
<section id="testimonial" class="p-5 bg-gray-dark">
    <h2>Testimonials</h2>
    @foreach($testimonials as $testimony)
    <div class="media my-3">
       <img class="align-self-center mr-3 rounded-circle" src="{{ $testimony->image }}">
        <blockquote class="blockquote media-body align-self-center">
            <p class="mb-0">{{ $testimony->content }}</p>
            <footer class="blockquote-footer">{{ $testimony->author }} in <cite title="Source Title">Source Title</cite></footer>
        </blockquote>
    </div>
    @endforeach
</section>
<section id="article" class="p-5">
    <h2>Articles</h2>
    <div class="row">
        @foreach($articles as $article)
        <div class="col-sm-6">
            <div class="card my-3">
                <img class="card-img-top" src="{{ $article->thumb->thumbnail }}" alt="{{ $article->title }}">
                <div class="card-body">
                    <h2 class="card-title h4"><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></h5>
                    <p class="card-text">{{ $article->content }}</p>
                    <p class="card-text"><small class="text-muted">{{Carbon\Carbon::parse($article->created_at)->toFormattedDateString()}}</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('article.index') }}" class="btn btn-primary btn-block">Show all article</a>
</section>
<section id="contact" class="p-5 bg-danger">
    <h2>Contact</h2>
    <form method="POST" action="{{ route('contact') }}">
        @csrf
        <div class="form-row form-group">
            <div class="col">
                <input class="form-control" type="text" name="name" placeholder="Your name" required>
            </div>
            <div class="col">
                <input class="form-control" type="email" name="email" placeholder="Your email" required>
            </div>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message" placeholder="Message"></textarea>
        </div>
        <div class="card p-2">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</section>
@endsection