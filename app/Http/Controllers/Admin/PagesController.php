<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;

use App\Http\Requests\PagesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class PagesController extends Controller
{
    protected $resp;
    protected $pages;

    public function __construct(Page $pages)
    {
        $this->pages = $pages;
    }

    public function getIndex(Request $request)
    {
        $data['pages'] = $this->pages->getPages()->data;
        return view('admin.pages.index', compact('data'));
    }

    public function getCreate()
    {
        $data['page_categories'] = [];
        $categories = $this->pages->getPagesCategories()->data;
        foreach ($categories as $category) {
            $data['page_categories'][$category->id] = $category->name . ' (' . $category->property_for . ')';
        }
        return view('admin.pages.create', compact('data'));
    }

    public function getEdit($id)
    {
        $data['page_categories'] = [];
        $categories = $this->pages->getPagesCategories()->data;
        foreach ($categories as $category) {
            $data['page_categories'][$category->id] = $category->name . ' (' . $category->property_for . ')';
        }
        $data['page'] = $this->pages->getPage($id)->data;
        return view('admin.pages.edit', compact('data'));
    }

    public function postStore(PagesRequest $request)
    {
        $this->resp = $this->pages->storePage($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function postUpdate(PagesRequest $request, $id)
    {
        $this->resp = $this->pages->updatePage($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->pages->deletePage($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
