<?php
namespace App\Models\Entity;

use Swoft\Db\Model;
use Swoft\Db\Bean\Annotation\Column;
use Swoft\Db\Bean\Annotation\Entity;
use Swoft\Db\Bean\Annotation\Id;
use Swoft\Db\Bean\Annotation\Required;
use Swoft\Db\Bean\Annotation\Table;

/**
 * App用户表

 * @Entity()
 * @Table(name="app_user")
 * @uses      AppUser
 */
class AppUser extends Model
{
    /**
     * @var int $id 
     * @Id()
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string $userName 用户名
     * @Column(name="user_name", type="string", length=50)
     * @Required()
     */
    private $userName;

    /**
     * @param int $value
     * @return $this
     */
    public function setId(int $value)
    {
        $this->id = $value;

        return $this;
    }

    /**
     * 用户名
     * @param string $value
     * @return $this
     */
    public function setUserName(string $value): self
    {
        $this->userName = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 用户名
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

}
