<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Shop;
use Illuminate\Support\Facades\DB;

/**
 * Class ShopService.
 */
class ShopService
{
    public function show(Request $request, Shop $shop)
    {
        
        return $shop;
    }

    public function create($input)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $input['user_id'] = $user->id;

            $shop = Shop::create($input);

            DB::commit();

            return $shop;
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function update($input, Shop $shop)
    {
        try {
            DB::beginTransaction();

            $shop->update($input);

            DB::commit();

            return $shop;
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function delete()
    {
        //
    }

}
