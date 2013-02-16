<?php

namespace Erivello\GithubApiBundle\Tests\DependencyInjection;

use Erivello\GithubApiBundle\DependencyInjection\ErivelloGithubApiExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Processor;

/**
 * Test class for ErivelloGithubApiExtension
 *
 * @author Edoardo Rivello <edoardo.rivello@gmail.com>
 */
class ErivelloGithubApiExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @param array $config
    * @return \Symfony\Component\DependencyInjection\ContainerBuilder
    */
    protected function getBuilder(array $config = array())
    {
        $builder = new ContainerBuilder();

        $loader = new ErivelloGithubApiExtension();
        $loader->load($config, $builder);

        return $builder;
    }
    
    public function testLoadDefault()
    {
        $builder = $this->getBuilder();
        
        $this->assertFalse($builder->getParameter('github_api.cache_dir'));
        $this->assertFalse($builder->getParameter('github_api.cache_file'));
    }    
    
    public function testLoadConfiguredDir()
    {
        $config = array(
            array(
                'cache' => array(
                    'dir' => '/tmp/github-api-cache-test',
                )
            )
        );        

        $builder = $this->getBuilder($config);
        
        $this->assertEquals('/tmp/github-api-cache-test', $builder->getParameter('github_api.cache_dir'));
        $this->assertFalse($builder->getParameter('github_api.cache_file'));
    }    

    public function testLoadConfiguredFile()
    {
        $config = array(
            array(
                'cache' => array(
                    'file' => '/tmp/github-api-cache-test',
                )
            )
        );        

        $builder = $this->getBuilder($config);
        
        $this->assertFalse($builder->getParameter('github_api.cache_dir'));
        $this->assertEquals('/tmp/github-api-cache-test', $builder->getParameter('github_api.cache_file'));
    }   
}
