<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\BodyPart;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;

class GetAllInfoController extends Controller
{
    public function getAllInfo()
{
    $categories = Category::all()->map(function($category) {
        $category->img = url('images/' . $category->img); // Generate full URL for image
        return $category;
    });

    $subcategories = Subcategory::all()->map(function($subcategory) {
        $subcategory->img = url('images/' . $subcategory->img);
        return $subcategory;
    });

    $bodyParts = BodyPart::all()->map(function($bodyPart) {
        $bodyPart->img = url('images/' . $bodyPart->img);
        return $bodyPart;
    });

    $cities = City::all();
    $locations = Location::all();

    return response()->json([
        'categories' => $categories,
        'subcategories' => $subcategories,
        'bodyParts' => $bodyParts,
        'cities' => $cities,
        'locations' => $locations
    ]);
}
}
