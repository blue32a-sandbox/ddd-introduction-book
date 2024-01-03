<?php
// ユーザ名の変更はUserオブジェクトに依頼する
$userName = new UserName('NewName');

// NG
$user->name = $userName;

// OK
$user->changeName($userName);
