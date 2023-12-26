<?php
// テストを行うための準備
$serviceLocator->addInstance(IUserRepository::class, new InMemoryUserRepository());
$userApplicationService = new UserApplicationService($serviceLocator);
