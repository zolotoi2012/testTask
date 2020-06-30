<?php
declare(strict_types=1);

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class DataSearch
 * @package backend\models\search
 */
class DataSearch extends \common\models\DataSearch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'internal_id', 'last_modify', 'regulator'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DataSearch::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'internal_id' => $this->internal_id,
            'last_modify' => $this->last_modify,
        ]);

        $query->andFilterWhere(['ilike', 'regulator', $this->regulator]);

        return $dataProvider;
    }
}