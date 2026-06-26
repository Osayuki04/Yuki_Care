<?php
class HomeController extends Controller
{
    public function index(): void
    {
        $this->render('public/home', ['page_title' => 'Home']);
    }
}
