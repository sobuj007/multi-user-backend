<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\User;
class AgentController extends Controller
{
    public function dashboard(){
        return view('agents.dashboard');
      }
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        $users = User::all();
        return view('agents.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agent_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|max:2048',
            'owner_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'nid' => 'nullable|string|max:255',
            'trade_licence' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $data = $request->all();
        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('agents', 'public');
        }

        Agent::create($data);

        return redirect()->route('agents.index')->with('success', 'Agent created successfully.');
    }

    public function edit(Agent $agent)
    {
        $users = User::all();
        return view('agents.edit', compact('agent', 'users'));
    }

    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'agent_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|max:2048',
            'owner_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'nid' => 'nullable|string|max:255',
            'trade_licence' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $data = $request->all();
        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('agents', 'public');
        }

        $agent->update($data);

        return redirect()->route('agents.index')->with('success', 'Agent updated successfully.');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'Agent deleted successfully.');
    }
}
