<?php

namespace Erivello\GithubApiBundle\Service;

use Github;

/**
 * GithubService
 *
 * @author Edoardo Rivello <edoardo.rivello@gmail.com>
 */
class GithubService 
{
    /**
     * @var null|Github\HttpClient\CachedHttpClient
     */
    protected $cache = null;

    /**
     * Constructor
     * 
     * @param false|string $cacheDir
     * @param false|string $file 
     */
    public function __construct($cacheDir = false, $file = false)
    {
        if ($cacheDir) $this->cache = new Github\HttpClient\CachedHttpClient(array('cache_dir' => $cacheDir));

        if ($file) 
        {
            $this->cache = new Github\HttpClient\CachedHttpClient(
                array(),
                null,
                new Github\HttpClient\Cache\FilesystemCache($file)
            );
        }
    }

    /**
     * Get a client object, so you can access to all GitHub
     * 
     * @return Github\Client 
     */
    public function getClient()
    {
        return new Github\Client($this->cache);
    }
    
    /**
     * Get cache
     * 
     * @return null|Github\HttpClient\CachedHttpClient $cache
     */
    public function getCache()
    {
        return $this->cache;
    }
}
