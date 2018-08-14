<?php
/**
 * This file is part of Swoft.
 *
 * @link    https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\View\Bean\Annotation\View;

/**
 * Class pController
 * @Controller(prefix="/p")
 *
 * @package App\Controllers
 */
class pController
{
    /**
     * userList
     * @RequestMapping(route="user-list",method={RequestMethod::GET})
     * @View(template="demo/userList")
     *
     * @author yangyi
     *
     * @return array
     */
    public function userList()
    {
        return [];
    }
}
