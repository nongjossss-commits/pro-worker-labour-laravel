@extends('layouts.app')

@section('content')
<div class="content-section">
    {{-- ส่วนของการแสดงข้อความ Success --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- ส่วนหัวข้อและปุ่ม --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
        <h2 class="mb-3 mb-md-0">รายการข้อมูลนายจ้าง</h2>
        <div class="d-flex gap-2">
            <input type="text" class="form-control form-control-sm w-auto" placeholder="ค้นหา...">
            <a href="{{ route('employers.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i> เพิ่มข้อมูลใหม่</a>
        </div>
    </div>

    {{-- ส่วนของตาราง --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>รหัสนายจ้าง</th>
                    <th>ชื่อนายจ้าง (ไทย)</th>
                    <th>ประเภทกิจการ</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>วันที่บันทึก</th>
                    <th class="text-center">จัดการ</th>
                </tr>
            </thead>
            <tbody>
    @forelse ($employers as $employer)
        <tr>
            <td>{{ $employer->id }}</td>
            <td>{{ $employer->name_th }}</td>
            <td>{{ $employer->business_type }}</td>
            <td>{{ $employer->phone_number }}</td>
            <td>{{ $employer->created_at->format('d/m/Y') }}</td>
            <td>
                {{-- ปุ่มแก้ไข --}}
                <a href="{{ route('employers.edit', $employer->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                </a>

                {{-- ปุ่มลบ --}}
                <form action="{{ route('employers.destroy', $employer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center text-muted">ไม่พบข้อมูล</td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>
@endsection