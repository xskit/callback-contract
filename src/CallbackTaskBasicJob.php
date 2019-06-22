<?php
/**
 * Created by PhpStorm.
 * User: Yxs <250915790@qq.com>
 * Date: 2019/5/27
 * Time: 16:05
 */

namespace XsKit\CallbackClient;

use XsKit\CallbackClient\Contracts\AckUrlContract;
use XsKit\LaravelRabbitMQ\Contracts\PublishJobContract;

/**
 * 队列作业 基类
 * Class CallbackTaskJob
 * @package XsKit\CallbackClient
 */
class CallbackTaskBasicJob extends PublishJobContract
{

    public $method;

    public $query;

    public $body;

    public $type;

    public $userId;

    public $bizId;

    /**
     * @var string
     */
    public $ackInvokeUrl;

    /**
     * CallbackTaskJob constructor.
     * @param InvokeUrlGenerator $urlGenerator
     */
    public function __construct(InvokeUrlGenerator $urlGenerator)
    {
        $this->connection = 'rabbitmq';

        $this->query = 'api_callback.client';

        $invokeUrl = $urlGenerator->getInvokeUrlEntity();

        $this->method = $invokeUrl->method();

        $this->query = $invokeUrl->query();

        $this->body = $invokeUrl->body();

        $this->type = $invokeUrl->type();

        $this->bizId = $invokeUrl->bizId();

        $this->userId = $invokeUrl->userId();

        if ($invokeUrl instanceof AckUrlContract) {
            $this->ackInvokeUrl = $invokeUrl->ackInvokeUrl();
        }

    }


}