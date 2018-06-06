<?php

namespace FondOfPHP\GoogleCustomSearch;

use FondOfPHP\GoogleCustomSearch\Result\Item;
use FondOfPHP\GoogleCustomSearch\Result\SearchInformation;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class Result
{
    /**
     * @Type("array<FondOfPHP\GoogleCustomSearch\Result\Item>")
     * @SerializedName("items")
     * @var Item[]
     */
    protected $items;

    /**
     * @Type("FondOfPHP\GoogleCustomSearch\Result\SearchInformation")
     * @SerializedName("searchInformation")
     * @var SearchInformation
     */
    protected $searchInformation;


    public function getTotalResults()
    {
        if ($this->searchInformation !== null) {
            return $this->searchInformation->getTotalResults();
        }

        return 0;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }
}