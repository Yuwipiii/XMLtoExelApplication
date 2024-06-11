<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;

class XMLImportController extends Controller
{
    /**
     * @throws FileNotFoundException
     * @throws \Exception
     */
    public function import(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['xml' => 'required|file|mimetypes:application/xml,text/xml']);
        $xmlString = $request->file('xml')->get();
        $xml = new SimpleXMLElement($xmlString);

        DB::transaction(function () use ($xml) {
            $categories = $this->parseCategories($xml->shop->categories->category);
            $this->importOffers($xml->shop->offers->offer, $categories);
        });
        return redirect()->back()->with('message',"XML imported Successfully");
    }

    private function parseCategories($categories): array
    {
        $result = [];
        foreach ($categories as $category) {
            $id = (int)$category['id'];
            $name = (string)$category;
            $parentId = (int)$category['parentId'];

            $result[$id] = [
                'name' => $name,
                'parent_id' => $parentId,
            ];
        }

        return $result;
    }

    private function importOffers($offers, $categories): void
    {
        foreach ($offers as $offer) {
            $categoryId = (int)$offer->categoryId;
            $category = $categories[$categoryId]['name'];
            $subCategoryId = $categories[$categoryId]['parent_id'] ?? null;
            $subCategory = $subCategoryId ? $categories[$subCategoryId]['name'] : null;
            $subSubCategoryId = $subCategoryId ? $categories[$subCategoryId]['parent_id'] : null;
            $subSubCategory = $subSubCategoryId ? $categories[$subSubCategoryId]['name'] : null;
            $offerData = [
                'product_id' =>$offer['id']->__toString() ,
                'name' => (string)$offer->name,
                'url' => (string)$offer->url,
                'price' => (float)$offer->price,
                'old_price' => (float)$offer->oldprice,
                'currency_id' => (string)$offer->currencyId,
                'category' => $category,
                'sub_category' => $subCategory,
                'sub_sub_category' => $subSubCategory,
                'available' => filter_var((string)$offer['available'], FILTER_VALIDATE_BOOLEAN),
                'picture' => (string)$offer->picture,
                'vendor' => isset($offer->vendor) ? (string)$offer->vendor : null,
            ];
            Product::updateOrCreate(['name'=>$offer['name']], $offerData);
        }
    }
}
