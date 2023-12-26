<?php
// プロダクション用のリポジトリに差し替える
class UserApplicationService
{
    private readonly IUserRepository $userRepository;

    public function __construct()
    {
        // $this->userRepository = new InMemoryUserRepository();
        $this->userRepository = new UserRepository();
    }

    // ...
}
