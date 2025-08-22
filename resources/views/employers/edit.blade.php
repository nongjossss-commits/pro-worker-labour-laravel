@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Employer Edit Form Column --}}
        <div class="col-md-12">
            <div class="card">
                {{-- Card Header --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">แก้ไขข้อมูล: {{ $employer->name_th }} ({{ $employer->id }})</h5>
                    {{-- ลิงก์สำหรับเพิ่มพนักงาน จะส่ง employer id ไปด้วย --}}
                    <a href="{{ route('employees.create', ['employer' => $employer->id]) }}" class="btn btn-success">
                        <i class="bi bi-person-plus-fill me-2"></i>เพิ่มพนักงาน
                    </a>
                </div>

                {{-- Form Body --}}
                <div class="card-body">
                    <form action="{{ route('employers.update', $employer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- General Info --}}
                        <h5 class="mb-3">ข้อมูลทั่วไป</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="name_th" class="form-label">ชื่อ-สกุล (ไทย) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name_th" name="name_th" value="{{ old('name_th', $employer->name_th) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="name_en" class="form-label">ชื่อ-สกุล (อังกฤษ)</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $employer->name_en) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="tax_id" class="form-label">เลขประจำตัวผู้เสียภาษี</label>
                                <input type="text" class="form-control" id="tax_id" name="tax_id" value="{{ old('tax_id', $employer->tax_id) }}">
                            </div>
                        </div>

                        {{-- Business Info --}}
                        <h5 class="mb-3">ข้อมูลนิติบุคคล</h5>
                         <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="business_type" class="form-label">ประเภทกิจการ</label>
                                <input type="text" class="form-control" id="business_type" name="business_type" value="{{ old('business_type', $employer->business_type) }}">
                            </div>
                             <div class="col-md-6">
                                <label for="reg_date" class="form-label">วันที่จดทะเบียน</label>
                                <input type="date" class="form-control" id="reg_date" name="reg_date" value="{{ old('reg_date', $employer->reg_date) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="signer_name_th" class="form-label">ผู้มีอำนาจลงนาม (ไทย)</label>
                                <input type="text" class="form-control" id="signer_name_th" name="signer_name_th" value="{{ old('signer_name_th', $employer->signer_name_th) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="signer_name_en" class="form-label">ผู้มีอำนาจลงนาม (อังกฤษ)</label>
                                <input type="text" class="form-control" id="signer_name_en" name="signer_name_en" value="{{ old('signer_name_en', $employer->signer_name_en) }}">
                            </div>
                             <div class="col-md-6">
                                <label for="reg_capital" class="form-label">ทุนจดทะเบียน</label>
                                <input type="text" class="form-control" id="reg_capital" name="reg_capital" value="{{ old('reg_capital', $employer->reg_capital) }}">
                            </div>
                        </div>

                        {{-- Contact Info --}}
                        <h5 class="mb-3">ข้อมูลการติดต่อและเอกสาร</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="contact_person" class="form-label">ผู้ติดต่อ</label>
                                <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ old('contact_person', $employer->contact_person) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $employer->phone_number) }}">
                            </div>
                            <div class="col-md-12">
                                <label for="employer_document_file" class="form-label">เอกสารแนบ</label>
                                @if ($employer->employer_document_file)
                                    <div class="mb-2">
                                        <span>ไฟล์ปัจจุบัน: </span>
                                        <a href="{{ asset('storage/' . $employer->employer_document_file) }}" target="_blank">{{ basename($employer->employer_document_file) }}</a>
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="employer_document_file" name="employer_document_file">
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="text-end">
                            <a href="{{ route('employers.index') }}" class="btn btn-secondary">ยกเลิก</a>
                            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Employee List Column --}}
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">รายชื่อพนักงานในสังกัด</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>รูป</th>
                                    <th>ชื่อ-สกุล (ไทย)</th>
                                    <th>สัญชาติ</th>
                                    <th>เลขหนังสือเดินทาง</th>
                                    <th>วันหมดอายุ Visa</th>
                                    <th class="text-center">การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                <tr>
                                    <td>
                                        <img src="{{ $employee->photo_path ? asset('storage/' . $employee->photo_path) : 'https://placehold.co/40x40/e2e8f0/6c757d?text=N/A' }}" 
                                             alt="Photo" class="img-fluid rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                    </td>
                                    <td>{{ $employee->title_th }}{{ $employee->name_th }}</td>
                                    <td>{{ $employee->nationality }}</td>
                                    <td>{{ $employee->passport_no ?? '-' }}</td>
                                    <td>{{ $employee->visa_expiry_date ? \Carbon\Carbon::parse($employee->visa_expiry_date)->format('d/m/Y') : '-' }}</td>
                                    
                                    {{-- ========== START: โค้ดที่แก้ไขแล้ว ========== --}}
                                    <td class="text-center">
                                        <a href="{{ route('employees.edit', ['employer' => $employer->id, 'employee' => $employee->id]) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> แก้ไข
                                        </a>
                                        <form action="{{ route('employees.destroy', ['employer' => $employer->id, 'employee' => $employee->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบลูกจ้างคนนี้?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="bi bi-trash3-fill"></i> ลบ
    </button>
</form>
                                    </td>
                                    {{-- ========== END: โค้ดที่แก้ไขแล้ว ========== --}}

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">ยังไม่มีข้อมูลพนักงานในสังกัด</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection