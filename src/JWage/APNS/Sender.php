<?php

namespace JWage\APNS;

class Sender
{
    /**
     * @var \JWage\APNS\Client
     */
    private $client;

    /**
     * Construct.
     *
     * @param \JWage\APNS\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Sends a safari website push notification to the given deviceToken.
     *
     * @param string $deviceToken
     * @param string $title 
     * @param string $body
     * @param string $deepLink
     */
    public function send($deviceToken, $title, $body, $badge , $deepLink = null )
    {
        return $this->client->sendPayload(
            $deviceToken, $this->createPayload($title, $body, $badge, $deepLink )
        );
    }

    /**
     * Creates a Payload instance.
     *
     * @param string $title
     * @param string $body
     * @param string $deepLink
     * @return \JWage\APNS\Payload
     */
    private function createPayload($title, $body, $badge, $deepLink = null)
    {
        return new Payload($title, $body, $badge, $deepLink);
    }
}
