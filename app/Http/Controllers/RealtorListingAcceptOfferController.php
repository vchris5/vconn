<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        // Accept the selected offer
        $offer->update(['accepted_at' => now()]);

        // Rejects all other offers
        $offer->listing->offers()->except($offer)
            ->update(['rejected_at' => now()]);

        return redirect()->back()
            ->with(
                'success',
                "Offer #{$offer->id} has been accepted, other offers rejected"
            );
    }
}
