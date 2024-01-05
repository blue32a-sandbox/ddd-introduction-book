<?php
// エンティティがリポジトリを受け取る
class Circle
{
    // プレミアムユーザの人数を探したいが保持しているのはUserIdのコレクションだけ
    /** @var UserId[] */
    private array $members;

    // ...

    public function isFull(IUserRepository $userRepository): bool
    {
        $users = $userRepository->findByIds($this->members);
        $premiumUserNumber = array_reduce(
            $users,
            fn (int $count, User $user) => $user->isPremium() ? $count + 1 : $count,
            0);
        $circleUpperLimit = $premiumUserNumber < 10 ? 30 : 50;
        return $this->countMembers() >= $circleUpperLimit;
    }
}
