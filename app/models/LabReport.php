<?php
/**
 * LabReport model — lab_report table (part of the EMR).
 */
class LabReport
{
    public static function forPatient(int $patientId): array
    {
        return Database::select(
            "SELECT * FROM lab_report WHERE patient_id = ? ORDER BY created_at DESC, ID DESC",
            [$patientId]
        );
    }

    public static function pendingCount(int $patientId): int
    {
        return (int) Database::scalar(
            "SELECT COUNT(*) FROM lab_report WHERE patient_id = ? AND Status <> 'completed'",
            [$patientId]
        );
    }

    public static function create(array $data): int
    {
        return Database::execute(
            "INSERT INTO lab_report
                (patient_id, TestName, Category, Result, ReferenceRange, Status, RequestedBy, Notes)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $data['patient_id'], $data['TestName'], $data['Category'] ?? null,
                $data['Result'] ?? null, $data['ReferenceRange'] ?? null,
                $data['Status'] ?? 'pending', $data['RequestedBy'] ?? null, $data['Notes'] ?? null,
            ]
        );
    }
}
