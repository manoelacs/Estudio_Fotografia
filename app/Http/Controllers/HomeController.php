<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = User::count();
        $albunsCount = Album::count();
        $photosCount = Photo::count();
        $ordersCount = Order::count();

        return view('home', [
            'usersCount' => $usersCount,
            'albunsCount' => $albunsCount,
            'photosCount' => $photosCount,
            'ordersCount' => $ordersCount
        ]);
    }
}
