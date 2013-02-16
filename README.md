GithubApiBundle
===================

This bundle provides a simple integration of the [KnpLabs PHP GitHub API client][1] into Symfony2.

[![Build Status](https://travis-ci.org/erivello/GithubApiBundle.png)](https://travis-ci.org/erivello/GithubApiBundle)

Installation
------------

Installation is very easy, it makes use of [Composer][2].

Add GithubApiBundle to your composer.json

    "require": {
        "erivello/github-api-bundle": "dev-master"
    }

Register the bundle in `app/AppKernel.php`:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new Erivello\GithubApiBundle\ErivelloGithubApiBundle(),
    );
}
```

Configure
---------

## Basic usage

``` yaml
erivello_github_api: ~
```

## Cache usage

``` yaml
erivello_github_api:
    cache:
        # Select cache dir
        dir: '/tmp/dir'
        # Or select directly which cache you want to use
        file: '/tmp/file'
```

Usage
-----

You can access the `php-github-api` by the `github_api` service:

``` php
<?php

$service = $this->container->get('github_api');
$client = $service->getClient();

$repositories = $client->api('user')->repositories('ornicar');
```

License
-------

The GithubApiBundle is licensed under the MIT license.

[1]: https://github.com/KnpLabs/php-github-api
[2]: http://getcomposer.org/