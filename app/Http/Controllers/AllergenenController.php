<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Allergeen;
use App\Models\Product;
use App\Models\Leverancier;
use App\Models\Contact;
use App\Models\ProductPerLeverancier;

class AllergenenController extends Controller
{
   public function index(Request $request)
{
    $allergeenId = $request->input('allergeen_id');
    $page = $request->input('page', 1);
    $limit = 4;
    $offset = ($page - 1) * $limit;

    $allergenen = Allergeen::all();

    $producten = [];

    if ($allergeenId) {
        $producten = DB::select("CALL sp_get_allergenen_overview(?, ?, ?)", [
            $allergeenId,
            $offset,
            $limit
        ]);

        // Convert array → Collection
        $producten = collect($producten);

        // Count total rows for pagination
        $total = DB::table('ProductPerAllergeen')
            ->join('Product', 'Product.Id', '=', 'ProductPerAllergeen.ProductId')
            ->where('AllergeenId', $allergeenId)
            ->count();

        $lastPage = ceil($total / $limit);
    } else {
        $lastPage = 1;
    }

    return view('allergenen.index', [
        'allergenen' => $allergenen,
        'producten' => $producten,
        'selectedAllergeenId' => $allergeenId,
        'page' => $page,
        'lastPage' => $lastPage,
    ]);
}

    public function leverancier($productId)
    {
        $leverancier = Leverancier::join('ProductPerLeverancier', 'Leverancier.Id', '=', 'ProductPerLeverancier.LeverancierId')
            ->where('ProductPerLeverancier.ProductId', $productId)
            ->orderBy('ProductPerLeverancier.DatumLevering', 'desc')
            ->first();

        $contact = null;
        if ($leverancier && $leverancier->ContactId) {
            $contact = Contact::find($leverancier->ContactId);
        }

        return view('allergenen.leverancier', [
            'leverancier' => $leverancier,
            'contact' => $contact,
        ]);
    }
}