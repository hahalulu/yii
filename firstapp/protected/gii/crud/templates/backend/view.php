<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
?>

$this->breadcrumbs=array();

$this->sidebarTop = array(
    'label' => Yii::t('BackEnd', '<?php echo $this->modelClass;?>'),
    'link' => Yii::app()->createUrl('<?php echo $this->class2id($this->modelClass);?>/index')
);

$this->moduleName = "<?php echo $this->modelClass ?>";

$this->menu=array(
    array('label'=>Common::icon('create'), 'url'=>array('create'), 'visible'=>UserAccess::checkAccess('<?php echo $this->modelClass;?>Create')),
	array('label'=>Common::icon('update'), 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>), 'visible'=>UserAccess::checkAccess('<?php echo $this->modelClass;?>Update')),
	array('label'=>Common::icon('delete'), 'url'=>'#', 'visible'=>UserAccess::checkAccess('<?php echo $this->modelClass;?>Delete'), 'linkOptions'=>array('csrf'=>Yii::app()->request->enableCsrfValidation, 'submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>Yii::t('application', 'Are you sure you want to delete this item?'))),
	array('label'=>Common::icon('list'), 'url'=>array('index'), 'visible'=>!UserAccess::checkAccess('<?php echo $this->modelClass;?>Admin')),
	array('label'=>Common::icon('manager'), 'url'=>array('admin'), 'visible'=>UserAccess::checkAccess('<?php echo $this->modelClass;?>Admin')),
);

$this->slidebar=array(
	array('label'=>Yii::t('BackEnd','Basic Infomation'), 'name'=>'basic-info', 'rel'=>'<?php echo $this->modelClass; ?>-basic-info'),
);

$this->title = Common::icon('title') .'#'. <?php echo "\$model->{$nameColumn}"; ?>;
?>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
