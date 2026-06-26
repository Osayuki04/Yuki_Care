<?php
/**
 * Staff model — staff table.
 */
class Staff
{
    public static function all(): array
    {
        return Database::select("SELECT * FROM staff ORDER BY ID DESC");
    }

    public static function find(int $id): ?array
    {
        return Database::first("SELECT * FROM staff WHERE ID = ?", [$id]);
    }

    public static function count(): int
    {
        return (int) Database::scalar("SELECT COUNT(*) FROM staff");
    }

    public static function countByStatus(string $status): int
    {
        return (int) Database::scalar("SELECT COUNT(*) FROM staff WHERE Status = ?", [$status]);
    }

    public static function emailExists(string $email, ?int $exceptId = null): bool
    {
        if ($exceptId) {
            return (int) Database::scalar(
                "SELECT COUNT(*) FROM staff WHERE Email = ? AND ID != ?",
                [$email, $exceptId]
            ) > 0;
        }
        return (int) Database::scalar("SELECT COUNT(*) FROM staff WHERE Email = ?", [$email]) > 0;
    }

    /** Look up a staff member by email (used by the staff portal login). */
    public static function findByEmail(string $email): ?array
    {
        return Database::first("SELECT * FROM staff WHERE Email = ?", [$email]);
    }

    public static function touchLastLogin(int $id): void
    {
        Database::execute("UPDATE staff SET last_login = NOW() WHERE ID = ?", [$id]);
    }

    /** Set / change a staff portal password (expects an already-hashed value). */
    public static function setPassword(int $id, string $hash): void
    {
        Database::execute("UPDATE staff SET password = ? WHERE ID = ?", [$hash, $id]);
    }

    public static function markOnboarded(int $id): void
    {
        Database::execute("UPDATE staff SET onboarded = 1 WHERE ID = ?", [$id]);
    }

    public static function departments(): array
    {
        $rows = Database::select(
            "SELECT DISTINCT Department FROM staff WHERE Department IS NOT NULL AND Department <> '' ORDER BY Department"
        );
        return array_column($rows, 'Department');
    }

    public static function create(array $data): int
    {
        return Database::execute(
            "INSERT INTO staff
                (FirstName, MiddleName, Surname, Email, Contact, DateOfBirth, Gender,
                 EmergencyContact, Address, Department, HireDate, StaffCategory, StaffType,
                 StaffGrade, password, Status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $data['FirstName'], $data['MiddleName'], $data['Surname'], $data['Email'],
                $data['Contact'], $data['DateOfBirth'], $data['Gender'], $data['EmergencyContact'],
                $data['Address'], $data['Department'], $data['HireDate'], $data['StaffCategory'],
                $data['StaffType'], $data['StaffGrade'], $data['password'], $data['Status'] ?? 'active',
            ]
        );
    }

    public static function update(int $id, array $data): void
    {
        if (!empty($data['password'])) {
            Database::execute(
                "UPDATE staff SET FirstName=?, MiddleName=?, Surname=?, Email=?, Contact=?,
                    DateOfBirth=?, Gender=?, EmergencyContact=?, Address=?, Department=?,
                    HireDate=?, StaffCategory=?, StaffType=?, StaffGrade=?, password=? WHERE ID=?",
                [
                    $data['FirstName'], $data['MiddleName'], $data['Surname'], $data['Email'],
                    $data['Contact'], $data['DateOfBirth'], $data['Gender'], $data['EmergencyContact'],
                    $data['Address'], $data['Department'], $data['HireDate'], $data['StaffCategory'],
                    $data['StaffType'], $data['StaffGrade'], $data['password'], $id,
                ]
            );
        } else {
            Database::execute(
                "UPDATE staff SET FirstName=?, MiddleName=?, Surname=?, Email=?, Contact=?,
                    DateOfBirth=?, Gender=?, EmergencyContact=?, Address=?, Department=?,
                    HireDate=?, StaffCategory=?, StaffType=?, StaffGrade=? WHERE ID=?",
                [
                    $data['FirstName'], $data['MiddleName'], $data['Surname'], $data['Email'],
                    $data['Contact'], $data['DateOfBirth'], $data['Gender'], $data['EmergencyContact'],
                    $data['Address'], $data['Department'], $data['HireDate'], $data['StaffCategory'],
                    $data['StaffType'], $data['StaffGrade'], $id,
                ]
            );
        }
    }

    public static function updateDepartment(int $id, string $department): void
    {
        Database::execute("UPDATE staff SET Department = ? WHERE ID = ?", [$department, $id]);
    }

    public static function delete(int $id): void
    {
        Database::execute("DELETE FROM staff WHERE ID = ?", [$id]);
    }

    // ---- Analytics --------------------------------------------------------

    /** Staff count grouped by department, highest first. [department => count]. */
    public static function byDepartment(): array
    {
        $rows = Database::select(
            "SELECT COALESCE(NULLIF(Department, ''), 'Unassigned') AS label, COUNT(*) AS c
             FROM staff GROUP BY label ORDER BY c DESC"
        );
        return array_column($rows, 'c', 'label');
    }

    /** Staff count grouped by status. [status => count]. */
    public static function byStatus(): array
    {
        $rows = Database::select(
            "SELECT Status AS label, COUNT(*) AS c FROM staff GROUP BY Status"
        );
        return array_column($rows, 'c', 'label');
    }

    /** Staff count grouped by category, highest first. [category => count]. */
    public static function byCategory(): array
    {
        $rows = Database::select(
            "SELECT COALESCE(NULLIF(StaffCategory, ''), 'Unspecified') AS label, COUNT(*) AS c
             FROM staff GROUP BY label ORDER BY c DESC"
        );
        return array_column($rows, 'c', 'label');
    }

    public static function fullName(array $staff): string
    {
        return implode(' ', array_filter([
            $staff['FirstName'] ?? '', $staff['MiddleName'] ?? '', $staff['Surname'] ?? '',
        ]));
    }
}
