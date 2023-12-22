<?php
// ユーザのドメインサービス
class UserService
{
    public function __construct(private readonly IUserRepository $userRepository)
    {
    }

    public function exsits(User $user): bool
    {
        $duplicatedUser = $this->userRepository->find($user->getName());

        return $duplicatedUser !== null;
    }
}
