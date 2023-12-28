<?php
// UserクラスのメソッドでCircleクラスのインスタンスを生成する
class User
{
    public function __construct(private readonly UserId $id)
    {
    }

    // ...

    // ファクトリとして機能するメソッド
    public function createCircle(CircleName $circleName): Circle
    {
        return new Circle(
            $this->id,
            $circleName
        );
    }
}
