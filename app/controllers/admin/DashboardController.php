<?php
class DashboardController extends Controller
{
    public function index(): void
    {
        Auth::requireAdmin();

        $pending   = Patient::countByStatus('pending');
        $confirmed = Patient::countByStatus('confirmed');
        $completed = Patient::countByStatus('completed');
        $cancelled = Patient::countByStatus('cancelled');

        $this->render('admin/dashboard', [
            'page_title'          => 'Dashboard',
            'totalPatients'       => Patient::count(),
            'totalStaff'          => Staff::count(),
            'totalMedications'    => Medication::count(),
            'lowStock'            => Medication::lowStock(),
            'todayAppointments'   => Patient::countToday(),
            'upcomingAppointments'=> Patient::countUpcoming(),
            'pendingCount'        => $pending,
            'confirmedCount'      => $confirmed,
            'completedCount'      => $completed,
            'cancelledCount'      => $cancelled,
            'recentPatients'      => Patient::recent(6),
            'dailyPatients'       => Patient::dailyRegistrations(7),
            'extra_head'          => '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>',
        ], 'admin');
    }
}
