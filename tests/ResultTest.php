<?php

namespace FondOfBags\GoogleCustomSearch;

use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;

class ResultTest extends TestCase
{
    /**
     * @var Result
     */
    protected $result;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();

        $json = '{"items": [{"title": "Example", "link": "http://example.com"}], "searchInformation": {"totalResults": "1"}}';

        $serializer = SerializerBuilder::create()->build();
        $this->result = $serializer->deserialize($json, Result::class, 'json');
    }

    /**
     * @test
     */
    public function testGetTotalResults()
    {
        $this->assertEquals(1, $this->result->getTotalResults());
    }

    /**
     * @test
     */
    public function testGetItems()
    {
        $items = $this->result->getItems();
        $this->assertEquals(1, count($items));

        $this->assertEquals('Example', $items[0]->getTitle());
        $this->assertEquals('http://example.com', $items[0]->getLink());
    }
}