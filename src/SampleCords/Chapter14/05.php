<?php
// ユーザアプリケーションサービスのコード
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
        $this->pdo->beginTransaction();

        try {
            $id = new UserId($command->id);
            $user = $this->userRepository->find($id);
            if ($user === null) {
                throw new UserNotFoundException($id);
            }

            if ($command->name !== null) {
                $name = new UserName($command->name);
                $user->changeName($name);

                if ($this->userService->exists($user)) {
                    throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
                }
            }

            // セカンダリポートであるIUserRepositoryの処理を呼び出す
            // 処理は実体であるセカンダリアダプタに映る
            $this->userRepository->save($user);

            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
