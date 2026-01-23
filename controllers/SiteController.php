<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex(): string
    {
        $total = (int)Yii::$app->db->createCommand('SELECT COUNT(*) FROM student')->queryScalar();
        $pages = new Pagination(['totalCount' => $total, 'defaultPageSize' => 5]);
        $offset = (int)$pages->offset;
        $limit = (int)$pages->pageSize;
        $students = Yii::$app->db
            ->createCommand("SELECT id, name, age, gender, created_at FROM student LIMIT $offset, $limit")
            ->queryAll();

        return $this->render('index', ['students' => $students, 'pages' => $pages]);
    }
}
