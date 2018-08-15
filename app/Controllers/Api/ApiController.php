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
use Swoft\Bean\Annotation\Number;
use Swoft\Bean\Annotation\Strings;
use Swoft\Bean\Annotation\ValidatorFrom;
use Swoft\Db\Db;
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
     * @RequestMapping(route="new-user",method={RequestMethod::POST})
     * @Strings(name="name",min=3,max=5)
     *
     * @author yangyi
     *
     * @param Request $request
     *
     * @return array
     * @throws \Swoft\Db\Exception\DbException
     */
    public function newUser(Request $request)
    {
        Db::beginTransaction();
        try {
            $newUser = new AppUser();
            $newUser->setUserName($request->post('name'));
            $id = $newUser->save()->getResult();
        } catch (\Throwable $e) {
            Db::rollback();
        }
        Db::commit();

        return ['id' => $id, 'name' => $newUser->getUserName()];
    }

    /**
     * userList
     * @RequestMapping(route="user-list",method={RequestMethod::GET})
     * @Number(from=ValidatorFrom::GET, name="page", default=1)
     *
     * @author yangyi
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function userList(Request $request)
    {
        return [
            'data'  => AppUser::query()
                ->orderBy('id', QueryBuilder::ORDER_BY_DESC)
                ->limit(5, ($request->query('page') - 1) * 5)
                ->get(['user_name'])
                ->getResult(),
            'count' => AppUser::count()->getResult(),
        ];
    }

    /**
     * userList2
     * @RequestMapping(route="user-list2/{page}")
     * @Number(from=ValidatorFrom::PATH, name="page")
     *
     * @param int $page
     *
     * @return array
     * @author yangyi
     */
    public function userList2(int $page)
    {
        return AppUser::query()
            ->orderBy('id', QueryBuilder::ORDER_BY_DESC)
            ->limit(5, ($page - 1) * 5)
            ->get(['user_name'])
            ->getResult();
    }

    public function redisSet()
    {
        cache()->set('aaa', 'bbb', 5);

        return '';
    }

    public function redisGet()
    {
        return cache('aaa');
    }
}
