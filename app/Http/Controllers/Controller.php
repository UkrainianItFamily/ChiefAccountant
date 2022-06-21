<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function successResponseRedirect(string $message, string $route = 'index', string $routeParametr = null)
    {
        return redirect()
            ->route("{$route}", $routeParametr)
            ->with(['success' => "{$message}"]);
    }
}
