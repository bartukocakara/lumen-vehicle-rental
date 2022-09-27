<?php

namespace App\Repositories\Concrete;

use App\Repositories\Abstracts\IRepository;
use Illuminate\Support\Facades\Cache;

class BaseRepository implements IRepository
{
    public const PER_PAGE           = 10;
    public const DEFAULT_SORT_FIELD = 'created_at';
    public const DEFAULT_SORT_ORDER = 'asc';

    protected function handleTable($model, $request, $searchCols)
    {
        $sortFieldInput = $request->input('sort_field', self::DEFAULT_SORT_FIELD);
        $sortField      = in_array($sortFieldInput, $this->sortFields) ? $sortFieldInput : self::DEFAULT_SORT_FIELD;
        $sortOrder      = $request->input('sort_order', self::DEFAULT_SORT_ORDER);
        $searchInput    = $request->input('search');
        $query          = $model->orderBy($sortField, $sortOrder);
        $perPage        = $request->input('per_page') ?? self::PER_PAGE;
        if (!is_null($searchInput)) {
            $searchQuery = "%$searchInput%";
                $query  = $query->where($searchCols, 'like', $searchQuery);
        }
        $model = $query->paginate((int)$perPage);
        return $model;
    }
}
