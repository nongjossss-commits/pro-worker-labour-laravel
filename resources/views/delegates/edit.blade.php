@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">แก้ไขข้อมูลพนักงาน</h1>

    <div class="bg-white shadow-lg rounded-lg p-6">
        {{-- VVVV ส่วนที่แก้ไข: เพิ่ม enctype VVVV --}}
        <form action="{{ route('delegates.update', $delegate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- ^^^^ สิ้นสุดส่วนที่แก้ไข ^^^^ --}}

            {{-- Row 1: Name TH / Name EN --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="name_th" class="block text-sm font-medium text-gray-700 mb-1">ชื่อ (ไทย) <span class="text-red-500">*</span></label>
                    <input type="text" name="name_th" id="name_th" value="{{ $delegate->name_th }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
                <div>
                    <label for="name_en" class="block text-sm font-medium text-gray-700 mb-1">ชื่อ (อังกฤษ)</label>
                    <input type="text" name="name_en" id="name_en" value="{{ $delegate->name_en }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>

            {{-- Row 2: National ID / Employee ID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="national_id" class="block text-sm font-medium text-gray-700 mb-1">เลขประจำตัวประชาชน <span class="text-red-500">*</span></label>
                    <input type="text" name="national_id" id="national_id" value="{{ $delegate->national_id }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
                <div>
                    <label for="employee_id" class="block text-sm font-medium text-gray-700 mb-1">รหัสพนักงาน <span class="text-red-500">*</span></label>
                    <input type="text" name="employee_id" id="employee_id" value="{{ $delegate->employee_id }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>
            </div>

            {{-- Row 3: Issue Date / Expiry Date --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="card_issue_date" class="block text-sm font-medium text-gray-700 mb-1">วันที่ออกบัตร</label>
                    <input type="date" name="card_issue_date" id="card_issue_date" value="{{ $delegate->card_issue_date }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label for="card_expiry_date" class="block text-sm font-medium text-gray-700 mb-1">วันสิ้นสุดบัตร</label>
                    <input type="date" name="card_expiry_date" id="card_expiry_date" value="{{ $delegate->card_expiry_date }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>

            {{-- Row 4: Phone / Email --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone" id="phone" value="{{ $delegate->phone }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">อีเมล</label>
                    <input type="email" name="email" id="email" value="{{ $delegate->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>
            
            {{-- VVVV ส่วนที่เพิ่มเข้ามา VVVV --}}
            <div class="mb-6">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">รูปภาพพนักงาน</label>
                @if ($delegate->photo_path)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $delegate->photo_path) }}" alt="รูปภาพปัจจุบัน" class="w-32 h-32 object-cover rounded-lg shadow-sm">
                    </div>
                    <label class="block text-xs text-gray-500 mb-1">อัปโหลดไฟล์ใหม่เพื่อเปลี่ยนแปลงรูปภาพ</label>
                @endif
                <input type="file" name="photo" id="photo" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
            </div>
            {{-- ^^^^ สิ้นสุดส่วนที่เพิ่ม ^^^^ --}}


            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('delegates.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                    ยกเลิก
                </a>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                    <i class="bi bi-save me-2"></i>อัปเดตข้อมูล
                </button>
            </div>
        </form>
    </div>
</div>
@endsection