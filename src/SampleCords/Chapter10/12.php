<?php
// ユニットオブワークを利用したユーザ登録処理
class UserApplicationService
{
    public function __construct(
        // ユニットオブワークを保持する
        private readonly UnitOfWork $uow,
        private readonly UserService $userService,
        private readonly IUserFactory $userFactory,
        private readonly IUserRepository $userRepository
    ) {
    }

    public function register(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->name);
        $user = $this->userFactory->create($userName);

        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user);
        }

        $this->userRepository->save($user);

        // 作業結果の反映をユニットオブワークに伝える
        $this->uow->commit();
    }

    // ...
}
