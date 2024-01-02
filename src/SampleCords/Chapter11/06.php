<?php
// サークルの重複確認を行うドメインサービス
class CircleService
{
    public function __construct(
        private readonly ICircleRepository $circleRepository
    ) {
    }

    public function exists(Circle $circle): bool
    {
        $duplicated = $this->circleRepository->findByName($circle->getName());
        return $duplicated !== null;
    }
}
