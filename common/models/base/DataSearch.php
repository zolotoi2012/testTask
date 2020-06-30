<?php
declare(strict_types = 1);

namespace common\models\base;

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
class DataSearch extends \yii\db\ActiveRecord
{
    const ID = 'id';
    const INTERNAL_ID = 'internal_id';
    const LAST_MODIFY = 'last_modify';
    const REGULATOR = 'regulator';
    const BASE_MODEL = 'base-model';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%data}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'internal_id'], 'required'],
            [[self::ID, self::INTERNAL_ID, self::REGULATOR, self::LAST_MODIFY], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            self::ID => 'ID',
            self::INTERNAL_ID => 'Internal ID',
            self::REGULATOR => 'Regulator',
            self::LAST_MODIFY => 'Last Modify',
        ];
    }
}