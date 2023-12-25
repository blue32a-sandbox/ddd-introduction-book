<?php
// ユーザ登録処理に変更を加える
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    // ...

    public function register(string $name, string $rawMailAddress): void
    {
        // メールアドレスによる重複確認を行うように変更された
        $mailAddress = new MailAddress($rawMailAddress);
        $duplicatedUser = $this->userRepository->findByMailAddress($mailAddress);
        if ($duplicatedUser !== null) {
            throw new CanNotRegisterUserException($mailAddress);
        }

        $userName = new UserName($name);
        $user = User::craete($userName, $mailAddress);

        $this->userRepository->save($user);
    }
}
