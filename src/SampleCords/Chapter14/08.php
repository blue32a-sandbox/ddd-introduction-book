<?php
// テスト用のスタブ
class StubUserGetInteractor implements IUserGetInputPort
{
    public function __construct(
        private readonly IUserGetPresenter $presenter
    ) {
    }

    public function handle(UserGetInputData $inputData): void
    {
        $userData = new UserId('test-id', 'test-user-name');
        $outputData = new UserUpdateOutputData($userData);
        $this->presenter->output($outputData);
    }
}
