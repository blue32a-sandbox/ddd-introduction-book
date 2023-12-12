<?php
// エンティティの比較を行う

function check(User $leftUser, User $rightUser): void {
    if ($leftUser->equals($rightUser)) {
        echo '同一のユーザです';
    } else {
        echo '別のユーザです';
    }
}
