<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM advertisements";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <a href="logout.php">Logout</a>

    <h3>All Advertisements</h3>
    <table>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Newspaper</th>
            <th>Publish Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($ad = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $ad['title']; ?></td>
            <td><?php echo $ad['category']; ?></td>
            <td><?php echo $ad['newspaper']; ?></td>
            <td><?php echo $ad['publish_date']; ?></td>
            <td><?php echo $ad['status']; ?></td>
            <td>
                <form action="admin.php" method="POST">
                    <input type="hidden" name="ad_id" value="<?php echo $ad['ad_id']; ?>">
                    <select name="status">
                        <option value="Pending">Pending</option>
                        <option value="Submitted">Submitted</option>
                        <option value="Published">Published</option>
                    </select>
                    <button type="submit">Update Status</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
