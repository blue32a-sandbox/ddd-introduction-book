<?php
// リポジトリのインターフェースを参照する
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    // ...
}
