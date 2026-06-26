<?php
/**
 * Prescription model — prescription table (part of the EMR).
 */
class Prescription
{
    public static function forPatient(int $patientId): array
    {
        return Database::select(
            "SELECT * FROM prescription WHERE patient_id = ? ORDER BY created_at DESC, ID DESC",
            [$patientId]
        );
    }

    public static function activeCount(int $patientId): int
    {
        return (int) Database::scalar(
            "SELECT COUNT(*) FROM prescription WHERE patient_id = ? AND Status = 'active'",
            [$patientId]
        );
    }

    public static function create(array $data): int
    {
        return Database::execute(
            "INSERT INTO prescription
                (patient_id, Medication, Dosage, Frequency, Duration, Instructions, PrescribedBy, Status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $data['patient_id'], $data['Medication'], $data['Dosage'] ?? null,
                $data['Frequency'] ?? null, $data['Duration'] ?? null,
                $data['Instructions'] ?? null, $data['PrescribedBy'] ?? null,
                $data['Status'] ?? 'active',
            ]
        );
    }
}
