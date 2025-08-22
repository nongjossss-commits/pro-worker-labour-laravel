@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white p-6 rounded-lg shadow-lg">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            <i class="bi bi-pencil-square mr-2"></i>แก้ไขข้อมูลเอเจนซี่
        </h2>

        <form action="{{ route('agents.update', $agent->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Agent Name EN --}}
            <div class="mb-4">
                <label for="agent_name_en" class="block text-gray-700 text-sm font-bold mb-2">
                    ชื่อเอเจนซี่ (Agent Name) <span class="text-red-500">*</span>
                </label>
                <input type="text" name="agent_name_en" id="agent_name_en" value="{{ $agent->agent_name_en }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            {{-- License --}}
            <div class="mb-4">
                <label for="agent_license" class="block text-gray-700 text-sm font-bold mb-2">
                    License
                </label>
                <input type="text" name="agent_license" id="agent_license" value="{{ $agent->agent_license }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                {{-- Phone --}}
                <div>
                    <label for="agent_phone" class="block text-gray-700 text-sm font-bold mb-2">
                        เบอร์โทรศัพท์
                    </label>
                    <input type="text" name="agent_phone" id="agent_phone" value="{{ $agent->agent_phone }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                {{-- Email --}}
                <div>
                    <label for="agent_email" class="block text-gray-700 text-sm font-bold mb-2">
                        อีเมล
                    </label>
                    <input type="email" name="agent_email" id="agent_email" value="{{ $agent->agent_email }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            {{-- Address --}}
            <div class="mb-6">
                <label for="agent_address" class="block text-gray-700 text-sm font-bold mb-2">
                    ที่อยู่
                </label>
                <textarea name="agent_address" id="agent_address" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $agent->agent_address }}</textarea>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('agents.index') }}" class="btn btn-secondary">ยกเลิก</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save mr-1"></i>
                    อัปเดตข้อมูล
                </button>
            </div>

        </form>

    </div>
</div>
@endsection