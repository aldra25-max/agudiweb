<?php
namespace App\Http\Controllers;

use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::where('activo', true)
            ->orderBy('empresa')
            ->paginate(12);

        return view('sponsors.index', compact('sponsors'));
    }
}