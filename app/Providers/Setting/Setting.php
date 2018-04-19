<?php

namespace App\Providers\Setting;

use App;
use Carbon\Carbon;


class Setting
{
    /**
     * Site Preferences.
     * 
     * @var array
     */
    public $setting;

    /**
     * Instantiate new setting instance.
     * 
     * @param mixed $options
     */
    public function __construct($setting = null)
    {
        if ($setting)
        {
            $this->setting = $setting;
        }
    }

    /**
     * Return currently active theme.
     *
     * @return string
     */
    public function getTheme()
    {
        return isset($this->setting['theme']) ? $this->setting['theme'] : 'demo';
    }

    /**
     * Return view paths array for laravel view loader.
     *
     * @return array
     */
    public function getThemePaths()
    {
        $theme = $this->getTheme();

        if ($theme === 'demo') {
            return [
                // Default theme
                base_path('themes/demo/views'),

                // Dashboard theme
                base_path('app/views'),
            ];
        }

        return [
            // Current theme
            base_path('themes/' . $theme . '/views'),

            // Fallback theme
            base_path('themes/demo/views'),

            // Dashboard theme
            base_path('app/views'),
        ];
    }

    /**
     * Returns site name.
     * 
     * @return mixed
     */
    public function getSiteName()
    {
        if ( isset($this->setting['site_name']) && $this->setting['site_name'])
        {
            return $this->setting['site_name'];
        }

        return null;
    }

    /**
     * Returns site favicon.
     * 
     * @return mixed
     */
    public function getFavicon()
    {
        if ( isset($this->setting['favicon']) && $this->setting['favicon'])
        {
            return $this->setting['favicon'];
        }
    }

    /**
     * Returns show article.
     * 
     * @return mixed
     */
    public function getShowArticle()
    {
        if ( isset($this->setting['showArticle']) && $this->setting['showArticle'])
        {
            return $this->setting['showArticle'];
        }

        return '0';
    }

    /**
     * Returns show testimonial.
     * 
     * @return mixed
     */
    public function getShowTestimonial()
    {
        if ( isset($this->setting['showTestimonial']) && $this->setting['showTestimonial'])
        {
            return $this->setting['showTestimonial'];
        }

        return '0';
    }

    /**
     * Returns avatar.
     * 
     * @return mixed
     */
    public function getAvatar()
    {
        if ( isset($this->setting['avatar']) && $this->setting['avatar'])
        {
            return $this->setting['avatar'];
        }

        return asset('storage/avatar.png');
    }

    /**
     * Returns facebook url.
     * 
     * @return mixed
     */
    public function getFacebookUrl()
    {
        if ( isset($this->setting['facebook_url']) && $this->setting['facebook_url'])
        {
            return $this->setting['facebook_url'];
        }
    }

    public function getTwitterUrl()
    {
        if ( isset($this->setting['twitter_url']) && $this->setting['twitter_url'])
        {
            return $this->setting['twitter_url'];
        }
    }

    public function getInstagramUrl()
    {
        if ( isset($this->setting['instagram_url']) && $this->setting['instagram_url'])
        {
            return $this->setting['instagram_url'];
        }
    }

    public function getLinkedinUrl()
    {
        if ( isset($this->setting['linkedin_url']) && $this->setting['linkedin_url'])
        {
            return $this->setting['linkedin_url'];
        }
    }

    public function getGithubUrl()
    {
        if ( isset($this->setting['github_url']) && $this->setting['github_url'])
        {
            return $this->setting['github_url'];
        }
    }

    public function getYoutubeUrl()
    {
        if ( isset($this->setting['youtube_url']) && $this->setting['youtube_url'])
        {
            return $this->setting['youtube_url'];
        }
    }

    /**
     * Returns facebook url.
     * 
     * @return mixed
     */
    public function getContactEmail()
    {
        if ( isset($this->setting['email']) && $this->setting['email'])
        {
            return $this->setting['email'];
        }

        return null;
    }

    /**
     * Returns google analytics script.
     * 
     * @return mixed
     */
    public function getGoogleAnalytics()
    {
        if ( isset($this->setting['google_analytics']))
        {
            return $this->setting['google_analytics'];
        }
    }

    /**
     * Returns full name.
     * 
     * @return mixed
     */
    public function getName()
    {
        if ( isset($this->setting['first_name']) && isset($this->setting['last_name']  ))
        {
            return $this->setting['first_name'] . ' ' . $this->setting['last_name'];
        }
    }

    public function getOccupation()
    {
        if ( isset($this->setting['occupation']))
        {
            return $this->setting['occupation'];
        }
    }

    /**
     * Returns about me content.
     * 
     * @return mixed
     */
    public function getAboutMe()
    {
        if ( isset($this->setting['about_me']))
        {
            return $this->setting['about_me'];
        }
    }

    public function getBirthplace()
    {
        if ( isset($this->setting['birthplace']))
        {
            return $this->setting['birthplace'];
        }
    }

    public function getBirthdate()
    {
        if ( isset($this->setting['birthdate']))
        {
            return Carbon::parse($this->setting['birthdate'])->toFormattedDateString();
        }
    }

    public function getAddress()
    {
        if ( isset($this->setting['address']))
        {
            return $this->setting['address'];
        }
    }

    public function getEmail()
    {
        if ( isset($this->setting['email']))
        {
            return $this->setting['email'];
        }
    }

    public function getPhone()
    {
        if ( isset($this->setting['phone']))
        {
            return $this->setting['phone'];
        }
    }
}
