<?php
/**
 * Patient model — patient table.
 *
 * The patient table doubles as the appointment store: a public booking is a
 * patient row with Status = 'pending'.
 */
class Patient
{
    /** All patients, newest first. */
    public static function all(): array
    {
        return Database::select("SELECT * FROM patient ORDER BY ID DESC");
    }

    /** The most recent $limit patients. */
    public static function recent(int $limit = 5): array
    {
        return Database::select("SELECT * FROM patient ORDER BY ID DESC LIMIT ?", [$limit]);
    }

    public static function find(int $id): ?array
    {
        return Database::first("SELECT * FROM patient WHERE ID = ?", [$id]);
    }

    public static function count(): int
    {
        return (int) Database::scalar("SELECT COUNT(*) FROM patient");
    }

    public static function countToday(): int
    {
        return (int) Database::scalar("SELECT COUNT(*) FROM patient WHERE DATE(PreferredDate) = CURDATE()");
    }

    public static function countUpcoming(): int
    {
        return (int) Database::scalar("SELECT COUNT(*) FROM patient WHERE PreferredDate >= CURDATE()");
    }

    public static function countByStatus(string $status): int
    {
        return (int) Database::scalar("SELECT COUNT(*) FROM patient WHERE Status = ?", [$status]);
    }

    public static function emailExists(string $email, ?int $exceptId = null): bool
    {
        if ($exceptId) {
            return (int) Database::scalar(
                "SELECT COUNT(*) FROM patient WHERE Email = ? AND ID != ?",
                [$email, $exceptId]
            ) > 0;
        }
        return (int) Database::scalar("SELECT COUNT(*) FROM patient WHERE Email = ?", [$email]) > 0;
    }

    /**
     * Insert a new patient. $data keys map to table columns.
     * Returns the new patient ID.
     */
    public static function create(array $data): int
    {
        return Database::execute(
            "INSERT INTO patient
                (FirstName, MiddleName, Surname, Email, Contact, DateOfBirth, Gender,
                 EmergencyContact, Address, Department, PreferredDate, Notes, AGE, password, Status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $data['FirstName'], $data['MiddleName'], $data['Surname'], $data['Email'],
                $data['Contact'], $data['DateOfBirth'], $data['Gender'], $data['EmergencyContact'],
                $data['Address'], $data['Department'] ?? null, $data['PreferredDate'], $data['Notes'],
                $data['AGE'], $data['password'], $data['Status'] ?? 'pending',
            ]
        );
    }

    /**
     * Update an existing patient. Password is only changed when provided.
     */
    public static function update(int $id, array $data): void
    {
        if (!empty($data['password'])) {
            Database::execute(
                "UPDATE patient SET FirstName=?, MiddleName=?, Surname=?, Email=?, Contact=?,
                    DateOfBirth=?, Gender=?, EmergencyContact=?, Address=?, Department=?,
                    PreferredDate=?, Notes=?, AGE=?, password=? WHERE ID=?",
                [
                    $data['FirstName'], $data['MiddleName'], $data['Surname'], $data['Email'],
                    $data['Contact'], $data['DateOfBirth'], $data['Gender'], $data['EmergencyContact'],
                    $data['Address'], $data['Department'] ?? null, $data['PreferredDate'], $data['Notes'],
                    $data['AGE'], $data['password'], $id,
                ]
            );
        } else {
            Database::execute(
                "UPDATE patient SET FirstName=?, MiddleName=?, Surname=?, Email=?, Contact=?,
                    DateOfBirth=?, Gender=?, EmergencyContact=?, Address=?, Department=?,
                    PreferredDate=?, Notes=?, AGE=? WHERE ID=?",
                [
                    $data['FirstName'], $data['MiddleName'], $data['Surname'], $data['Email'],
                    $data['Contact'], $data['DateOfBirth'], $data['Gender'], $data['EmergencyContact'],
                    $data['Address'], $data['Department'] ?? null, $data['PreferredDate'], $data['Notes'],
                    $data['AGE'], $id,
                ]
            );
        }
    }

    public static function delete(int $id): void
    {
        Database::execute("DELETE FROM patient WHERE ID = ?", [$id]);
    }

    // ---- Patient portal: authentication & self-service --------------------

    /** Look up a patient by email (used by the portal login). */
    public static function findByEmail(string $email): ?array
    {
        return Database::first("SELECT * FROM patient WHERE Email = ?", [$email]);
    }

    /** Set / change a patient's portal password (expects an already-hashed value). */
    public static function setPassword(int $id, string $hash): void
    {
        Database::execute("UPDATE patient SET password = ? WHERE ID = ?", [$hash, $id]);
    }

    public static function touchLastLogin(int $id): void
    {
        Database::execute("UPDATE patient SET last_login = NOW() WHERE ID = ?", [$id]);
    }

    /** Turn email-OTP two-factor sign-in on or off for a patient. */
    public static function setTwoFactor(int $id, bool $enabled): void
    {
        Database::execute("UPDATE patient SET twofa_enabled = ? WHERE ID = ?", [$enabled ? 1 : 0, $id]);
    }

