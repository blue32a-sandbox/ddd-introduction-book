<?php
// 新たな依存関係を追加する
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        // 新たにIFooRepositoryへの依存関係を追加する
        private readonly IFooRepository $fooRepository
    ) {
    }

    // ...
}
