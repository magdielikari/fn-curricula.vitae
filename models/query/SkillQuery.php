<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Skill]].
 *
 * @see \app\models\Skill
 */
class SkillQuery extends \yii\db\ActiveQuery
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
     * @return \app\models\Skill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Skill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
