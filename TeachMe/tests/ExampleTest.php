<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {

	use DatabaseTransactions;

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		/*$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());*/
		seed('Ticket');

		$this->assertTrue(true);

	}

}
