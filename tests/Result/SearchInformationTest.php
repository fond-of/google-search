<?php

namespace FondOfBags\GoogleCustomSearch\Result;

use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;

class SearchInformationTest extends TestCase
{
    /**
     * @var SearchInformation
     */
    protected $searchInformation;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();

        $json = '{"totalResults": "15"}';
        $serializer = SerializerBuilder::create()->build();
        $this->searchInformation = $serializer->deserialize($json, SearchInformation::class, 'json');
    }

    /**
     * @test
     */
    public function testGetTotalResults()
    {
        $this->assertEquals(15, $this->searchInformation->getTotalResults());
    }
}