<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Experience]].
 *
 * @see \app\models\Experience
 */
class ExperienceQuery extends \yii\db\ActiveQuery
{
    /**
     *
     */
    public function current()
    {
        return $this->addOrderBy('from ASC');
    }

    /**
     * @inheritdoc
     * @return \app\models\Experience[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Experience|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
