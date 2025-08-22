<?php

namespace App\Http\Controllers;

use App\Models\Employer;
// We don't need Employee model here anymore for create/store
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::orderBy('created_at', 'desc')->get();
        return view('employers.index', compact('employers'));
    }

    public function create()
    {
        return view('employers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'tax_id' => 'nullable|string|max:20',
            'business_type' => 'nullable|string|max:255',
            'reg_date' => 'nullable|date',
            'signer_name_th' => 'nullable|string|max:255',
            'signer_name_en' => 'nullable|string|max:255',
            'reg_capital' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'employer_document_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $count = Employer::count();
        $newId = 'MC-' . str_pad($count + 1, 4, '0', STR_PAD_LEFT);
        $validatedData['id'] = $newId;

        if ($request->hasFile('employer_document_file')) {
            $filePath = $request->file('employer_document_file')->store('public/employer_documents');
            $validatedData['employer_document_file'] = str_replace('public/', '', $filePath);
        }

        Employer::create($validatedData);

        return redirect()->route('employers.index')->with('success', 'บันทึกข้อมูลนายจ้างใหม่สำเร็จ!');
    }

    public function show(Employer $employer)
    {
        //
    }

    public function edit(Employer $employer)
{
    // โหลดข้อมูลลูกจ้างทั้งหมดที่ผูกกับนายจ้างคนนี้
    $employees = $employer->employees()->latest()->get();

    // ส่งข้อมูลทั้ง employer และ employees ไปที่ view
    return view('employers.edit', [
        'employer' => $employer,
        'employees' => $employees
    ]);
}

    public function update(Request $request, Employer $employer)
    {
        $validatedData = $request->validate([
            'name_th' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'tax_id' => 'nullable|string|max:20',
            'business_type' => 'nullable|string|max:255',
            'reg_date' => 'nullable|date',
            'signer_name_th' => 'nullable|string|max:255',
            'signer_name_en' => 'nullable|string|max:255',
            'reg_capital' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'employer_document_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('employer_document_file')) {
            if ($employer->employer_document_file) {
                Storage::delete('public/' . $employer->employer_document_file);
            }
            $filePath = $request->file('employer_document_file')->store('public/employer_documents');
            $validatedData['employer_document_file'] = str_replace('public/', '', $filePath);
        }

        $employer->update($validatedData);

        return redirect()->route('employers.index')->with('success', 'อัปเดตข้อมูลนายจ้างสำเร็จ!');
    }

    public function destroy(Employer $employer)
    {
        if ($employer->employer_document_file) {
            Storage::delete('public/' . $employer->employer_document_file);
        }
        $employer->delete();
        return redirect()->route('employers.index')->with('success', 'ลบข้อมูลนายจ้างเรียบร้อยแล้ว');
    }
}
