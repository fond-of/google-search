<?php

namespace FondOfPHP\GoogleCustomSearch\Result;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class Item
{
    /**
     * @Type("string")
     * @SerializedName("title")
     * @var string
     */
    protected $title;

    /**
     * @Type("string")
     * @SerializedName("link")
     * @var string
     */
    protected $link;

    /**
     * @Type("string")
     * @SerializedName("snippet")
     * @var string
     */
    protected $snippet;

    /**
     * @Type("string")
     * @SerializedName("htmlSnippet")
     * @var string
     */
    protected $htmlSnippet;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }



    /**
     * @return string
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * @return string
     */
    public function getHtmlSnippet()
    {
        return $this->htmlSnippet;
    }
}