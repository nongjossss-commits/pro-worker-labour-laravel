<?php

namespace App\Http\Controllers;

use App\Models\Delegate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- 1. เพิ่มการเรียกใช้ Storage

class DelegateController extends Controller
{
    public function index()
    {
        $delegates = Delegate::all();
        return view('delegates.index', compact('delegates'));
    }

    public function create()
    {
        return view('delegates.create');
    }

    public function store(Request $request)
    {
        // ตรวจสอบและดึงข้อมูลทั้งหมดจากฟอร์ม
        $validatedData = $request->validate([
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'national_id' => 'required|string|max:255|unique:delegates',
            'employee_id' => 'required|string|max:255|unique:delegates',
            'card_issue_date' => 'nullable|date',
            'card_expiry_date' => 'nullable|date',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ตรวจสอบไฟล์รูปภาพ
        ]);

        // ---- VVVV ส่วนจัดการรูปภาพที่เพิ่มเข้ามา VVVV ----
        if ($request->hasFile('photo')) {
            // 2. ถ้ามีการส่งไฟล์รูปมาด้วย...
            // ให้บันทึกไฟล์ลงใน storage/app/public/delegate_photos
            $path = $request->file('photo')->store('delegate_photos', 'public');
            
            // 3. นำ path ที่ได้จากการบันทึก มาใส่ในข้อมูลที่จะบันทึกลงฐานข้อมูล
            $validatedData['photo_path'] = $path;
        }
        // ---- ^^^^ สิ้นสุดส่วนจัดการรูปภาพ ^^^^ ----

        Delegate::create($validatedData);

        return redirect()->route('delegates.index')->with('success', 'บันทึกข้อมูลพนักงานใหม่สำเร็จแล้ว');
    }

    public function edit(Delegate $delegate)
    {
        return view('delegates.edit', compact('delegate'));
    }

    public function update(Request $request, Delegate $delegate)
    {
        $validatedData = $request->validate([
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'national_id' => 'required|string|max:255|unique:delegates,national_id,' . $delegate->id,
            'employee_id' => 'required|string|max:255|unique:delegates,employee_id,' . $delegate->id,
            'card_issue_date' => 'nullable|date',
            'card_expiry_date' => 'nullable|date',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // ---- VVVV ส่วนจัดการรูปภาพที่เพิ่มเข้ามา VVVV ----
        if ($request->hasFile('photo')) {
            // 4. ถ้ามีการอัปโหลดรูปใหม่เข้ามา...
            
            // 5. เช็กก่อนว่ามีรูปเก่าอยู่หรือไม่ ถ้ามี ให้ลบทิ้ง
            if ($delegate->photo_path) {
                Storage::disk('public')->delete($delegate->photo_path);
            }

            // 6. บันทึกรูปใหม่และเอา path มาใส่ในข้อมูล
            $path = $request->file('photo')->store('delegate_photos', 'public');
            $validatedData['photo_path'] = $path;
        }
        // ---- ^^^^ สิ้นสุดส่วนจัดการรูปภาพ ^^^^ ----

        $delegate->update($validatedData);

        return redirect()->route('delegates.index')->with('success', 'อัปเดตข้อมูลพนักงานสำเร็จแล้ว');
    }

    public function destroy(Delegate $delegate)
    {
        // ---- VVVV ส่วนจัดการรูปภาพที่เพิ่มเข้ามา VVVV ----
        // 7. ก่อนลบข้อมูลในตาราง ให้เช็กและลบไฟล์รูปภาพใน storage ก่อน
        if ($delegate->photo_path) {
            Storage::disk('public')->delete($delegate->photo_path);
        }
        // ---- ^^^^ สิ้นสุดส่วนจัดการรูปภาพ ^^^^ ----
        
        $delegate->delete();

        return redirect()->route('delegates.index')->with('success', 'ลบข้อมูลพนักงานสำเร็จแล้ว');
    }
}