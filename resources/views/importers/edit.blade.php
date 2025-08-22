@extends('layouts.app')

@section('content')
<div class="content-section">
    <h2>แก้ไขข้อมูลบริษัทนำเข้า</h2>
    <p class="text-muted">กรุณาอัปเดตข้อมูลให้เป็นปัจจุบัน</p>
    <div class="card">
        <div class="card-body">
            
            <form action="{{ route('importers.update', $importer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name_th" class="form-label">ชื่อบริษัท (ไทย) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name_th" name="name_th" value="{{ old('name_th', $importer->name_th) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name_en" class="form-label">ชื่อบริษัท (อังกฤษ)</label>
                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $importer->name_en) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tax_id" class="form-label">เลขประจำตัวผู้เสียภาษี</label>
                        <input type="text" class="form-control" id="tax_id" name="tax_id" value="{{ old('tax_id', $importer->tax_id) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="license_no" class="form-label">เลขที่ใบอนุญาต</label>
                        <input type="text" class="form-control" id="license_no" name="license_no" value="{{ old('license_no', $importer->license_no) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="license_issue_date" class="form-label">วันที่ออกใบอนุญาต</label>
                        <input type="date" class="form-control" id="license_issue_date" name="license_issue_date" value="{{ old('license_issue_date', $importer->license_issue_date) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="license_expiry_date" class="form-label">วันที่หมดอายุใบอนุญาต</label>
                        <input type="date" class="form-control" id="license_expiry_date" name="license_expiry_date" value="{{ old('license_expiry_date', $importer->license_expiry_date) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="signer_name_th" class="form-label">ผู้มีอำนาจลงนาม (ไทย)</label>
                        <input type="text" class="form-control" id="signer_name_th" name="signer_name_th" value="{{ old('signer_name_th', $importer->signer_name_th) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="signer_name_en" class="form-label">ผู้มีอำนาจลงนาม (อังกฤษ)</label>
                        <input type="text" class="form-control" id="signer_name_en" name="signer_name_en" value="{{ old('signer_name_en', $importer->signer_name_en) }}">
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('importers.index') }}" class="btn btn-outline-secondary">ยกเลิก</a>
                    <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection