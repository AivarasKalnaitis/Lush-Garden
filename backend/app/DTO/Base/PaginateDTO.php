<?php

declare(strict_types = 1);

namespace App\DTO\Base;

use Illuminate\Support\Collection;

/**
 * Class PaginateDTO
 * @package App\DTO\Base
 */
class PaginateDTO extends DTO
{
    /**
     * @var Collection
     */
    protected $content;

    /**
     * PaginateDTO constructor.
     */
    public function __construct()
    {
        $this->content = collect();
    }

    /**
     * @param DTO|null $data
     * @return $this
     */
    public function setData(?DTO $data = null): PaginateDTO
    {
        if ($data === null) {
            $data = [];
        }

        $this->content->put('items', $data);

        return $this;
    }

    /**
     * @param int $currentPage
     * @return $this
     */
    public function setCurrentPage(int $currentPage): PaginateDTO
    {
        $this->content->put('current_page', $currentPage);

        return $this;
    }

    /**
     * @param int $total
     * @return $this
     */
    public function setTotal(int $total): PaginateDTO
    {
        $this->content->put('total', $total);

        return $this;
    }

    /**
     * @param int $perPage
     * @return $this
     */
    public function setPerPage(int $perPage): PaginateDTO
    {
        $this->content->put('per_page', $perPage);

        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setFirstPageUrl(string $url): PaginateDTO
    {
        $this->content->put('first_page_url', $url);

        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setLastPageUrl(string $url): PaginateDTO
    {
        $this->content->put('last_page_url', $url);

        return $this;
    }

    /**
     * @param string|null $url
     * @return $this
     */
    public function setNextPageUrl(?string $url = null): PaginateDTO
    {
        $this->content->put('next_page_url', $url);

        return $this;
    }

    /**
     * @param string|null $url
     * @return $this
     */
    public function setPrevPageUrl(?string $url = null): PaginateDTO
    {
        $this->content->put('prev_page_url', $url);

        return $this;
    }

    /**
     * @return array
     */
    protected function jsonData(): array
    {
        return $this->content->toArray();
    }
}