<?php

namespace FondOfBags\GoogleCustomSearch\Result;

use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /**
     * @var Item
     */
    protected $item;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();

        $json = '{"title": "Example", "link": "http://example.com", "snippet": "Snippet", "htmlSnippet": "<strong>htmlSnippent</strong>"}';
        $serializer = SerializerBuilder::create()->build();
        $this->item = $serializer->deserialize($json, Item::class, 'json');
    }

    /**
     * @test
     */
    public function testGetTitle()
    {
        $this->assertEquals('Example', $this->item->getTitle());
    }

    /**
     * @test
     */
    public function testGetLink()
    {
        $this->assertEquals('http://example.com', $this->item->getLink());
    }

    /**
     * @test
     */
    public function testGetSnippet()
    {
        $this->assertEquals('Snippet', $this->item->getSnippet());
    }

    /**
     * @test
     */
    public function testGetHtmlSnippet()
    {
        $this->assertEquals('<strong>htmlSnippent</strong>', $this->item->getHtmlSnippet());
    }
}