<?php
// 仕様を利用しお勧めサークルを検索する
class CircleApplicationService
{
    private readonly ICircleRepository $circleRepository;
    private readonly DateTime $now;

    // ...

    public function getRecommend(CircleGetRecommendRequest $request): CircleGetRecommendResult
    {
        $recommendCircleSpec = new CircleRecomendSpecification($this->now);

        $circles = $this->circleRepository->findAll();
        $recommendCircles = array_filter($circles, function (Circle $circle) use ($recommendCircleSpec) {
            return $recommendCircleSpec->isSatisfiedBy($circle);
        });
        return new CircleGetRecommendResult($recommendCircles);
    }
}
