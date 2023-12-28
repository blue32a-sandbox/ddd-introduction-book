<?php
// ユニークキー制約で重複しないことが担保され重複確認が不要になる
class UserApplicationService
{
    public function __construct(
        private readonly IUserFactory $userFactory,
        private readonly IUserRepository $userRepository
    ) {
    }

    // ...

    public function register(UserRegisterCommand $command): void
    {
        $userName = new UserName($command->name);
        $user = $this->userFactory->create($userName);

        $this->userRepository->save($user);
    }
}
