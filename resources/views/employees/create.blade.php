@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        เพิ่มพนักงานใหม่ให้กับ: {{ $employer->name_th }}
                    </h5>
                </div>
                <div class="card-body">
                    <form id="employee-form" action="{{ route('employees.store', $employer) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h5>ข้อมูลส่วนตัว</h5>
                        <hr>
                        <div class="row">
                            {{-- Photo Upload --}}
                            <div class="col-md-4 text-center mb-3">
                                <img id="photo-preview" src="https://placehold.co/150x150/e2e8f0/6c757d?text=Photo" alt="Employee Photo" class="img-thumbnail mb-2" style="width: 150px; height: 150px; object-fit: cover;">
                                <label for="photo_path" class="form-label">รูปพนักงาน</label>
                                <input type="file" class="form-control form-control-sm" id="photo_path" name="photo_path" accept="image/*">
                            </div>

                            {{-- Personal Details --}}
                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="title_th" class="form-label">คำนำหน้า (ไทย)</label>
                                        <select class="form-select" id="title_th" name="title_th">
                                            <option value="นาย">นาย</option>
                                            <option value="นางสาว">นางสาว</option>
                                            <option value="นาง">นาง</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name_th" class="form-label">ชื่อ-สกุล (ไทย)</label>
                                        <input type="text" class="form-control" id="name_th" name="name_th" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title_en" class="form-label">Title (EN)</label>
                                        <select class="form-select" id="title_en" name="title_en">
                                            <option value="Mr.">Mr.</option>
                                            <option value="Miss">Miss</option>
                                            <option value="Mrs.">Mrs.</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name_en" class="form-label">Full Name (EN)</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">วันเดือนปีเกิด</label>
                                        <input type="date" class="form-control" id="dob" name="dob">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nationality" class="form-label">สัญชาติ</label>
                                        <select class="form-select" id="nationality" name="nationality">
                                            <option value="">-- เลือกสัญชาติ --</option>
                                            <option value="เมียนมา">เมียนมา</option>
                                            <option value="ลาว">ลาว</option>
                                            <option value="กัมพูชา">กัมพูชา</option>
                                            <option value="เวียดนาม">เวียดนาม</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-4">ข้อมูลเอกสาร</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="passport_no" class="form-label">เลขหนังสือเดินทาง</label>
                                <input type="text" class="form-control" id="passport_no" name="passport_no">
                            </div>
                            <div class="col-md-4" id="passport-type-wrapper" style="display: none;">
                                <label for="passport_type" class="form-label">ประเภทหนังสือเดินทาง</label>
                                <select class="form-select" id="passport_type" name="passport_type">
                                    <option value="PJ">PJ</option>
                                    <option value="CI">CI</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="passport_expiry_date" class="form-label">วันหมดอายุหนังสือเดินทาง</label>
                                <input type="date" class="form-control" id="passport_expiry_date" name="passport_expiry_date">
                            </div>
                            <div class="col-md-4">
                                <label for="work_permit_no" class="form-label">เลขใบอนุญาตทำงาน</label>
                                <input type="text" class="form-control" id="work_permit_no" name="work_permit_no">
                            </div>
                            <div class="col-md-4">
                                <label for="work_permit_expiry_date" class="form-label">วันหมดอายุใบอนุญาตทำงาน</label>
                                <input type="date" class="form-control" id="work_permit_expiry_date" name="work_permit_expiry_date">
                            </div>
                            <div class="col-md-4">
                                <label for="visa_expiry_date" class="form-label">วันหมดอายุวีซ่า</label>
                                <input type="date" class="form-control" id="visa_expiry_date" name="visa_expiry_date">
                            </div>
                            <div class="col-md-8">
                                <label for="work_permit_mou_group" class="form-label">ประเภทใบอนุญาต (กลุ่มมติ)</label>
                                <select class="form-select" id="work_permit_mou_group" name="work_permit_mou_group">
                                    <option value="">-- กรุณาเลือก --</option>
                                    <option>MOU</option>
                                    <option>มติต่ออายุในประเทศ</option>
                                    <option>มติขึ้นทะเบียน</option>
                                    <option value="อื่นๆ">อื่นๆ ระบุ..</option>
                                </select>
                                <input type="text" class="form-control mt-2" id="work_permit_mou_group_other" name="work_permit_mou_group_other" placeholder="ระบุประเภทใบอนุญาตทำงาน" style="display: none;">
                            </div>
                            <div class="col-md-4">
                                <label for="ninety_day_report_date" class="form-label">วันหมดอายุรายงานตัว 90 วัน</label>
                                <input type="date" class="form-control" id="ninety_day_report_date" name="ninety_day_report_date">
                            </div>
                        </div>

                        <div class="card-footer text-end mt-4 bg-transparent border-0 px-0">
                            <a href="{{ route('employers.edit', $employer->id) }}" class="btn btn-secondary">ยกเลิก</a>
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT MOVED HERE --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- Photo Preview ---
        const photoInput = document.getElementById('photo_path');
        const photoPreview = document.getElementById('photo-preview');
        photoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                photoPreview.src = URL.createObjectURL(file);
            }
        });

        // --- Dynamic Passport Type for Myanmar ---
        const nationalitySelect = document.getElementById('nationality');
        const passportTypeWrapper = document.getElementById('passport-type-wrapper');
        
        function togglePassportType() {
            if (nationalitySelect.value === 'เมียนมา') {
                passportTypeWrapper.style.display = 'block';
            } else {
                passportTypeWrapper.style.display = 'none';
            }
        }
        
        nationalitySelect.addEventListener('change', togglePassportType);
        togglePassportType(); // Call on load to set initial state

        // --- Dynamic Other MOU Group ---
        const mouGroupSelect = document.getElementById('work_permit_mou_group');
        const mouGroupOtherInput = document.getElementById('work_permit_mou_group_other');
        mouGroupSelect.addEventListener('change', function() {
            if (this.value === 'อื่นๆ') {
                mouGroupOtherInput.style.display = 'block';
            } else {
                mouGroupOtherInput.style.display = 'none';
            }
        });

        // --- Handle Form Submission with Fetch API ---
        const employeeForm = document.getElementById('employee-form');
        employeeForm.addEventListener('submit', function(event) {
            event.preventDefault(); 
            
            const formData = new FormData(employeeForm);
            const actionUrl = employeeForm.getAttribute('action');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(actionUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                // On success, redirect to the URL provided by the server
                window.location.href = data.redirect_url;
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.errors) {
                    let errorMessages = '';
                    for (const key in error.errors) {
                        errorMessages += error.errors[key].join('\n') + '\n';
                    }
                    alert('ข้อมูลไม่ถูกต้อง:\n' + errorMessages);
                } else {
                    alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาลองใหม่อีกครั้ง');
                }
            });
        });
    });
</script>
@endsection
