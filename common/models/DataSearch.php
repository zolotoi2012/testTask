<?php
declare(strict_types = 1);

namespace common\models;

use common\models\base\DataSearch as BaseDataSearch;
use Yii;

/**
 * This is the model class for table "{{%data}}".
 *
 * @property string $id
 * @property string $internal_id
 * @property string $last_modify
 * @property string $regulator
 * @property int $is_planned
 * @property string $parent_regulator
 * @property bool $regions
 */
class DataSearch extends BaseDataSearch
{
    const FRONTEND = 'frontend';

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(),
            [
                self::ID => 'ID',
                self::INTERNAL_ID => 'Internal ID',
                self::REGULATOR => 'Regulator',
                self::LAST_MODIFY => 'Last Modify',
            ]
        );
    }
}