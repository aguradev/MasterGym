<?php

namespace App\Http\Controllers\MainPlatform\Dashboard\Nav;

use App\CentralServices\User\Services\Interfaces\CredentialInterface as CredentialService;
use App\Http\Controllers\Controller;
use App\Models\CentralModel\TenantPlanFeature;
use App\Models\Gym\Tenant;
use Barryvdh\Debugbar\Facades\Debugbar;
use DebugBar\DebugBar as DebugBarDebugBar;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NavigationController extends Controller
{
    private $credentialService;

    function __construct(CredentialService $credentialService)
    {
        $this->credentialService = $credentialService;
    }
    public function DashboardPage()
    {
        $TenantLatest = Tenant::rightJoin("domains", "tenants.id", "=", "domains.tenant_id")->where("status", "ACTIVE")->limit(5)->get()->select(["name", "domain"]);

        DebugBar::debug($TenantLatest);
        $TenantCount = Tenant::count();

        Debugbar::debug($TenantCount);
        Debugbar::debug($this->credentialService->getUserAuth());

        Debugbar::debug("tenantLatest : {$TenantLatest}");
        return Inertia::render("dashboard/central_page/Overview", [
            "tenantLatest" => $TenantLatest,
            "tenantCount" => $TenantCount
        ]);
    }

    public function PlanOverviewMenu()
    {
        return Inertia::render("dashboard/central_page/subscription_page/Index");
    }
}
