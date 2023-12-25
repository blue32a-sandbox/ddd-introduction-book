<?php
// ドメインサービス上でユーザの重複に関するルールを変更する
class UserService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    // ...

    public function exists(User $user): bool
    {
        // 重複のルールをユーザ名からメールアドレスに変更
        // $duplicatedUser = $this->userRepository->findByUserName($user->name);
        $duplicatedUser = $this->userRepository->findByMailAddress($user->mailAddress);

        return $duplicatedUser !== null;
    }
}
