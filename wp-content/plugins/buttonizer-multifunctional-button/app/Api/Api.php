<?php

namespace Buttonizer\Api;

/**
 * Initialize api
 */
class Api {
    private static $authenticated = false;

    /**
     * Api
     */
    public function __construct() {
        add_action( 'rest_api_init', [$this, 'init']);
    }

    /**
     * Initialize URLS
     */
    public function init() {
        // Frontend api endpoints
        (new Buttons\ApiButtons())->registerRoute();

        // Backend api
        (new Settings\ApiSettings())->registerRoute();
        (new Dashboard\ApiDashboard())->registerRoute();
        (new Utils\ApiPublish())->registerRoute();
        (new Utils\ApiRevert())->registerRoute();
        (new Utils\ApiReset())->registerRoute();
        (new Update\ApiMigrate())->registerRoute();
        (new PageRules\ApiPageRules())->registerRoute();
        (new TimeSchedules\ApiTimeSchedules())->registerRoute();
    }

    /**
     * Return error, need Buttonizer pro
     */
    public static function needButtonizerPremium() {
        return new \WP_Error('missing_premium_license', 'You do not have Buttonizer Pro.', [ 
            'status' => 403 
        ]);
    }
}