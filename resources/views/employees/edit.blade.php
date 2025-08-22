@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>แก้ไขข้อมูลลูกจ้าง: {{ $employee->name_th }}</h4>
                </div>
                <div class="card-body">
                    {{-- ฟอร์มนี้จะส่งข้อมูลไปที่ employees.update --}}
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="employee_code" class="form-label">รหัสลูกจ้าง</label>
                            <input type="text" class="form-control" id="employee_code" name="employee_code" 
                                   value="{{ old('employee_code', $employee->employee_code) }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name_th" class="form-label">ชื่อ-สกุล (ไทย)</label>
                                <input type="text" class="form-control" id="name_th" name="name_th" 
                                       value="{{ old('name_th', $employee->name_th) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name_en" class="form-label">ชื่อ-สกุล (อังกฤษ)</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" 
                                       value="{{ old('name_en', $employee->name_en) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="employer_id" class="form-label">สังกัดนายจ้าง</label>
                            <select class="form-select" id="employer_id" name="employer_id" required>
                                <option value="">-- กรุณาเลือกนายจ้าง --</option>
                                @foreach ($employers as $employer_item)
                                    <option value="{{ $employer_item->id }}" 
                                        {{ (old('employer_id', $employee->employer_id) == $employer_item->id) ? 'selected' : '' }}>
                                        {{ $employer_item->name_th }} ({{ $employer_item->id }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">ยกเลิก</a>
                            <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection