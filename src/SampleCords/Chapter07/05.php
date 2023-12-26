<?php
// インメモリのリポジトリをコンストラクタで生成する
class UserApplicationService
{
    private readonly IUserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new InMemoryUserRepository();
    }

    // ...
}
