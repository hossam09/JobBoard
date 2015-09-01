<?php

namespace TaskBundle\FilterChain;

use TaskBundle\Entity\Job;
use TaskBundle\FilterChain\FilterChainRequest;
use TaskBundle\FilterChain\SpamPost;
use TaskBundle\FilterChain\ValidPost;
use TaskBundle\FilterChain\NewPost;

class FilterChainTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var FilterChain
     */
    protected $filterChain;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->filterChain = new SpamPost(array('bar' => 'baz'));
        $this->filterChain->proceed(new ValidPost(array('bar' => 'baz', 'foo' => 'bar')));
    }

    public function makeRequest()
    {
        $request = new Request();
        $request->verb = 'get';

        return array(
            array($request)
        );
    }

    /**
     * @covers TaskBundle\FilterChain\FilterChain::setNext
     * @todo   Implement testSetNext().
     */
    public function testSpamPost() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers TaskBundle\FilterChain\FilterChain::proceed
     * @todo   Implement testProceed().
     */
    public function testValidPost() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    public function testNewPost() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
