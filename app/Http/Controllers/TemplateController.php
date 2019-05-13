<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard.index');
    }

    public function instructors()
    {
        return view('admin.pages.instructors.list');
    }

    public function addinstructors()
    {
        return view('admin.pages.instructors.add');
    }

    public function students()
    {
        return view('admin.pages.students.list');
    }

    public function addstudents()
    {
        return view('admin.pages.students.add');
    }

    public function vehicles()
    {
        return view('admin.pages.vehicles.list');
    }

    public function reports()
    {
        return view('admin.pages.reports.reports');
    }

    public function documents()
    {
        return view('admin.pages.documents.list');
    }

    public function categories()
    {
        return view('admin.pages.categories.list');
    }

    public function role()
    {
        return view('admin.pages.usermanagement.role.list');
    }

    public function users()
    {
        return view('admin.pages.usermanagement.users.list');
    }

    public function email()
    {
        return view('admin.pages.configuration.email.email');
    }

    public function training($id)
    {
        return view('admin.pages.configuration.training.training', array('id' => $id));
    }

    public function trainingTest()
    {
        return view('admin.pages.training.tests');
    }

    public function trainingVideo()
    {
        return view('admin.pages.training.video');
    }

    public function website()
    {
        return view('admin.pages.configuration.website.website');
    }

    public function countries()
    {
        return view('admin.pages.configuration.countries.list');
    }

    public function cities()
    {
        return view('admin.pages.configuration.cities.list');
    }

    public function tests()
    {
        return view('admin.pages.configuration.test-online.tests');
    }

}
