<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;

class GroupController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
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

    public function addUsersView($id) 
    {
    	$users = User::where('group_id', '')->orWhereNull('group_id')->get();

    	return view('groups.addToGroup', compact(['users', 'id']));
    }

    public function addUsers(Request $request, $id)
    {
        $this->validate($request,['selected'=>'required'],$messages = ['selected.required' => 'Nie zaznaczono żadnego uczestnika']);

        foreach($request->input('selected') as $userId) {
            $user = User::where('id', $userId)->update(['group_id' => $id]);
        }

        return redirect('/panel/groups/'.$id);

    }

    public function deleteUsersView($id) {

        $users = User::where('group_id', $id)->get();

        return view('groups.deleteFromGroup', compact(['users', 'id']));

    }

    public function deleteUsers(Request $request, $id)
    {

        $this->validate($request,['selected'=>'required'],$messages = ['selected.required' => 'Nie zaznaczono żadnego uczestnika']);

        foreach($request->input('selected') as $userId) {
            $user = User::where('id', $userId)->update(['group_id' => null]);
        }

        return redirect('/panel/groups/'.$id);
    }

    public function changeLiderView($id)
    {
        $liderId = Group::find($id)->lider_id;
        $lider = User::find($liderId);
        $users = User::where('group_id', $id)->get();

        return view('groups.changeLider', compact(['lider', 'id', 'users']));
    }

    public function changeLider(Request $request, $id)
    {
        $this->validate($request, ['lider_id'=>'required'], $messages = ['lider_id.required'=>'Podanie lidera grupy jest wymagane aby ją utworzyć']);

        $lider_id = $request->input('lider_id');
        Group::where('id', $id)->update(['lider_id'=>$lider_id]);

        return redirect('/panel/groups/'.$id);
    }
}
