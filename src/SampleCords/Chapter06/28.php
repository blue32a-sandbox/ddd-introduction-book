<?php
// ドメインサービスを利用するようにしたユーザ情報更新処理
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    // ...

    public function update(UserUpdateCommand $command): void
    {
        $targetId = new UserId($command->id);
        $user = $this->userRepository->find($targetId);

        if ($user === null) {
            throw new UserNotFoundException($targetId);
        }

        $name = $command->name;
        if ($name !== null) {
            $newUserName = new UserName($name);
            $user->changeName($newUserName);
            if ($this->userService->exists($user)) {
                throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
            }
        }

        $mailAddress = $command->mailAddress;
        if ($mailAddress !== null) {
            $newMailAddress = new MailAddress($mailAddress);
            $user->changeMailAddress($newMailAddress);
        }

        $this->userRepository->save($user);
    }
}
