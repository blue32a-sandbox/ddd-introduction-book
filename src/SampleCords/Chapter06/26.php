<?php
// ユーザ情報更新処理も同様に重複確認のロジックを修正する必要がある
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
            // ユーザ名での重複確認はなくなる
            $newUserName = new UserName($name);
            $user->changeName($newUserName);
        }

        $mailAddress = $command->mailAddress;
        if ($mailAddress !== null) {
            // メールアドレスで重複確認を行うようになる
            $newMailAddress = new MailAddress($mailAddress);
            $duplicatedUser = $this->userRepository->findByMailAddress($newMailAddress);
            if ($duplicatedUser !== null) {
                throw new CanNotRegisterUserException($newMailAddress);
            }
            $user->changeMailAddress($newMailAddress);
        }

        $this->userRepository->save($user);
    }
}
