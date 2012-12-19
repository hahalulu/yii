<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
    /**
     * @var string the default layout for the controller view. Defaults to 'application.views.layouts.column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='application.views.front.layouts.main';
    public $breadcrumbs = array();
    public $search = '';
    protected $htmlMetadata= null;

    public function init() {
        $this->htmlMetadata = new stdClass();
        $this->htmlMetadata->title = Yii::app()->params['htmlMetadata']['title'];
        $this->htmlMetadata->keywords = Yii::app()->params['htmlMetadata']['keywords'];
        $this->htmlMetadata->description = Yii::app()->params['htmlMetadata']['description'];
        
        if (!isset(Yii::app()->session['_lang'])) {
            Yii::app()->session['_lang'] = Yii::app()->params['defaultLanguage'];
        }

        Yii::app()->language = Yii::app()->session['_lang'];

        //Update breadcrumbs
        $this->breadcrumbs[] = array(Yii::t('FrontEnd', 'Home')=>Yii::app()->createUrl('/'));

        return parent::init();
    }

    public function  render($view, $data = null, $return = false) {
        if($this->htmlMetadata->title){
            //$this->htmlMetadata->title .= ' - '.Yii::app()->name;
            $this->pageTitle = $this->htmlMetadata->title;
        }
        parent::render($view, $data, $return);
    }

    public function createFriendlyUrl($params){
        return $this->createUrl('', $params);
    }

}