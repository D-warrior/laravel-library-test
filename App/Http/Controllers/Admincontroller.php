<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\HelloMail;
use App\Mail\ApprovedMail;
use App\Mail\ReturnedMail;
use App\Mail\RejectedMail;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Time;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class Admincontroller extends Controller
{
    //
    public function index(){

       
if(Auth::id()){

    $user_type= Auth()->user()->usertype;
    $user = Auth::user();
    $name = $user->name;
    if($user_type=='admin'){
        
        $user = User::all()->count();
        $book = book::all()->count();
        $reservation= Reservation::where('status','approved')->count();
        $returned= Reservation::where('status','returned')->count();
        return view('admin.index',compact('user','reservation','book','returned','name'));
    }
    else if($user_type =='user')
    {  
        $data=Book::all();
        return view('home.index',compact('data','name'));
        
    }
    else{
        return redirect()->back();
    }
}
}

    public function category_page(){
        $data = Category::all(); 
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
       $data = New Category ;

       $data->titre = $request->category;

       $data->save();
       
       return redirect()->back()->with('message','category added succesfully');
    }
    
    public function cat_delete($id){

        $data= Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','category deleted succesfully');
    }

    public function add_book(){
        $data = Category::all();
        return view('admin.add_book',compact('data'));
    }
    public function store_book(Request $request){
         $data = new Book;
         $data->titre= $request->titre;
         $data->auteur= $request->auteur;
         $data->description= $request->description;
         $data->editeur= $request->editeur;
         $data->NbreExemplaire= $request->NbreExemplaire;
         $data->dateEdition= $request->dateEdition;
         $data->price= $request->price;
         $data->categorie_id= $request->category;
         $book_image = $request->book_img;
         if($book_image){

            $book_image_name= time().'.'.$book_image->getClientOriginalExtension();

            $request->book_img->move('book',$book_image_name);

            $data->book_img =$book_image_name;

         }
         $data->save();
         return redirect()->back()->with('message','book added succesfully');
    }
    public function show_book()
    {
        $book = Book::all();
        return view('admin.show_book',compact('book'));
        
    }
    public function delete_book($id){
        $data = Book::find($id);
        $data->delete();
        return redirect()->back()->with('message','book deleted succesfully');
}

     public function edit_book($id){
        $data=Book::find($id);

        $category = Category::all();

        return view("admin.edit_book",compact('data','category'));
     }   
    
     public function update_book(Request $request,$id){

        $data=Book::find($id);
        $data->titre =$request->titre;
        $data->auteur =$request->auteur;
        $data->editeur =$request->editeur;
        $data->price =$request->price;
        $data->dateEdition= $request->dateEdition;
        $data->NbreExemplaire =$request->NbreExemplaire;
        $data->description =$request->description;
        $data->categorie_id =$request->category;
        $book_image = $request->book_img;
         if($book_image){

            $book_image_name= time().'.'.$book_image->getClientOriginalExtension();

            $request->book_img->move('book',$book_image_name);

            $data->book_img =$book_image_name;

         }
         $data->save();
         return redirect("/show_book")->with('message','book updated succesfully');
     }
      public function borrow_request(){
        
        $data = Time::with('reservation')->get();

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
        
        return view('admin.borrow_request',compact('data'));


      }
      public function approve_book($id)
      {
          $data = Time::where('reservation_id', $id)->first();
          $reservation = Reservation::find($id);
          $status = $reservation->status;
      
          if ($status != 'pending') {
              return redirect()->back()->with('message', 'Reservation is not in a pending state.');
          } else {
              $reservation->status = 'approved';
              $reservation->save();
      
              $bookid = $data->book_id;
              $book = Book::find($bookid);
      
              $book_qty = $book->NbreExemplaire - 1;
              $book->NbreExemplaire = $book_qty;
              $book->save();

              Mail::to($reservation->user->email)->send(new ApprovedMail($reservation->user, $book, $returnDate));

              return redirect()->back()->with('message', 'Book approved successfully.');
          }
      }
      
      public function return_book($id)
      {
          $data = Time::where('reservation_id', $id)->first();
          $reservation = Reservation::find($id);
          $status = $reservation->status;
      
          if ($status != 'approved') {
              return redirect()->back()->with('message', 'Reservation is not approved.');
          } else {
              $reservation->status = 'returned';
              $reservation->save();
      
              $bookid = $data->book_id;
              $book = Book::find($bookid);
      
              $book_qty = $book->NbreExemplaire + 1;
              $book->NbreExemplaire = $book_qty;
              $book->save();

              Mail::to($reservation->user->email)->send(new ReturnedMail($reservation->user, $book));

      
              return redirect()->back()->with('message', 'Book returned successfully.');
          }
      }
      
      public function reject_book($id)
      {
          $data = Time::where('reservation_id', $id)->first();
          $reservation = Reservation::find($id);
      
          $reservation->status = 'rejected';
          $reservation->save();
          Mail::to($reservation->user->email)->send(new RejectedMail($reservation->user, $book));

      
          return redirect()->back()->with('message', 'Reservation rejected successfully.');
      }
      


    public function userList()
    {
        // Fetch users with their reservation count
        $users = User::withCount('reservations')->get();
        
        // Return the view with the data
        return view('admin.user_list', compact('users'));
    }
}
      

