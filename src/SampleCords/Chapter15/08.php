<?php
// Coreパッケージも変更しなくてはいけないはずが
namespace Core\Model\Users;

class User
{
    // 識別子はUserIdのまま
    public function __construct(
        public readonly UserId $id,
        private UserName $name
    ) {
    }

    // 識別子となったUserNameが変更できてしまう
    public function changeName(UserName $name): void
    {
        $this->name = $name;
    }
}
