<?php

namespace App\Http\Controllers;

use App\Models\Importer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. ดึงข้อมูล Importer ทั้งหมดออกมาจากฐานข้อมูล
        $importers = \App\Models\Importer::all();

        // 2. ส่งข้อมูลที่ได้ไปแสดงผลที่ View 'importers.index'
        return view('importers.index', compact('importers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // แก้จาก return "ข้อความ" เป็นการเรียก View
        return view('importers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✨ 1. ตรวจสอบความถูกต้องของข้อมูล (เปลี่ยนเป็น snake_case)
        $validatedData = $request->validate([
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'tax_id' => 'nullable|string|max:20|unique:importers,tax_id',
            'license_no' => 'nullable|string|max:255',
            'license_issue_date' => 'nullable|date',
            'license_expiry_date' => 'nullable|date',
            'signer_name_th' => 'nullable|string|max:255',
            'signer_name_en' => 'nullable|string|max:255',
        ]);

        try {
            // ✨ 2. สร้าง ID อัตโนมัติ (เปลี่ยนเป็นคอลัมน์ 'id')
            $prefix = 'IM-';
            $lastImporter = Importer::where('id', 'like', $prefix . '%')->orderBy('id', 'desc')->first();
            $newNumber = $lastImporter ? ((int)substr($lastImporter->id, strlen($prefix))) + 1 : 1;
            $newImporterID = $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
            $validatedData['id'] = $newImporterID;

            // 3. บันทึกลงฐานข้อมูล
            Importer::create($validatedData);

            // 4. Redirect กลับไปหน้ารายการ
            return redirect()->route('importers.index')->with('success', 'บันทึกข้อมูลบริษัทนำเข้าสำเร็จแล้ว');

        } catch (\Exception $e) {
            Log::error('Error creating importer: ' . $e->getMessage());
            return redirect()->route('importers.create')->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $importer = \App\Models\Importer::findOrFail($id);
    return view('importers.edit', compact('importer'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $importer = Importer::findOrFail($id);

        // ✨ 1. ตรวจสอบความถูกต้องของข้อมูล (เปลี่ยนเป็น snake_case)
        $validatedData = $request->validate([
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            // ✨ ตรวจสอบ TaxID ที่ไม่ซ้ำกับคนอื่น "ยกเว้น" ID ของตัวเอง (เปลี่ยนเป็น tax_id)
            'tax_id' => 'nullable|string|max:20|unique:importers,tax_id,' . $importer->id,
            'license_no' => 'nullable|string|max:255',
            'license_issue_date' => 'nullable|date',
            'license_expiry_date' => 'nullable|date',
            'signer_name_th' => 'nullable|string|max:255',
            'signer_name_en' => 'nullable|string|max:255',
        ]);

        try {
            // 2. อัปเดตข้อมูล
            $importer->update($validatedData);

            // 3. Redirect กลับไปหน้ารายการ
            return redirect()->route('importers.index')->with('success', 'อัปเดตข้อมูลบริษัทนำเข้าสำเร็จแล้ว');

        } catch (\Exception $e) {
            Log::error('Error updating importer: ' . $e->getMessage());
            return redirect()->route('importers.edit', $importer->id)->with('error', 'เกิดข้อผิดพลาดในการอัปเดตข้อมูล')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $importer = Importer::findOrFail($id);
            $importer->delete();
            return redirect()->route('importers.index')->with('success', 'ลบข้อมูลบริษัทนำเข้าสำเร็จแล้ว');
        } catch (\Exception $e) {
            Log::error('Error deleting importer: ' . $e->getMessage());
            return redirect()->route('importers.index')->with('error', 'เกิดข้อผิดพลาดในการลบข้อมูล');
        }
    }
}