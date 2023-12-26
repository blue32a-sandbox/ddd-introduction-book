<?php
// 事前にインスタンスを登録する
$serviceLocator->addInstance(IUserRepository::class, new InMemoryUserRepository());
