<?php
Class PageController extends Controller {
    public $layout = 'column1';
    public function actionIndex () {

        $this->render('index');
    }
}