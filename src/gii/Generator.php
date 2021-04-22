<?php

namespace r2am9d\rule\gii;

use Yii;
use yii\rbac\Rule;
use yii\gii\CodeFile;

/**
 * This generator will generate a rule.
 * 
 * @author Ram Delatina <ram.delatina.29@gmail.com>
 */
class Generator extends \yii\gii\Generator
{
    public $ruleClass;
    public $ns = 'app\rules';
    public $baseClass = Rule::class;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Rule Generator';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'This generator generates a Rule class.';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['ruleClass', 'ns', 'baseClass'], 'trim'],
            [['ruleClass', 'ns', 'baseClass'], 'required'],
            ['ruleClass', 'match', 'pattern' => '/^\w+$/', 'message' => 'Only word characters are allowed.'],
            ['ruleClass', 'validateRuleClass'],
            ['ns', 'validateNamespace'],
            ['baseClass', 'validateClass'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'ruleClass' => 'Rule Class',
            'ns' => 'Namespace',
            'baseClass' => 'Base Class',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return array_merge(parent::hints(), [
            'ruleClass' => 'This is the name of the Rule class to be generated, e.g., <code>SomeRule</code>.',
            'ns' => 'This is the namespace of the Rule class to be generated.',
            'baseClass' => 'This is the class that the new Rule class will extend from.',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function stickyAttributes()
    {
        return array_merge(parent::stickyAttributes(), ['ns', 'baseClass']);
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates()
    {
        return ['rule.php'];
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $params = [];
        $params['ruleClass'] = $this->ruleClass;
        $params['ns'] = $this->ns;
        $params['baseClass'] = '\\' . ltrim($this->baseClass, '\\');

        $ruleFile = new CodeFile(
            Yii::getAlias('@' . str_replace('\\', '/', $this->ns)) . '/' . $this->ruleClass . '.php',
            $this->render('rule.php', $params)
        );

        return [$ruleFile];
    }

    /**
     * Validates the rule class.
     *
     * @param string $attribute rule attribute name.
     */
    public function validateRuleClass($attribute)
    {
        if ($this->isReservedKeyword($this->$attribute)) {
            $this->addError($attribute, 'Class name cannot be a reserved PHP keyword.');
        }
    }

    /**
     * Validates the namespace.
     *
     * @param string $attribute Namespace attribute name.
     */
    public function validateNamespace($attribute)
    {
        $value = $this->$attribute;
        $value = ltrim($value, '\\');
        $path = Yii::getAlias('@' . str_replace('\\', '/', $value), false);
        if ($path === false) {
            $this->addError($attribute, 'Namespace must be associated with an existing directory.');
        }
    }
}
