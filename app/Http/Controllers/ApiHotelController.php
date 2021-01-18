<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\RoomResource;
use App\Http\Resources\BookingResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class ApiHotelController extends Controller
{

    public function index(Request $request){

        $rooms = Room::query();

        if($request->sort == 1 ){
            $rooms = $rooms->orderBy("id","asc");
        }

        if($request->sort == 2 ){
            $rooms = $rooms->orderBy("id","desc");
        }

        if($request->sort == 3 ){
            $rooms = $rooms->orderBy("price","asc");
        }

        if($request->sort == 4 ){
            $rooms = $rooms->orderBy("price","desc");
        }
        

        return RoomResource::collection($rooms->get());
        }

        public function show($id){

            $room = Room::findOrFail($id);
            
            return new RoomResource($room);
        }

        public function delete($id)
        {

            $room = Room::find($id);
            $room->bookings()->delete();
            $room->delete();


            return['deletedRoom'=>'Room deleted successfuly'];
        }
    
    
        public function store(Request $request){

            $validator = validator::make($request->all(),[

                        'date_start' => 'Required|date',
                        'date_end' => 'Required|date',

            ]);
                
                if($validator->fails()){
                    return response::json($validator->errors());
                }
                

            $booking = new Booking();
            
            $booking->room_id = $request->room_id;
            $booking->user_id = $request->user_id;
            $booking->date_start = $request->date_start;
            $booking->date_end = $request->date_end;
            $booking->booking_number = mt_rand(1000000, 9999999);
            $booking->save();


            return['booking_number'=>$booking->booking_number];
        }


        public function cancel($booking_number)
        {

            DB::table('bookings')->where('booking_number',$booking_number)->delete();
            return['deletedreserve'=>'Reserve canceled successfuly'];
        }
    
}
