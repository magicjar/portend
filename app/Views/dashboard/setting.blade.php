@extends('dashboard.app-boilerplate')

@section('dashboard.sidebar')
	@include('dashboard.app-sidebar')
@endsection

@section('content')
<div class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Setting</h1>
</div>

<form action="{{ route('api.setting.update') }}" method="POST">
	@csrf
	{{ method_field('PUT') }}
	<div class="actions-body mb-4">
        <div class="card">
            <div class="card-body">
				<div class="form-row">
					<div class="col-sm-6 form-group">
						<label for="site_name" class="font-weight-bold">Site title</label>
						<input class="form-control" type="text" name="site_name" value="{{ isset($setting->setting['site_name']) ? $setting->setting['site_name'] : '' }}" placeholder="Enter your site title">
					</div>
					<div class="col-sm-6 form-group">
						<label for="favicon" class="font-weight-bold">Favicon (Icon)</label>
						<input class="form-control" type="text" name="favicon" value="{{ isset($setting->setting['favicon']) ? $setting->setting['favicon'] : '' }}" placeholder="Enter your favicon">
					</div>
				</div>
				<div class="form-group">
					<label for="site_description" class="font-weight-bold">Site description</label>
					<textarea class="form-control" type="text" name="site_description" rows="2" placeholder="Enter your site description">{{ isset($setting->setting['site_description']) ? $setting->setting['site_description'] : '' }}</textarea>
				</div>
				<div class="form-group">
					<label for="site_keywords" class="font-weight-bold">Site keywords</label>
					<input class="form-control" type="text" name="site_keywords" value="{{ isset($setting->setting['site_keywords']) ? $setting->setting['site_keywords'] : '' }}" placeholder="Enter your site keywords">
				</div>
				<div class="row">
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Article</legend>
						<div class="switch-control switch-checkbox">
							<input type="hidden" name="showArticle" value="0">
				            <input type="checkbox" name="showArticle" class="switch-control-input" id="showArticle" value="1" {{ $setting->setting['showArticle'] == 1 ? 'checked' : '' }}>
				            <label class="switch-control-label" for="showArticle"></label>
				        </div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Testimonial</legend>
						<div class="switch-control switch-checkbox">
							<input type="hidden" name="showTestimonial" value="0">
				            <input type="checkbox" name="showTestimonial" class="switch-control-input" id="showTestimonial" value="1" {{ $setting->setting['showTestimonial'] == 1 ? 'checked' : '' }}>
				            <label class="switch-control-label" for="showTestimonial"></label>
				        </div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Contact</legend>
						<div class="switch-control switch-checkbox">
							<input type="hidden" name="showContact" value="0">
				            <input type="checkbox" name="showContact" class="switch-control-input" id="showContact" value="1" {{ $setting->setting['showContact'] == 1 ? 'checked' : '' }}>
				            <label class="switch-control-label" for="showContact"></label>
				        </div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Skill</legend>
						<div class="switch-control switch-checkbox">
							<input type="hidden" name="showSkill" value="0">
				            <input type="checkbox" name="showSkill" class="switch-control-input" id="showSkill" value="1" {{ $setting->setting['showSkill'] == 1 ? 'checked' : '' }}>
				            <label class="switch-control-label" for="showSkill"></label>
				        </div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Experience</legend>
						<div class="switch-control switch-checkbox">
							<input type="hidden" name="showExperience" value="0">
				            <input type="checkbox" name="showExperience" class="switch-control-input" id="showExperience" value="1" {{ $setting->setting['showExperience'] == 1 ? 'checked' : '' }}>
				            <label class="switch-control-label" for="showExperience"></label>
				        </div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Education</legend>
						<div class="switch-control switch-checkbox">
							<input type="hidden" name="showEducation" value="0">
				            <input type="checkbox" name="showEducation" class="switch-control-input" id="showEducation" value="1" {{ $setting->setting['showEducation'] == 1 ? 'checked' : '' }}>
				            <label class="switch-control-label" for="showEducation"></label>
				        </div>
					</fieldset>
				</div>
				<div class="form-group">
					<label for="google_analytics" class="font-weight-bold">Google Analytics</label>
					<textarea class="form-control" type="text" name="google_analytics" rows="2" placeholder="Enter your google analytics script">{{ isset($setting->setting['google_analytics']) ? $setting->setting['google_analytics'] : '' }}</textarea>
				</div>

				<label for="theme" class="font-weight-bold">Themes</label>
				<div class="row">
					@foreach($dirs as $key => $dir)
					<div class="col-6 col-sm-4">
						<div class="card" style="overflow: hidden;">
							<div class="card-body p-0">
								<img class="img-fluid" src="{{ '/themes/' . $key . '/preview.png' }}">
							</div>
							<div class="btn-group rounded-bottom
								{{ $setting->getTheme() === $key ? 'bg-success' : '' }}
							" role="group" aria-label="Basic example">
								@if($setting->getTheme() === $key)
									<p class="btn top-rounded-0 w-100 mb-0 text-left text-light">{{ $dir }}</p>
									<p class="btn bg-primary top-rounded-0 mb-0 text-light">
										Installed
									</p>
								@else
									<p class="btn top-rounded-0 w-100 mb-0 text-left">{{ $dir }}</p>
									<button type="button" class="btn btn-primary top-rounded-0">
										Activate
									</button>
								@endif
							</div>
						</div>
					</div>
					@endforeach
				</div>
				
				
                <button type="submit" class="btn btn-primary float-right">Save</button>
			</div>
		</div>
	</div>
</form>

@endsection