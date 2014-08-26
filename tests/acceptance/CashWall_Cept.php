<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Ensure that the CASH WALL is showing the correct content');
$I->amOnPage('/5111/cash');
$I->seeInTitle('Yonge Street');
$I->amOnPage('/314/cash');
$I->seeInTitle('West Edmonton Mall');
