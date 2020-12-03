<?php

declare(strict_types=1);

namespace Alura\Composer;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class Buscador
 * @package Alura\Composer
 */
class Buscador
{
    public const SELETOR = "span.card-curso__nome";

    /**
     * @var Client
     */
    private Client $client;

    /**
     * @var Crawler
     */
    private Crawler $crawler;

    /**
     * Buscador constructor.
     * @param Client $client
     * @param Crawler $crawler
     */
    public function __construct(Client $client, Crawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    /**
     * @param string $url
     * @return array
     */
    public function buscar(string $url): array
    {
        $req = $this->client->request("GET", $url);
        $body = (string)$req->getBody();
        $this->crawler->addHtmlContent($body);
        $elementos = $this->crawler->filter(self::SELETOR)->getIterator()->getArrayCopy();

        return array_map(
            function ($ele) {
                return $ele->textContent;
            },
            $elementos
        );
    }
}
