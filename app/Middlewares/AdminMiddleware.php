<?php

namespace Middlewares;

use src\Auth\Auth;

class AdminMiddleware
{
    public function handle()
    {
        if (Auth::role() !== "admin") app()->route->redirect("/login");
    }
}
