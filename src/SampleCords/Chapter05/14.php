<?php
// リスト5.13のfindを繰り返し構文で記述したとき
public function find(UserName $userName): ?User
{
    foreach ($this->store as $user) {
        if ($user->name->equals($userName)) {
            return $this->clone($user);
        }
    }

    return null;
}
