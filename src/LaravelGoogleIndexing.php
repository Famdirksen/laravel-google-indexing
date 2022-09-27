<?php

namespace Famdirksen\LaravelGoogleIndexing;

use Google_Client;
use Google_Service_Indexing;
use Google_Service_Indexing_UrlNotification;

class LaravelGoogleIndexing
{
    /** @var Google_Client */
    private $googleClient;

    /** @var Google_Service_Indexing */
    private $indexingService;

    public function __construct()
    {
        $this->googleClient = new Google_Client();

        $this->googleClient->setAuthConfig(config('laravel-google-indexing.google.auth_config'));

        foreach (config('laravel-google-indexing.google.scopes', []) as $scope) {
            $this->googleClient->addScope($scope);
        }

        $this->indexingService = new Google_Service_Indexing($this->googleClient);
    }

    public static function create(): self
    {
        return new static();
    }

    public function status(string $url)
    {
        return $this->indexingService
            ->urlNotifications
            ->getMetadata([
                'url' => urlencode($url),
            ]);
    }

    public function update(string $url)
    {
        return $this->publish($url, 'URL_UPDATED');
    }

    public function delete(string $url)
    {
        return $this->publish($url, 'URL_DELETED');
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

    /**
     * @param array $urls=[['URL_UPDATED'=>'https://www.site.com'],['URL_DELETED'=>'https://www.site.com/deleted-url']]
     * @return mixed
     */
    public function multiplePublish(array $urls){
        $batch=$this->indexingService->createBatch();
        $postBdoy = new Google_Service_Indexing_UrlNotification();
        foreach ($urls as $key => $url) {
            $postBdoy->setUrl($key);
            $postBdoy->setType($url);
            $batch->add($this->indexingService->urlNotifications->publish($postBdoy));
        }
        $results = $batch->execute();
        return $results;
        
    }
}
