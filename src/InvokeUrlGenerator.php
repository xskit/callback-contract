<?php
/**
 * Created by PhpStorm.
 * User: Xingshun <250915790@qq.com>
 * Date: 2019/6/2
 * Time: 17:34
 */

namespace XsKit\Callback;


use XsKit\Callback\Contracts\InvokeUrlEntityContract;

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
     * @param InvokeUrlEntityContract $invokeUrl
     * @return $this
     */
    public function setAckInvokeUrl(InvokeUrlEntityContract $invokeUrl)
    {
        $this->ackInvokeUrl = $invokeUrl;

        return $this;
    }

    public abstract function getInvokeUrlEntity(): InvokeUrlEntity;

    public abstract function setQuery($value);

    public abstract function setParam(array $value);

    public abstract function setMethod(string $value);

    public abstract function setUserId($value);

    public abstract function setBizId($value);

    public abstract function setType(int $value);

    public abstract function setOptions(array $value = []);
}