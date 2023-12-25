<?php
// ユーザ情報更新処理においても重複確認を行う必要がある
class UserApplicationService
{
    public function __construct(
        private readonly IUserRepository $userRepository
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
            // 重複確認を行うコード
            $newUserName = new UserName($name);
            $duplicatedUser = $this->userRepository->findByUserName($userName);
            if ($duplicatedUser !== null) {
                throw new CanNotRegisterUserException($userName, 'ユーザは既に存在しています。');
            }
            $user->changeName($newUserName);
        }

        $mailAddress = $command->mailAddress;
        if ($mailAddress !== null) {
            $newMailAddress = new MailAddress($mailAddress);
            $user->changeMailAddress($newMailAddress);
        }

        $this->userRepository->save($user);
    }
}
