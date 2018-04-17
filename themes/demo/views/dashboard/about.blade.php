@extends('dashboard.app-boilerplate')

@section('dashboard.sidebar')
	@include('dashboard.app-sidebar')
@endsection

@section('content')
<div class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">About</h1>
</div>

<form action="{{ route('api.setting.update') }}" id="about-me" method="POST">
	@csrf
	{{ method_field('PUT') }}
	
	<div class="actions-body mb-4">
        <div class="card">
            <div class="card-header">
                <strong>Details</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <label for="avatar" class="font-weight-bold">Avatar</label>
                    	<avatar-component id="avatar" :avatar='{!! json_encode($setting->setting["avatar"]) !!}'></avatar-component>

                    </div>
                    <div class="col-sm-8 col-md-9">
                        <div class="form-group row px-2">
                            <div class="col-12 col-sm-6 px-2">
                                <label for="first_name" class="font-weight-bold">First name</label>
                                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="Enter your first name" value="{{ isset($setting->setting['first_name']) ? $setting->setting['first_name'] : '' }}">
                            </div>
                            <div class="col-12 col-sm-6 px-2">
                                <label for="last_name" class="font-weight-bold">Last name</label>
                                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Enter your last name" value="{{ isset($setting->setting['last_name']) ? $setting->setting['last_name'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group row px-2">
                            <div class="col-12 col-sm-6 px-2">
                                <label for="title" class="font-weight-bold">Title</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter your title" value="{{ isset($setting->setting['title']) ? $setting->setting['title'] : '' }}">
                            </div>
                            <div class="col-12 col-sm-6 px-2">
                                <label for="occupation" class="font-weight-bold">Occupation</label>
                                <input class="form-control" type="text" name="occupation" id="occupation" placeholder="Enter your occupation" value="{{ isset($setting->setting['occupation']) ? $setting->setting['occupation'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group row px-2">
                            <div class="col-12 col-sm-6 px-2">
                                <label for="birthdate" class="font-weight-bold">Birthdate</label>
                                <input class="form-control" type="date" name="birthdate" id="birthdate" placeholder="Enter your birthdate" value="{{ isset($setting->setting['birthdate']) ? $setting->setting['birthdate'] : '' }}">
                            </div>
                            <div class="col-12 col-sm-6 px-2">
                                <label for="birthplace" class="font-weight-bold">Birthplace</label>
                                <input class="form-control" type="text" name="birthplace" id="birthplace" placeholder="Enter your birthplace" value="{{ isset($setting->setting['birthplace']) ? $setting->setting['birthplace'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group row px-2">
                            <div class="col-12 col-sm-6 px-2">
                                <label for="email" class="font-weight-bold">E-mail</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" value="{{ isset($setting->setting['email']) ? $setting->setting['email'] : '' }}">
                                <small id="email" class="form-text text-muted">
                                Will be used as your contact info and to send you email from contact form.
                                </small>
                            </div>
                            <div class="col-12 col-sm-6 px-2">
                                <label for="phone" class="font-weight-bold">Phone</label>
                                <input class="form-control" type="tel" name="phone" id="phone" placeholder="Enter your phone" value="{{ isset($setting->setting['phone']) ? $setting->setting['phone'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="font-weight-bold">Address</label>
                            <input class="form-control" type="text" name="address" id="address" placeholder="Enter your address" value="{{ isset($setting->setting['address']) ? $setting->setting['address'] : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Short description</label>
                            <textarea class="form-control" name="about_me" id="about_me" placeholder="Short description about you" rows="3">{{ isset($setting->setting['about_me']) ? $setting->setting['about_me'] : '' }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right"><i data-feather="save"></i> Save</button>
            </div>
        </div>
    </div>

	<div class="actions-body mb-4">
        <div class="card">
            <div class="card-header">
                <strong>Links</strong>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="facebook"></i></span>
                    </div>
                    <input class="form-control" type="text" name="facebook_url" placeholder="Facebook url" value="{{ isset($setting->setting['facebook_url']) ? $setting->setting['facebook_url'] : '' }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="twitter"></i></span>
                    </div>
                    <input class="form-control" type="text" name="twitter_url" placeholder="Twitter url" value="{{ isset($setting->setting['twitter_url']) ? $setting->setting['twitter_url'] : '' }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="instagram"></i></span>
                    </div>
                    <input class="form-control" type="text" name="instagram_url" placeholder="Instagram url" value="{{ isset($setting->setting['instagram_url']) ? $setting->setting['instagram_url'] : '' }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="linkedin"></i></span>
                    </div>
                    <input class="form-control" type="text" name="linkedin_url" placeholder="Linkedin url" value="{{ isset($setting->setting['linkedin_url']) ? $setting->setting['linkedin_url'] : '' }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="github"></i></span>
                    </div>
                    <input class="form-control" type="text" name="github_url" placeholder="Github url" value="{{ isset($setting->setting['github_url']) ? $setting->setting['github_url'] : '' }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i data-feather="youtube"></i></span>
                    </div>
                    <input class="form-control" type="text" name="youtube_url" placeholder="Youtube url" value="{{ isset($setting->setting['youtube_url']) ? $setting->setting['youtube_url'] : '' }}">
                </div>
                <button type="submit" class="btn btn-primary float-right"><i data-feather="save"></i> Save</button>
            </div>
        </div>
    </div>
	
</form>

<mediamodal-component></mediamodal-component>

@endsection