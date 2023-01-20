<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Http;
use function url;

class PassportProxy
{
    public function issueAccessToken($username, $password, $provider)
    {
        $params = [
            'grant_type' => 'password',
            'username' => $username,
            'password' => $password
        ];

        return $this->makeRequestToOauthServer($params, $provider);
    }

    public function refreshToken($refreshToken)
    {
        $params = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken
        ];

        return $this->makeRequestToOauthServer($params);
    }

    private function makeRequestToOauthServer($params, $provider = 'users', $type = 'POST')
    {
        $params = array_merge([
            'client_id' => config('passport.' . $provider . '.client_id'),
            'client_secret' => config('passport.' . $provider . '.client_secret'),
            'scope' => '*'
        ], $params);
        $http = Http::send($type, url(config('passport.uri'), [], app()->environment() !== 'local'), ['form_params' => $params]);
        $result = $http->json();
        if (!isset($result['access_token']))
            return false;

        return $result;
    }
}
