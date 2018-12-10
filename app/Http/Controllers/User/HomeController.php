<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 03.12.2018
 * Time: 21:05
 */

namespace App\Http\Controllers\User;

use App\Ad;
use App\Address;
use App\Apartment;
use App\Estate;
use App\House;
use App\Http\Controllers\Controller;
use App\Image;
use App\PropertyDetail;
use Illuminate\Support\Facades\Auth;
use App\RealEstateOffice;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.home');
    }

    public function showOffice()        //zobrazi RK pouzivatela, ak nejaku ma, inak mu ponukne moznost vytvorit novu/pridat sa k existujucej
    {
        $user_logged_in = Auth::user();
        $user = User::all()->load('realEstateOffice')->where('id', $user_logged_in->id)->first();
        $office_id = null;
        if ($user->real_estate_office_id != null) {
            $office_id = $user->real_estate_office_id;
            $user = $user->load('realEstateOffice.address');
        }
        return view('user.office.index', compact('user','office_id'));
    }

    public function findOffice()        //najde existujuce RK
    {
        $user_logged_in = Auth::user();
        $user = User::all()->load('realEstateOffice')->where('id', $user_logged_in->id)->first();
        $offices = RealEstateOffice::all()->pluck('name', 'id');
        return view('user.office.find', compact('user', 'offices'));
    }

    public function addRequest(Request $request, User $user)        //pouzivatel odosle ziadost o prijatie do RK
    {
        $office = RealEstateOffice::where('name','LIKE',$request->get('office'))->get();
        $user->real_estate_office_id = $office[0]['id'];
        $user->status = 'čakajúci';
        $user->save();
        return redirect(route('user.office'));
    }

    public function cancelRequest()     //pouzivatel zrusi ziaddost o prijatie do RK
    {
        $user = Auth::user();
        $user->real_estate_office_id = null;
        $user->status = null;
        $user->save();
        return redirect(route('user.office'));
    }

    public function requests()      //zoznam ziadosti pre spravcu RK
    {
        $user_office = Auth::user()->real_estate_office_id;
        $pending_users = array_values(User::all()->where('real_estate_office_id','LIKE',$user_office)
            ->where('status','LIKE','čakajúci')->toArray());
        return view('user.office.requests', compact('pending_users'));
    }

    public function acceptRequest(User $user)       //prijatie ziadosti = novy zamestnanec
    {
        $user->status = 'prijatý';
        $user->save();
        return redirect(route('user.office.requests'));
    }

    public function rejectRequest(User $user)       //odmietnutie ziadosti = nechceme ho
    {
        $user->real_estate_office_id = null;
        $user->status = null;
        $user->save();
        return redirect(route('user.office.requests'));
    }

    public function employees()     //zobrazi zoznam vsetkych prijatych zamestnancov RK
    {
        $user_office = Auth::user()->real_estate_office_id;
        $user_status = Auth::user()->status;
        $office_admin = User::all()->where('real_estate_office_id','LIKE',$user_office)
            ->where('status','LIKE','správca')->first();
        $employees = User::all()->where('real_estate_office_id','LIKE',$user_office)
            ->where('status','LIKE','prijatý');

        if (isset($office_admin)) $office_admin = $office_admin->toArray();
        if (isset($employees)) $employees = array_values($employees->toArray());
        //return dd($user_office, $employees, $office_admin, $user_status);
        return view('user.office.employees', compact('employees','office_admin','user_office','user_status'));
    }

    public function removeEmployee(User $user)      //vymazanie zamestnanca (iba pre spravcu RK)
    {
        $user->real_estate_office_id = null;
        $user->status = null;
        $user->save();
        return redirect(route('user.office.employees'));
    }

    public function createOffice()      //vytvorenie novej RK part1
    {
        return view('user.office.create');
    }

    public function storeOffice(Request $request)       //vytvorenie novej RK part2
    {
        $statement = DB::select("show table status like 'addresses'");
        $address_id = $statement[0]->Auto_increment;
        $statement2 = DB::select("show table status like 'real_estate_offices'");
        $office_id = $statement2[0]->Auto_increment;
        $user = Auth::user();

        $address = new Address();
        $office = new RealEstateOffice();

        $address->address_name = $request->get('address_name');
        $address->address_number = $request->get('address_number');
        $address->city = $request->get('city');
        $address->zip = $request->get('zip');
        $address->region = $request->get('region');
        $address->save();

        $office->name = $request->get('name');
        $office->web = $request->get('web');
        $office->phone = $request->get('phone');
        $office->address_id = $address_id;
        $office->save();

        $user->real_estate_office_id = $office_id;
        $user->status = 'správca';
        $user->save();

        return redirect(route('user.office'));
    }

    public function editOffice($id)        //upravenie RK part1 (iba pre spravcu RK)
    {
        $user = User::where('id','LIKE',$id)->get()->first()->load('realEstateOffice.address');
        //return dd($user);
        return view('user.office.edit', compact('user'));
    }

    public function updateOffice(Request $request, User $user)      //upravenie RK part2 (iba pre spravcu RK))
    {

        $office = $user->realEstateOffice;
        $address = $user->realEstateOffice->address;

        $address->address_name = $request->get('address_name');
        $address->address_number = $request->get('address_number');
        $address->city = $request->get('city');
        $address->zip = $request->get('zip');
        $address->region = $request->get('region');
        $address->save();

        $office->name = $request->get('name');
        $office->web = $request->get('web');
        $office->phone = $request->get('phone');
        $office->save();

        return redirect(route('user.office'));
    }

    public function showMyAds()     //zobrazenie vsetkych inzeratov prihlaseneho pouzivatela
    {
        $user = Auth::user();
        $ads = array_values(Ad::all()->load('address','user.realEstateOffice', 'user.realEstateOffice.address',
            'house.propertyDetails', 'apartment.propertyDetails', 'estate')->where('user_id', $user->id)->toArray());

        //return dd($ads);
        return view('user.ads.index', compact('ads','user'));
    }

    public function showAd(Ad $ad)      //nahlad na konkretny inzerat
    {
        $user = Auth::user();
        $ad = $ad->load('address','user.realEstateOffice', 'user.realEstateOffice.address',
            'house.propertyDetails', 'apartment.propertyDetails', 'estate');
        $images = Image::all()->where('ad_id','==',$ad->id);
        $path = Storage::url('ad_images/');
        return view('user.ads.show', compact('ad','path','images','user'));
    }

    public function storeImage(Request $request, $ad_id) {      //pridanie obrazku k inzeratu
        $img = $request->file('imagename');

        if (isset($img)) {
            list($width, $height, $type, $attr) = getimagesize($img);

            switch ($type) {
                case 1:
                    $picture_type = 'GIF';
                    break;
                case 2:
                    $picture_type = 'JPG';
                    break;
                case 3:
                    $picture_type = 'PNG';
                    break;
                case 6:
                    $picture_type = 'BMP';
                    break;
                default:
                    return redirect(route('user.ads.show', $ad_id))->with('danger', 'Je možné nahrávať len súbory s príponou: .gif .jpg .png .bmp');
                    break;
            }
            $img = $request->file('imagename')->store('public/ad_images');
            $image = new Image();
            $image->name = basename($img);
            $image->width = $width;
            $image->height = $height;
            $image->type = $picture_type;
            $image->image_string = $attr;
            $image->ad_id = $ad_id;
            $image->save();
            return redirect(route('user.ads.show', $ad_id))->with('success', 'Obrázok bol pridaný.');
        } else {
            return redirect(route('user.ads.show', $ad_id))->with('danger', 'Je potrebné vybrať súbor.');
        }

    }

    public function deleteImage(Request $request, Image $image) {       //vymazanie obrazku z inzeratu
        File::delete('storage/ad_images/'.$image->name);
        try {
            $image->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('user.ads.show', $request->input('id')))->with('success', 'Obrázok bol vymazaný.');
    }

    public function createAd()      //vytvorenie noveho inzeratu part1
    {
        $select_data = array(   //moznosti pri filtrovani
            'region' => [
                'Bratislavský',
                'Trnavský',
                'Trenčiansky',
                'Nitriansky',
                'Žilinský',
                'Banskobystrický',
                'Prešovský',
                'Košický'
            ],
            'type' => [
                'novostavba',
                'prerobený',
                'čiastočne prerobený',
                'v pôvodnom stave'
            ],
            'window_type' => [
                'plastové',
                'drevené',
                'dreveno-hliníkové',
                'hliníkové',
                'oceľové',
                'bezrámové'
            ],
            'direction' => [
                'sever',
                'juh',
                'východ',
                'západ',
                'severo-východ',
                'severo-západ',
                'juho-východ',
                'juho-západ'
            ],
            'heating' => [
                'plynom',
                'drevom',
                'elektrickou energiou',
                'kotol',
                'solárne systémy',
                'tepelné čerpadlá',
                'hybridné'
            ],
            'internet' => [
                'bezdrôtové pripojenie',
                'káblové pripojenie',
                'optický kábel',
                'bez internetu'
            ],
            'estate_type' => [
                'záhrada',
                'orná pôda',
                'sad/chmelnica/vinica',
                'lesná pôda',
                'lúka/pasienok',
                'rekreačný pozemok',
                'priemyselná zóna',
                'stavebný pozemok'
            ]);
        return view('user.ads.create', compact('select_data'));
    }

    public function storeAd(Request $request)       //vytvorenie noveho inzeratu part2
    {
        $statement = DB::select("show table status like 'addresses'");
        $address_id = $statement[0]->Auto_increment;

        $user_id = Auth::user()->id;
        $address = new Address();
        $ad = new Ad();

        $address->address_name = $request->get('address_name');
        $address->address_number = $request->get('address_number');
        $address->city = $request->get('city');
        $address->zip = $request->get('zip');
        $address->region = $request->get('region');
        $address->save();

        switch($request->get('property_type')) {
            case("byt"):
                $statement2 = DB::select("show table status like 'property_details'");
                $property_details_id = $statement2[0]->Auto_increment;
                $statement3 = DB::select("show table status like 'apartments'");
                $apartment_id = $statement3[0]->Auto_increment;

                $property_details = new PropertyDetail();
                $property_details->area_square_meters = $request->get('a_area_square_meters');
                $property_details->type = $request->get('a_type');
                $property_details->window_type = $request->get('a_window_type');
                $property_details->direction = $request->get('a_direction');
                $property_details->balcony = $request->get('a_balcony');
                $property_details->cellar = $request->get('a_cellar');
                $property_details->garage = $request->get('a_garage');
                $property_details->insulated = $request->get('a_insulated');
                $property_details->heating = $request->get('a_heating');
                $property_details->internet = $request->get('a_internet');
                $property_details->save();

                $apartments = new Apartment();
                $apartments->room_count = $request->get('a_room_count');
                $apartments->floor = $request->get('a_floor');
                $apartments->property_details_id = $property_details_id;
                $apartments->save();

                $ad->apartment_id = $apartment_id;
                break;

            case("dom"):
                $statement2 = DB::select("show table status like 'property_details'");
                $property_details_id = $statement2[0]->Auto_increment;
                $statement4 = DB::select("show table status like 'houses'");
                $house_id = $statement4[0]->Auto_increment;

                $property_details = new PropertyDetail();
                $property_details->area_square_meters = $request->get('h_area_square_meters');
                $property_details->type = $request->get('h_type');
                $property_details->window_type = $request->get('h_window_type');
                $property_details->direction = $request->get('h_direction');
                $property_details->balcony = $request->get('h_balcony');
                $property_details->cellar = $request->get('h_cellar');
                $property_details->garage = $request->get('h_garage');
                $property_details->insulated = $request->get('h_insulated');
                $property_details->heating = $request->get('h_heating');
                $property_details->internet = $request->get('h_internet');
                $property_details->save();

                $house = new House();
                $house->floor_count = $request->get('h_floor_count');
                $house->terrace = $request->get('h_terrace');
                $house->garden = $request->get('h_gardedn');
                $house->property_details_id = $property_details_id;
                $house->save();

                $ad->house_id = $house_id;

                break;

            case("pozemok"):
                $statement5 = DB::select("show table status like 'estates'");
                $estate_id = $statement5[0]->Auto_increment;

                $estate = new Estate();
                $estate->type = $request->get('e_type');
                $estate->area_ares = $request->get('e_area_ares');
                $estate->price_per_ares = $request->get('e_price_per_ares');
                $estate->save();

                $ad->estate_id = $estate_id;
                break;
        }

        $ad->price = $request->get('price');
        $ad->description = $request->get('description');
        $ad->category = $request->get('category');
        $ad->notes = $request->get('notes');
        $ad->address_id = $address_id;
        $ad->user_id = $user_id;
        $ad->save();

        //return dd($request->all());
        return redirect(route('user.ads'));
    }

    public function editAd(Ad $ad)        //uprava inzeratu part1
    {
        $select_data = array(   //moznosti pri filtrovani
            'region' => [
                'Bratislavský',
                'Trnavský',
                'Trenčiansky',
                'Nitriansky',
                'Žilinský',
                'Banskobystrický',
                'Prešovský',
                'Košický'
            ],
            'type' => [
                'novostavba',
                'prerobený',
                'čiastočne prerobený',
                'v pôvodnom stave'
            ],
            'window_type' => [
                'plastové',
                'drevené',
                'dreveno-hliníkové',
                'hliníkové',
                'oceľové',
                'bezrámové'
            ],
            'direction' => [
                'sever',
                'juh',
                'východ',
                'západ',
                'severo-východ',
                'severo-západ',
                'juho-východ',
                'juho-západ'
            ],
            'heating' => [
                'plynom',
                'drevom',
                'elektrickou energiou',
                'kotol',
                'solárne systémy',
                'tepelné čerpadlá',
                'hybridné'
            ],
            'internet' => [
                'bezdrôtové pripojenie',
                'káblové pripojenie',
                'optický kábel',
                'bez internetu'
            ],
            'estate_type' => [
                'záhrada',
                'orná pôda',
                'sad/chmelnica/vinica',
                'lesná pôda',
                'lúka/pasienok',
                'rekreačný pozemok',
                'priemyselná zóna',
                'stavebný pozemok'
            ]);

        $ad_id = $ad->id;
        $ad = Ad::all()->load('address', 'user', 'house.propertyDetails', 'apartment.propertyDetails', 'estate')->where('id', $ad_id)->first();
        //return dd($ad);
        return view('user.ads.edit', compact('ad', 'select_data'));
    }

    public function updateAd(Request $request, Ad $ad)      //uprava inzeratu part2
    {

        $ad_id = $ad->id;
        $ad = Ad::where('id', $ad_id)->first()->load('address', 'user', 'house.propertyDetails', 'apartment.propertyDetails', 'estate');

        $address = $ad->address;
        $address->address_name = $request->get('address_name');
        $address->address_number = $request->get('address_number');
        $address->city = $request->get('city');
        $address->zip = $request->get('zip');
        $address->region = $request->get('region');
        $address->save();

        switch($request->get('property_type')) {
            case("byt"):
                $property_details = $ad->apartment->propertyDetails;
                $property_details->area_square_meters = $request->get('a_area_square_meters');
                $property_details->type = $request->get('a_type');
                $property_details->window_type = $request->get('a_window_type');
                $property_details->direction = $request->get('a_direction');
                $property_details->balcony = $request->get('a_balcony');
                $property_details->cellar = $request->get('a_cellar');
                $property_details->garage = $request->get('a_garage');
                $property_details->insulated = $request->get('a_insulated');
                $property_details->heating = $request->get('a_heating');
                $property_details->internet = $request->get('a_internet');
                $property_details->save();

                $apartments = $ad->apartment;
                $apartments->room_count = $request->get('a_room_count');
                $apartments->floor = $request->get('a_floor');
                $apartments->save();

                break;

            case("dom"):
                $property_details = $ad->house->propertyDetails;
                $property_details->area_square_meters = $request->get('h_area_square_meters');
                $property_details->type = $request->get('h_type');
                $property_details->window_type = $request->get('h_window_type');
                $property_details->direction = $request->get('h_direction');
                $property_details->balcony = $request->get('h_balcony');
                $property_details->cellar = $request->get('h_cellar');
                $property_details->garage = $request->get('h_garage');
                $property_details->insulated = $request->get('h_insulated');
                $property_details->heating = $request->get('h_heating');
                $property_details->internet = $request->get('h_internet');
                $property_details->save();

                $house = $ad->house;
                $house->floor_count = $request->get('h_floor_count');
                $house->terrace = $request->get('h_terrace');
                $house->garden = $request->get('h_gardedn');
                $house->save();

                break;

            case("pozemok"):
                $estate = $ad->estate;
                $estate->type = $request->get('e_type');
                $estate->area_ares = $request->get('e_area_ares');
                $estate->price_per_ares = $request->get('e_price_per_ares');
                $estate->save();

                break;
        }

        $ad->price = $request->get('price');
        $ad->description = $request->get('description');
        $ad->category = $request->get('category');
        $ad->notes = $request->get('notes');
        $ad->save();

        return redirect(route('user.ads'));
    }

    public function deleteAd(Ad $ad)      //vymazanie inzeratu
    {
        try {
            $ad->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('user.ads'))->with('success', 'Záznam bol vymazaný.');
    }

    public function showOfficeAds()       //zobrazuje inzeraty vsetkych clenov RK
    {
        $user = Auth::user();
        $office_id = Auth::user()->real_estate_office_id;
        $ads = Ad::with('address', 'user', 'house.propertyDetails', 'apartment.propertyDetails', 'estate')
            ->whereHas('user', function ($q) use($office_id) {
            $q->where('real_estate_office_id', $office_id);
            })->get()->toArray();
        $employees = User::where('real_estate_office_id', $office_id)->get();
        //return dd($ads);
        return view('user.office.ads', compact('ads', 'employees', 'user'));
    }
}