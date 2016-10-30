<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LandingControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Symfony Skeleton', $crawler->filter('a')->text());
    }

    /** @dataProvider provideUrls */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideUrls()
    {
        return [
            array('/'),
            array('/login'),
            array('/register//'),
        ];
    }

    /** @test */
    public function timeToLoadHomepage()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $client->request('GET', '/');
        if ($profiler = $client->getProfile()) {
            $this->assertLessThan(
                1000,
                $profiler->getCollector('time')->getDuration()
            );
        }
    }
}
