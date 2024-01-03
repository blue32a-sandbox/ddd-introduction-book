<?php
// リポジトリの永続化処理
class FEUserRepository implements IUserRepository
{
    public function save(User $user): void
    {
        // ゲッターを利用しデータの詰め替えをしている
        $userDataModel = new UserDataModel(
            id: $user->id->value,
            name: $user->name->value,
        );
        $this->context->users->add($userDataModel);
        $this->context->saveChanges();
    }

    // ...
}
