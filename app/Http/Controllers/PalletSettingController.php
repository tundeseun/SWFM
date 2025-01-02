<?php

namespace App\Http\Controllers;

use App\Models\PalletSetting;
use App\Models\PalletGroup;
use Illuminate\Http\Request;

class PalletSettingController extends Controller
{
    public function index()
    {
        return response()->json(PalletSetting::with('groups')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'total_pallets' => 'required|integer',
            'max_weight' => 'required|numeric',
            'min_weight' => 'required|numeric',
            'groups' => 'required|array',
            'groups.*.group_name' => 'required|string',
            'groups.*.categories' => 'required|array',
        ]);

        $palletSetting = PalletSetting::create($request->only('total_pallets', 'max_weight', 'min_weight'));

        foreach ($request->groups as $group) {
            $palletSetting->groups()->create($group);
        }

        return response()->json($palletSetting->load('groups'), 201);
    }

    public function update(Request $request, PalletSetting $palletSetting)
    {
        $request->validate([
            'total_pallets' => 'integer',
            'max_weight' => 'numeric',
            'min_weight' => 'numeric',
            'groups' => 'array',
            'groups.*.group_name' => 'string',
            'groups.*.categories' => 'array',
        ]);

        $palletSetting->update($request->only('total_pallets', 'max_weight', 'min_weight'));

        if ($request->has('groups')) {
            $palletSetting->groups()->delete();
            foreach ($request->groups as $group) {
                $palletSetting->groups()->create($group);
            }
        }

        return response()->json($palletSetting->load('groups'));
    }

    public function destroy(PalletSetting $palletSetting)
    {
        $palletSetting->delete();
        return response()->json(['message' => 'Pallet Setting deleted successfully']);
    }
}

