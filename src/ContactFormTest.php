<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\ContactPage;


class ContactFormTest extends DuskTestCase
{
    /** @test */
    public function it_type_each_input_then_submit_and_redirect_home_with_flush_session_message()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                    ->makeContactFormWithValidInput()
                    ->assertPathIs('/')
                    ->assertSee('Thanks!');
        });
    }

    /** @test */
    public function it_type_invalid_name_and_stay_same_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                    ->makeContactFormWithInvalidName()
                    ->assertPathIs('/contact');
        });
    }

    /** @test */
    public function it_type_invalid_email_and_stay_same_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                    ->makeContactFormWithInvalidEmail()
                    ->assertPathIs('/contact');
        });
    }

    /** @test */
    public function it_type_invalid_subject_and_stay_same_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                    ->makeContactFormWithInvalidSubject()
                    ->assertPathIs('/contact');
        });
    }

    /** @test */
    public function it_type_invalid_message_and_stay_same_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactPage)
                    ->makeContactFormWithInvalidMessage()
                    ->assertPathIs('/contact');
        });
    }
}
