<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 RBAC Rule Generator Extension</h1>
    <br>
</p>

An extension for generataring rule classes via gii.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/):

Either run

```
php composer.phar require --prefer-dist r2am9d/yii2-rbac-rule
```

or add

```
"r2am9d/yii2-rbac-rules": "@dev"
```

to the require-dev section of your `composer.json` file.

Usage
-----------

Once the extension is installed, simply modify your application configuration as follows:

```php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'generators' => [
                'rule' => [
                    'class' => 'r2am9d\rule\gii\Generator'
                ]
            ]
        ],
    ],
];
```

You can then access the generator through the following URL:

```
http://localhost/path/to/index?r=gii/rule
```

or if you have enabled pretty URLs, you may use the following URL:

```
http://localhost/path/to/index/gii/rule
```
