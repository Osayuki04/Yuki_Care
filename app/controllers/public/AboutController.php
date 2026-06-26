<?php
class AboutController extends Controller
{
    public function index(): void
    {
        $this->render('public/about', ['page_title' => 'About Us']);
    }
}
