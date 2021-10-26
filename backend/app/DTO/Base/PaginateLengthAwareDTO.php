<?php

declare(strict_types = 1);

namespace App\DTO\Base;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class PaginateLengthAwareDTO
 * @package App\DTO\Base
 */
class PaginateLengthAwareDTO extends PaginateDTO
{
    /**
     * @var LengthAwarePaginator
     */
    private $paginator;

    /**
     * PaginateLengthAwareDTO constructor.
     * @param LengthAwarePaginator $paginator
     */
    public function __construct(LengthAwarePaginator $paginator)
    {
        parent::__construct();

        $this->paginator = $paginator;
        $this->paginator->appends(request()->only(['perPage', 'orderBy', 'orderType']));

        $this->setDefaultData();
    }

    /**
     * @return void
     */
    private function setDefaultData(): void
    {
        $lastPage = $this->paginator->lastPage();

        $this->setCurrentPage($this->paginator->currentPage())
            ->setData()
            ->setTotal($this->paginator->total())
            ->setPerPage($this->paginator->perPage())
            ->setFirstPageUrl($this->paginator->url(1))
            ->setLastPageUrl($this->paginator->url($lastPage))
            ->setNextPageUrl($this->paginator->nextPageUrl())
            ->setPrevPageUrl($this->paginator->previousPageUrl());
    }
}