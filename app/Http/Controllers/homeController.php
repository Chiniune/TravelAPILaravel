<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTimeZone;

class homeController extends Controller
{
    //general function
    public function getCurrentDate(){
        $timeZone = new DateTimeZone('Asia/Ho_Chi_Minh');
        $date = Carbon::now($timeZone);
        $formatDate = $date->format('YmdHis');
        return $formatDate;
    }
    public function getByRegion(Request $req){
        $result = DB::table("tickets")
            ->join('locations', "tickets.location_id", '=', 'locations.location_id')
            ->select("tickets.*",'locations.location_name','locations.location_region')
            ->where("tickets.location_id", '=', "$req->location_id")
            ->get();
        return $result;
        
    }
    
    //customer api
    public function getCustomers(){
        $users = DB::table('customers')->get();
        return $users;
    }
    public function getCustomerByID (Request $req) {
        $users = DB::table('customers')
        ->where('customer_id', '=', "$req->customer_id")
        ->get();
        return $users;
    }
    public function checkEmailExists($customer_email){
        $user = DB::table('customers')
                    ->where('customer_email', $customer_email)
                    ->first();
        if ($user) {
            return true;
        }
        return false;
    }
    public function insertCustomer (Request $req) {
        $email = $req->customer_email;
        if($this->checkEmailExists($email)) {
            $users = DB::table('customers')
                ->where('customer_email', '=', "$email")
                ->get();
            return $users;
        } else {
            $id = "cus".$this->getCurrentDate();
            DB::insert('insert into customers (customer_id, customer_name, customer_email, customer_phone, customer_image) values (?, ?, ?, ?, ?)', 
                [$id, "$req->customer_name", "$email", "$req->customer_phone", "$req->customer_image"]);
            
            $user = DB::table('customers')
                ->where('customer_id', '=', "$id")
                ->get();
            return $user;
        }
        return "fail";
    }
    public function updateCustomerPhone (Request $req ) {
        DB::update('update customers set customer_phone = ? where customer_id = ?', ["$req->customer_phone", "$req->customer_id"]);
        return "success";
    }

    
    // public function insertCustomer ($name, $email, $phone, $image) {
    //     $id = "cus".$this->getCurrentDate();
    //     $users = DB::insert('insert into customers (customer_id, customer_name, customer_email, customer_phone, customer_image) values (?, ?, ?, ?, ?)', 
    //     [$id, "$name", "$email", "$phone", "$image"]);
    //     return "success";
    // }

    // ticket api
    public function getTicket(){
        $tics = DB::table('tickets')
        ->join('locations', 'tickets.location_id', '=', 'locations.location_id')
        ->select('tickets.*','locations.location_name','locations.location_region')
        ->get();
        return $tics;
    }
    public function getlimitTicket(){
        $tours = DB::table('tickets')
        ->join('locations', 'tickets.location_id', '=', 'locations.location_id')
        ->select('tickets.*','locations.location_name','locations.location_region')
        ->limit(5)->get();
        return $tours;
    }

    //region api
    public function getRegion(){
        $result = DB::table('locations')->get();
        return $result;
    }

    // hotel api
    public function getHotHotel(){
        $hotels = DB::table('hotels')
        ->join('hotellocations', 'hotels.hotel_id', '=', 'hotellocations.hotel_id')
        ->join('locations', 'hotellocations.location_id', '=', 'locations.location_id')
        ->select('hotels.*', 'hotellocations.hotel_address','locations.location_name','locations.location_region' , 'hotellocations.longitude', 'hotellocations.latitude')
        ->where('hotels.hotel_rating', '>=', 4)
        ->orderBy('hotels.hotel_rating', 'desc')->limit(5)
        ->get();
        return $hotels;
    }

    public function getAllHotel(){
        $hotels = DB::table('hotels')
        ->join('hotellocations', 'hotels.hotel_id', '=', 'hotellocations.hotel_id')
        ->join('locations', 'hotellocations.location_id', '=', 'locations.location_id')
        ->select('hotels.*', 'hotellocations.hotel_address','locations.location_name','locations.location_region' , 'hotellocations.longitude', 'hotellocations.latitude')
        ->get();
        return $hotels;
    }

