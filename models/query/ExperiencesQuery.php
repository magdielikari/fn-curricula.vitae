<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Experiences]].
 *
 * @see \app\models\Experiences
 */
class ExperiencesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     *
     */
    public function order()
    {
        return $this->addOrderBy('order ASC');
    }

    /**
     * @inheritdoc
     * @return \app\models\Experiences[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Experiences|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
