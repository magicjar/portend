@extends('layouts.dashboard-app')

@section('dashboard.sidebar')
	@include('layouts.dashboard-sidebar')
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
					<input class="form-control" type="text" name="site_name" value="{{ isset($setting->setting['site_name']) ? $setting->setting['site_name'] : '' }}">
				</div>
				<div class="form-group">
					<textarea class="form-control" type="text" name="site_description" rows="2">{{ isset($setting->setting['site_description']) ? $setting->setting['site_description'] : '' }}</textarea>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="site_keywords" value="{{ isset($setting->setting['site_keywords']) ? $setting->setting['site_keywords'] : '' }}">
				</div>
				<div class="row">
					<fieldset class="form-group col-6">
						<legend class="col-form-label py-0">Article</legend>
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
						<legend class="col-form-label py-0">Testimonial</legend>
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
						<legend class="col-form-label py-0">Contact</legend>
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
						<legend class="col-form-label py-0">Skill</legend>
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
						<legend class="col-form-label py-0">Experience</legend>
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
						<legend class="col-form-label py-0">Education</legend>
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
				
                <button type="submit" class="btn btn-primary float-right">Save</button>
			</div>
		</div>
	</div>
</form>

@endsection