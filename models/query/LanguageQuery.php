<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Language]].
 *
 * @see \app\models\Language
 */
class LanguageQuery extends \yii\db\ActiveQuery
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
     * @return \app\models\Language[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Language|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
