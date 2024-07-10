<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Seller;
use App\Models\Friendseller;
use App\Models\Familyseller;
use App\Models\Buyer;
use App\Models\Friendbuyer;
use App\Models\Familybuyer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function sellerinsert(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');  
        $user->email = $request->input('email');  
        $password = $request->input('password');  
        $user->password = Hash::make($password);
        $user->type = 1;  
        $user->role = 2;  
        $user->save();
        $lastInsertedId = $user->id;

        $lastSeller = Seller::orderBy('id', 'desc')->first();
        if (!$lastSeller) {
            $nextDocumentId = 'GS-0001';
        } else {
            $lastDocumentId = $lastSeller->seller_documentid;
            $numericPart = intval(substr($lastDocumentId, 3));
            $numericPart++; 
            $nextDocumentId = 'GS-' . sprintf('%04d', $numericPart);
        }

        $seller = new Seller;
        $seller->seller_documentid = $nextDocumentId; 
        $seller->user_id = $lastInsertedId; 
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
        $seller->whatsappno = $request->input('whatsapnumber'); 
        $seller->fblink = $request->input('fblink'); 
        $seller->instagramlink = $request->input('instagramlink'); 
        $seller->snapchatlink = $request->input('snapchatlink'); 
        $seller->pinterestlink = $request->input('pinterestlink'); 
        $seller->websitelink = $request->input('websitelink'); 
        $seller->sellertype = $request->input('sellertype'); 
        $seller->save();
        $lastInsertedId = $seller->id;
        $friendseller = new Friendseller;
        $friendseller->seller_id = $lastInsertedId; 
        $friendseller->friendname = $request->input('friendname'); 
        $friendseller->friendnumber = $request->input('friendnumber'); 
        $friendseller->friendemail = $request->input('friendemail'); 
        $friendseller->friendfblink = $request->input('friendfblink'); 
        $friendseller->save();
        // $familyseller = new Familyseller;
        // $familyseller->seller_id = $lastInsertedId; 
        // $familyseller->familymembername = $request->input('familymembername'); 
        // $familyseller->familymemberNumber = $request->input('familymembernumber'); 
        // $familyseller->familymemberemail = $request->input('familymemberemail'); 
        // $familyseller->familymemberfblink = $request->input('familymemberfblink'); 
        // $familyseller->save();
        for ($i = 1; $i <= 3; $i++) { 
            $familyseller = new Familyseller;
            $familyseller->seller_id = $lastInsertedId; 
            if (isset($_POST['familymembername'][$i])) {
                $familyseller->familymembername = $_POST['familymembername'][$i];
            }
            if (isset($_POST['familymembernumber'][$i])) {
                $familyseller->familymembernumber = $_POST['familymembernumber'][$i];
            }
            if (isset($_POST['familymemberemail'][$i])) {
                $familyseller->familymemberemail = $_POST['familymemberemail'][$i];
            }
            if (isset($_POST['familymemberfblink'][$i])) {
                $familyseller->familymemberfblink = $_POST['familymemberfblink'][$i];
            }
            $familyseller->save();
        }
        return redirect()->back();
    }
    public function buyerinsert(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');  
        $user->email = $request->input('email');  
        $password = $request->input('password');  
        $user->password = Hash::make($password);
        $user->type = 2;
        $user->role = 2;  
        $user->save();
        $lastInsertedId = $user->id;

        $lastBuyer = Buyer::orderBy('id', 'desc')->first();
        if (!$lastBuyer) {
            $nextDocumentId = 'GB-0001';
        } else {
            $lastDocumentId = $lastBuyer->buyer_documentid;
            $numericPart = intval(substr($lastDocumentId, 3));
            $numericPart++; 
            $nextDocumentId = 'GB-' . sprintf('%04d', $numericPart);
        }

        $buyer = new Buyer;
        $buyer->buyer_documentid = $nextDocumentId; 
        $buyer->user_id = $lastInsertedId; 
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
        $buyer->whatsappno = $request->input('whatsapnumber'); 
        $buyer->fblink = $request->input('fblink'); 
        $buyer->instagramlink = $request->input('instagramlink'); 
        $buyer->snapchatlink = $request->input('snapchatlink'); 
        $buyer->pinterestlink = $request->input('pinterestlink'); 
        $buyer->websitelink = $request->input('websitelink'); 
        $buyer->buyertype = $request->input('buyertype'); 
        $buyer->save();
        $lastInsertedId = $buyer->id;
        $friendbuyer = new Friendbuyer;
        $friendbuyer->buyer_id = $lastInsertedId; 
        $friendbuyer->friendname = $request->input('friendname'); 
        $friendbuyer->friendnumber = $request->input('friendnumber'); 
        $friendbuyer->friendemail = $request->input('friendemail'); 
        $friendbuyer->friendfblink = $request->input('friendfblink'); 
        $friendbuyer->save();
        // $familybuyer = new Familybuyer;
        // $familybuyer->seller_id = $lastInsertedId; 
        // $familybuyer->familymembername = $request->input('familymembername'); 
        // $familybuyer->familymemberNumber = $request->input('familymembernumber'); 
        // $familybuyer->familymemberemail = $request->input('familymemberemail'); 
        // $familybuyer->familymemberfblink = $request->input('familymemberfblink'); 
        // $familybuyer->save();
        for ($i = 1; $i <= 3; $i++) { 
            $familybuyer = new Familybuyer;
            $familybuyer->buyer_id = $lastInsertedId; 
            if (isset($_POST['familymembername'][$i])) {
                $familybuyer->familymembername = $_POST['familymembername'][$i];
            }
            if (isset($_POST['familymembernumber'][$i])) {
                $familybuyer->familymemberNumber = $_POST['familymembernumber'][$i];
            }
            if (isset($_POST['familymemberemail'][$i])) {
                $familybuyer->familymemberemail = $_POST['familymemberemail'][$i];
            }
            if (isset($_POST['familymemberfblink'][$i])) {
                $familybuyer->familymemberfblink = $_POST['familymemberfblink'][$i];
            }
            $familybuyer->save();
        }
        return redirect()->back();
    }
    
}
