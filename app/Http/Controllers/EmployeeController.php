<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ดึงข้อมูลลูกจ้างทั้งหมด พร้อมกับข้อมูลนายจ้างที่เกี่ยวข้อง
        $employees = Employee::with('employer')->latest()->get();

        // ส่งตัวแปร $employees ไปที่ view 'employees.index'
        return view('employees.index', compact('employees'));
    }
    /**
     * Show the form for creating a new employee for a specific employer.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function create(Employer $employer)
{
    return view('employees.create', compact('employer'));
}

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employer $employer)
    {
        // This function handles saving the new employee data
        $validatedData = $request->validate([
            'name_th' => 'required|string|max:255',
            'title_th' => 'nullable|string',
            'name_en' => 'nullable|string|max:255',
            'title_en' => 'nullable|string',
            'dob' => 'nullable|date',
            'nationality' => 'nullable|string',
            'passport_no' => 'nullable|string',
            'passport_type' => 'nullable|string',
            'passport_expiry_date' => 'nullable|date',
            'work_permit_no' => 'nullable|string',
            'work_permit_expiry_date' => 'nullable|date',
            'visa_expiry_date' => 'nullable|date',
            'work_permit_mou_group' => 'nullable|string',
            'work_permit_mou_group_other' => 'nullable|string',
            'ninety_day_report_date' => 'nullable|date',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('employee_photos', 'public');
            $validatedData['photo_path'] = $path;
        }

        // Create the employee and associate it with the employer
        $employer->employees()->create($validatedData);

        // Return a JSON response for our fetch API call in the create.blade.php
        return response()->json([
            'success' => true,
            'message' => 'เพิ่มพนักงานใหม่สำเร็จ!',
            'redirect_url' => route('employers.edit', $employer->id)
        ]);
    }

     public function edit(Employee $employee)
{
    $employers = Employer::orderBy('name_th')->get();
    return view('employees.edit', compact('employee', 'employers'));
}
    // You can add other methods like show, edit, update, destroy for employees later
}
