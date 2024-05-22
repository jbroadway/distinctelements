# Distinct Elements in Streams

![GitHub Workflow Status (branch)](https://img.shields.io/github/actions/workflow/status/jbroadway/distinctelements/ci.yml?branch=master)
![GitHub License](https://img.shields.io/github/license/jbroadway/distinctelements)
![Packagist Version](https://img.shields.io/packagist/v/jbroadway/distinctelements)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/jbroadway/distinctelements)

A pure PHP implementation of the Distinct Elements in Streams algorithm for estimating
the number of distinct elements in a set, from the following paper:

https://arxiv.org/abs/2301.10191

Install using [Composer](https://getcomposer.org/):

```
composer require jbroadway/distinctelements
```

Usage:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$stream = [1, 2, 3, 4, 1, 2, 3, 4, 5, 4, 3, 1, 2];
$epsilon = 0.1;
$delta = 0.1;

$output = DistinctElements::streaming_algorithm ($stream, $epsilon, $delta);
var_dump ($output); // 5
```
