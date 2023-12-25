<?php
// ドメインサービスを利用するように変更したユーザ登録処理
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    // ...

    public function register(string $name, string $rawMailAddress): void
    {
        $user = User::craete(
            new UserName($name),
            new MailAddress($rawMailAddress)
        );

        // ドメインサービスを利用して重複を確認する
        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
        }

        $this->userRepository->save($user);
    }
}
