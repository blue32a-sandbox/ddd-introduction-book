<?php
// リポジトリにメールアドレスによる検索手段を追加
interface IUserRepository
{
    // ...
    public function findByMailAddress(MaillAddress $maillAddress): ?User;
}
