<?php
// サークルが満員かどうかを評価する仕様
class CircleFullSpecification
{
    public function __construct(
        private readonly IUserRepository $userRepository
    ) {
    }

    public function isSatisfiedBy(Circle $circle): bool
    {
        $users = $this->userRepository->findByIds($circle->getMembers());
        $premiumUserNumber = array_reduce(
            $users,
            fn (int $count, User $user) => $user->isPremium() ? $count + 1 : $count,
            0);
        $circleUpperLimit = $premiumUserNumber < 10 ? 30 : 50;
        return $circle->countMembers() >= $circleUpperLimit;}
}
