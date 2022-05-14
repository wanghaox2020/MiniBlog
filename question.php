<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        section {
            /* margin-left: auto;
            margin-right: auto; */
            margin: auto;
            width: 50%;
        }
        h1 {
            margin: inherit;
            width: inherit;
            text-align: center;
            font-size: 30pt;
            }

        .form-inline {
            margin: inherit;
            width:inherit;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        p{ text-align: left;
            font-size: 15pt;
        }
        div{
            width: 15pt;
        }
        .div1 {
            text-align:center;
            width: 300px;
            height: 100px;
            border: 1px solid black;
        }
    </style>  
</head>


<!--Section: insert question-->
<section>
  <h1 class="text-center mb-8 pb-2 text-primary fw-bold">Post A new Question </h3>
    <p class="text-center mb-5">Please type your question</p>
    <form class="form-inline" method="POST">
            <div>
                <Input class = "text" type = "text" method = POST placeholder = "Please enter question title here"></Input>
            </div>

            <div class = "div1" >
                <Input class = "div1" type = "text" method = POST placeholder = "please enter your question here"> </Input>
                <button type = "button" > submit </button>
            </div1>

            <label for = "TagName"> Select a Question Tag: </label>
                <select class = "form-select" name = "tagname" id = "tagname">
                    <?php
                        include "connectDB.php";

                        $selectTag = "select tag_name from Tag;";
                        $result = mysqli_query($conn, $selectTag);
                        while($row = $result->fetch_assoc()){
                            echo "<option>".$row['tag_name']."</option>";
                        }
                    ?>
                
                </select>
            </form>
</section>
<!--Section: insert question-->

