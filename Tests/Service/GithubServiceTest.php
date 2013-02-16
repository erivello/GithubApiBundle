<?php

namespace Erivello\GithubApiBundle\Tests\Service;

use Github;
use Erivello\GithubApiBundle\Service\GithubService;

/**
 * Test class for GithubService
 *
 * @author Edoardo Rivello <edoardo.rivello@gmail.com>
 */
class GithubServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testServiceWithDefaultValues()
    {
        $service = new GithubService();
        $client = $service->getClient();

        $this->assertInstanceOf('Github\Client', $client);
        $this->assertInstanceOf('Github\HttpClient\HttpClient', $client->getHttpClient());
        $this->assertNull($service->getCache());
    }

    public function testServiceWithConfigLoaded()
    {
        $service = new GithubService('/tmp/github-api-dir');
        $client = $service->getClient();
        
        $this->assertInstanceOf('Github\Client', $client);
        $this->assertInstanceOf('Github\HttpClient\HttpClient', $client->getHttpClient());
        $this->assertInstanceOf('Github\HttpClient\CachedHttpClient', $service->getCache());
    }
}
