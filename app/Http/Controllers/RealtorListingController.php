<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        // dd(Auth::user()->listings);
        // dd($request->boolean('deleted'));
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ... $request->only(['by', 'order'])
        ];

        return inertia(
            'Realtor/Index',
            [
                'filters' => $filters,
                'listings' => Auth::user()
                    ->listings()
                    // ->mostRecent()
                    ->filter($filters)
                    ->paginate(5)
                    ->withQueryString()
                    // ->get()
            ]
        );
    }

    public function destroy(Listing $listing)
    {
        /**
         * Delete the model from the database within a transaction.
         **/
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing deleted successfully');
    }
}
