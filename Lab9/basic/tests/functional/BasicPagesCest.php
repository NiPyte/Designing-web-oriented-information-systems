<?php

class BasicPagesCest
{
    // Check the Home Page
    public function openHomePage(\FunctionalTester $I)
    {
        // Go to the home page
        $I->amOnPage(['site/index']);

        // Check if we see the site name
        $I->see('My Application');

        // Check if we see the main welcome text
        $I->see('Congratulations!');
    }

    // Check the About Page
    public function openAboutPage(\FunctionalTester $I)
    {
        // Go to About page
        $I->amOnPage(['site/about']);

        // Check for H1 header
        $I->see('About', 'h1');

        // Check specific text
        $I->see('This is the About page.');
    }

    // Check the Contact Page form
    public function openContactPage(\FunctionalTester $I)
    {
        // Go to Contact page
        $I->amOnPage(['site/contact']);

        // Check for H1 header
        $I->see('Contact', 'h1');

        // Check if the form exists
        $I->see('Submit', 'button');
    }
}