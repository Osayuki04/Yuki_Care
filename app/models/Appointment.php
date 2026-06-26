<?php
/**
 * Appointment model — appointment table.
 *
 * Distinct from the patient row (which records the original public booking),
 * this lets a logged-in patient hold many appointments over time.
 */
class Appointment
{
    /** All appointments for a patient, soonest upcoming first. */
    public static function forPatient(int $patientId): array
    {
        return Database::select(
            "SELECT * FROM appointment WHERE patient_id = ?
             ORDER BY AppointmentDate DESC, AppointmentTime DESC",
            [$patientId]
        );
    }

    public static function find(int $id): ?array
    {
        return Database::first("SELECT * FROM appointment WHERE ID = ?", [$id]);
    }

    public static function upcomingCount(int $patientId): int
    {
        return (int) Database::scalar(
            "SELECT COUNT(*) FROM appointment
             WHERE patient_id = ? AND AppointmentDate >= CURDATE() AND Status <> 'cancelled'",
            [$patientId]
        );
    }

    /** The next upcoming appointment for a patient, or null. */
    public static function next(int $patientId): ?array
    {
        return Database::first(
            "SELECT * FROM appointment
             WHERE patient_id = ? AND AppointmentDate >= CURDATE() AND Status <> 'cancelled'
             ORDER BY AppointmentDate ASC, AppointmentTime ASC LIMIT 1",
            [$patientId]
        );
    }

    // ---- Hospital-wide views (staff portal) -------------------------------

    /** Appointments scheduled for today (excluding cancelled). */
    public static function countToday(): int
    {
        return (int) Database::scalar(
            "SELECT COUNT(*) FROM appointment WHERE AppointmentDate = CURDATE() AND Status <> 'cancelled'"
        );
    }

    /** Upcoming requests still awaiting confirmation. */
    public static function countPending(): int
    {
        return (int) Database::scalar(
            "SELECT COUNT(*) FROM appointment WHERE AppointmentDate >= CURDATE() AND Status = 'pending'"
        );
    }

    /** Upcoming appointments across all patients, with the patient's name attached. */
    public static function upcoming(int $limit = 8): array
    {
        return Database::select(
            "SELECT a.*, p.FirstName, p.MiddleName, p.Surname
             FROM appointment a
             JOIN patient p ON p.ID = a.patient_id
             WHERE a.AppointmentDate >= CURDATE() AND a.Status IN ('pending', 'confirmed')
             ORDER BY a.AppointmentDate ASC, a.AppointmentTime ASC
             LIMIT ?",
            [$limit]
        );
    }

    public static function create(array $data): int
    {
        return Database::execute(
            "INSERT INTO appointment (patient_id, Department, Doctor, AppointmentDate, AppointmentTime, Reason, Status)
             VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $data['patient_id'], $data['Department'], $data['Doctor'] ?? null,
                $data['AppointmentDate'], $data['AppointmentTime'] ?? null,
                $data['Reason'] ?? null, $data['Status'] ?? 'pending',
            ]
        );
    }

    /** Reschedule (date/time) — only allowed while still pending/confirmed. */
    public static function reschedule(int $id, int $patientId, string $date, ?string $time): void
    {
        Database::execute(
            "UPDATE appointment SET AppointmentDate = ?, AppointmentTime = ?, Status = 'pending'
             WHERE ID = ? AND patient_id = ? AND Status IN ('pending', 'confirmed')",
            [$date, $time, $id, $patientId]
        );
    }

    public static function cancel(int $id, int $patientId): void
    {
        Database::execute(
            "UPDATE appointment SET Status = 'cancelled'
             WHERE ID = ? AND patient_id = ? AND Status IN ('pending', 'confirmed')",
            [$id, $patientId]
        );
    }
}
