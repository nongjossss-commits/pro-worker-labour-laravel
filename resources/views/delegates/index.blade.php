@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">รายการข้อมูลพนักงาน</h1>
        <a href="{{ route('delegates.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
            <i class="bi bi-plus-circle me-2"></i>เพิ่มข้อมูลใหม่
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">รูป</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ชื่อ (ไทย)</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">เลขประจำตัวประชาชน</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">เบอร์โทรศัพท์</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($delegates as $delegate)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $loop->iteration }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                                {{-- VVVV ส่วนที่แก้ไข VVVV --}}
                                <div class="flex-shrink-0 w-10 h-10">
                                    @if ($delegate->photo_path)
                                        <img class="w-full h-full rounded-full object-cover"
                                             src="{{ asset('storage/' . $delegate->photo_path) }}"
                                             alt="รูปภาพ {{ $delegate->name_th }}" />
                                    @else
                                        {{-- ใช้รูป Avatar เดิมถ้ายังไม่มีรูป --}}
                                        <img class="w-full h-full rounded-full"
                                             src="https://ui-avatars.com/api/?name={{ urlencode($delegate->name_th) }}&color=7F9CF5&background=EBF4FF"
                                             alt="Avatar" />
                                    @endif
                                </div>
                                {{-- ^^^^ สิ้นสุดส่วนที่แก้ไข ^^^^ --}}
                            </td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $delegate->name_th }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $delegate->national_id }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $delegate->phone ?? '-' }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm text-center">
                                <a href="{{ route('delegates.edit', $delegate->id) }}" class="text-indigo-600 hover:text-indigo-900">แก้ไข</a>
                                <form action="{{ route('delegates.destroy', $delegate->id) }}" method="POST" class="inline-block delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-4 cursor-pointer" style="background: none; border: none; padding: 0; vertical-align: baseline;">
                                        ลบ
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-500">
                                ยังไม่มีข้อมูล
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const userConfirmed = confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?');
            if (userConfirmed) {
                this.submit();
            }
        });
    });
</script>

@endsection