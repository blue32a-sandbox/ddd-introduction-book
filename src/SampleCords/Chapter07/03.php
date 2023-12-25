<?php
// UserApplicationSerivceの依存関係に着目
class UserApplicationService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    // ...
}
