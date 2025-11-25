<?php

class PostCest
{
      // Test: Check if the Blog page works
    public function openBlogPage(\FunctionalTester $I)
    {
        // Go to the route 'post/index'
        $I->amOnPage(['post/index']);

        // Check if we see the correct title (h1 tag)
        $I->see('My Blog', 'h1');

        // Check if we see the specific test post from the DB
        $I->see('Test Post 1');
        $I->see('Another test post');
    }
}