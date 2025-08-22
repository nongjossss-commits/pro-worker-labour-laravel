<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        // ✨ NEW: Get all agents from the database
        $agents = Agent::latest()->get(); // ดึงข้อมูลทั้งหมด เรียงจากใหม่สุดไปเก่าสุด

        // ✨ NEW: Pass the data to the view
        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        return view('agents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'agent_name_en' => 'required|string|max:255',
            'agent_email' => 'nullable|email|unique:agents,agent_email',
        ]);

        Agent::create($request->all());

        return redirect()->route('agents.index')
                         ->with('success', 'บันทึกข้อมูลเอเจนซี่สำเร็จแล้ว!');
    }

    // ... other functions ...

    public function show(Agent $agent){}
    public function edit(Agent $agent)
{
    // Laravel's Route Model Binding automatically finds the agent by ID.
    // We just need to pass it to the view.
    return view('agents.edit', compact('agent'));
}
    public function update(Request $request, Agent $agent)
{
    // 1. Validate the incoming data (with a small change for email)
    $request->validate([
        'agent_name_en' => 'required|string|max:255',
        'agent_email' => 'nullable|email|unique:agents,agent_email,' . $agent->id,
    ]);

    // 2. Update the existing record
    $agent->update($request->all());

    // 3. Redirect back to the index page with a success message
    return redirect()->route('agents.index')
                     ->with('success', 'อัปเดตข้อมูลเอเจนซี่สำเร็จแล้ว!');
}
    public function destroy(Agent $agent)
{
    $agent->delete();

    return redirect()->route('agents.index')
                     ->with('success', 'ลบข้อมูลเอเจนซี่สำเร็จแล้ว!');
}
}