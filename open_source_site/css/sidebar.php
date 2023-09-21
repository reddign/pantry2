<!--  
echo "<style type='text/css'>
:root {
  --dark_bg: <?php echo $dark_bg; ?>;
  --light_bg: <?php echo $light_bg; ?>;
  --med_border: <?php echo $med_border; ?>;
  --error: <?php echo $error_color; ?>;
}

.sidenav {
    height: 100%; /* Full-height: remove this if you want "auto" height */
    width: 15%; /* Set the width of the sidebar 250px*/
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    background-color: var(--dark_bg); 
    overflow-y: hidden;
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 20px;/*20px*/
    border-right: solid var(--light_bg);
    border-width: 3px;
  }
  
  /* The navigation menu links */
  .sidenav a {
    padding: 6px 8px 6px 16px;/*6px 8px 6px 16px*/
    text-decoration: none;
    font-size: 25px;/*25px*/
    color: white;
    display: block;
  }

  .sidenav >:nth-child(2){
    padding-top: 15px;
  }
  
  /* When you mouse over the navigation links, change their color */
  .sidenav a:hover {
    color: var(--med_border);
  }

  .border {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 30px;
    margin-top: 30px;
    height: 3px;
    width: 175px;
    background-color: var(--med_border);
    border-radius: 2px
  }

  .hidden {
    display: none;
  } 

  #logout {
    color: var(--error);
  }
  #logout:hover{
    color: var(--med_border);
  }
  </style>

  ?>

  -->