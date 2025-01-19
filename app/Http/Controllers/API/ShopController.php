<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Resources\ShopResource;
use App\Http\Requests\Shop\StoreShopRequest;
use App\Http\Requests\Shop\UpdateShopRequest;
use App\Services\ShopService;
use App\Models\Shop;

class ShopController extends Controller
{
    private $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    public function index()
    {
        // not applicable
    }

    public function store(StoreShopRequest $request)
    {
        // todo apply policy 
        // - user can only create single shop (NO MULTIPLE SHOP)

        $shop = $this->shopService->create($request->validated());
        
        return new ShopResource($shop);
    }

    public function show(Request $request, Shop $shop)
    {
        return new ShopResource($shop);
        
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        // todo apply policy 
        // - if user has shop then only user can update shop detail
        // - only user can update shop detail

        // $user = Auth::user();
        // $shop = $user->shop;

        $shop = $this->shopService->update($request->validated(), $shop);
    
        return new ShopResource($shop);
    }

    public function destroy(string $id)
    {
        // todo apply policy - only user can update shop detail
    }
}
