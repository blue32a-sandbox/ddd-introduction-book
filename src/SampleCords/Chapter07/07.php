<?php
// ServiceLocatorを適用する
class UserApplicationService
{
    private readonly IUserRepository $userRepository;

    public function __construct($serviceLocator)
    {
        // ServiceLocator経由でインスタンスを取得する
        $this->userRepository = $serviceLocator->get(IUserRepository::class);
    }

    // ...
}
