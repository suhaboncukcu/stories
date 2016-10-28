# Stories plugin for CakePHP

## Installation

**Attention: This plugin is under development, PRs are welcome. **

This plugin includes a middleware which runs on every request, 
gathering information if a user logged in. For every log created is named as a story piece.



You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require suhaboncukcu/Stories

//load plugin in your bootstrap.php
Plugin::load('Stories', ['bootstrap' => true, 'routes' => true]);


bin/cake bake migrations migrate -p Stories

```

