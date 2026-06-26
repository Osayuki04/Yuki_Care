<?php
class ContactController extends Controller
{
    public function index(): void
    {
        $this->render('public/contact', ['page_title' => 'Contact Us']);
    }
}
