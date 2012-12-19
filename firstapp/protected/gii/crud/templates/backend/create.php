<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
?>
$this->breadcrumbs=array();

$this->sidebarTop = array(
    'label' => Yii::t('BackEnd', '<?php echo $this->modelClass;?>'),
    'link' => Yii::app()->createUrl('<?php echo $this->class2id($this->modelClass);?>/index')
);

$this->moduleName = "<?php echo $this->modelClass ?>";

$this->menu=array(
	array('label'=>Common::icon('list'), 'url'=>array('index'), 'visible'=>!UserAccess::checkAccess('<?php echo $this->modelClass;?>Admin')),
	array('label'=>Common::icon('manager'), 'url'=>array('admin'), 'visible'=>UserAccess::checkAccess('<?php echo $this->modelClass;?>Admin')),
    array('label'=>Common::icon('save'), 'url'=>'javascript:void(0)', 'linkOptions'=>array('onclick'=>'document.getElementById(\'<?php echo $this->class2id($this->modelClass)?>-form\').submit()')),
    array('label'=>Common::icon('reset'), 'url'=>'javascript:void(0)', 'linkOptions'=>array('onclick'=>'document.getElementById(\'<?php echo $this->class2id($this->modelClass) ?>-form\').reset()')),
);

$this->slidebar=array(
	array('label'=>Yii::t('BackEnd','Basic Infomation'), 'name'=>'basic-info', 'rel'=>'<?php echo $this->modelClass; ?>-basic-info'),
);

$this->title = Common::icon('create').' '. Yii::t('BackEnd',"<?php echo $this->modelClass; ?>");
?>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
