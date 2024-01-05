<?php
// お勧めサークルを探し出すアプリケーションサービスの処理
class CircleApplicationService
{
    private readonly ICircleRepository $circleRepository;
    private readonly DateTime $now;

    // ...

    public function getRecommend(CircleGetRecommendRequest $request): CircleGetRecommendResult
    {
        $recommendCircles = $this->circleRepository->findRecommended($this->now);
        return new CircleGetRecommendResult($recommendCircles);
    }
}
