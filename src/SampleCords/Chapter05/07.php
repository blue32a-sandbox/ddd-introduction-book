<?php
// リスト5.6を利用するとドメインサービスが主体とならない
class UserService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    public function exists(User $user): bool
    {
        // ユーザ名により重複確認を行うという知識は失われている
        return $this->userRepository->exists($user);
    }
}
