<?php
/**
 * Created by PhpStorm.
 * User: Xingshun <250915790@qq.com>
 * Date: 2019/6/2
 * Time: 17:34
 */

namespace XsKit\CallbackClient;


use XsKit\CallbackClient\Contracts\InvokeUrlContract;

abstract class InvokeUrlGenerator
{
    private static $instance;

    protected $ackInvokeUrl;

    protected $query;

    protected $body = [];

    protected $method = 'POST';

    protected $userId;

    protected $bizId;

    protected $type;

    protected $options;

    /**
     * @return InvokeUrlGenerator
     */
    public static function make()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * 设置应答回执
     * @param InvokeUrlContract $invokeUrl
     * @return $this
     */
    public function setAckInvokeUrl(InvokeUrlContract $invokeUrl)
    {
        $this->ackInvokeUrl = $invokeUrl;

        return $this;
    }

    public abstract function getInvokeUrlEntity(): InvokeUrlEntity;

    public abstract function setQuery($value);

    public abstract function setParam($value);

    public abstract function setMethod($value);

    public abstract function setUserId($value);

    public abstract function setBizId($value);

    public abstract function setType($value);

    public abstract function setOptions($value = []);
}