<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Post;

class PostController extends Controller
{
    public function actionIndex()
    {
        // Create a query to find all posts
        $query = Post::find();

        // Setup pagination (5 posts per page)
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        // Get the data for the current page
        $posts = $query->orderBy('title')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        // Send data to the view
        return $this->render('index', [
            'posts' => $posts,
            'pagination' => $pagination,
        ]);
    }
}