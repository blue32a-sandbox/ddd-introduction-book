<?php
// 重複チェックの対象をメールアドレスにしてしまった
class UserService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    // ...

    public function exists(User $user): bool
    {
        $duplicated = $this->userRepository->findByMail($user->mail);
        return $duplicated !== null;
    }
}
