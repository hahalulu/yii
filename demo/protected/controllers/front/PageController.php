<?php
Class PageController extends Controller {
    public function actionIndex () {
        echo 'this is fontend';

    }

    public function actionError () {
        $this->render('error');
    }
}