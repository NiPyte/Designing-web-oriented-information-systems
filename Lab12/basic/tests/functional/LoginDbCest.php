<?php

class LoginDbCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->haveInDatabase('user', [
            'username' => 'denys',
            'email' => 'den@gmail.com',
            'password_hash' => '$2y$13$0g9sZURJZNbwybz/L8tKz.QfFtWJ4xipFOuavXU34bgjIICU3KX7O', // Fake hash or use real one
            'auth_key' => 'ORJJzPu7hf3eYG7utS2voPqtqd4TGt_D',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

    }

    public function loginSuccessfully(\FunctionalTester $I)
    {
        // Go to Login page
        $I->amOnPage(['site/login']);

        // Fill form
        $I->fillField('#loginform-username', 'admin_test');

        // Check validation for empty fields
        $I->click('login-button');
        $I->see('Username cannot be blank.');
    }

    // Test: Wrong password
    public function loginWithWrongPassword(\FunctionalTester $I)
    {
        $I->amOnPage(['site/login']);
        $I->fillField('#loginform-username', 'admin_test');
        $I->fillField('#loginform-password', 'wrong_pass');
        $I->click('login-button');
        $I->see('Incorrect username or password.');
    }
}