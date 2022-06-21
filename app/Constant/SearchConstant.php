<?php

namespace App\Constant;

use App\Models\News;
use App\Models\Report;

class SearchConstant
{
    public const SORTED_COLUMN = 'created_at';

    public const RESULT_PER_PAGE = 30;

    public const NEWS_ROUTE_NAME = 'news.show';

    public const REPORT_ROUTE_NAME = 'reporting.getReport';

    public const SEARCHING_TABLES_ARRAY = [
      [News::class, ['title', 'description'], self::SORTED_COLUMN],
      [Report::class, 'title', self::SORTED_COLUMN],
    ];
}
