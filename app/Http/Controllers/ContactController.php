<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Group;
use App\ServiceInterfaces\ContactServiceInterface;
use App\Services\ContactSearchService;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactService;

    private $view = "contacts.";

    private $fileUploadService;

    private $contactSearchService;

    public function __construct(
        ContactServiceInterface $contactService,
        FileUploadService $fileUploadService,
        ContactSearchService $contactSearchService
    ){
        $this->contactService = $contactService;
        $this->fileUploadService = $fileUploadService;
        $this->contactSearchService = $contactSearchService;
    }

    public function index(){
        return view($this->view . 'index', [
            'contacts' => $this->contactService->getAllContacts(['*'], ['paginate' => 6])
        ]);
    }

    public function create(){
        return view($this->view . 'create', [
            'groups' => Group::all()
        ]);
    }

    public function store(ContactRequest $request){
        $params = $request->all();
        if($request->hasFile('image')) {
            $file = $this->fileUploadService->upload('contacts', $request->file('image'));
            $params['image'] = $file['path'];
        }

        if(!$this->contactService->storeContact($params)) return redirect()->back()->with('error', 'Failed to update!');

        return redirect()->route('contact.index')->with('success', 'Successfully created');
    }

    public function edit(
        int $id
    ){
        return view($this->view . 'edit', [
            'contact' => $this->contactService->getContactById($id),
            'groups' => Group::all()
        ]);
    }

    public function update(
        int $id,
        ContactUpdateRequest $request
    ){
        $params = $request->all();

        if($request->hasFile('image')){
            $file = $this->fileUploadService->upload('contacts', $request->file('image'));
            $params['image'] = $file['path'];
        }

        if(!$this->contactService->updateContact($id,$params)) return redirect()->back()->with('error', 'Failed to update!');

        return redirect()->route('contact.index')->with('success', 'Successfully updated!');
    }

    public function destroy(
        int $id
    ){
        if(!$this->contactService->destroyContact($id)) return redirect()->back()->with('error', 'Failed to delete!');

        return redirect()->route('contact.index')->with('success', 'Successfully deleted!');
    }

    public function searchContact(Request $request)
    {
        $keyword = $request->keyword;

        $contacts = $this->contactSearchService->getSearchData($keyword);

        return view($this->view . 'index', [
            'contacts' => $contacts
        ]);
    }
}
