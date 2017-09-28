<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Academic]].
 *
 * @see \app\models\Academic
 */
class AcademicQuery extends \yii\db\ActiveQuery
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
     * @return \app\models\Academic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Academic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
