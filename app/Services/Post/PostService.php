<?php

namespace App\Services\Post;

use App\Models\Post;

class PostService
{
    public function filter($query, $filter) {
        $queryBuilder = Post::query();

        if ($query && $filter) {
            $query = strtolower($query);

            $filterColumn = Post::raw("LOWER($filter)");

            $queryBuilder->where($filterColumn, 'like', "%{$query}%");
        }

        return $queryBuilder->paginate(8);
    }
}
