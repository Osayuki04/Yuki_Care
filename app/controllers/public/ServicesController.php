<?php
class ServicesController extends Controller
{
    public function index(): void
    {
        $this->render('public/services', ['page_title' => 'Medical Services']);
    }
}
