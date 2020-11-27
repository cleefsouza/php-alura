<?php

declare(strict_types=1);

namespace Alura\Composer;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class Buscador
 * @package Alura\Composer
 */
class Buscador
{
    public const SELETOR = "span.card-curso__nome";

    /**
     * @var ClientInterface
     */
    private ClientInterface $client;

    /**
     * @var Crawler
     */
    private Crawler $crawler;

    /**
     * Buscador constructor.
     * @param ClientInterface $client
     * @param Crawler $crawler
     */
    public function __construct(ClientInterface $client, Crawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    /**
     * @param string $url
     * @return array
     * @throws GuzzleException
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
