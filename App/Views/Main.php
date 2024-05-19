<?php

$result = $databaseObj->selectAllInTable("testhuman");
?>
<form id="deleteForm" method="post">
    <input type="hidden" name="itemId" id="itemId">
</form>


<section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h1>Featured People</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Product -->
            <?php foreach ($result as $row) : ?>

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product-1" class="single-product">
                        <div class="part-1" style="background-image: url(data:image/jpeg;base64,<?php echo $row['Image']; ?>); background-repeat: no-repeat; background-position: center;background-size: cover;transition: all 0.3s;">
                            <ul>
                                <!-- if not admin then cant access to the function -->
                                <?php if (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1) : ?>
                                    <li><a href="#"><i class="fas fa-folder" onclick="edit('<?php echo $row['PersonID']; ?>')"></i></a></li>

                                    <li onclick="submitForm('<?php echo $row['PersonID']; ?>')"><a href="#"><i class="fas fa-trash"></i></a></li>

                                <?php endif; ?>

                                <li><a href="#"><i class="fas fa-search" onclick="view('<?php echo $row['PersonID']; ?>')"></i></a></li>

                            </ul>

                        </div>
                        <div class="part-2">
                            <h3 class="product-title"><?php echo  $row['FirstName'] ?></h3>

                            <h4 class="product-price"><?php echo  $row['LastName'] ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</section>
<script>
    function edit(ID) {
        window.location.href = '../App/Views/Edit_Database.php?id=' + ID;
    }

    function view(ID) {
        window.location.href = '../App/Views/View_Info.php?id=' + ID;
    }

    function submitForm(itemId) {
        // Set the item ID value in the hidden input field
        document.getElementById('itemId').value = itemId;

        // Submit the form
        document.getElementById('deleteForm').submit();
    }
</script>