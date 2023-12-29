<?php
// リスト10.14を利用したユーザ登録処理
class UserApplicationService
{
    public function __construct(
        // ユニットオブワークを保持する
        private readonly UnitOfWork $uow,
        private readonly UserService $userService,
        private readonly IUserFactory $userFactory
    ) {
    }

    public function register(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->name);
        $user = $this->userFactory->create($userName);

        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user);
        }

        // ユニットオブワークが保持するリポジトリに永続化を依頼
        $this->uow->userRepository()->save($user);
        $this->uow->commit();
    }
}
