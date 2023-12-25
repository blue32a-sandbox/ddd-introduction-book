<?php
// アプリケーションサービスに重複に関するルールが記述されているユーザ登録処理
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    // ...

    public function register(string $name): void
    {
        // 重複確認を行うコード
        $userName = new UserName($name);
        $duplicatedUser = $this->userRepository->findByUserName($userName);
        if ($duplicatedUser !== null) {
            throw new CanNotRegisterUserException($userName, 'ユーザは既に存在しています。');
        }

        $user = User::craete($userName);
        $this->userRepository->save($user);
    }
}
