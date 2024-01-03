<?php
// 通知オブジェクトを利用してデータモデルを取得する
class FEUserRepository implements IUserRepository
{
    public function save(User $user): void
    {
        // 通知オブジェクトを引き渡して内部データを取得
        $userDataModelBuilder = new UserDataModelBuilder();
        $user->notify($userDataModelBuilder);

        // 通知された内部データからデータモデルを生成
        $userDataModel = $userDataModelBuilder->build();

        // データモデルをO/R Mapperに引き渡す
        $this->context->users->add($userDataModel);
        $this->context->saveChanges();
    }

    // ...
}
