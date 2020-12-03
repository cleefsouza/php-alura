<?php

use Alura\Composer\Buscador;
use GuzzleHttp\Client;
use PHPUnit\Framework\{MockObject\MockObject, TestCase};
use Psr\Http\Message\{ResponseInterface, StreamInterface};
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class BuscadorTest
 */
class BuscadorTest extends TestCase
{
    /**
     * @var Client|MockObject
     */
    private MockObject $httpClientMock;

    /**
     * @var string
     */
    private string $url = "url-teste";

    protected function setUp(): void
    {
        $html = <<<FIM
        <html>
            <body>
                <span class="card-curso__nome">Curso Teste 1</span>
                <span class="card-curso__nome">Curso Teste 2</span>
                <span class="card-curso__nome">Curso Teste 3</span>
            </body>
        </html>
        FIM;


        $stream = $this->createMock(StreamInterface::class);
        $stream
            ->expects($this->once())
            ->method("__toString")
            ->willReturn($html);

        $response = $this->createMock(ResponseInterface::class);
        $response
            ->expects($this->once())
            ->method("getBody")
            ->willReturn($stream);

        $httpClient = $this
            ->createMock(Client::class);

        $httpClient
            ->expects($this->once())
            ->method("request")
            ->with("GET", $this->url)
            ->willReturn($response);

        $this->httpClientMock = $httpClient;
    }

    public function testBuscadorDeveRetornarCursos(): void
    {
        $crawler = new Crawler();
        $buscador = new Buscador($this->httpClientMock, $crawler);
        $cursos = $buscador->buscar($this->url);

        $this->assertCount(3, $cursos);
        $this->assertEquals("Curso Teste 1", $cursos[0]);
        $this->assertEquals("Curso Teste 2", $cursos[1]);
        $this->assertEquals("Curso Teste 3", $cursos[2]);
    }
}
