<?php

class SignupCest
{
    public function openSignupPage(\FunctionalTester $I)
    {
        // Go to page
        $I->amOnPage(['site/signup']);
        // Check title
        $I->see('Signup', 'h1');
    }

    public function signupSuccessfully(\FunctionalTester $I)
    {
        // Go to page
        $I->amOnPage(['site/signup']);

        // Fill the form fields
        // We use the input names from HTML (inspect element to see them)
        $I->fillField('#signupform-username', 'test_tester');
        $I->fillField('#signupform-email', 'tester@example.com');
        $I->fillField('#signupform-password', 'password123');

        // Click button
        $I->click('signup-button');

        // Expect to be on Login page (as we redirected in controller)
        $I->see('Login', 'h1');

        // Check for success message (Flash message)
        $I->see('Registration successful');
    }
}