<?php

namespace App\Repositories\Utilities;

class Paginate
{
	/**
	 * [$searchColumns description]
	 * @var array
	 */
	private $searchColumns = [];

	/**
	 * [$search description]
	 * @var [type]
	 */
	private $search;

	/**
	 * [$perPage description]
	 * @var [type]
	 */
	private $perPage;

	/**
	 * [$page description]
	 * @var [type]
	 */
	private $page;

	/**
	 * [$sortBy description]
	 * @var [type]
	 */
	private $sortBy = 'created_at';

	/**
	 * [$orderBy description]
	 * @var string
	 */
	private $orderBy = 'DESC';

	/**
	 * Set columns which will be included in search
	 * 
	 * @param array $columns
	 */
	public function setSearchColumns(array $columns)
	{
		$this->searchColumns = $columns;
		return $this;
	}

	/**
	 * Returns an array of string containing
	 * 
	 * columns that will be searched
	 * 
	 * @return array
	 */
	public function searchColumns()
	{
		return $this->searchColumns;
	}

	/**
	 * Set word to be used for searching
	 * 
	 * @param string $searchString
	 */
	public function setSearch($searchString)
	{
		$this->search = $searchString;
		return $this;
	}

	/**
	 * Returns a string for searching
	 * 
	 * @return string
	 */
	public function search()
	{
		return $this->search;
	}

	public function setPage($pageNum)
	{
		$this->page = $pageNum;
		return $this;
	}

	public function page()
	{
		return $this->page;
	}

	public function setPerPage($perPage)
	{
		$this->perPage = $perPage;
		return $this;
	}

	public function perPage()
	{
		return $this->perPage;
	}

	public function setSort($sort)
	{
		if(!empty($sort)){
			$this->sortBy = $sort;
		}

		return $this;
	}

	public function sort()
	{
		return $this->sortBy;
	}

	public function setOrder($order)
	{
		$this->orderBy = $order;
		return $this;
	}

	public function order()
	{
		return $this->orderBy;
	}
}