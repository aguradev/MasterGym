<?php

namespace App\Models\CentralModel;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPlanVersion extends Model
{
    use HasFactory, HasUuids;
    protected $table = "tenant_plan_versions";

    protected $fillable = [
        "subscription_plan_id",
        "price_per_month",
        "price_per_year",
        "version"
    ];

    public function PlanFeatures()
    {
        return $this->belongsToMany(TenantPlanFeature::class, "tenant_plan_has_features", "subscription_plan_id", "feature_plan_id");
    }
}
