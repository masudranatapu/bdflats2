<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagesCategoryRequest;
use App\Repositories\Admin\Pages\PagesInterface;
use Illuminate\Http\RedirectResponse;

class PagesCategoryController extends Controller
{
    protected $pages;
    protected $resp;

    public function __construct(PagesInterface $pages)
    {
        $this->middleware('auth');
        $this->pages = $pages;
    }

    public function getIndex()
    {
        $data['categories'] = $this->pages->getPagesCategories(2000)->data;
        return view('admin.pages.category', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.pages.create_category');
    }

    public function postStore(PagesCategoryRequest $request): RedirectResponse
    {
        $this->resp = $this->pages->storePagesCategory($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data['category'] = $this->pages->getPagesCategory($id)->data;
        return view('admin.pages.edit_category', compact('data'));
    }

    public function postUpdate(PagesCategoryRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->pages->updatePagesCategory($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id): RedirectResponse
    {
        $this->resp = $this->pages->deletePagesCategory($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
