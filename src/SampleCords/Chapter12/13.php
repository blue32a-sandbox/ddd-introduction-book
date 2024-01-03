<?php
// 通知オブジェクトを受け取るメソッドを追加する
class User
{
    public function __construct(
        // インスタンス変数はいずれも非公開
        private readonly UserId $id,
        private UserName $name,
    ) {
    }

    // ...

    public function notify(IUserNotification $note): void
    {
        $note->id($this->id);
        $note->name($this->name);
    }
}
