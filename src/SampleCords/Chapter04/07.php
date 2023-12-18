<?php
// リスト4.6で利用されているUserクラスの定義
class User
{
    public function __construct(
        private readonly UserId $id,
        public UserName $name
    ) {
    }
}
