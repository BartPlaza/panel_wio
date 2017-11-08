<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;

class GroupController extends Controller
{
    public function index() {

    	$groups = Group::all();

    	return view('workspace.group', compact('groups'));
    }

    public function show($id) {

    	$users = Group::find($id)->users;

    	return view('workspace.showGroup', compact(['users','id']));
    }

    public function create() {

    	$users = User::where('group_id', '')->orWhereNull('group_id')->get();

    	return view ('workspace.addGroup', compact('users'));
    }

    public function store(Request $request) {

    	$this->validate($request, ['lider_id'=>'required'], $messages = ['lider_id.required'=>'Podanie lidera grupy jest wymagane aby ją utworzyć']);

    	$group = new Group;
    	$group->lider_id = $request->input('lider_id');
    	$group->save();

    	User::where('id', $request->input('lider_id'))->update(['group_id' => $group->id]);

    	return redirect('panel/groups');
    }

    public function destroy($id) 
    {
    	Group::where('id', $id)->delete();
    	User::where('group_id', $id)->update(['group_id'=>null]);

    	return redirect('/panel/groups');
    }

    public function addUsers($id) 
    {
    	return view('groups.addToGroup');
    }

    public function deleteUsers($id) {

    }
}
