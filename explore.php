<?php include('header.php'); ?>
<style type="text/css">
  h4 .fa{color: #EF3652;vertical-align: middle;margin-left: 2%;}
</style>
<?php  

    $listing_auto_cat = mysqli_query($conn,"SELECT distinct(listing_category) FROM listing WHERE status!='0' AND active_deactive = 'active'");
    $listing_auto_city = mysqli_query($conn,"SELECT distinct(listing_city) FROM listing WHERE status!='0' AND active_deactive = 'active'");
           
      $listing_category_array_auto = array();
      $listing_city_array_auto = array();

      while($row_listing_auto_row_cat = mysqli_fetch_row($listing_auto_cat))
      {

        $list_cat = explode("<br>", $row_listing_auto_row_cat[0]);

        foreach ($list_cat as $cat)
        {
          $listing_category_array_auto[] = $cat;

        } 
      }

      while($row_listing_auto_row_city = mysqli_fetch_row($listing_auto_city))
      {

        $list_city = explode("<br>", $row_listing_auto_row_city[0]);

        foreach ($list_city as $city) 
        {
          $listing_city_array_auto[] = $city;

        } 
      }

?>
<?php  

  $fld_tag = '';
    $fld_city = '';
    $lquery_res = '';
    
    if(isset($_POST['home_srchbtn'])) {
        $fld_tag = $_POST['listing_category'];
        $fld_city = $_POST['listing_city'];

    }
    else if(isset($_POST['explr_srchbtn'])){
        $fld_tag = $_POST['listing_category'];
        $fld_city = $_POST['listing_city'];
        
    }

?>
<?php  

  if(isset($_POST['home_srchbtn'])) 
  {
        if (isset($_POST['listing_category']) AND isset($_POST['listing_category'])) 
        {
          $lname = $_POST['listing_category'];
          $lcity = $_POST['listing_city'];

          $lquery = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_city LIKE '%". $lcity ."%' AND listing_category LIKE '%".$lname."%' AND type='premium' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";
          $lquery_res = mysqli_query($conn, $lquery);   
                       
          $lquery2 = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_city LIKE '%". $lcity ."%' AND listing_category LIKE '%".$lname."%' AND type ='standard' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res2 = mysqli_query($conn, $lquery2);

          $lquery3 = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_city LIKE '%". $lcity ."%' AND listing_category LIKE '%".$lname."%' AND type ='free' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res3 = mysqli_query($conn, $lquery3);
        }
        elseif (isset($_POST['listing_category']) AND !isset($_POST['listing_city'])) 
        {
          $lname = $_POST['listing_category'];

          $lquery = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_category LIKE '%".$lname."%' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res = mysqli_query($conn, $lquery);   
                       
        }
        elseif (!isset($_POST['listing_category']) AND isset($_POST['listing_city'])) 
        {
          $lcity = $_POST['listing_city'];

          $lquery = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_city LIKE '%".$lcity."%' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res = mysqli_query($conn, $lquery);
                       
        }
    }
    else if(isset($_POST['explr_srchbtn']))
    {

        if (isset($_POST['listing_category']) AND isset($_POST['listing_category'])) 
        {
          $lname = $_POST['listing_category'];
          $lcity = $_POST['listing_city'];

          $lquery = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_city LIKE '%". $lcity ."%' AND listing_category LIKE '%".$lname."%' AND type='premium' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res = mysqli_query($conn, $lquery);   
                       
          $lquery2 = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_city LIKE '%". $lcity ."%' AND listing_category LIKE '%".$lname."%' AND type ='Standard' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res2 = mysqli_query($conn, $lquery2);

          $lquery3 = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_city LIKE '%". $lcity ."%' AND listing_category LIKE '%".$lname."%' AND type ='free' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res3 = mysqli_query($conn, $lquery3);
        }
        elseif (isset($_POST['listing_category']) AND !isset($_POST['listing_city'])) 
        {
          $lname = $_POST['listing_category'];

          $lquery = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_category LIKE '%".$lname."%' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res = mysqli_query($conn, $lquery);   
                       
        }
        elseif (!isset($_POST['listing_category']) AND isset($_POST['listing_city'])) 
        {
          $lcity = $_POST['listing_city'];

          $lquery = "SELECT * FROM listing where status != '0' AND active_deactive ='active' AND listing_city LIKE '%".$lcity."%' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC";

          $lquery_res = mysqli_query($conn, $lquery);   
                       
        }
      
        
    }
    else
    {

         $lquery_res =("SELECT * FROM listing WHERE status != '0' AND active_deactive = 'active' AND type='premium'ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC");
        $lquery_res = mysqli_query($conn, $lquery_res);

        $lquery_res2 =("SELECT * FROM listing WHERE status != '0' AND active_deactive = 'active' AND type='Standard' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC");
        $lquery_res2 = mysqli_query($conn, $lquery_res2);

        $lquery_res3 =("SELECT * FROM listing WHERE status != '0' AND active_deactive = 'active' AND type='free' ORDER BY avg_rating DESC, listing_favourite DESC, avg_rating DESC");
        $lquery_res3 = mysqli_query($conn, $lquery_res3);   
    }

?>
<!-- Explore Form -->
<!DOCTYPE html>
<html>
<head>
  <title>Getlisting - Explore Listings</title>
    <style type="text/css">
      .explore_a
      {
        color: white !important;
      }
        .index {
    width: 60%;
}
.index .autocomplete {
    width: 40%;
    margin: 0px;
    display: inline-block;
    float: left;
}
.explore_form input[type="text"] {
    width: 100%;
    display: inline-block;
    margin: 0px;
    margin-right: 3%;
    height: 7%;
    height: 3.00rem;
}
.index .autocomplete2 {
    width: 30%;
    margin-left: 5%;
    display: inline-block;
    float: left;
}
.explore_form input[type="text"] {
    width: 100%;
    display: inline-block;
    margin: 0px;
    margin-right: 3%;
    height: 7%;
    height: 3.00rem;
}
.index input[type="submit"] {
    width: 16%;
    margin: 0px;
    /* margin-left: -5%; */
    margin-left: 5%;
    text-align: center;
}
    </style>
</head>
<body>
  <form autocomplete="off" class="listing_form index banner_form explore_form" method="POST" style="margin-top: 12%;">
    <h3>Explore The Business Listing Here</h3>
        <div class="autocomplete">
            <input id="myInput" type="text" name="listing_category" placeholder="What are you looking for" class="banner_form_what"  value="<?php echo $fld_tag; ?>">
        </div>
        <div class="autocomplete autocomplete2">
            <input id="myInput2" type="text" name="listing_city" placeholder="Business City" class="banner_form_location"  style="width: 100%;" value="<?php echo $fld_city; ?>">
        </div>
        <div>
        <input type="submit" name="explr_srchbtn">
      </div>
  </form>

  <!-- Highlights -->
      <section class="wrapper wrapper_padding_explore_reduce" id="exp_section">
        <div class="inner">
          <header class="special">
            <h2>FIND FEATURED BUSINESS LISTING</h2>
            <p>Just click to get the best and featured business listing.</p>
          </header>
          <div class="highlights">
            <?php  
                           
                            if($lquery_res!='')
                            {
                                if (mysqli_num_rows($lquery_res)>0) 
                                {
                                    while ($lquery_row = mysqli_fetch_array($lquery_res)) 
                                    {
                                        echo "

                                                <section>
                                                    <div class='content padding_reduce_content'>
                                                        <header>
                                                            <a href='listing_page.php?lid=".$lquery_row['id']."'><img src='listed images/".$lquery_row['listing_image1']."'></a>
                                                            <h3>".$lquery_row['listing_name']."</h3>
                                                            <h4>".$lquery_row['listing_favourite']." <i class='fa fa-heart'></i></h4>
                                                        </header>
                                                        <p>".$lquery_row['listing_city']."</p>
                                                    </div>
                                                </section>

                                            ";
                                    }
                                }
                            }
                            else
                            {
                                echo "

                                            
                                                
                                                    <header style='width: 330%;'>
                                                        
                                                        <h3 style='text-align: center;color: #e60326;'>Sorry, Listing Not Found</h3>
                                                        
                                                    </header>
                                                    
                                                
                                            

                                        ";
                            }
                           if($lquery_res2!='')
                            {
                                if (mysqli_num_rows($lquery_res2)>0) 
                                {
                                    while ($lquery_row2 = mysqli_fetch_array($lquery_res2)) 
                                    {
                                        echo "

                                                <section>
                                                    <div class='content padding_reduce_content'>
                                                        <header>
                                                            <a href='listing_page.php?lid=".$lquery_row2['id']."'><img src='listed images/".$lquery_row2['listing_image1']."'></a>
                                                            <h3>".$lquery_row2['listing_name']."</h3>
                                                            <h4>".$lquery_row2['listing_favourite']." <i class='fa fa-heart'></i></h4>
                                                        </header>
                                                        <p>".$lquery_row2['listing_city']."</p>
                                                    </div>
                                                </section>

                                            ";
                                    }
                                }
                            }
                            else
                            {
                                echo "

                                            
                                                
                                                    <header style='width: 330%;'>
                                                        
                                                        <h3 style='text-align: center;color: #e60326;'>Sorry, Listing Not Found</h3>
                                                        
                                                    </header>
                                                    
                                                
                                            

                                        ";
                            }
                            if($lquery_res3!='')
                            {
                                if (mysqli_num_rows($lquery_res3)>0) 
                                {
                                    while ($lquery_row3 = mysqli_fetch_array($lquery_res3)) 
                                    {
                                        echo "

                                                <section>
                                                    <div class='content padding_reduce_content'>
                                                        <header>
                                                            <a href='listing_page.php?lid=".$lquery_row3['id']."'><img src='listed images/".$lquery_row3['listing_image1']."'></a>
                                                            <h3>".$lquery_row3['listing_name']."</h3>
                                                            <h4>".$lquery_row3['listing_favourite']." <i class='fa fa-heart'></i></h4>
                                                        </header>
                                                        <p>".$lquery_row3['listing_city']."</p>
                                                    </div>
                                                </section>

                                            ";
                                    }
                                }
                            }
                            else
                            {
                                echo "

                                            
                                                
                                                    <header style='width: 330%;'>
                                                        
                                                        <h3 style='text-align: center;color: #e60326;'>Sorry, Listing Not Found</h3>
                                                        
                                                    </header>
                                                    
                                                
                                            

                                        ";
                            }

            ?>
            
          </div>
        </div>
      </section>
            <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
/*An array containing all the country names in the world:*/


var countries = <?php echo json_encode($listing_category_array_auto); ?>;


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = <?php echo json_encode($listing_city_array_auto); ?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput2"), countries);
</script>
      <?php include('footer.php'); ?>