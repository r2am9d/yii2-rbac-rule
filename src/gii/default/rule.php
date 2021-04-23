<?php
/**
 * @var string $ns
 * @var string $ruleClass
 * @var string $baseClass
 * @var \yii\web\View $this
 * @var \yii\queue\gii\Generator $generator
 */

/** @link split-camelcase-word-into-words-with-php-preg-match-regular-expression#23028424 */
function splitCamelCase($input) {
    return preg_split(
        '/(^[^A-Z]+|[A-Z][^A-Z]+)/',
        $input, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
    );
}

$name = implode('-', array_map(
    function($w) { return strtolower($w); },
    array_filter(
        \splitCamelCase($ruleClass),
        function($w) { return !(strpos($w, 'Rule') !== false); }
    )
));

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
