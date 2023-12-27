<?php
// 依存関係の登録を行う
class Program
{
    private static Container $container;

    public static function main(): void
    {
        self::startup();

        // ...
    }

    private static function startup(): void
    {
        $container = new Container();
        $container->set(IUserRepository::class, new InMemoryUserRepository());

        self::$container = $container;
    }
}
