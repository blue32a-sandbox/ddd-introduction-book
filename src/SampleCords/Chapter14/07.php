<?php
// Interactorの実装
class UserGetInteractor implements IUserGetInputPort
{
    public function __construct(
        private readonly IUserRepository $userRepository,
        private readonly IUserGetPresenter $presenter
    ) {
    }

    public function handle(UserGetInputData $inputData): void
    {
        $targetId = new UserId($inputData->userId);
        $user = $this->userRepository->find($targetId);

        $userData = new UserData($user->id->value, $user->name->value);
        $outputData = new UserUpdateOutputData($userData);
        $this->presenter->output($outputData);
    }
}
