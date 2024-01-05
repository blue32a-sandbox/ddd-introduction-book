<?php
// 仕様を利用する
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

        $circleFullSpecification = new CircleFullSpecification($this->userRepository);
        if ($circleFullSpecification->isSatisfiedBy($circle)) {
            throw new CircleFullException($circleId);
        }

        // ...
    }
}
