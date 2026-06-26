<?php
class ReportController extends Controller
{
    public function index(): void
    {
        Auth::requireAdmin();

        $statusBreakdown = Patient::byStatus();

        $this->render('admin/reports', [
            'page_title'       => 'Analytics & Reports',

            // KPI summary
            'totalPatients'    => Patient::count(),
            'totalStaff'       => Staff::count(),
            'activeStaff'      => Staff::countByStatus('active'),
            'totalMedications' => Medication::count(),
            'totalStock'       => Medication::totalStock(),
            'lowStock'         => Medication::lowStock(),
            'todayAppointments'=> Patient::countToday(),
            'upcoming'         => Patient::countUpcoming(),

            // Chart datasets
            'monthlyPatients'  => Patient::monthlyRegistrations(6),
            'statusBreakdown'  => $statusBreakdown,
            'patientsByDept'   => Patient::byDepartment(),
            'patientsByGender' => Patient::byGender(),
            'staffByDept'      => Staff::byDepartment(),
            'staffByStatus'    => Staff::byStatus(),
            'medsByCategory'   => Medication::stockByCategory(),

            // Tables
            'lowStockList'     => Medication::lowStockList(),

            'extra_head'       => '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>',
        ], 'admin');
    }
}
