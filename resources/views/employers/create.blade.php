@extends('layouts.app')

@section('content')
<div class="content-section">
    <h2 class="mb-4">เพิ่มข้อมูลนายจ้างใหม่</h2>
    <div class="card">
        <div class="card-body">
            
            <form method="POST" action="{{ route('employers.store') }}" enctype="multipart/form-data">
                @csrf

                <h5 class="card-title mb-4">ข้อมูลทั่วไป (General Info)</h5>
                
                {{-- **จุดที่แก้ไข:** เปลี่ยน name, id, for ทั้งหมดเป็น snake_case --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name_th" class="form-label">ชื่อนายจ้าง (ไทย) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name_th" name="name_th" required>
                    </div>
                    <div class="col-md-6">
                        <label for="name_en" class="form-label">ชื่อนายจ้าง (อังกฤษ)</label>
                        <input type="text" class="form-control" id="name_en" name="name_en">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tax_id" class="form-label">เลขประจำตัวผู้เสียภาษี</label>
                        <input type="text" class="form-control" id="tax_id" name="tax_id">
                    </div>
                    <div class="col-md-6">
                        <label for="job_owner_id" class="form-label">เจ้าของงาน</label>
                        <select class="form-select" id="job_owner_id" name="job_owner_id">
                            <option value="">-- ยังไม่ได้กำหนด --</option>
                            <option value="user1">ตัวอย่าง: คุณสมชาย</option>
                            <option value="user2">ตัวอย่าง: คุณสมหญิง</option>
                        </select>
                    </div>
                </div>

                <hr class="my-4">
                <h5 class="card-title mb-4">ข้อมูลนิติบุคคล (Corporate Info)</h5>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="business_type" class="form-label">ประเภทกิจการ</label>
                        <input type="text" class="form-control" id="business_type" name="business_type" placeholder="เช่น ก่อสร้าง, ร้านอาหาร">
                    </div>
                     <div class="col-md-6">
                        <label for="reg_date" class="form-label">จดทะเบียนวันที่</label>
                        <input type="date" class="form-control" id="reg_date" name="reg_date">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="signer_name_th" class="form-label">ผู้มีอำนาจลงนาม (ไทย)</label>
                        <input type="text" class="form-control" id="signer_name_th" name="signer_name_th">
                    </div>
                    <div class="col-md-6">
                        <label for="signer_name_en" class="form-label">ผู้มีอำนาจลงนาม (อังกฤษ)</label>
                        <input type="text" class="form-control" id="signer_name_en" name="signer_name_en">
                    </div>
                </div>
                 <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="reg_capital" class="form-label">ทุนจดทะเบียน</label>
                        <input type="text" class="form-control" id="reg_capital" name="reg_capital">
                    </div>
                </div>

                <hr class="my-4">
                <h5 class="card-title mb-4">ข้อมูลการติดต่อและเอกสาร (Contact & Documents)</h5>
                
                 <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="contact_person" class="form-label">ผู้ติดต่อ</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person">
                    </div>
                    <div class="col-md-6">
                        <label for="phone_number" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                </div>

                 <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="employer_document_file" class="form-label">ไฟล์เอกสารแนบ</label>
                        <input class="form-control" type="file" id="employer_document_file" name="employer_document_file">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    <a href="{{ route('employers.index') }}" class="btn btn-secondary">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection