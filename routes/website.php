<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;


route::get('user',[FrontendController::class,'index'])->name('index');
