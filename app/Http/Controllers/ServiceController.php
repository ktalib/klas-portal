<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display the services page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('services');
    }

    /**
     * Display the first registration page.
     *
     * @return \Illuminate\View\View
     */
    public function firstRegistration()
    {
        return view('services.first-registration');
    }

    /**
     * Display the regularization page.
     *
     * @return \Illuminate\View\View
     */
    public function regularization()
    {
        return view('services.regularization');
    }

    /**
     * Display the recertification page.
     *
     * @return \Illuminate\View\View
     */
    public function recertification()
    {
        return view('services.recertification');
    }

    /**
     * Display the fresh allocation page.
     *
     * @return \Illuminate\View\View
     */
    public function freshAllocation()
    {
        return view('services.fresh-allocation');
    }

    /**
     * Display the forms page.
     *
     * @return \Illuminate\View\View
     */
    public function forms()
    {
        return view('services.forms');
    }

    /**
     * Display the fees page.
     *
     * @return \Illuminate\View\View
     */
    public function fees()
    {
        return view('services.fees');
    }
}

