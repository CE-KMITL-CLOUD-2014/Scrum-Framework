<?php

class addProductOwnerTest extends TestCase {

	public function testpo()
	{
		 $email = "example@email.com";
		 $team = new Team;

		 //If email has exist in database. It can be added in Product Owner field in  Exampleteam.
		 $bool_temp = $team->checkuser($email);
		 $this->assertTrue($bool_temp);  // bool_temp is true If email exist in database. 
		 $exampleTeam = $team->addProductOwner($email);
		 // exampleTeam returns true if email provided has been successfully added as Product owner 
		 $this->assertTrue($exampleTeam);
	}

}
