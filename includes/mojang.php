<?php

require __DIR__ . '/../vendor/autoload.php';

class Mojang
{
    /**
     * @var array
     */
    static array $users = [];

    /**
     * @param string $uuid
     * @return void
     */
    private static function getUser(string $uuid): void
    {
        if (isset(self::$users[$uuid])) {
            return;
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', sprintf('https://api.ashcon.app/mojang/v2/user/%s', $uuid));

        self::$users[$uuid] = json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param string $uuid
     * @return string
     */
    public static function getUsername(string $uuid): string
    {
        static::getUser($uuid);

        return self::$users[$uuid]['username'];
    }
}