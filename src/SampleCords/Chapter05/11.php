<?php
// リポジトリをProgramクラスに引き渡す
$userRepository = new UserRepository();
$program = new Program($userRepository);
$program->createUser('naruse');
