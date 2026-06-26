<?php
/**
 * Invoice model — invoice table (billing & payments).
 */
class Invoice
{
    public static function forPatient(int $patientId): array
    {
        return Database::select(
            "SELECT * FROM invoice WHERE patient_id = ? ORDER BY created_at DESC, ID DESC",
            [$patientId]
        );
    }

    public static function find(int $id): ?array
    {
        return Database::first("SELECT * FROM invoice WHERE ID = ?", [$id]);
    }

    public static function unpaidCount(int $patientId): int
    {
        return (int) Database::scalar(
            "SELECT COUNT(*) FROM invoice WHERE patient_id = ? AND Status = 'unpaid'",
            [$patientId]
        );
    }

    public static function outstandingTotal(int $patientId): float
    {
        return (float) Database::scalar(
            "SELECT COALESCE(SUM(Amount), 0) FROM invoice WHERE patient_id = ? AND Status = 'unpaid'",
            [$patientId]
        );
    }

    public static function create(array $data): int
    {
        return Database::execute(
            "INSERT INTO invoice (patient_id, Description, Category, Amount, Status, DueDate)
             VALUES (?, ?, ?, ?, ?, ?)",
            [
                $data['patient_id'], $data['Description'], $data['Category'] ?? null,
                (float) $data['Amount'], $data['Status'] ?? 'unpaid', $data['DueDate'] ?? null,
            ]
        );
    }

    /** Mark an invoice as paid (scoped to the owning patient). */
    public static function markPaid(int $id, int $patientId): void
    {
        Database::execute(
            "UPDATE invoice SET Status = 'paid', PaidAt = NOW()
             WHERE ID = ? AND patient_id = ? AND Status = 'unpaid'",
            [$id, $patientId]
        );
    }
}
