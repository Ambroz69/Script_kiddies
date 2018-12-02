<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $filter_data_vars = array();

    public function index()
    {
        $ad = Ad::all()->toArray();
        //return dd($ad, count($ad));
        return view('home', compact('ad'));
    }

    public function showAd($id)
    {
        $ad = Ad::all()->load('address','user.realEstateOffice', 'user.realEstateOffice.address',
            'house.propertyDetails', 'apartment.propertyDetails', 'estate')->where('id', $id)->first();
        $images = Image::all()->where('ad_id','==',$id);
        $path = Storage::url('ad_images/');
        //return dd($path);
        return view('details', compact('ad','images', 'path'));
    }

    public function storeImage(Request $request, $ad_id) {
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
                    return redirect(route('show', $ad_id))->with('danger', 'Je možné nahrávať len súbory s príponou: .gif .jpg .png .bmp');
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
            //return dd($image);
            return redirect(route('show', $ad_id))->with('success', 'Obrázok bol pridaný.');
        } else {
            return redirect(route('show', $ad_id))->with('danger', 'Je potrebné vybrať súbor.');
        }

    }

    public function deleteImage(Request $request, Image $image) {
        File::delete('storage/ad_images/'.$image->name);
        //return dd(Storage::disk('local')->delete('ad_images/'.$image->name));
        try {
            $image->delete();
        } catch (\Exception $e) {

        }
        return redirect(route('show', $request->input('id')))->with('success', 'Obrázok bol vymazaný.');
    }

    public function relation($row) {
        if (strpos($row, 'a__') !== false) return 'apartment';
        if (strpos($row, 'ap__') !== false) return 'apartment.propertyDetails';
        if (strpos($row, 'h__') !== false) return 'house';
        if (strpos($row, 'hp__') !== false) return 'house.propertyDetails';
        if (strpos($row, 'e__') !== false) return 'estate';
        if (strpos($row, 'ad__') !== false) return 'address';
        return false;
    }

    public function filterType($row, $int_filters, $bool_filters) {
        if (strcmp($row, 'property_type') == 0) return 0;      //property_type = specialny pripad
        if (in_array($row, $int_filters)) return 1;                 //je to cislo
        if (in_array($row, $bool_filters)) return 2;                //je to boolean
        return 3;                                                   //je to string
    }

    public function removeRelationTags($row) {
        if (strpos($row, 'a__') !== false) return substr($row,3);
        if (strpos($row, 'ap__') !== false) return substr($row,4);
        if (strpos($row, 'h__') !== false) return substr($row,3);
        if (strpos($row, 'hp__') !== false) return substr($row,4);
        if (strpos($row, 'e__') !== false) return substr($row,3);
        if (strpos($row, 'ad__') !== false) return substr($row,4);
    }

    public function removeMinMaxTags($row) {
        return substr($row,0,-4);
    }

    public function filter(Request $request)        //here we go
    {
        DB::enableQueryLog();

        $filter_data = $request->all();
        $token = array_shift($filter_data);

//        $string = 'ad__city';
//        if ($this->relation($string)) $b = true;
//        else $b = false;
//        return dd($this->removeRelationTags($string), $b, $this->relation($string));

        $int_filters = array('price_min', 'price_max', 'ap__area_square_meters_min', 'ap__area_square_meters_max', 'hp__area_square_meters_min',
            'hp__area_square_meters_max', 'e__area_ares_min', 'e__area_ares_max', 'e__price_per_ares_min', 'e__price_per_ares_max');
        $bool_filters = array('ap__balcony', 'ap__cellar', 'ap__garage', 'ap__insulated', 'hp__balcony', 'hp__cellar', 'hp__garage',
            'hp__insulated', 'h__garden', 'h__terrace');
        $ads = Ad::with('address', 'user.realEstateOffice.address', 'house.propertyDetails', 'apartment.propertyDetails', 'estate');

        foreach ($filter_data as $filter_key => $filter_value) {
            if ($filter_value != null) {//ak je hodnota null, filter nebol pouzity a netreba ho riesit
                switch ($this->filterType($filter_key, $int_filters, $bool_filters)){
                    case 0:                                 //ak je filter: typ nehnutelnosti
                        if (strcmp($filter_value, 'byt') == 0)
                            $ads = $ads->where('apartment_ID', 'NOT LIKE', null);
                        if (strcmp($filter_value, 'dom') == 0)
                            $ads = $ads->where('house_ID', 'NOT LIKE', null);
                        if (strcmp($filter_value, 'pozemok') == 0)
                            $ads = $ads->where('estate_ID', 'NOT LIKE', null);
                        break;

                    case 1:                                 //ak je filter cislo od:do
                        if (strpos($filter_key, 'min') !== false) {     //ak obsahuje substring 'min'
                            $value = (int)$filter_value;
                            if ($this->relation($filter_key)) {         //ak je riadok v inej tabulke, je potrebne pouzit whereHas, inak staci where
                                $tableRow = $this->removeMinMaxTags($this->removeRelationTags($filter_key));
                                $ads = $ads->whereHas($this->relation($filter_key), function ($q) use ($filter_value, $tableRow) {
                                    $q->where($tableRow, '>=', $filter_value);
                                });
                            } else {
                                $ads = $ads->where($this->removeMinMaxTags($filter_key), '>=', $value);
                            }
                        }
                        if (strpos($filter_key, 'max') !== false) {     //ak obsahuje substring 'max'
                            $value = (int)$filter_value;
                            if ($this->relation($filter_key)) {
                                $tableRow = $this->removeMinMaxTags($this->removeRelationTags($filter_key));
                                $ads = $ads->whereHas($this->relation($filter_key), function ($q) use ($filter_value, $tableRow) {
                                    $q->where($tableRow, '<=', $filter_value);
                                });
                            } else {
                                $ads = $ads->where($this->removeMinMaxTags($filter_key), '<=', $value);
                            }
                        }
                        break;

                    case 2:                                 //ak je filter true/falee
                        $value = (int)$filter_value;
                        if ($this->relation($filter_key)) {
                            $tableRow = $this->removeRelationTags($filter_key);
                            $ads = $ads->whereHas($this->relation($filter_key), function ($q) use ($filter_value, $tableRow) {
                                $q->where($tableRow, 'LIKE', $filter_value);
                            });
                        } else {
                            $ads = $ads->where($filter_key, 'LIKE', $value);
                        }
                        break;

                    case 3:
                        //return dd($filter_data, $this->relation($filter_key));//ostatne filtre = stringy
                        if ($this->relation($filter_key)) {
                            $tableRow = $this->removeRelationTags($filter_key);
                            $ads = $ads->whereHas($this->relation($filter_key), function ($q) use ($filter_value, $tableRow) {
                                $q->where($tableRow, 'LIKE', "%" . $filter_value . "%");
                            });
                        } else {
                            $ads = $ads->where($filter_key, 'LIKE', "%" . $filter_value . "%");
                        }
                        break;
                }
            }
        }
        $select_data = array(           //moznosti pri filtrovani
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

        $ads_filtered = $ads->get()->toArray();
        $query = DB::getQueryLog();
        //return dd($filter_data);
        return view('filtered', compact('ads_filtered', 'filter_data', 'select_data'));

    }
}