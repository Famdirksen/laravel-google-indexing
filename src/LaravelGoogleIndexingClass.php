<?php

namespace Famdirksen\LaravelGoogleIndexing;

use Google_Client;
use Google_Service_Indexing;
use Google_Service_Indexing_UrlNotification;

class LaravelGoogleIndexingClass
{
    /** @var Google_Client $googleClient */
    private $googleClient;

    /** @var Google_Service_Indexing $indexingService */
    private $indexingService;

    public function __construct(Google_Client $googleClient)
    {
        $this->googleClient = $googleClient;

        $this->googleClientSetup();
    }

    private function googleClientSetup() {
        $this->googleClient->setAuthConfig(config('laravel-google-indexing.google.auth_config'));
        $this->indexingService = new Google_Service_Indexing($this->googleClient);
    }

    public function status(string $url) {
        return $this->indexingService
            ->urlNotifications
            ->getMetadata([
                "url" => urlencode($url)
            ]);
    }

    public function update(string $url)
    {
        return $this->publish($url, "URL_UPDATED");
    }

    public function remove(string $url)
    {
        return $this->publish($url, "URL_DELETED");
    }

    private function publish(string $url, string $action)
    {
        $urlNotification = new Google_Service_Indexing_UrlNotification();

        $urlNotification->setUrl($url);
        $urlNotification->setType($action);

        return $this->indexingService
            ->urlNotifications
            ->publish($urlNotification);
    }
}
