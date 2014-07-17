<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Ensure that the homepage is showing the correct content');
$I->amOnPage('/');
$I->see('did this change?');
