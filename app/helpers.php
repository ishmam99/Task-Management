<?php

use App\Models\CompanySetting;
use Illuminate\Support\Facades\File;

function uploadFile($file, $folder = '/'): ?string
{
    if ($file) {
        $image_name = Rand() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $image_name, 'public');
    }
    return null;
}

function setImage($url = null, $type = null, $default_image = true): string
{
    if ($type == 'user') {
        return ($url != null) ? asset('storage/' . $url) : ($default_image ? asset('default/default_user.png') : '');
    }
    return ($url != null) ? asset('storage/' . $url) : ($default_image ? asset('default/default_image.png') : '');
}

function updateFile($new_image = null, $folder = '/', $old_image = null)
{
    if ($new_image) {

        if ($old_image) {
            if (File::exists('storage/' . $old_image))
                unlink(public_path() . '/storage/' . $old_image);
            $image_name = Rand() . '.' . $new_image->getClientOriginalExtension();
            return $new_image->storeAs($folder, $image_name, 'public');
        }
    }
    return null;
}
function deleteFile($data_image = null)
{
    return unlink(public_path() . '/storage/' . $data_image);
}
function calculateAllowance($payroll)
{
    return  $payroll->dearness + $payroll->house_rent + $payroll->medical + $payroll->education + $payroll->charge_allow + $payroll->entertainment + $payroll->mobile + $payroll->telephone + $payroll->washing + $payroll->conveyance + $payroll->tiffin + $payroll->car_maintenance + $payroll->group_insurance;
}
function calculateDeduction($payroll)
{
    return  $payroll->provident_fund + $payroll->pf_loan + $payroll->house_building_loan + $payroll->house_repairing_loan + $payroll->car_loan + $payroll->motor_cycle_loan + $payroll->bi_cycle_loan + $payroll->computer_loan + $payroll->welfare_loan + $payroll->income_tax + $payroll->transport + $payroll->group_insurance_deduction + $payroll->benevolent_fund + $payroll->municipal_bill + $payroll->water_bill + $payroll->gas_bill + $payroll->revenue_stamp + $payroll->officer_welfare_assoc + $payroll->union_subscription + $payroll->others;
}
function grossSalary($payroll)
{
    return $payroll->dearness + $payroll->house_rent + $payroll->medical + $payroll->education + $payroll->charge_allow + $payroll->entertainment + $payroll->mobile + $payroll->telephone + $payroll->washing + $payroll->conveyance + $payroll->tiffin + $payroll->car_maintenance + $payroll->group_insuranc + $payroll->basic;
}
function netPayable($payroll)
{
    return
        $payroll->dearness +
        $payroll->house_rent +
        $payroll->medical +
        $payroll->education +
        $payroll->charge_allow +
        $payroll->entertainment +
        $payroll->mobile +
        $payroll->telephone +
        $payroll->washing +
        $payroll->conveyance +
        $payroll->tiffin +
        $payroll->car_maintenance +
        $payroll->group_insurance -
        ($payroll->provident_fund +
            $payroll->pf_loan +
            $payroll->house_building_loan +
            $payroll->house_repairing_loan +
            $payroll->car_loan +
            $payroll->motor_cycle_loan +
            $payroll->bi_cycle_loan +
            $payroll->computer_loan +
            $payroll->welfare_loan +
            $payroll->income_tax +
            $payroll->transport +
            $payroll->gropu_insurance_deduction +
            $payroll->benevolent_fund +
            $payroll->municipal_bill +
            $payroll->water_bill +
            $payroll->gas_bill +
            $payroll->revenue_stamp +
            $payroll->officer_welfare_assoc +
            $payroll->union_subscription +
            $payroll->others);
}
