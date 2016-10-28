<?php
namespace Stories\Model\Entity;

use Cake\ORM\Entity;

/**
 * Story Entity.
 *
 * @property int $id
 * @property string $controller
 * @property string $action
 * @property int $ip
 * @property int $user_id
 * @property string $level
 * @property string $webroot
 * @property string $currentpath
 * @property string $plugin
 */
class Story extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];


    public function _getConvertedIp()
    {
        return long2ip($this->ip);
    }
}
