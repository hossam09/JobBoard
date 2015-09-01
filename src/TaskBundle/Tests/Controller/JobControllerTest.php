<?php

namespace TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JobControllerTest  extends WebTestCase 
{
    /**
     * @var User
     */
    protected $user;

    /**
     * This method is called before a test is executed.
     */
    protected function setUp() {
        // Create a new user to browse the application
        $this->user = static::createClient();
    }

    /**
     * @covers TaskBundle\Controller\HomeController::aboutAction
     * @todo   Implement testAboutAction().
     */
    public function testNewPost()
    {
        $this->user->request('GET', '/job/new');
        $this->assertEquals(200, $this->user->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /job/new/");
    } 


}
