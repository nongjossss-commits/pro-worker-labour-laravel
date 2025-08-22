@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    {{-- Success Message --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg">

        {{-- Page Title and Buttons --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">
                <i class="bi bi-person-square mr-2"></i>ข้อมูลเอเจนซี่
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('agents.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle mr-1"></i>
                    เพิ่มข้อมูลใหม่
                </a>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">#</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">ชื่อเอเจนซี่</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">License</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-gray-600">เบอร์โทรศัพท์</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm text-gray-600">จัดการ</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">

                    @forelse ($agents as $agent)
                        <tr class="hover:bg-gray-50">
                            <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="text-left py-3 px-4">{{ $agent->agent_name_en }}</td>
                            <td class="text-left py-3 px-4">{{ $agent->agent_license ?? '-' }}</td>
                            <td class="text-left py-3 px-4">{{ $agent->agent_phone ?? '-' }}</td>
                            <td class="text-center py-3 px-4">
    <div class="flex items-center justify-center space-x-2">
        {{-- Edit Button --}}
        <a href="{{ route('agents.edit', $agent->id) }}" class="btn btn-sm btn-warning">
            <i class="bi bi-pencil-fill"></i> แก้ไข
        </a>

        {{-- ✨ ADD THIS DELETE FORM ✨ --}}
        <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
                <i class="bi bi-trash-fill"></i> ลบ
            </button>
        </form>
    </div>
</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                ยังไม่มีข้อมูล
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection