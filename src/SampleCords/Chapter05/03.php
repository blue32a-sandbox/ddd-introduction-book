<?php
// リポジトリを利用したユーザ作成処理
class Program
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    public function createUser(string $userName): void
    {
        $user = new User(new UserName($userName));

        if ($this->userRepository->exists($user)) {
            throw new Exception(sprintf('%sは既に存在しています', $userName));
        }

        $this->userRepository->save($user);
    }
}
