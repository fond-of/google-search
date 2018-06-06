<?php

namespace FondOfBags\GoogleCustomSearch;

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();

        $apiKey = 'AIzaSyCt3GSh12eQGdzXSjLgwIxOdOl2XGeWe08';
        $cx = '015518226001298946229:5_jl5vbv93o';

        $this->client = new Client($apiKey, $cx);
    }

    /**
     * @test
     */
    public function testSearch()
    {
        $result = $this->client->search('Schniekohopster');

        $this->assertTrue($result->getItems() > 0);
    }
}