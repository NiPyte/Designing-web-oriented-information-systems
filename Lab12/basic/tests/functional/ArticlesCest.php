<?php

class ArticlesCest
{
    public function ensureThatCreateWorks(\FunctionalTester $I)
    {
        $I->amOnPage(['articles/index']);
        $I->see('Articles', 'h1');

        $I->click('Create Articles'); // Click the green button

        $I->see('Create Articles', 'h1');

        // Fill the form
        $I->fillField('#articles-title', 'Test Article Title');
        $I->fillField('#articles-description', 'This is a test description');
        $I->fillField('#articles-content', 'Full content of the test article.');


        $I->click('Save'); // Click Save button

        // After save, we should see the View page
        $I->see('Test Article Title', 'h1');
        $I->see('This is a test description');
    }

    public function ensureThatUpdateWorks(\FunctionalTester $I)
    {
        $I->amOnPage(['articles/index']);
        $I->see('Test Article Title');

        $I->click('a[title="Update"]');

        $I->see('Update Articles:', 'h1');

        // Change the title
        $I->fillField('#articles-title', 'Updated Title 123');
        $I->click('Save');

        // Verify changes
        $I->see('Updated Title 123', 'h1');
    }

    public function ensureThatDeleteWorks(\FunctionalTester $I)
    {
        $I->amOnPage(['articles/index']);
        $I->see('Updated Title 123');

        // Click "trash" icon (Delete)
        $I->click('a[title="Delete"]');

        // Verify we are back on index and article is gone
        $I->amOnPage(['articles/index']);
        $I->dontSee('Updated Title 123');
    }
}