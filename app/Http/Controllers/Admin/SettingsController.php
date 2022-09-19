<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\ShippingCost;
use App\Models\State;
use Dymantic\InstagramFeed\InstagramFeed;
use Dymantic\InstagramFeed\Profile;
use Illuminate\Http\Request;
use stdClass;

class SettingsController extends Controller
{
    public function general()
    {
        return view('admin.setting.general');
    }

    public function shipping()
    {
        $costs = ShippingCost::with('states')->get();
        return view('admin.setting.shipping', compact('costs'));
    }

    public function editShippingCost(ShippingCost $cost)
    {
        $cost->load('states');

        $states = State::all();
        $stateData = collect();

        foreach ($states as $state) {
            if($cost->states->contains($state))
            {
                $c = new stdClass();
                $c->id = $state->id;
                $c->text = $state->name;
                $c->selected = true;

                $stateData->push($c);
            }
            else{
                $c = new stdClass();
                $c->id = $state->id;
                $c->text = $state->name;

                $stateData->push($c);
            }
        }


        return view('admin.setting.edit-shipping', compact('cost', 'states', 'stateData'));
    }

    public function updateShippingCost(Request $request, ShippingCost $cost)
    {
        $cost->update([
            'group_name' => $request->group_name,
             'pickup_amount' => $request->pickup_amount,
             'delivery_amount' => $request->delivery_amount
        ]);

        $cost->load('states');

        foreach ($cost->states as $state) {
            $state->shipping_cost()->dissociate();
            $state->save();
        }

        foreach ($request->collect('state_ids') as $state_id) {
            $cost->states()->save(State::find($state_id));
        }

        flash('Shipping Cost updated successfully')->success();

        return redirect()->route('admin.settings.shipping.index');
    }

    public function deleteShippingCost(Request $request, ShippingCost $cost)
    {
        $cost->delete();

        return "";
    }

    public function instagramTestmonials(Request $request)
    {
        $images = ReviewImage::query()->limit(15)->latest()->get();
        return view('admin.setting.instagram-testmonials', compact('images'));
    }

    public function listTestmonialsFromInstagram()
    {
        InstagramFeed::for('marvinsworld')->refresh(10);
        $feeds = InstagramFeed::for('marvinsworld', 10);
        return view('admin.setting.list-instagram-testmonials', compact('feeds'));
    }

    public function newInstagramTestmonial()
    {
        return view('admin.setting.link-instagram-testmonial');
    }

    public function linkInstagramTestmonial(Request $request)
    {
        $request->validate([
            'permalink' => 'required',
            'url' => 'required|url'
        ]);

        $reviewImage = ReviewImage::create([
            'permalink' => $request->permalink,
            'url' => $request->url
        ]);

        flash('Post Linked Successfully')->success();

        return redirect()->route('admin.settings.instagram-testmonials.index');
    }

    public function unlinkInstagramTestmonial(Request $request, ReviewImage $reviewImage)
    {
        $reviewImage->delete();
        flash('Post unLinked Successfully')->success();

        return redirect()->route('admin.settings.instagram-testmonials.index');
    }

}
