<?php

namespace App\Http\Controllers;
use App\Mail\HelloMail;
use App\Mail\BookRequestMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Time;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()

    { 
        $user = Auth::user();
        $name = $user ? $user->name : 'Guest';  
        $categories = Category::all();
        $data = Book::orderBy('created_at', 'desc')->take(4)->get();
        return view('home.index',compact('data','categories','name'));
    
}
public function book_details($id)
{
    $data=Book::find($id);
    $category = Category::all();
    return view('home.book_details',compact('data'));
        
}
public function borrow_book(Request $request, $id)
{
    $data = Book::find($id);
    $NbreExemplaire = $data->NbreExemplaire;
    $NbreJour = $request->input('NbreJour');

    if ($NbreExemplaire >= 1) {
        if (Auth::id()) {
            $user = Auth::user()->id;
            
            $borrow = new Reservation;
            $borrow->user_id = $user;
            
            $borrow->NbreJour = $NbreJour;
            $borrow->status = Reservation::STATUS_PENDING; // Corrected this line
            $borrow->save();

            $reservation_id = $borrow->id;

            $time = new Time;
            $time->book_id = $id;
            $time->reservation_id = $reservation_id;
            $time->save();
            
            Mail::to(Auth::user()->email)->send(new BookRequestMail(Auth::user(), $data, $NbreJour));


            return redirect()->back()->with('message', 'Borrow request submitted successfully.');
        } else {
            return redirect('/login');
        }
    } else {
        return redirect()->back()->with('message', 'No copies left.');
    }
}

public function book_history(){
    if (Auth::check()) {
        $userid = Auth::user()->id;
        $data = Time::whereHas('reservation', function($query) use ($userid) {
            $query->where('user_id', $userid);
        })->get();

        
        foreach ($data as $entry) {
            if ($entry->reservation && $entry->reservation->dateSortie) {
                // \Log::info('Date Sortie: ' . $entry->reservation->dateSortie);
                // \Log::info('Number of Days: ' . $entry->reservation->NbreJour);
    
                $entry->dateRetour = \Carbon\Carbon::parse($entry->reservation->dateSortie)
                                    ->addDays($entry->reservation->NbreJour)
                                    ->format('Y-m-d');
            } else {
                $entry->dateRetour = 'N/A'; 
            }
        }
        

        return view('home.book_history', compact('data'));
    }

    return redirect()->route('login'); // Redirect to login if not authenticated
}
public function cancel_req($id){

    $data = Reservation::find($id);
    $data->delete();

    return redirect()->back()->with('message','book borrow request canceled successfully');
 }
 public function explore(){
    $category=Category::all();

    $data = Book::all();
    return view('home.explore',compact('data','category'));
 }

 public function search(request $request){
      
    $search =$request->search;
    $data = book::where('titre','like','%'.$search.'%')->get();
    $category=Category::all();
    
    return view('home.explore',compact('category','data'));
 }
 public function cat_search($id){

    $category=Category::all();

    $data =book::where('categorie_id',$id)->get();

    return view('home.explore',compact('data','category'));
    
}





}