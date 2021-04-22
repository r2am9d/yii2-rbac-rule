<?php
/**
 * @var string $ns
 * @var string $ruleClass
 * @var string $baseClass
 * @var \yii\web\View $this
 * @var \yii\queue\gii\Generator $generator
 */
$name = strtolower(str_replace('Rule', '', $ruleClass));
echo "<?php\n";
?>

namespace <?= $ns ?>;

use Yii;

/**
 * Class <?= $ruleClass ?>.
 */
class <?= $ruleClass ?> extends <?= $baseClass ?>

{
    public $name = '<?= $name ?>';

    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
    }
}
