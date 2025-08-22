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
        <h2 class="mb-3 mb-md-0">รายการข้อมูลบริษัทนำเข้า</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('importers.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i> เพิ่มข้อมูลใหม่</a>
        </div>
    </div>

    {{-- ส่วนของตาราง --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อบริษัท (ไทย)</th>
                    <th>เลขประจำตัวผู้เสียภาษี</th>
                    <th>ผู้ลงนาม</th>
                    <th class="text-center">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($importers as $importer)
                    <tr>
                        <td>{{ $importer->id }}</td>
                        <td>{{ $importer->name_th }}</td>
                        <td>{{ $importer->tax_id }}</td>
                        <td>{{ $importer->signer_name_th }}</td>
                        <td class="text-center">
                            {{-- ปุ่มแก้ไข (อันนี้ถูกต้องแล้ว) --}}
                            <a href="{{ route('importers.edit', $importer->id) }}" class="btn btn-sm btn-outline-primary" title="แก้ไข"><i class="bi bi-pencil-square"></i></a>

                            {{-- ✨ แก้ไขฟอร์มปุ่มลบให้ถูกต้อง --}}
                            <form action="{{ route('importers.destroy', $importer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="ลบ"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">ไม่พบข้อมูล</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection