<?php
echo "<style type='text/css'>
:root {
  --med_bg: $data->med_bg_color;
  --light_bg: <?php echo $light_bg; ?>;
}

 <!-- .content{ 
    /* margin-left: 15%;
    margin-top: 22%; 
 -->
.table {
    display: flex;
    text-align: center;
    justify-content: center;
    margin: auto;
    /* padding-left: 230px; */
  }

  .table tr {
    width: 17%;
  }

  .table tr td {
    border: solid black;
    border-width: 5px;
    background-color: var(--light_bg);
  }

  .productImg {
    height: 300px;
    width:225px;
    padding: 7px;
    background-color: var(--light_bg);

  }

  .addCart{
    background-color: var(--med_bg);
    color: var(--light_bg);
    padding: 5px;
    font-weight: bold;
    border-radius: 4px;
    border-color: var(--med_bg);
  }
</style>

?>