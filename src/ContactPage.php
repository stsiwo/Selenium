<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class ContactPage extends Page
{
    private $data;

    public function __construct()
    {
      $this->data = new ContactFormData;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/contact';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return []; // this must return array otherwise return array_map error
    }

    public function makeContactFormWithValidInput(Browser $browser)
    {
        $browser->waitFor('@contact-name')
                ->type('@contact-name', $this->data->getValidName())
                ->type('@contact-email', $this->data->getValidEmail())
                ->type('@contact-subject', $this->data->getValidSubject())
                ->type('@contact-message', $this->data->getValidMessage())
                ->click('@contact-submit');
    }

    public function makeContactFormWithInvalidName(Browser $browser)
    {
        $browser->waitFor('@contact-name')
                ->type('@contact-name', $this->data->getInValidName())
                ->type('@contact-email', $this->data->getValidEmail())
                ->type('@contact-subject', $this->data->getValidSubject())
                ->type('@contact-message', $this->data->getValidMessage())
                ->click('@contact-submit');
    }

    public function makeContactFormWithInvalidEmail(Browser $browser)
    {
        $browser->waitFor('@contact-name')
                ->type('@contact-name', $this->data->getValidName())
                ->type('@contact-email', $this->data->getInValidEmail())
                ->type('@contact-subject', $this->data->getValidSubject())
                ->type('@contact-message', $this->data->getValidMessage())
                ->click('@contact-submit');
    }

    public function makeContactFormWithInvalidSubject(Browser $browser)
    {
        $browser->waitFor('@contact-name')
                ->type('@contact-name', $this->data->getValidName())
                ->type('@contact-email', $this->data->getValidEmail())
                ->type('@contact-subject', $this->data->getInValidSubject())
                ->type('@contact-message', $this->data->getValidMessage())
                ->click('@contact-submit');
    }

    public function makeContactFormWithInvalidMessage(Browser $browser)
    {
        $browser->waitFor('@contact-name')
                ->type('@contact-name', $this->data->getValidName())
                ->type('@contact-email', $this->data->getValidEmail())
                ->type('@contact-subject', $this->data->getValidSubject())
                ->type('@contact-message', $this->data->getInValidMessage())
                ->click('@contact-submit');
    }
}
