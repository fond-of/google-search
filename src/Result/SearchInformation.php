<?php

namespace FondOfPHP\GoogleCustomSearch\Result;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class SearchInformation
{
    /**
     * @Type("integer")
     * @SerializedName("totalResults")
     * @var integer
     */
    protected $totalResults;

    /**
     * @return string
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }
}