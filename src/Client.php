<?php

namespace FondOfPHP\GoogleCustomSearch;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleRetry\GuzzleRetryMiddleware;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Doctrine\Common\Annotations\AnnotationRegistry;

class Client
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $cx;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $defaultConfig = [
        'base_uri' => 'https://www.googleapis.com/customsearch/v1',
        'timeout' => 2.0,
        'http_errors' => false
    ];

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * Client constructor.
     *
     * @param string $apiKey
     * @param string $cx
     */
    public function __construct(
        $apiKey,
        $cx,
        $config = null
    )
    {
        AnnotationRegistry::registerLoader('class_exists');

        $this->apiKey = $apiKey;
        $this->cx = $cx;

        if ($config === null) {
            $config = $this->defaultConfig;
        }

        $stack = HandlerStack::create();
        $stack->push(GuzzleRetryMiddleware::factory());

        $config = array_merge($config, [
            'handler' => $stack,
            'max_retry_attempts' => 3,
        ]);

        $this->httpClient = new HttpClient($config);
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function search($query, $start = 1, $num = 10)
    {
        /** @var Response $response */
        $response = $this->httpClient->request('GET', null, [
            'query' => [
                'q' => $query,
                'cx' => $this->cx,
                'key' => $this->apiKey,
                'start' => $start,
                'num' => $num
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception($response->getBody()->getContents());
        }

        return $this->serializer->deserialize(
            $response->getBody()->getContents(),
            Result::class,
            'json'
        );
    }
}
