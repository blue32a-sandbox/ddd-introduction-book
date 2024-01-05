<?php
// サークルに所属するメンバーを表すファーストクラスコレクション
class CircleMembers
{
    public function __construct(
        public readonly CircleId $id,
        private readonly User $owner,

        /** @var User[] */
        private readonly array $members
    ) {
    }

    public function countMembers(): int
    {
        return count($this->members) + 1;
    }

    public function countPremiumMembers(bool $containsOwner = true): int
    {
        $premiumUserNumber = array_reduce(
            $this->members,
            fn (int $count, User $member) => $member->isPremium() ? $count + 1 : $count,
            0);
        if ($containsOwner) {
            return $premiumUserNumber + ($this->owner->isPremium() ? 1 : 0);
        } else {
            return $premiumUserNumber;
        }
    }
}
