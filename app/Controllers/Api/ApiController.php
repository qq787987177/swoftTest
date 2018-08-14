<?php
/**
 * This file is part of Swoft.
 *
 * @link    https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers\Api;

use App\Models\Entity\AppUser;
use Swoft\Db\QueryBuilder;
use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

/**
 * Class ApiController
 * @Controller(prefix="/api")
 *
 * @package App\Controllers
 */
class ApiController
{
    /**
     * newUser
     * @RequestMapping(route="new-user",method={RequestMethod::GET})
     *
     * @author yangyi
     *
     * @param Request $request
     *
     * @return array
     */
    public function newUser(Request $request)
    {
        $newUser = new AppUser();
        $newUser->setUserName($request->query('name'));
        $id = $newUser->save()->getResult();

        return ['id' => $id, 'name' => $request->query('name')];
    }

    /**
     * userList
     * @RequestMapping(route="user-list",method={RequestMethod::GET})
     *
     * @author yangyi
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function userList(Request $request)
    {
        return AppUser::query()
            ->orderBy('id', QueryBuilder::ORDER_BY_ASC)
            ->limit(5, ($request->query('page') - 1) * 5)
            ->get(['user_name'])
            ->getResult();
    }
}
