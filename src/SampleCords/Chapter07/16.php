<?php
// テストがコンパイルエラーになる
$userRepository = new InMemoryUserRepository();
// 第２引数にIFooRepositoryの実体が渡されていないためコンパイルエラーとなる
$userApplicationService = new UserApplicationService($userRepository);
