<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Attitude]].
 *
 * @see \app\models\Attitude
 */
class AttitudeQuery extends \yii\db\ActiveQuery
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
     * @return \app\models\Attitude[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Attitude|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
