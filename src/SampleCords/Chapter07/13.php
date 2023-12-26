<?php
// UserApplicationServiceに変化が起きた
class UserApplicationService
{
    private readonly IUserRepository $userRepository;
    // 新たなフィールドが追加された
    private readonly IFooRepository $fooRepository;

    public function __construct($serviceLocator)
    {
        $this->userRepository = $serviceLocator->get(IUserRepository::class);
        // ServiceLocator経由で取得している
        $this->fooRepository = $serviceLocator->get(IFooRepository::class);
    }

    // ...
}
