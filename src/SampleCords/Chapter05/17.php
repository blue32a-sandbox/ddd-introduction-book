<?php
// ユーザ作成処理をテストする
$userRepocitory = new InMemoryUserRepository();
$program = new Program($userRepocitory);
$program->createUser('nrs');

$head = reset($userRepocitory->store);
assert('nrs' === $head->name->value);
