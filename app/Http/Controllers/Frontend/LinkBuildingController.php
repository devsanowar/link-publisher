<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutLinkBuilding;
use App\Models\Achievement;
use App\Models\BuildBacklink;
use App\Models\LinkBuildingPackage;
use App\Models\LinkBuildingProcess;
use App\Models\LinkBuildingReason;
use App\Models\LinkBuildingReasonFeature;
use App\Models\LinkBuildingSolution;
use App\Models\WhychoseUsLinkBuilder;
use Illuminate\Http\Request;

class LinkBuildingController extends Controller
{
    public function index(){
        $aboutLinkBuilding = AboutLinkBuilding::first();
        $packages = LinkBuildingPackage::where('is_active', 1)
                    ->get()                
                    ->keyBy('package_type');

        $whyChoseLinkPublishers = WhychoseUsLinkBuilder::where('is_active', 1)->get();
        $achievements = Achievement::where('is_active', 1)->get();
        $backlink = BuildBacklink::first();
        $linkBuildingProcesses = LinkBuildingProcess::where('is_active', 1)->get();
        $linkBuildingSolution = LinkBuildingSolution::first();
        $linkbuildingReason = LinkBuildingReason::first();
        $reasonFeatures = LinkBuildingReasonFeature::where('is_active', 1)->get();


        return view('website.link-building', compact('aboutLinkBuilding', 'packages','whyChoseLinkPublishers','achievements','backlink','linkBuildingProcesses','linkBuildingSolution','linkbuildingReason', 'reasonFeatures'));
    }
}
