<?php

namespace Hopher\Rpc;

/**
 * 消费者
 */
class Client
{
    private $url;
    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function __call($action, $args)
    {
        $content = json_encode($args);
        $options['http'] = [
            'timeout' => 5,
            'method'  => 'POST',
            'header'  => 'Content-type:application/x-www-form-urlencoded',
            'content' => $content,
        ];

        $context = stream_context_create($options);

        $get = [
            'service' => $this->service,
            'action' => $action
        ];
        $url = $this->url . "?" . http_build_query($get);
        $res = file_get_contents($url, false, $context);

        return json_decode($res, true);
    }
}
