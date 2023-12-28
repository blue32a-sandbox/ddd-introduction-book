<?php
// オブジェクトにセッターを用意する
class User
{
    public UserId $id;

    public function __construct(private UserName $name)
    {
    }
}
