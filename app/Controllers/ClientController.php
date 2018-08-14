<?php
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\View\Bean\Annotation\View;

// use Swoft\View\Bean\Annotation\View;
// use Swoft\Http\Message\Server\Response;

/**
 * Class ClientController
 * @Controller(prefix="/ws")
 * @package App\Controllers
 */
class ClientController{
    /**
     * @RequestMapping(route="index", method=RequestMethod::GET)
     * @View(template="demo/client")
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
