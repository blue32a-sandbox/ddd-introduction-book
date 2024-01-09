<?php
// アプリケーション層の住人であるアプリケーションサービス
class UserApplicationService
{
    public function __construct(
        private readonly IUserFactory $userFactory,
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService,
        private readonly PDO $pdo
    ) {
    }

    public function get(UserGetCommand $command): UserGetResult
    {
        $id = new UserId($command->id);
        $user = $this->userRepository->find($id);
        if ($user === null) {
            throw new UserNotFoundException($id, 'ユーザが見つかりませんでした。');
        }

        $data = new UserData($user);

        return new UserGetResult($data);
    }

    public function getAll(): UserGetAllResult
    {
        $users = $this->userRepository->findAll();
        $userModels = array_map(
            fn ($x) => new UserData($x),
            $users
        );

        return new UserGetAllResult($userModels);
    }

    public function register(UserRegisterCommand $command): UserRegisterResult
    {
        $this->pdo->beginTransaction();

        try {
            $userName = new UserName($command->userName);
            $user = $this->userFactory->create($userName);
            if ($this->userService->exists($user)) {
                throw new CanNotRegisterUserException($user, 'ユーザは既に存在しています。');
            }

            $this->userRepository->save($user);
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }

        return new UserRegisterResult($user->id->value);
    }

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

            $this->userRepository->save($user);
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function delete(UserDeleteCommand $command): void
    {
        $this->pdo->beginTransaction();

        try {
            $id = new UserId($command->id);
            $user = $this->userRepository->find($id);
            if ($user === null) {
                return;
            }

            $this->userRepository->delete($user);
            $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
