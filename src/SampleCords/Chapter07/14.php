<?php
// 依存を注入する
$userRepository = new InMemoryUserRepository();
$userApplicationService = new UserApplicationService($userRepository);
