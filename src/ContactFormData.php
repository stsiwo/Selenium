<?php

namespace Tests\Browser\Pages;

class ContactFormData {

    public function getValidName()
    {
      return 'sample_name';
    }

    public function getValidEmail()
    {
      return 'sample@sample.com';
    }

    public function getValidSubject()
    {
      return 'sample_subject';
    }

    public function getValidMessage()
    {
      return 'sample_message';
    }

    public function getInValidName()
    {
      return '';
    }

    public function getInValidEmail()
    {
      return 'invalid.com';
    }

    public function getInValidSubject()
    {
      return '';
    }

    public function getInValidMessage()
    {
      return '';
    }


}
