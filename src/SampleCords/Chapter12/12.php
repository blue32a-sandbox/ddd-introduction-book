<?php
// リスト12.11を実装した通知オブジェクト
class UserDataModelBuilder implements IUserNotification
{
    private UserId $id;
    private UserName $name;

    public function id(UserId $id): void
    {
        $this->id = $id;
    }

    public function name(UserName $name): void
    {
        $this->name = $name;
    }

    public function build(): UserDataModel
    {
        return new UserDataModel(
            id: $this->id->value,
            name: $this->name->value,
        );
    }
}
