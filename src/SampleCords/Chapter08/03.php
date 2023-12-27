<?php
// リポジトリを差し替える
class Program
{
    private static Container $container;

    // ...

    private static function startup(): void
    {
        $container = new Container();
        $container->set(IUserRepository::class, new UserRepository());

        self::$container = $container;
    }
}
