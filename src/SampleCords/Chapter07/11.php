<?php
// リスト7.10のコンストラクタ
class UserApplicationService
{
    private readonly IUserRepository $userRepository;

    public function __construct($serviceLocator)
    {
        // IUserRepositoryの依存解決先が設定されていないのでエラーを起こす
        $this->userRepository = $serviceLocator->get(IUserRepository::class);
    }

    // ...
}
