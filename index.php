<html>
<head>
    <title>task13</title>
    <link rel="stylesheet" href="styles.css">
</head>

<?php
 $conn = mysqli_connect("localhost", "root", "", "task13");
 $mencari = '';
 if (isset($_POST['mencari'])) {
     $mencari = $_POST['mencari'];
     $query = "SELECT * FROM daftar WHERE Position LIKE '%$mencari%' OR Url LIKE '%$mencari%' OR Title LIKE '%$mencari%' OR Description LIKE '%$mencari%'";
 } else {
     $query = "SELECT * FROM daftar";
 }
 $result = mysqli_query($conn, $query);
?>

<body>
<h1>Daftar</h1>
    <table>
        <tr>
            <th class="thmain">Position</th>
            <th class="thmain">Url</th>
            <th class="thmain">Title</th>
            <th class="thmain">Description</th>
        </tr>

        <?php 
    foreach ($result as $item): 
        ?>
    <tr>
        <td class="tdmain"><?php echo $item['Position'] ?></td>
        <td class="tdmain"><a href="<?php echo $item['Url'] ?>" target="_blank"><?php echo $item['Url'] ?></td>
        <td class="tdmain"><?php echo $item['Title'] ?></td>
        <td class="tdmain"><?php echo $item['Description'] ?></td>
    </tr>
    <br /> 
    <?php endforeach; ?>
    </table>

<div class="nyari">
    <form method="POST">
        <input type="text" name="mencari" placeholder="Cari Disini...">
        <button type="submit">Cari</button>
    </form>
</div>

</body>
</html>
