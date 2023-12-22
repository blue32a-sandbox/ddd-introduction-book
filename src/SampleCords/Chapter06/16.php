<?php
// 更新項目を増やす
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    // ...

    // メールアドレスを引数で受け取る
    public function update(string $userId, string $name = null, string $mailAddress = null): void
    {
        $targetId = new UserId($userId);
        $user = $this->userRepository->find($targetId);

        if ($user === null) {
            throw new UserNotFoundException($targetId);
        }

        // メールアドレスだけを更新するため、ユーザ名が指定されていないことを考慮
        if ($name !== null) {
            $newUserName = new UserName($name);
            $user->changeName($newUserName);
            if ($this->userService->exists($user)) {
                throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
            }
        }

        // メールアドレスを変更できるように
        if ($mailAddress !== null) {
            $newMailAddress = new MailAddress($mailAddress);
            $user->changeMailAddress($newMailAddress);
        }

        $this->userRepository->save($user);
    }
}
