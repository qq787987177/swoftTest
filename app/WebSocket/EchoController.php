<?php
/**
 * This file is part of Swoft.
 *
 * @link    https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\WebSocket;

use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Message\Server\Response;
use Swoft\Redis\Redis;
use Swoft\WebSocket\Server\Bean\Annotation\WebSocket;
use Swoft\WebSocket\Server\HandlerInterface;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/**
 * Class EchoController - This is an controller for handle websocket
 *
 * @package App\WebSocket
 * @WebSocket("")
 */
class EchoController implements HandlerInterface
{
    /**
     * @Inject()
     * @var Redis
     */
    public $redis;

    /**
     * 在这里你可以验证握手的请求信息
     * - 必须返回含有两个元素的array
     *  - 第一个元素的值来决定是否进行握手
     *  - 第二个元素是response对象
     * - 可以在response设置一些自定义header,body等信息
     *
     * @param Request  $request
     * @param Response $response
     *
     * @return array
     * [
     *  self::HANDSHAKE_OK,
     *  $response
     * ]
     */
    public function checkHandshake(Request $request, Response $response): array
    {
        // some validate logic ...

        return [self::HANDSHAKE_OK, $response];
    }

    /**
     * @param Server  $server
     * @param Request $request
     * @param int     $fd
     *
     * @return mixed
     */
    public function onOpen(Server $server, Request $request, int $fd)
    {
        //$this->redis->set($fd, $request->query('token'));
        //$server->push($fd, $this->redis->get($fd));
        //$server->close($fd);
    }

    /**
     * @param Server $server
     * @param Frame  $frame
     *
     * @return mixed
     */
    public function onMessage(Server $server, Frame $frame)
    {
        //\Swoft::$server->sendToAll(json_encode($server->connection_info($frame->fd)));
        \Swoft::$server->sendToAll($frame->data);
        /*if ($frame->data) {
            foreach ($server->connections as $connection) {
                $server->push($connection, $frame->data);
            }
        }*/
    }

    /**
     * @param Server $server
     * @param int    $fd
     *
     * @return mixed
     */
    public function onClose(Server $server, int $fd)
    {
        // do something. eg. record log
    }

}
