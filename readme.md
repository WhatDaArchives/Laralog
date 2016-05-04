# Laralog

## Description 

Setup your log handlers per environment in your Laravel application.

**CURRENTLY UNDER DEVELOPMENT**

## Installation

[PHP](https://php.net) 7.0+ required.

To get the latest version of Laralog, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require laralog/laralog
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "laralog/laralog": "dev-master"
    }
}
```

Once Laralog is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `Laralog\LaralogServiceProvider::class`

## Configuration

Laralog requires configuration.

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish
```

This will create a `config/laralog.php` file in your app that you can modify to set your configuration. 
Also, make sure you check for changes to the original config file in this package between releases.

## Environments

To add an environment configuration, add a key to the environment array, with the name of your environment and
containing an array with the handlers you want to use, for example: 

```php
    'environments' => [
        'local' => ['slack']
    ]
``` 

## Handlers

To add a handler configuration, add a key to the handlers array, with the name of your handler and
the required information for it. 

### Slack

```php
    'handlers' => [
        'slack' => [
            'api_key' => 'YOUR_SLACK_API_KEY',
            'channel' => '#general'
        ]
    ]
``` 

## Usage

Use the logging methods from Laravel as usual ;)

[https://laravel.com/docs/5.2/errors#logging](https://laravel.com/docs/5.2/errors#logging)

## Currently Supported Handlers

- [x] SlackHandler ([To generate a token on Slack](https://api.slack.com/web#auth))

## Future Support

- [ ] NativeMailerHandler
- [ ] SwiftMailerHandler
- [ ] HipChatHandler
- [ ] NewRelicHandler
- [ ] LogglyHandler
- [ ] RollbarHandler
- [ ] PushoverHandler
- [ ] ChromePHPHandler
- [ ] PHPConsoleHandler
- [ ] BugsnagHandler