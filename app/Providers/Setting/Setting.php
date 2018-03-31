<?php

namespace App\Providers\Setting;

use App;

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

        return null;
    }
}
