<?php
// サークルのメンバー上限数は条件によって変更される
class CircleApplicationService
{
    public function __construct(
        private readonly ICircleRepository $circleRepository,
        private readonly IUserRepository $userRepository
    ) {
    }

    public function join(CircleJoinCommand $command): void
    {
        $cirlceId = new CircleId($command->circleId);
        $circle = $this->circleRepository->find($cirlceId);

        $users = $this->userRepository->findByIds($circle->getMembers());
        $premiumUserNumber = array_reduce(
            $users,
            fn (int $count, User $user) => $user->isPremium() ? $count + 1 : $count,
            0);
        $circleUpperLimit = $premiumUserNumber < 10 ? 30 : 50;
        if ($circle->countMembers() >= $circleUpperLimit) {
            throw new CircleFullException($circleId);
        }

        // ...
    }
}
