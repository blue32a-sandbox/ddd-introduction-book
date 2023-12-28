<?php
// Userクラスの定義を見てもファクトリの存在に気づけない
class User
{
    // コンストラクタがあることがわかるのみ
    public function __construct(
        private readonly UserId $id,
        private UserName $name
    ) {
    }

    // ...
}
