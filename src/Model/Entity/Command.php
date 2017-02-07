<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Command Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $pharmacy_id
 * @property float $amount
 * @property string $status
 * @property string $comment
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Pharmacy $pharmacy
 * @property \App\Model\Entity\Contribution[] $contributions
 */
class Command extends Entity
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
        'id' => false
    ];
}
