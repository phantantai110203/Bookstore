<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Book;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        $latestOrders = Invoice::orderBy('created_at', 'desc')->take(10)->get();
        $monthlyRevenue = Invoice::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as revenue')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        // Format data for chart
        $revenueData = [];
        for ($i = 1; $i <= 12; $i++) {
            $revenueData[$i] = 0;
        }

        foreach ($monthlyRevenue as $revenue) {
            $revenueData[$revenue->month] = $revenue->revenue;
        }
        $userCount = User::count();
        $bookCount = Book::count();
        $oderCount = Invoice::count();

        // Lấy doanh thu của ngày hôm nay
        $today = Carbon::today();
        $todayRevenue = Invoice::whereDate('created_at', $today)->sum('total');
        return view('admin.dashboard', compact('userCount', 'bookCount', 'oderCount'), [
            'latestOrders' => $latestOrders,
            'monthlyRevenue' => $revenueData,
            'todayRevenue' => $todayRevenue,
        ]);
    }

    // public function index()
    // {
    //     $userCount = User::count();
    //     $bookCount =Book::count();
    //     $oderCount = Invoice::count();

    //     return view('admin.dashboard', compact('userCount', 'bookCount', 'oderCount'));
    //     //
    // }

    public function show(User $user)
    {
        //
    }
    public function create()
    {
//
    }
    public function store(StoreUserRequest $request)
    {

        //dd($request->all());
        //




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //


    }
    //
    public function edit(User $user)
    {
        //

    }
    //
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    // public function show(User $user)
    // {
    //     //dd($user);
    //     return view('pages.user-show', ['user' => $user]);
    // }

}