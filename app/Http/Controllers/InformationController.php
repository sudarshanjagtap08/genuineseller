<?php

namespace App\Http\Controllers;
use auth;
use App\Models\User;
use App\Models\Seller;
use App\Models\Friendseller;
use App\Models\Familyseller;
use App\Models\Buyer;
use App\Models\Friendbuyer;
use App\Models\Familybuyer;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function informationbuyer(Request $request)
    {
        $data = User::with('buyers.familybuyers', 'buyers.friendbuyers')
            ->get();
        // $type = Auth::user()->type ;
        // $userid = Auth::user()->id ;
        // if($type == 1){
        //     $data = User::with('sellers.familysellers', 'sellers.friendsellers')
        //     ->where('id', $userid)
        //     ->get();
        // }elseif($type == 2){
        //     $data = User::with('buyers.familybuyers', 'buyers.friendbuyers')
        //     ->where('id', $userid)
        //     ->get();
        // }else{
        //     echo"error";
        //     exit;
        // }
        return view('information/information_index', ['user'=>$data]);
    }
    public function informationseller(Request $request)
    {
        $data = User::with('sellers.familysellers', 'sellers.friendsellers')
                ->get();
        return view('information/sellers_information_index', ['user'=>$data]);
    }
    public function informationsellerEdit(Request $request, $id)
    {
        $data = User::with('sellers.familysellers', 'sellers.friendsellers')
                ->where('id', $id)
                ->get();
        return view('information/sellers_information_edit', ['user'=>$data]);
    }
    public function informationbuyerEdit(Request $request, $id)
    {
        $data = User::with('buyers.familybuyers', 'buyers.friendbuyers')
                ->where('id', $id)
                ->get();
        return view('information/buyers_information_edit', ['user'=>$data]);
    }
    public function Sellerupdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->input('status'); 
        $user->update();
        return redirect('seller/list');
    }
    public function Buyerupdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->input('status'); 
        $user->update();
        return redirect('buyer/list');
    }
    public function informationEdit(Request $request)
    {
        $type = Auth::user()->type ;
        $userid = Auth::user()->id ;
        
        if($type == 1){
            $data = User::with('sellers.familysellers', 'sellers.friendsellers')
            ->where('id', $userid)
            ->get();
        return view('information/information_edit' , ['user'=>$data]);
        }elseif($type == 2){
            $data = User::with('buyers.familybuyers', 'buyers.friendbuyers')
            ->where('id', $userid)
            ->get();
        return view('information/information_edit_buyer' , ['user'=>$data]);
        }else{
            echo"error";
            exit;
        }
    }
    public function profileupdate(Request $request)
    {
        
        $userid = Auth::user()->id ;
        // print_r($userid);
        // exit;
        $user = User::find($userid);
        $user->name = $request->input('name');  
        $user->email = $request->input('email');  
        // $password = $request->input('password');  
        // $user->password = Hash::make($password);
        $user->type = 2;
        $user->save();
        $lastInsertedId = $userid;
        // $buyer = new Buyer;
        $buyer = Buyer::where('user_id', $userid)->first(); 
        $buyer->mobilenumber = $request->input('mobilenumber'); 
        $buyer->landlinehome = $request->input('landlinehome'); 
        $buyer->landlineoffice = $request->input('landlineoffice'); 
        $buyer->othermobile = $request->input('othermobile'); 
        $buyer->address = $request->input('address'); 
        $buyer->addressnew = $request->input('addressnew'); 
        $buyer->landmark = $request->input('landmark'); 
        $buyer->area = $request->input('area'); 
        $buyer->country_id = $request->input('country_id'); 
        $buyer->state_id = $request->input('state_id'); 
        $buyer->city_id = $request->input('city_id'); 
        $buyer->pan_card_upload = $request->input('pan_card_upload'); 
        $buyer->adhaar_card_upload = $request->input('adhaar_card_upload'); 
        $buyer->passport_upload = $request->input('passport_upload'); 
        $buyer->mbl_ll_bill_upload = $request->input('mbl_ll_bill_upload'); 
        $buyer->bankaccno = $request->input('bankaccno'); 
        $buyer->bankname = $request->input('bankname'); 
        $buyer->bankifsc = $request->input('bankifsc'); 
        $buyer->bankAccHolderName = $request->input('bankaccholdername'); 
        $buyer->mode_of_payment_phonepe = $request->input('mode_of_payment_phonepe'); 
        $buyer->mode_of_payment_gpay = $request->input('mode_of_payment_gpay'); 
        $buyer->mode_of_payment_bank = $request->input('mode_of_payment_bank'); 
        $buyer->mode_of_payment_card = $request->input('mode_of_payment_card'); 
        $buyer->whatsappno = $request->input('whatsappno'); 
        $buyer->fblink = $request->input('fblink'); 
        $buyer->instagramlink = $request->input('instagramlink'); 
        $buyer->snapchatlink = $request->input('snapchatlink'); 
        $buyer->pinterestlink = $request->input('pinterestlink'); 
        $buyer->websitelink = $request->input('websitelink'); 
        $buyer->buyertype = $request->input('buyertype'); 
        $buyer->save();        
        // $friendbuyer = new Friendbuyer;
        $friendbuyer = Friendbuyer::where('buyer_id', $buyer->id)->first();
        // $friendbuyer->buyer_id = $lastInsertedId; 
        $friendbuyer->friendname = $request->input('friendname'); 
        $friendbuyer->friendnumber = $request->input('friendnumber'); 
        $friendbuyer->friendemail = $request->input('friendemail'); 
        $friendbuyer->friendfblink = $request->input('friendfblink'); 
        $friendbuyer->save();

        $familyMemberNames = $request->input('familymembername');
        $nonEmptyCount = count(array_filter($familyMemberNames, 'strlen'));
        $buyerid = $buyer->id;
        
        for ($i = 0; $i < $nonEmptyCount; $i++) {
            if ($request->has('familymembername.'.$i)) {
                $familybuyer = Familybuyer::updateOrCreate(
                    [
                        'buyer_id' => $buyerid, 
                        'id' => $i + 1
                    ],
                    [
                        'familymembername' => $request->input('familymembername.'.$i),
                        'familymembernumber' => $request->input('familymembernumber.'.$i),
                        'familymemberemail' => $request->input('familymemberemail.'.$i),
                        'familymemberfblink' => $request->input('familymemberfblink.'.$i)
                    ]
                );
            }
        }
        return redirect()->back();
    }
    public function profileupdateseller(Request $request)
    {
        
        $userid = Auth::user()->id ;        
        $user = User::find($userid);
        $user->name = $request->input('name');  
        $user->email = $request->input('email');  
        // $password = $request->input('password');  
        // $user->password = Hash::make($password);
        $user->type = 1;
        $user->save();
        $lastInsertedId = $userid;
        // $seller = new Seller;
        $seller = Seller::where('user_id', $userid)->first(); 
        $seller->mobilenumber = $request->input('mobilenumber'); 
        $seller->landlinehome = $request->input('landlinehome'); 
        $seller->landlineoffice = $request->input('landlineoffice'); 
        $seller->othermobile = $request->input('othermobile'); 
        $seller->address = $request->input('address'); 
        $seller->addressnew = $request->input('addressnew'); 
        $seller->landmark = $request->input('landmark'); 
        $seller->area = $request->input('area'); 
        $seller->country_id = $request->input('country_id'); 
        $seller->state_id = $request->input('state_id'); 
        $seller->city_id = $request->input('city_id'); 
        $seller->pan_card_upload = $request->input('pan_card_upload'); 
        $seller->adhaar_card_upload = $request->input('adhaar_card_upload'); 
        $seller->passport_upload = $request->input('passport_upload'); 
        $seller->mbl_ll_bill_upload = $request->input('mbl_ll_bill_upload'); 
        $seller->bankaccno = $request->input('bankaccno'); 
        $seller->bankname = $request->input('bankname'); 
        $seller->bankifsc = $request->input('bankifsc'); 
        $seller->bankAccHolderName = $request->input('bankaccholdername'); 
        $seller->mode_of_payment_phonepe = $request->input('mode_of_payment_phonepe'); 
        $seller->mode_of_payment_gpay = $request->input('mode_of_payment_gpay'); 
        $seller->mode_of_payment_bank = $request->input('mode_of_payment_bank'); 
        $seller->mode_of_payment_card = $request->input('mode_of_payment_card'); 
        $seller->whatsappno = $request->input('whatsappno'); 
        $seller->fblink = $request->input('fblink'); 
        $seller->instagramlink = $request->input('instagramlink'); 
        $seller->snapchatlink = $request->input('snapchatlink'); 
        $seller->pinterestlink = $request->input('pinterestlink'); 
        $seller->websitelink = $request->input('websitelink'); 
        // $seller->sellertype = $request->input('sellertype'); 
        $seller->save();        
        // $friendseller = new Friendseller;
        $friendseller = Friendseller::where('seller_id', $seller->id)->first();
        // $friendseller->seller_id = $lastInsertedId; 
        $friendseller->friendname = $request->input('friendname'); 
        $friendseller->friendnumber = $request->input('friendnumber'); 
        $friendseller->friendemail = $request->input('friendemail'); 
        $friendseller->friendfblink = $request->input('friendfblink'); 
        $friendseller->save();

        $familyMemberNames = $request->input('familymembername');
        $nonEmptyCount = count(array_filter($familyMemberNames, 'strlen'));
        // print_r($nonEmptyCount);exit;
        $sellerid = $seller->id;        
        for ($i = 0; $i < $nonEmptyCount; $i++) {
            if ($request->has('familymembername.'.$i)) {
                $familyseller = Familyseller::updateOrCreate(
                    [
                        'seller_id' => $sellerid, 
                        'id' => $i + 1
                    ],
                    [
                        'familymembername' => $request->input('familymembername.'.$i),
                        'familymembernumber' => $request->input('familymembernumber.'.$i),
                        'familymemberemail' => $request->input('familymemberemail.'.$i),
                        'familymemberfblink' => $request->input('familymemberfblink.'.$i)
                    ]
                );
            }
        }
        return redirect()->back();
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $searchType = $request->input('searchType');
        

       
        if($searchType =="Seller")
        {
            // $seller = User::with('sellers.familysellers', 'sellers.friendsellers')
            //     ->where('name', $searchTerm)
            //     ->orWhere('sellers.seller_documentid', $searchTerm)
            //     ->first();
            $seller = User::with('sellers.familysellers', 'sellers.friendsellers')
                        ->where(function ($query) use ($searchTerm) {
                            $query->where('name', $searchTerm)
                                ->orWhereHas('sellers', function ($subquery) use ($searchTerm) {
                                    $subquery->where('seller_documentid', $searchTerm);
                                });
                            })
                        ->where('type', 1)
                        ->first();
            if ($seller) {
                // echo"s";exit;
                return view("frontend/home", compact('seller'));
                // return view('search', compact('seller'));
            } else { 
                return view("frontend/home")->with('error', 'Seller not found');
                // return view('search')->with('error', 'Seller not found');
            }
        }
        elseif($searchType =="Buyer"){
            $buyer = User::with('buyers.familybuyers', 'buyers.friendbuyers')
                    ->where(function ($query) use ($searchTerm) {
                    $query->where('name', $searchTerm)
                        ->orWhereHas('buyers', function ($subquery) use ($searchTerm) {
                            $subquery->where('buyer_documentid', $searchTerm);
                        });
                    })
                ->where('type', 2)
                ->first();
            
            if ($buyer) {
                return view("frontend/home", compact('buyer'));
                // return view('search', compact('seller'));
            } else {
                return view("frontend/home")->with('error', 'Seller not found');
                // return view('search')->with('error', 'Seller not found');
            }
        }
        
    }

}
