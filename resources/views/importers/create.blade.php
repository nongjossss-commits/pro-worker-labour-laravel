@extends('layouts.app')

@section('content')
<div class="content-section">
    <h2>เพิ่มข้อมูลบริษัทนำเข้าใหม่</h2>
    <p class="text-muted">กรุณากรอกข้อมูลให้ครบถ้วน</p>
    <div class="card">
        <div class="card-body">
            
            {{-- ฟอร์มจะส่งข้อมูลไปที่ Route 'importers.store' --}}
            <form action="{{ route('importers.store') }}" method="POST">
                @csrf

                <div class="row">
                    {{-- ชื่อ (ไทย) --}}
                    <div class="col-md-6 mb-3">
                        <label for="name_th" class="form-label">ชื่อบริษัท (ไทย) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name_th" name="name_th" value="{{ old('name_th') }}" required>
                    </div>

                    {{-- ชื่อ (อังกฤษ) --}}
                    <div class="col-md-6 mb-3">
                        <label for="name_en" class="form-label">ชื่อบริษัท (อังกฤษ)</label>
                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}">
                    </div>

                    {{-- เลขประจำตัวผู้เสียภาษี --}}
                    <div class="col-md-6 mb-3">
                        <label for="tax_id" class="form-label">เลขประจำตัวผู้เสียภาษี</label>
                        <input type="text" class="form-control" id="tax_id" name="tax_id" value="{{ old('tax_id') }}">
                    </div>

                    {{-- เลขที่ใบอนุญาต --}}
                    <div class="col-md-6 mb-3">
                        <label for="license_no" class="form-label">เลขที่ใบอนุญาต</label>
                        <input type="text" class="form-control" id="license_no" name="license_no" value="{{ old('license_no') }}">
                    </div>

                    {{-- วันที่ออกใบอนุญาต --}}
                    <div class="col-md-6 mb-3">
                        <label for="license_issue_date" class="form-label">วันที่ออกใบอนุญาต</label>
                        <input type="date" class="form-control" id="license_issue_date" name="license_issue_date" value="{{ old('license_issue_date') }}">
                    </div>

                    {{-- วันที่หมดอายุใบอนุญาต --}}
                    <div class="col-md-6 mb-3">
                        <label for="license_expiry_date" class="form-label">วันที่หมดอายุใบอนุญาต</label>
                        <input type="date" class="form-control" id="license_expiry_date" name="license_expiry_date" value="{{ old('license_expiry_date') }}">
                    </div>
                    
                    {{-- ผู้ลงนาม (ไทย) --}}
                    <div class="col-md-6 mb-3">
                        <label for="signer_name_th" class="form-label">ผู้มีอำนาจลงนาม (ไทย)</label>
                        <input type="text" class="form-control" id="signer_name_th" name="signer_name_th" value="{{ old('signer_name_th') }}">
                    </div>

                    {{-- ผู้ลงนาม (อังกฤษ) --}}
                    <div class="col-md-6 mb-3">
                        <label for="signer_name_en" class="form-label">ผู้มีอำนาจลงนาม (อังกฤษ)</label>
                        <input type="text" class="form-control" id="signer_name_en" name="signer_name_en" value="{{ old('signer_name_en') }}">
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('importers.index') }}" class="btn btn-outline-secondary">ยกเลิก</a>
                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection