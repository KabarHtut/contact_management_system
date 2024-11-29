<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\ServiceInterfaces\GroupServiceInterface;

class GroupController extends Controller
{
    private $groupSerive;

    private $view = "groups.";

    private $fileUploadService;

    public function __construct(
        GroupServiceInterface $groupService,
        FileUploadService $fileUploadService
    ){
        $this->groupSerive = $groupService;
        $this->fileUploadService = $fileUploadService;
    }

    public function index()
    {
        return view($this->view . 'index', [
            'groups' => $this->groupSerive->getAllGroups(['*'], ['paginate' => 6])
        ]);
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(GroupRequest $request)
    {
        $params = $request->all();
        if($request->hasFile('image')){
            $file = $this->fileUploadService->upload('groups', $request->file('image'));
            $params['image'] = $file['path'];
        }

        if(!$this->groupSerive->storeGroup($params)) return redirect()->back()->with('error', 'Failed to update!');
        return redirect()->route('group.index')->with('success', 'Successfully created');
    }

    public function destroy(int $id){
        if(!$this->groupSerive->destroyGroup($id)) return redirect()->back()->with('error', 'Failed to delete!');

        return redirect()->route('group.index')->with('success', 'Successfully deleted!');
    }

    public function show($groupId){
        $contacts = Contact::where('group_id', $groupId)->paginate(6);
        $groups = Group::all();

        return view('contacts.index', [
            'contacts' => $contacts,
            'groups' => $groups
        ]);
    }
}
