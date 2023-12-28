<?php
// ファクトリを経由してインスタンスを生成する
class UserApplicationService
{
    public function __construct(
        private readonly IUserFactory $userFactory,
        private readonly IUserRepository $userRepository,
        private readonly UserService $userService
    ) {
    }

    // ...

    public function register(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->name);
        // ファクトリによってインスタンスを生成する
        $user = $this->userFactory->create($userName);

        if ($this->userService->exists($user)) {
            throw new CanNotRegisterUserException($user);
        }

        $this->userRepository->save($user);
    }
}
