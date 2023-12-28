<?php
// サークルを生成する
$circle = new Circle(
    $user->id, // ゲッターによりユーザのIDを取得
    new CircleName('my circle')
);
