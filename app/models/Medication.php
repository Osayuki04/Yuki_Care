<?php
/**
 * Medication model — medication table.
 *
 * Category is stored as a free-text string (the system uses a fixed set of
 * category labels rather than a separate categories table).
 */
class Medication
{
    public static function all(): array
    {
        return Database::select("SELECT * FROM medication ORDER BY ID DESC");
    }

    public static function recent(int $limit = 10): array
    {
        return Database::select("SELECT * FROM medication ORDER BY created_at DESC, ID DESC LIMIT ?", [$limit]);
    }

    public static function find(int $id): ?array
    {
        return Database::first("SELECT * FROM medication WHERE ID = ?", [$id]);
    }

    public static function count(): int
    {
        return (int) Database::scalar("SELECT COUNT(*) FROM medication");
    }

    public static function lowStock(int $threshold = 10): int
    {
        return (int) Database::scalar("SELECT COUNT(*) FROM medication WHERE Quantity <= ?", [$threshold]);
    }

    public static function nameExists(string $name, ?int $exceptId = null): bool
    {
        if ($exceptId) {
            return (int) Database::scalar(
                "SELECT COUNT(*) FROM medication WHERE Name = ? AND ID != ?",
                [$name, $exceptId]
            ) > 0;
        }
        return (int) Database::scalar("SELECT COUNT(*) FROM medication WHERE Name = ?", [$name]) > 0;
    }

    /** Total units of stock across all medications. */
    public static function totalStock(): int
    {
        return (int) Database::scalar("SELECT COALESCE(SUM(Quantity), 0) FROM medication");
    }

    /** Medication units in stock grouped by category, highest first. [category => units]. */
    public static function stockByCategory(): array
    {
        $rows = Database::select(
            "SELECT COALESCE(NULLIF(Category, ''), 'Uncategorised') AS label, SUM(Quantity) AS c
             FROM medication GROUP BY label ORDER BY c DESC"
        );
        return array_column($rows, 'c', 'label');
    }

    /** Medications at or below the stock threshold, lowest first. */
    public static function lowStockList(int $threshold = 10): array
    {
        return Database::select(
            "SELECT * FROM medication WHERE Quantity <= ? ORDER BY Quantity ASC, Name ASC",
            [$threshold]
        );
    }

    public static function create(array $data): int
    {
        return Database::execute(
            "INSERT INTO medication (Name, Category, Dosage, Quantity, Manufacturer, Description)
             VALUES (?, ?, ?, ?, ?, ?)",
            [
                $data['Name'], $data['Category'], $data['Dosage'],
                (int) $data['Quantity'], $data['Manufacturer'], $data['Description'],
            ]
        );
    }

    public static function update(int $id, array $data): void
    {
        Database::execute(
            "UPDATE medication SET Name=?, Category=?, Dosage=?, Quantity=?, Manufacturer=?, Description=? WHERE ID=?",
            [
                $data['Name'], $data['Category'], $data['Dosage'],
                (int) $data['Quantity'], $data['Manufacturer'], $data['Description'], $id,
            ]
        );
    }

    public static function delete(int $id): void
    {
        Database::execute("DELETE FROM medication WHERE ID = ?", [$id]);
    }
}
