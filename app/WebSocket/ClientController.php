<?php
/**
 * Created by PhpStorm.
 * User: yangyi
 * Date: 18-8-9
 * Time: 上午9:38
 */

namespace App\WebSocket;

use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\View\Bean\Annotation\View;

/**
 * Class ClientController
 *
 * @package App\WebSocket
 * @Controller(prefix="/ws")
 */
class ClientController
{
    /**
     * index
     * @RequestMapping(route="index")
     * @View(template="demo/client")
     *
     * @author yangyi
     * @return array
     */
    public function index()
    {
        return [];
    }

    /**
     * login
     * @RequestMapping(route="login")
     * @View(template="demo/login")
     *
     * @author yangyi
     * @return array
     */
    public function login()
    {
        return [];
    }

    /**
     * send
     * @RequestMapping(route="send")
     *
     * @author yangyi
     *
     * @param Request $request
     *
     * @return void
     */
    public function send(Request $request){
        \Swoft::$server->sendToAll($request->query('aaa',123));
    }
}