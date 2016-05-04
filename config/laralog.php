<?php

return [
    /**
     * --------------------------------------------------------------------------
     * Environment Handlers
     * --------------------------------------------------------------------------
     *
     * Configure the different handlers for each environment. Each environment
     * should be correctly configured within the handlers section.
     *
     * Example:
     *
     *      'local' => ['slack']
     *
     */
    'environments' => [
        'local' => ['slack']
    ],

    /**
     * --------------------------------------------------------------------------
     * Handlers Configuration
     * --------------------------------------------------------------------------
     *
     * Configure the different handlers that your application support.
     *
     * Currently supported:
     *  - Slack
     *
     */
    'drivers' => [
        /**
         * --------------------------------------------------------------------------
         * Slack integration
         * --------------------------------------------------------------------------
         *
         *  To obtain an api key, visit: https://api.slack.com/web#auth
         *
         * IMPORTANT: You channel name must be prefixed the # symbol
         *
         */
        'slack' => [
            'api_key' => 'YOUR_SLACK_API_KEY',
            'channel' => '#general'
        ]
    ]

];