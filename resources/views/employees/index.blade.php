@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">รายการข้อมูลลูกจ้าง (Employees)</h4>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle-fill"></i> เพิ่มข้อมูลใหม่
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">รหัสลูกจ้าง</th>
                                <th scope="col">ชื่อ-สกุล (ไทย)</th>
                                <th scope="col">ชื่อ-สกุล (อังกฤษ)</th>
                                <th scope="col">สังกัดนายจ้าง</th>
                                <th scope="col" class="text-center">การกระทำ</th>
                            </tr>
                        </thead>
                        <tbody>
    @forelse ($employees as $employee)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            {{-- แก้ไข property ให้ถูกต้อง --}}
            <td>{{ $employee->employee_code }}</td>
            <td>{{ $employee->name_th }}</td>
            <td>{{ $employee->name_en }}</td>
            {{-- แก้ไขการแสดงผลชื่อนายจ้าง --}}
            <td>{{ $employee->employer->name_th ?? 'N/A' }}</td> 
            <td class="text-center">
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i> แก้ไข
                </a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3-fill"></i> ลบ
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">ไม่พบข้อมูลลูกจ้าง</td>
        </tr>
    @endforelse
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection