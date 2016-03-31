<?php
include('config.php');
include('function.php');

//function start call for get category
$html = httpPost("http://www.caymanmalls.com/caymanmalls/index.php/services/product/service_category");
$arr = json_decode($html, true);

// category insert update function start here

        $category=$arr['category'];

        for($i=0;$i<count($category);$i++)
        {
            $update_type=$category[$i]['update_type'];
            $categories_id=$category[$i]['categories_id'];
            $categories_name=$category[$i]['categories_name'];
            $parent_id=$category[$i]['parent_id'];
            if($parent_id=="Self")
            {
                $parent_id="NULL";
            }

              if($update_type=="add")
              {

                if(mysql_num_rows(mysql_query("SELECT ID FROM categories where ID='".$categories_id."'"))){

                    mysql_query("update `categories` set `NAME`='".$categories_name."' where ID='".$categories_id."'") or die(mysql_error());

                }
                else
                {
                    mysql_query("INSERT INTO `categories` (`ID`, `NAME`, `PARENTID`, `CATSHOWNAME`) VALUES
                    ('$categories_id','$categories_name',$parent_id, 1)") or die(mysql_error());
                }

            }
            else
            {
                mysql_query("update `categories` set `NAME`='".$categories_name."' where ID='".$categories_id."'") or die(mysql_error());
           
            }
        }

// category function end here

// product insert update function start here

$product=$arr['product'];

for($i=0;$i<count($product);$i++)
{
    $product_id=$product[$i]['product_id'];
    $categoryId=$product[$i]['categoryId'];
    $product_name=$product[$i]['product_name'];
    $product_barcode=$product[$i]['product_barcode'];
    $product_sku=$product[$i]['product_sku'];
    $product_unit_price=$product[$i]['product_unit_price'];
    $product_sale_price=$product[$i]['product_sale_price'];

    $product_name=str_replace("'","", $product_name);
    $product_name=str_replace('"',"", $product_name);


    $product_barcode=str_replace("'","", $product_barcode);
    $product_barcode=str_replace('"',"", $product_barcode);
      




    if(mysql_num_rows(mysql_query("SELECT ID FROM products where ID='".$product_id."'")))
       {
        mysql_query("update `products` set `NAME`='".$product_name."' where ID='".$product_id."'") or die(mysql_error());

       }
       else
       {

       mysql_query("INSERT INTO `products` (`ID`,`category`,`NAME`,`TAXCAT`,`CODE`,`REFERENCE`,`PRICEBUY`,`PRICESELL`) VALUES
       ('$product_id','$categoryId','$product_name','001','$product_barcode','$product_sku','$product_unit_price','$product_sale_price')") or die(mysql_error());

       }

    
}

?>