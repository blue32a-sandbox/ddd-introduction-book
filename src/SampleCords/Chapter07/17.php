<?php
// IoC Containerを利用して依存関係を解決させる

// IoC Container（PHP-DI）
$container = new Container();
// 依存解決の設定を登録する
$container->set(IUserRepository::class, new InMemoryUserRepository());

// インスタンスはIoC Container経由で取得する
$userApplicationService = $container->get(UserApplicationService::class);
