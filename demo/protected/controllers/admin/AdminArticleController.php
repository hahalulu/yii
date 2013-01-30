<?php
Class AdminArticle extends Controller {
    public $layout = 'column1';
    public function actionAdd() {
        $this->render('add');
    }
}