<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Hobby]].
 *
 * @see \app\models\Hobby
 */
class HobbyQuery extends \yii\db\ActiveQuery
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
     * @return \app\models\Hobby[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Hobby|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
