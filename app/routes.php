<?php
/**
 * Application routes.
 *
 * Each entry maps a "page" key (used in ?page=...) to [ControllerClass, method].
 */

return [
    // ---- Public site ----------------------------------------------------
    'home'             => [HomeController::class, 'index'],
    'about'            => [AboutController::class, 'index'],
    'services'         => [ServicesController::class, 'index'],
    'contact'          => [ContactController::class, 'index'],
    'book-appointment' => [AppointmentController::class, 'create'],
    'appointment/store'=> [AppointmentController::class, 'store'],

    // ---- Authentication -------------------------------------------------
    'login'                => [AuthController::class, 'chooser'],
    'admin-login'          => [AuthController::class, 'showLogin'],
    'process-admin-login'  => [AuthController::class, 'login'],
    'logout'               => [AuthController::class, 'logout'],

    // ---- Patient portal: authentication ---------------------------------
    'portal/login'         => [PatientAuthController::class, 'showLogin'],
    'portal/login/submit'  => [PatientAuthController::class, 'login'],
    'portal/register'        => [PatientAuthController::class, 'showRegister'],
    'portal/register/submit' => [PatientAuthController::class, 'register'],
    'portal/otp'           => [PatientAuthController::class, 'showOtp'],
    'portal/otp/verify'    => [PatientAuthController::class, 'verifyOtp'],
    'portal/otp/resend'    => [PatientAuthController::class, 'resendOtp'],
    'portal/activate'      => [PatientAuthController::class, 'showActivate'],
    'portal/activate/send' => [PatientAuthController::class, 'sendActivation'],
    'portal/set-password'  => [PatientAuthController::class, 'showSetPassword'],
    'portal/set-password/submit' => [PatientAuthController::class, 'setPassword'],
    'portal/logout'        => [PatientAuthController::class, 'logout'],

    // ---- Patient portal: authenticated area -----------------------------
    'portal/dashboard'     => [PortalController::class, 'dashboard'],
    'portal/onboarding'        => [PortalController::class, 'onboarding'],
    'portal/onboarding/save'   => [PortalController::class, 'saveOnboarding'],
    'portal/onboarding/skip'   => [PortalController::class, 'skipOnboarding'],
    'portal/profile'       => [PortalController::class, 'profile'],
    'portal/profile/contact'   => [PortalController::class, 'updateContact'],
    'portal/profile/insurance' => [PortalController::class, 'updateInsurance'],
    'portal/profile/medical'   => [PortalController::class, 'updateMedical'],
    'portal/profile/password' => [PortalController::class, 'changePassword'],
    'portal/2fa/enable'       => [PortalController::class, 'enableTwoFactor'],
    'portal/2fa/disable'      => [PortalController::class, 'disableTwoFactor'],
    'portal/appointments'  => [PortalController::class, 'appointments'],
    'portal/appointments/store'      => [PortalController::class, 'storeAppointment'],
    'portal/appointments/cancel'     => [PortalController::class, 'cancelAppointment'],
    'portal/appointments/reschedule' => [PortalController::class, 'rescheduleAppointment'],
    'portal/prescriptions' => [PortalController::class, 'prescriptions'],
    'portal/lab-results'   => [PortalController::class, 'labResults'],
    'portal/invoices'      => [PortalController::class, 'invoices'],
    'portal/invoices/pay'  => [PortalController::class, 'payInvoice'],

    // ---- Staff portal (login only; accounts created by admin) ------------
    'staff/login'          => [StaffAuthController::class, 'showLogin'],
    'staff/login/submit'   => [StaffAuthController::class, 'login'],
    'staff/logout'         => [StaffAuthController::class, 'logout'],
    'staff/dashboard'      => [StaffPortalController::class, 'dashboard'],
    'staff/onboarding'      => [StaffPortalController::class, 'onboarding'],
    'staff/onboarding/save' => [StaffPortalController::class, 'saveOnboarding'],
    'staff/onboarding/skip' => [StaffPortalController::class, 'skipOnboarding'],
    'staff/profile'        => [StaffPortalController::class, 'profile'],

    // ---- Admin: core ----------------------------------------------------
    'admin/dashboard' => [DashboardController::class, 'index'],
    'admin/reports'   => [ReportController::class, 'index'],
    'admin/settings'  => [SettingController::class, 'index'],

    // ---- Admin: patients ------------------------------------------------
    'admin/patients/register' => [PatientController::class, 'register'],
    'admin/patients/store'    => [PatientController::class, 'store'],
    'admin/patients/view'     => [PatientController::class, 'view'],
    'admin/patients/manage'   => [PatientController::class, 'manage'],
    'admin/patients/profile'  => [PatientController::class, 'profile'],
    'admin/patients/delete'   => [PatientController::class, 'delete'],

    // ---- Admin: staff ---------------------------------------------------
    'admin/staff/register'         => [StaffController::class, 'register'],
    'admin/staff/store'            => [StaffController::class, 'store'],
    'admin/staff/view'             => [StaffController::class, 'view'],
    'admin/staff/manage'           => [StaffController::class, 'manage'],
    'admin/staff/profile'          => [StaffController::class, 'profile'],
    'admin/staff/add'              => [StaffController::class, 'add'],
    'admin/staff/assign-department'=> [StaffController::class, 'assignDepartment'],
    'admin/staff/delete'           => [StaffController::class, 'delete'],

    // ---- Admin: pharmacy ------------------------------------------------
    'admin/pharmacy/register'          => [PharmacyController::class, 'register'],
    'admin/pharmacy/store'             => [PharmacyController::class, 'store'],
    'admin/pharmacy/view'              => [PharmacyController::class, 'view'],
    'admin/pharmacy/manage'            => [PharmacyController::class, 'manage'],
    'admin/pharmacy/profile'           => [PharmacyController::class, 'profile'],
    'admin/pharmacy/medications'       => [PharmacyController::class, 'medications'],
    'admin/pharmacy/add-category'      => [PharmacyController::class, 'addCategory'],
    'admin/pharmacy/manage-categories' => [PharmacyController::class, 'manageCategories'],
    'admin/pharmacy/delete'            => [PharmacyController::class, 'delete'],
];
