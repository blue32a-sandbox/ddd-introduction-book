<?php
// ユーザ作成処理をテストする
$userRepository = new InMemoryUserRepository();
$program = new Program($userRepository);
$program->createUser('nrs');

$head = reset($userRepository->store);
assert('nrs' === $head->name->value);
