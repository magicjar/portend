<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Tutorial',
                'type' => 'Article'
            ],[
                'name' => 'Laravel',
                'type' => 'Article'
            ],[
                'name' => 'Vue JS',
                'type' => 'Portfolio'
            ],[
                'name' => 'Bootstrap 4',
                'type' => 'Portfolio'
            ],[
                'name' => 'JavaScript',
                'type' => 'Portfolio'
            ]
        ]);

        DB::table('users')->insert([
            'name' => 'Fajar',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456')
        ]);

        DB::table('settings')->insert([
            [
                'name' => 'installed',
                'value' => '1',
                'created_at' => Carbon::now()
            ],[
                'name' => 'site_name',
                'value' => 'Blvckgold',
                'created_at' => Carbon::now()
            ],[
                'name' => 'site_description',
                'value' => 'Portfolio CMS',
                'created_at' => Carbon::now()
            ],[
                'name' => 'site_keywords',
                'value' => 'Portfolio, CMS, Open Source, MIT, Laravel, Vue, Bootstrap 4',
                'created_at' => Carbon::now()
            ],[
                'name' => 'showArticle',
                'value' => '1',
                'created_at' => Carbon::now()
            ],[
                'name' => 'showTestimonial',
                'value' => '1',
                'created_at' => Carbon::now()
            ],[
                'name' => 'showContact',
                'value' => '1',
                'created_at' => Carbon::now()
            ],[
                'name' => 'showSkill',
                'value' => '1',
                'created_at' => Carbon::now()
            ],[
                'name' => 'showExperience',
                'value' => '1',
                'created_at' => Carbon::now()
            ],[
                'name' => 'showEducation',
                'value' => '1',
                'created_at' => Carbon::now()
            ],[
                'name' => 'first_name',
                'value' => 'Fajar',
                'created_at' => Carbon::now()
            ],[
                'name' => 'last_name',
                'value' => 'Setya',
                'created_at' => Carbon::now()
            ],[
                'name' => 'avatar',
                'value' => null,
                'created_at' => Carbon::now()
            ],[
                'name' => 'title',
                'value' => 'S.Kom',
                'created_at' => Carbon::now()
            ],[
                'name' => 'occupation',
                'value' => 'Web Programmer',
                'created_at' => Carbon::now()
            ],[
                'name' => 'birthdate',
                'value' => '2018-05-13',
                'created_at' => Carbon::now()
            ],[
                'name' => 'birthplace',
                'value' => 'Sleman',
                'created_at' => Carbon::now()
            ],[
                'name' => 'email',
                'value' => 'contact@dawntale.id',
                'created_at' => Carbon::now()
            ],[
                'name' => 'phone',
                'value' => '089600000000',
                'created_at' => Carbon::now()
            ],[
                'name' => 'address',
                'value' => 'D.I.Yogyakarta, Indonesia',
                'created_at' => Carbon::now()
            ],[
                'name' => 'about_me',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'created_at' => Carbon::now()
            ],[
                'name' => 'facebook_url',
                'value' => 'https://facebook.com/kareniwata',
                'created_at' => Carbon::now()
            ],[
                'name' => 'github_url',
                'value' => 'https://github.com/kareniwata',
                'created_at' => Carbon::now()
            ]
        ]);

        factory(App\Article::class, 10)->create();
        factory(App\Resume::class, 5)->create();
        factory(App\Testimonial::class, 5)->create();
    }
}
