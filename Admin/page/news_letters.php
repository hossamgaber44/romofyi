<div class="app-content">
    <?php 
        @$id =$_GET['id'];
        if(isset($id)){
            @$deleteQuery ="DELETE FROM newsletters WHERE id='$id'";
            @$delete=mysqli_query($connection,$deleteQuery);
            if(isset($delete)){
                echo"success deleted";
                // header("REFRESH:6");
            }else{
                echo"fail deleted";
            }
        }
    ?>
    <div class="app-content-header">
        <h1 class="app-content-headerText">News Letters</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
    </div>
    <div class="app-content-actions">
        <!-- <input class="search-bar" placeholder="Search..." type="text"> -->
        <div class="app-content-actions-wrapper">
            <!-- <div class="filter-button-wrapper">
                <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" /></svg></button>
                <div class="filter-menu">
                    <label>Users</label>
                    <select>
                        <option>All Categories</option>
                        <option>Furniture</option>
                        <option>Decoration</option>
                        <option>Kitchen</option>
                        <option>Bathroom</option>
                    </select>
                    <label>Status</label>
                    <select>
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                    </select>
                    <div class="filter-menu-buttons">
                        <button class="filter-button reset">
                            Reset
                        </button>
                        <button class="filter-button apply">
                            Apply
                        </button>
                    </div>
                </div>
            </div> -->
            <button class="action-button list active" title="List View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6" />
                    <line x1="8" y1="12" x2="21" y2="12" />
                    <line x1="8" y1="18" x2="21" y2="18" />
                    <line x1="3" y1="6" x2="3.01" y2="6" />
                    <line x1="3" y1="12" x2="3.01" y2="12" />
                    <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
            </button>
            <button class="action-button grid" title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" /></svg>
            </button>
        </div>
    </div>
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell category">User Name</div>
            <div class="product-cell status-cell">email</div>
            <div class="product-cell status-cell">Action</div>
        </div>
        <?php 
        $query="SELECT * FROM newsletters";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result)){
            ?>

        <div class="products-row">
            <div class="product-cell category"><span class="cell-label">User Name:</span><?php 
                    $userId= $row['user_id'] ;
                    $UserNameQuery="SELECT `name` FROM users WHERE id='$userId' ";
                    $UserNameResult=mysqli_query($connection,$UserNameQuery);
                    $UserNameRow=mysqli_fetch_assoc($UserNameResult);
                    echo $UserNameRow['name'];
                    ?>
            </div>
            <div class="product-cell status-cell">
                <span class="cell-label">Email:</span><?php echo $row['email']  ?>
            </div>
            <div class="product-cell sales"><span class="cell-label">Action:</span>
                <a href="dashboard.php?page=news_letters&id=<?php echo$row['id']?>">
                    <i class="fa-solid fa-trash" style="color: red; margin-right: 10px; font-size: 16px;"></i>
                </a>
            </div>
        </div>

        <?php
        }
        ?>

    </div>
</div>