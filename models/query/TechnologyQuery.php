<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Technology]].
 *
 * @see \app\models\Technology
 */
class TechnologyQuery extends \yii\db\ActiveQuery
{
    /*
     *
     */
    public function current()
    {
        return $this->addOrderBy('order ASC');
    }

    /**
     * @inheritdoc
     * @return \app\models\Technology[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Technology|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
