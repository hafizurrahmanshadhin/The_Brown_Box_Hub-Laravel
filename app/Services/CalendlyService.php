<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class CalendlyService {
    protected $client;
    protected $userUri;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'https://api.calendly.com/',
            'headers'  => [
                'Authorization' => 'Bearer ' . config('services.calendly.token'),
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ],
        ]);

        // Cache the user URI for 24 hours
        $this->userUri = Cache::remember('calendly_user_uri', 60 * 60 * 24, function () {
            return $this->getUserUri();
        });
    }

    protected function getUserUri() {
        try {
            $response = $this->client->get('users/me');
            $data     = json_decode($response->getBody(), true);
            return $data['resource']['uri'];
        } catch (RequestException $e) {
            // Handle API errors
            throw $e;
        }
    }

    public function getScheduledEvents($pageToken = null) {
        try {
            $query = [
                'user'  => $this->userUri,
                'count' => 5, // Fetch only the 5 most recent events
                'sort' => 'start_time:desc',
            ];

            if ($pageToken) {
                $query['page_token'] = $pageToken;
            }

            $response = $this->client->get('scheduled_events', [
                'query' => $query,
            ]);
            $data = json_decode($response->getBody(), true);

            // Fetch invitee details for each event
            foreach ($data['collection'] as &$event) {
                $event['invitees'] = $this->getEventInvitees($event['uri']);
            }

            return $data;
        } catch (RequestException $e) {
            // Handle API errors
            throw $e;
        }
    }

    protected function getEventInvitees($eventUri) {
        $cacheKey = 'calendly_event_invitees_' . md5($eventUri);

        return Cache::remember($cacheKey, 60 * 60, function () use ($eventUri) {
            try {
                $response = $this->client->get('event_invitees', [
                    'query' => [
                        'event' => $eventUri,
                    ],
                ]);
                $data = json_decode($response->getBody(), true);
                return $data['collection'];
            } catch (RequestException $e) {
                // Handle API errors
                return [];
            }
        });
    }
}
