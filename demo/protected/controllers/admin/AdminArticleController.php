<?php
Class AdminArticleController extends Controller {
    public $layout = 'main';
    public function actionAdd() {
        $this->render('add');
    }

    public function actionIndex() {
        $this->render('index');
    }
}