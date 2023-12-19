<?php
// リポジトリを利用したドメインサービスの実装
class UserService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    public function exists(User $user): bool
    {
        $found = $this->userRepository->find($user->name);

        return $found != null;
    }
}
