<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LegacyController extends Controller
{
    public function index()
    {
        $products = DB::select("SELECT name, old_price AS old, new_price AS new FROM apmc_products");
        $products = array_map(function($p) { return (array) $p; }, $products);
        return view('legacy.index', compact('products'));
    }

    public function showLogin()
    {
        return view('legacy.login');
    }

    public function login(Request $request)
    {
        $username = trim($request->input('username'));
        $password = trim($request->input('password'));

        $user = DB::table('login_users')
                  ->where('username', $username)
                  ->where('password', $password)
                  ->first();

        if ($user) {
            Session::put('username', $user->username);
            Session::put('role', $user->role);

            if ($user->role == "farmer") {
                return redirect()->route('farmer.dashboard');
            } elseif ($user->role == "buyer") {
                return redirect()->route('buyer.dashboard');
            }
        }

        return "<script>alert('Invalid Username or Password'); window.location='/login';</script>";
    }

    public function showRegister()
    {
        return view('legacy.register');
    }

    public function register(Request $request)
    {
        $fullname = trim($request->input('fullname'));
        $username = trim($request->input('username'));
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));
        $confirm_password = trim($request->input('confirm_password'));
        $role = $request->input('role');

        if ($password !== $confirm_password) {
            return "<script>alert('Passwords do not match!'); window.history.back();</script>";
        }

        try {
            DB::table('login_users')->insert([
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ]);
            return "<script>alert('Registration successful!'); window.location.href='/login';</script>";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function farmerDashboard()
    {
        if (Session::get('role') != 'farmer') return redirect('/login');
        
        $crops = DB::select("SELECT * FROM crops WHERE farmer_username=?", [Session::get('username')]);
        return view('legacy.farmer', compact('crops'));
    }

    public function addCrop(Request $request)
    {
        if (Session::get('role') != 'farmer') return redirect('/login');

        DB::insert("INSERT INTO crops (farmer_username, crop_name, price, quantity) VALUES (?, ?, ?, ?)", [
            Session::get('username'),
            $request->input('crop_name'),
            $request->input('price'),
            $request->input('quantity')
        ]);

        return redirect()->route('farmer.dashboard');
    }

    public function buyerDashboard()
    {
        if (Session::get('role') != 'buyer') return redirect('/login');

        $crops = DB::select("SELECT * FROM crops WHERE status='available'");
        return view('legacy.buyer', compact('crops'));
    }

    public function buyCropPage()
    {
        if (Session::get('role') != 'buyer') return redirect('/login');

        $crops = DB::select("SELECT * FROM crops WHERE status='available'");
        return view('legacy.buy_crop', compact('crops'));
    }

    public function buyCropAction(Request $request)
    {
        if (Session::get('role') != 'buyer') return redirect('/login');

        $id = $request->input('crop_id');
        $quantity = $request->input('quantity');

        $crop = DB::selectOne("SELECT quantity, crop_name, price FROM crops WHERE id=? AND status='available'", [$id]);

        if ($crop && $crop->quantity >= $quantity) {
            $newQty = $crop->quantity - $quantity;
            $status = $newQty > 0 ? 'available' : 'sold';
            
            DB::update("UPDATE crops SET quantity=?, status=? WHERE id=?", [$newQty, $status, $id]);

            $total = $crop->price * $quantity;
            $buyer = Session::get('username');
            
            DB::insert("INSERT INTO orders (buyer_username, crop_id, crop_name, quantity, price, total) VALUES (?, ?, ?, ?, ?, ?)", [
                $buyer, $id, $crop->crop_name, $quantity, $crop->price, $total
            ]);
        }

        return redirect()->back();
    }

    public function apmcMembers(Request $request)
    {
        if ($request->has('delete')) {
            DB::delete("DELETE FROM apmc_members WHERE id=?", [$request->query('delete')]);
            return redirect()->route('apmc');
        }

        if ($request->isMethod('post')) {
            DB::insert("INSERT INTO apmc_members (name, role, contact, joined) VALUES (?, ?, ?, ?)", [
                $request->input('name'),
                $request->input('role'),
                $request->input('contact'),
                date("Y-m-d H:i:s")
            ]);
            return redirect()->route('apmc');
        }

        $members = DB::select("SELECT * FROM apmc_members ORDER BY id DESC");
        return view('legacy.apmc', compact('members'));
    }

    public function orders()
    {
        if (Session::get('role') != 'buyer') return redirect('/login');
        
        $orders = DB::select("SELECT * FROM orders WHERE buyer_username=? ORDER BY order_date DESC", [Session::get('username')]);
        return view('legacy.orders', compact('orders'));
    }

    public function contact()
    {
        return view('legacy.contact');
    }

    public function landing()
    {
        return view('legacy.landing');
    }
}
