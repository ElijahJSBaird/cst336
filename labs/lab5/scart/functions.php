<?php

function displayResults()
{
    global $items;
    
    if (isset($items))
    {
        echo "<table class='table'>";
        foreach ($items as $item)
        {
            $itemName = $item["name"];
            $itemPrice = $item["salePrice"];
            $itemImage = $item["thumbnailImage"];
            $itemId = $item["itemId"];
            echo "
            <tr>
            <td><img src='$itemImage'></td>
            <td><h4>$itemName</h4></td>
            <td><h4>$$itemPrice</h4></td>
            
            <form method='post'>
            <input type='hidden' name='itemName' value='$itemName'>
            <input type='hidden' name='itemId' value='$itemId'>
            <input type='hidden' name='itemImage' value='$itemImage'>
            <input type='hidden' name='itemPrice' value='$itemPrice'>
            ";
            if ($_POST["itemId"] == $itemId)
            {
                echo "<td><button class='btn btn-success'>Added</button></td>";
            }
            else
            {
                echo "<td><button class='btn btn-success'>Add</button></td>";
            }
            echo "
            </form>
            </tr>
            ";
        }
        echo "</table>";
    }
    
    
    
}

function displayCart()
{
    if (isset($_SESSION["cart"]))
    {
        echo "<table class='table'>";
        foreach ($_SESSION["cart"] as $item)
        {
            $itemName = $item["name"];
            $itemPrice = $item["price"];
            $itemImage = $item["image"];
            $itemId = $item["id"];
            $itemQuant = $item['quantity'];
            
            echo "
            <tr>
            <td><img src='$itemImage'></td>
            <td><h4>$itemName</h4></td>
            <td><h4>$$itemPrice</h4></td>
            
            <form method='post'>
            <input type='hidden' name='itemId' value='$itemId'>
            <td><input type='text' name='update' class='form-control' placeHolder='$itemQuant'></td>
            <td><button class='btn btn-danger'>Update</button></td>
            </form>
            
            <form method='post'>
            <input type='hidden' name='removeId' value='$itemId'>
            <td><button class='btn btn-danger'>Remove</button></td>
            </form>
            
            </tr>
            ";
        }
        echo "</table>";
    }
}

function displayCartCount()
{
    echo count($_SESSION["cart"]);
}

?>