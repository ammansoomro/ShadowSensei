<form action="" method="get">
    <div class="search">
        <label>
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>"
                placeholder="Search here" />
            <ion-icon name="search-outline"></ion-icon>
        </label>
    </div>
</form>