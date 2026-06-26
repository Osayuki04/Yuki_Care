<?php
class SettingController extends Controller
{
    public function index(): void
    {
        Auth::requireAdmin();
        $this->render('admin/settings', ['page_title' => 'Settings'], 'admin');
    }
}
