<?php

namespace TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest  extends WebTestCase 
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
     * @covers TaskBundle\Controller\HomeController::about
     * @todo   Implement testAbout().
     */
    public function testAbout()
    {
        $this->user->request('GET', '/about');
        $this->assertEquals(200, $this->user->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /home/about/");
    } 

    /**
     * @covers TaskBundle\Controller\HomeController::help
     * @todo   Implement testHelp().
     */
    public function testHelp() {
        $this->user->request('GET', '/help');
        $this->assertEquals(200, $this->user->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /home/help/");
    }

}
