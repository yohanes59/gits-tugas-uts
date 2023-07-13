<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currentDay = date('d');
        $currentWeek = date('W');
        $currentMonth = date('m');
        $currentYear = date('Y');

        $data['category'] = Category::count();
        $data['product'] = Product::count();
        $data['transaction'] = Transaction::count();
        $data['cashier'] = User::where('name', '!=', 'admin')->get();

        $data['daily'] = Transaction::whereDay('created_at', $currentDay)->sum('grandtotal');
        $data['weekly'] = Transaction::whereRaw('WEEK(created_at) = ?', [$currentWeek])->sum('grandtotal');
        $data['monthly'] = Transaction::whereMonth('created_at', $currentMonth)->sum('grandtotal');
        $data['yearly'] = Transaction::whereYear('created_at', $currentYear)->sum('grandtotal');
        return view('admin.dashboard.index', $data);
    }

    public function account()
    {
        $kasir = User::where('name', '!=', 'admin')->get();
        return view('admin.account.index', ['kasir' => $kasir]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.account.edit', ['users' => $user]);
    }

    public function update(Request $request, $id)
    {

        $user = [
            'name' => $request->name
        ];

        User::find($id)->update($user);

        return redirect('/admin/cashier-account/edit/' . $id)->with('alert', 'Berhasil Update data');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/cashier-account')->with('alert', 'Berhasil menghapus akun');
    }
}
