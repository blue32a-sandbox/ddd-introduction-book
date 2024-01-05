<?php
// サークル一覧を取得する処理
class CircleApplicationService
{
    private readonly ICircleRepository $circleRepository;

    // ...

    public function getSummaries(CircleGetSummariesCommand $command): CircleGetSummariesResult
    {
        $all = $this->circleRepository->findAll();

        // $allを$command->pageと$command->sizeでページングする
        $page = $command->page;
        $size = $command->size;
        $offset = ($page - 1) * $size;
        $circles = array_slice($all, $offset, $size);

        $summaries = [];
        foreach ($circles as $circle) {
            $owner = $this->userRepository->find($circle->owner);
            $summaries[] = new CircleSumarydata($circle->id->value, $owner->name->value);
        }
        return new CircleGetSummariesResult($summaries);
    }

    // ...
}
