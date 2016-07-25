<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Response;

class StatCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $storage = app()->make('redis');
        $response = new Response();
        $path = $request->segments();
        $group = (empty($path)) ? 'site' : $path[0];


        // Get Stats
        $agent = new Agent();
        $platform = mb_strtolower($agent->platform());
        $browser = mb_strtolower($agent->browser());
        $ip = $this->getIp();
        $ref = $this->getRef();
        $geo = $this->getGeo($ip);


        // Keys array
        $keys = [
            'platform' => $platform,
            'browser' => $browser, 
            'geo' => $geo, 
            'ref' => $ref
        ];


        // Add hit
        $this->setStat($storage, $group, $keys, 'byhits');


        // If this ip not exist in Redis
        // @todo add date key, for count day unique by ip and cookie
        $ipCheck = $storage->get('ip:' . $ip );

        if (!($ipCheck)){
            $ipCheck = $storage->incr('ip:' . $ip );
            $this->setStat($storage, $group, $keys, 'byip');
        }

        $cookieCheck = $request->cookie('uniqid');
        if (!($cookieCheck)){
            $this->setStat($storage, $group, $keys, 'bycookie');
        }


        return $next($request);
    }


    /**
     * Return IP an incoming request.
     *
     * @return mixed
     */
    public function getIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }


    /**
     * Return Ref an incoming request.
     *
     * @return mixed
     */
    public function getRef()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $ref = parse_url($_SERVER['HTTP_REFERER']);
            $ref = $ref['host'];
        } else {
            $ref = '';
        }

        return mb_strtolower($ref);
    }


    /**
     * Return Ref an incoming request.
     *
     * @param $ip
     * @return mixed
     */
    public function getGeo($ip)
    {
        return $ip;
    }


    /**
     * Return Ref an incoming request.
     *
     * @param $ip
     * @return mixed
     */
    public function setStat($storage, $group, $keys, $by)
    {
        $pipe = $storage->pipeline();
        foreach ($keys as $key => $value) {
            $pipe->incr($group . ':'. $key . ':' . $value . ':' . $by );
        }

        $result = $pipe->execute();

        return $result;
    }
}
