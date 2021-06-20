<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\mongodb\Query;
use app\models\Symbol;

class SiteController extends Controller
{
    private function getTree($text) {
      //return [[0, 0, -1, 1], [0, 0, 1, 1], [[0, 0, -0.5, 1], [0, 0, 0.5, 1]]];
      $symbolClass = new Symbol();
      $transforms = [];
      foreach (str_split($text) as $symbol) {
        $transforms[] = $symbolClass->get($symbol);
      }
      return $transforms;
    }

    public function actionIndex()
    {
        $text = strtolower(Yii::$app->request->post('text'));

        $tree = $this->getTree($text ?? 'helloworld');

        return $this->render('index', ['tree' => $tree, 'text' => $text]);
    }
}