    /** Store a hashed one-time code with an expiry for 2FA. */
    public static function setOtp(int $id, string $hash, int $ttlSeconds = 600): void
    {
        Database::execute(
            "UPDATE patient SET otp_hash = ?, otp_expires_at = ?, otp_attempts = 0 WHERE ID = ?",
            [$hash, date('Y-m-d H:i:s', time() + $ttlSeconds), $id]
        );
    }

    public static function incrementOtpAttempts(int $id): void
    {
        Database::execute("UPDATE patient SET otp_attempts = otp_attempts + 1 WHERE ID = ?", [$id]);
    }

    public static function clearOtp(int $id): void
    {
        Database::execute(
            "UPDATE patient SET otp_hash = NULL, otp_expires_at = NULL, otp_attempts = 0 WHERE ID = ?",
            [$id]
        );
    }

    /** Personal & contact details. */
    public static function updateContact(int $id, string $contact, string $address, string $emergency): void
    {
        Database::execute(
            "UPDATE patient SET Contact = ?, Address = ?, EmergencyContact = ? WHERE ID = ?",
            [$contact, $address, $emergency, $id]
        );
    }

    /** Insurance details. */
    public static function updateInsurance(int $id, string $provider, string $number): void
    {
        Database::execute(
            "UPDATE patient SET InsuranceProvider = ?, InsuranceNumber = ? WHERE ID = ?",
            [$provider, $number, $id]
        );
    }

    /** Medical details (blood group, allergies). */
    public static function updateMedical(int $id, string $bloodGroup, string $allergies): void
    {
        Database::execute(
            "UPDATE patient SET BloodGroup = ?, Allergies = ? WHERE ID = ?",
            [$bloodGroup, $allergies, $id]
        );
    }

    /** Save the quick onboarding answers (only the fields the welcome flow asks). */
    public static function saveOnboarding(int $id, string $emergency, string $bloodGroup, string $allergies): void
    {
        Database::execute(
            "UPDATE patient SET EmergencyContact = ?, BloodGroup = ?, Allergies = ?, onboarded = 1 WHERE ID = ?",
            [$emergency, $bloodGroup, $allergies, $id]
        );
    }

    public static function markOnboarded(int $id): void
    {
        Database::execute("UPDATE patient SET onboarded = 1 WHERE ID = ?", [$id]);
    }

    // ---- Analytics --------------------------------------------------------

    /** New patient registrations per day for the last $days days, oldest first. */
    public static function dailyRegistrations(int $days = 7): array
    {
        $rows = Database::select(
            "SELECT DATE(created_at) AS d, COUNT(*) AS c
             FROM patient
             WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL ? DAY)
             GROUP BY DATE(created_at)",
            [$days - 1]
        );
        $counts = array_column($rows, 'c', 'd');

        $series = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $series[$date] = (int) ($counts[$date] ?? 0);
        }
        return $series;
    }

    /** New patient registrations per month for the last $months months, oldest first. */
    public static function monthlyRegistrations(int $months = 6): array
    {
        $rows = Database::select(
            "SELECT DATE_FORMAT(created_at, '%Y-%m') AS ym, COUNT(*) AS c
             FROM patient
             WHERE created_at >= DATE_SUB(DATE_FORMAT(CURDATE(), '%Y-%m-01'), INTERVAL ? MONTH)
             GROUP BY ym",
            [$months - 1]
        );
        $counts = array_column($rows, 'c', 'ym');

        $series = [];
        for ($i = $months - 1; $i >= 0; $i--) {
            $key   = date('Y-m', strtotime("first day of -$i month"));
            $label = date('M Y', strtotime("first day of -$i month"));
            $series[$label] = (int) ($counts[$key] ?? 0);
        }
        return $series;
    }

    /** Patient count grouped by department, highest first. [department => count]. */
    public static function byDepartment(): array
    {
        $rows = Database::select(
            "SELECT COALESCE(NULLIF(Department, ''), 'Unassigned') AS label, COUNT(*) AS c
             FROM patient GROUP BY label ORDER BY c DESC"
        );
        return array_column($rows, 'c', 'label');
    }

    /** Patient count grouped by gender. [gender => count]. */
    public static function byGender(): array
    {
        $rows = Database::select(
            "SELECT Gender AS label, COUNT(*) AS c FROM patient GROUP BY Gender ORDER BY c DESC"
        );
        return array_column($rows, 'c', 'label');
    }

    /** Patient/appointment count grouped by status. [status => count]. */
    public static function byStatus(): array
    {
        $rows = Database::select(
            "SELECT Status AS label, COUNT(*) AS c FROM patient GROUP BY Status"
        );
        return array_column($rows, 'c', 'label');
    }

    /** Full name helper. */
    public static function fullName(array $patient): string
    {
        $parts = array_filter([
            $patient['FirstName'] ?? '',
            $patient['MiddleName'] ?? '',
            $patient['Surname'] ?? '',
        ]);
        return implode(' ', $parts);
    }
}
