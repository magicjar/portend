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
                <div class="form-group">
                	<label for="site_name" class="font-weight-bold">Site title</label>
					<input class="form-control" type="text" name="site_name" value="{{ isset($setting->setting['site_name']) ? $setting->setting['site_name'] : '' }}" placeholder="Enter your site title">
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
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showArticle" id="showArticleTrue" value="1" {{ $setting->setting['showArticle'] == 1 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showArticleTrue">
							Enable
							</label>
						</div>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showArticle" id="showArticleFalse" value="0" {{ $setting->setting['showArticle'] == 0 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showArticleFalse">
							Disable
							</label>
						</div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Testimonial</legend>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showTestimonial" id="showTestimonialTrue" value="1" {{ $setting->setting['showTestimonial'] == 1 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showTestimonialTrue">
							Enable
							</label>
						</div>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showTestimonial" id="showTestimonialFalse" value="0" {{ $setting->setting['showTestimonial'] == 0 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showTestimonialFalse">
							Disable
							</label>
						</div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Contact</legend>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showContact" id="showContactTrue" value="1" {{ $setting->setting['showContact'] == 1 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showContactTrue">
							Enable
							</label>
						</div>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showContact" id="showContactFalse" value="0" {{ $setting->setting['showContact'] == 0 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showContactFalse">
							Disable
							</label>
						</div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Skill</legend>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showSkill" id="showSkillTrue" value="1" {{ $setting->setting['showSkill'] == 1 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showSkillTrue">
							Enable
							</label>
						</div>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showSkill" id="showSkillFalse" value="0" {{ $setting->setting['showSkill'] == 0 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showSkillFalse">
							Disable
							</label>
						</div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Experience</legend>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showExperience" id="showExperienceTrue" value="1" {{ $setting->setting['showExperience'] == 1 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showExperienceTrue">
							Enable
							</label>
						</div>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showExperience" id="showExperienceFalse" value="0" {{ $setting->setting['showExperience'] == 0 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showExperienceFalse">
							Disable
							</label>
						</div>
					</fieldset>
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0 font-weight-bold">Education</legend>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showEducation" id="showEducationTrue" value="1" {{ $setting->setting['showEducation'] == 1 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showEducationTrue">
							Enable
							</label>
						</div>
						<div class="custom-control custom-radio ml-3">
							<input class="custom-control-input" type="radio" name="showEducation" id="showEducationFalse" value="0" {{ $setting->setting['showEducation'] == 0 ? 'checked' : '' }}>
							<label class="custom-control-label" for="showEducationFalse">
							Disable
							</label>
						</div>
					</fieldset>
				</div>
				<div class="form-group">
					<label for="google_analytics" class="font-weight-bold">Google Analytics</label>
					<textarea class="form-control" type="text" name="google_analytics" rows="2" placeholder="Enter your google analytics script">{{ isset($setting->setting['google_analytics']) ? $setting->setting['google_analytics'] : '' }}</textarea>
				</div>
				
                <button type="submit" class="btn btn-primary float-right">Save</button>
			</div>
		</div>
	</div>
</form>

@endsection