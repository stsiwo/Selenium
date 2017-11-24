<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Page as BasePage;

abstract class Page extends BasePage
{
    /**
     * Get the global element shortcuts for the site.
     *
     * @return array
     */
    public static function siteElements()
    {
        return [
          // header component selectors
          '@home-link' => '#home-link',
          '@showcase-link' => '#showcase-link',
          '@words-link' => '#words-link',
          '@dictionaries-link' => '#dictionaries-link',
          '@flash-link' => '#flash-link',
          '@contact-link' => '#contact-link',
          '@login-link' => '#login-link',
          '@logout-link' => '#logout-link',
          '@register-link' => '#register-link',
          '@user-dropdown' => '#user-dropdown',

          // home page selectors
          '@github-link' => '#github-link',
          '@facebook-link' => '#facebook-link',
          '@linkedin-link' => '#linkedin-link',

          // contact page selectors
          '@contact-name' => '#contact-name',
          '@contact-email' => '#contact-email',
          '@contact-subject' => '#contact-subject',
          '@contact-message' => '#contact-message',
          '@contact-submit' => '#contact-submit',

        ];
    }
}