    // restaurant api
    public function getHotRestaurant(){
        $res = DB::table('restaurants')
        ->join('restaurantlocations', 'restaurants.restaurant_id', '=', 'restaurantlocations.restaurant_id')
        ->join('locations', 'restaurantlocations.location_id', '=', 'locations.location_id')
        ->select('restaurants.*', 'restaurantlocations.restaurant_address','locations.location_name','locations.location_region' , 'restaurantlocations.longitude', 'restaurantlocations.latitude')
        ->where('restaurants.restaurant_rating', '>=', 4)
        ->orderBy('restaurants.restaurant_rating', 'desc')->limit(5)
        ->get();
        return $res;
    }

    public function getAllRestaurant(){
        $res = DB::table('restaurants')
        ->join('restaurantlocations', 'restaurants.restaurant_id', '=', 'restaurantlocations.restaurant_id')
        ->join('locations', 'restaurantlocations.location_id', '=', 'locations.location_id')
        ->select('restaurants.*', 'restaurantlocations.restaurant_address','locations.location_name','locations.location_region' , 'restaurantlocations.longitude', 'restaurantlocations.latitude')
        ->get();
        return $res;
    }

    public function getResByLoc(){
        $res = DB::table('restaurants')
        ->join('restaurantlocations', 'restaurants.restaurant_id', '=', 'restaurantlocations.restaurant_id')
        ->join('locations', 'restaurantlocations.location_id', '=', 'locations.location_id')
        ->select('restaurants.*', 'restaurantlocations.restaurant_address','locations.location_name','locations.location_region' , 'restaurantlocations.longitude', 'restaurantlocations.latitude')
        ->get();
        return $res;
    }

    // wishlist
    public function getWishlistTicKet(Request $req){
        $wishs = DB::table('wishlistticket')
                    ->join('tickets', 'tickets.ticket_id', '=', 'wishlistticket.ticket_id')
                    ->select('tickets.*')
                    ->where('wishlistticket.customer_id', '=', "$req->customer_id")
                    ->get();
        return $wishs;
    }
    public function getWishlistRes(Request $req){
        $wishs = DB::table('wishlistrestaurant')
                    ->join('restaurants', 'restaurants.restaurant_id', '=', 'wishlistrestaurant.restaurant_id')
                    ->select('restaurants.*')
                    ->where('wishlistrestaurant.customer_id', '=', "$req->customer_id")
                    ->get();
        return $wishs;
    }
    public function getWishlistHotel(Request $req){
        $wishs = DB::table('wishlisthotel')
                    ->join('hotels', 'hotels.hotel_id', '=', 'wishlisthotel.hotel_id')
                    ->select('hotels.*')
                    ->where('wishlisthotel.customer_id', '=', "$req->customer_id")
                    ->get();
        return $wishs;
    }

    public function insertWishlistTicKet (Request $req) {
        DB::insert('insert into wishlistticket (customer_id, ticket_id) values (?, ?)', 
        ["$req->customer_id", "$req->ticket_id"]);
        return "success";
    }
    public function insertWishlistRes (Request $req) {
        DB::insert('insert into wishlisthotel (customer_id, restaurant_id) values (?, ?)', 
        ["$req->customer_id", "$req->restaurant_id"]);
        return "success";
    }
    public function insertWishlistHotel (Request $req) {
        DB::insert('insert into wishlistrestaurant (customer_id, hotel_id) values (?, ?)', 
        ["$req->customer_id", "$req->hotel_id"]);
        return "success";
    }

    public function index(){
        
        $tics = $this->getTicket();
        $hotels = $this->getAllHotel();
        $restaurants = $this->getAllRestaurant();
        // dd($tics);
        return view('index', ['tickets' => $tics,
                              'hotels' => $hotels, 
                              'restaurants' => $restaurants ]);
    }

}
