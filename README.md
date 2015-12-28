# TRex parser

[![Latest Stable Version](https://poser.pugx.org/raphhh/trex-parser/v/stable.svg)](https://packagist.org/packages/raphhh/trex-parser)
[![Build Status](https://travis-ci.org/Raphhh/trex-parser.png)](https://travis-ci.org/Raphhh/trex-parser)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Raphhh/trex-parser/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Raphhh/trex-parser/)
[![Code Coverage](https://scrutinizer-ci.com/g/Raphhh/trex-parser/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Raphhh/trex-parser/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/1eaf3345-68ec-44ff-8fed-bcbd4721bb13/mini.png)](https://insight.sensiolabs.com/projects/1eaf3345-68ec-44ff-8fed-bcbd4721bb13)
[![Dependency Status](https://www.versioneye.com/user/projects/54062eb9c4c187ff6100006f/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54062eb9c4c187ff6100006f)
[![Total Downloads](https://poser.pugx.org/raphhh/trex-parser/downloads.svg)](https://packagist.org/packages/raphhh/trex-parser)
[![Reference Status](https://www.versioneye.com/php/raphhh:trex-parser/reference_badge.svg?style=flat)](https://www.versioneye.com/php/raphhh:trex-parser/references)
[![License](https://poser.pugx.org/raphhh/trex-parser/license.svg)](https://packagist.org/packages/raphhh/trex-parser)

PHP tool to parse code and extract statements.


## Install

`$ composer require raphhh/trex-parser`


## Usage

### ClassAnalyzer

First, give the PHP code to analyze:

```php
$code = 'class Foo{}';

$analyzer = new ClassAnalyzer();
$classReflections = $analyzer->getClassReflections($code);
```

You can also give a file path to the analyzer:

```php
$filePath = 'MyClass.php';

$analyzer = new ClassAnalyzer();
$classReflections = $analyzer->getClassReflectionsFromFile($filePath);
```

`$classReflections` is an array of [ReflectionClass](http://php.net/manual/en/class.reflectionclass.php).

```php
$objects = [];
foreach($classReflections as $className => $classReflection){
    $objects[$className] = $classReflection->newInstance();
}        
```
