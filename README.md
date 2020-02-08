# Page Object Design Pattern and UI Map Class

Unit testing and integration testing are essential components when building stable project; however, fanctional testing is the final step to make sure that a certain functionality works properly. In some case of fanctional testing, front-end programming is involved in the test. Browser testing is the solution to deal with such cases.

> The benefit is that if UI changes for the page, the tests themselves don't need to change, only the code within the page object needs to change


Browser testing tools such as Selenium and Dusk in Laravel are useful. However, It is also important to think about how to organize browswer testing classes in order to make your code maintainable and avoid any duplicated code. Page object design pattern and UI Map class allow you to accommodate such a request.

Here is my diagram how Page Object pattern and UI Map class works:

<img src="./PageObjectDesignPatternDiagram.png" width="700" height="600" align="center">

## Example

In my own project, I have a contact page so that users can send any request through email. In order to make sure the contact functionality, I used Dusk in Laravel. Here are actual codes implemented Page Object pattern and UI Map class.

### Test Class
```
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
    ...
}
```
### Page Class

encapsulate behaviors of a specific page so that any change to those behaviors is not exposed outside the Page Object. for instance of bellow code, ContactPage encapsulate a behavior called 'makeContactFormWithValidInput'. The benefit of this is that when you need to change the behavior, you just only need to change this function (behavior) and you don't need to change the other code.
    
```
class ContactPage extends Page
{
    ...
    public function makeContactFormWithValidInput(Browser $browser)
    {
        $browser->waitFor('@contact-name')
                ->type('@contact-name', $this->data->getValidName())
                ->type('@contact-email', $this->data->getValidEmail())
                ->type('@contact-subject', $this->data->getValidSubject())
                ->type('@contact-message', $this->data->getValidMessage())
                ->click('@contact-submit');
    }
    ...
}
```
### UI Map Class

The main role of this UI Map is to map a test specific constant to a selector of specific DOM element. The benefit of this is to encapsulate UI selector logic into a single class and expose its representitive form (constants) to test cases; therefore, any change to UI selectors does not affect outside this class. for instance of bellow class, if a UI selector, let's say '#contact-name' has changed to '#contact-name-attribute' for some reason, the only thing you need to update the test source code is to fix this UI Map class. You do not need to update any other source code like test cases. 

In Dusk, it uses inheritance to access UI components globally rather than compositon. 
```
abstract class Page extends BasePage
{
    ...
    public static function siteElements()
    {
        return [
          ...
          // contact page selectors
          '@contact-name' => '#contact-name',
          '@contact-email' => '#contact-email',
          '@contact-subject' => '#contact-subject',
          '@contact-message' => '#contact-message',
          '@contact-submit' => '#contact-submit',
        ];
    }
    ...
}
```
# Source code
Related source code is [here](./src).

# References
* [SeleniumHQ: Test Design Considerations](http://www.seleniumhq.org/docs/06_test_design_considerations.jsp) 
* [Browser Tests (Laravel Dusk)](https://laravel.com/docs/5.4/dusk)
